<?php


namespace App\Repositories\Client;


use App\Contracts\ContractRepositories\Client\PartContract;
use App\Http\Resources\PartResource;
use App\Models\Part\Part;
use App\Models\Part\Photo;
use App\Traits\FormattedJsonResponse;
use App\Traits\Service\ClientService\FileService;
use App\Traits\SortCollection;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class PartRepository implements PartContract
{
    use FormattedJsonResponse, FileService, SortCollection;

    public $additional;

    public function __construct()
    {
        $catalogNumbers = Part::select('catalog_number')->distinct()->get();
        $vinNumbers = Part::select('vin')->distinct()->get();
        $this->additional = [
            'catalog_numbers'   => $catalogNumbers,
            'vin_numbers'       => $vinNumbers,
        ];
    }

    public function index()
    {
        $status = \request('status');
        $model = \request()->user()->parts()->latest('id');

        if(!is_null($status)){
            $model->where('status', $status);
        }

        $parts = $this->getWithSort($model,
            \request('countpage'),
            \request('order_type'),
            \request('order_by'));

        return $this->toJson('Get all client parts successfully', 200, PartResource::collection($parts)->additional($this->additional), true);
    }

    public function show(int $id)
    {
        $part = Part::findOrFail($id);
        return $this->toJson('Part get by id successfully', 200, new PartResource($part));
    }

    public function store(Request $request)
    {
        $part = Part::create($request->except('client_id') + ['client_id' => $request->user()->id]);
        if (!empty($request->image)){
            foreach ($request->image as $image){
                $this->imageCreator($part,'part', new Photo, $image);
            }
        }

        return $this->toJson('Part created successfully', 200,
            (new PartResource($part->fresh()))->additional($this->additional));
    }

    public function update(Request $request, int $id)
    {
        Part::updateOrCreate(['id'=> $id],array_filter($request->except('client_id')));
        return $this->toJson('Part get by id successfully', 200,
            (new PartResource(Part::findOrFail($id)))->additional($this->additional));
    }

    public function destroy(int $id)
    {
        $part =  Part::findOrFail($id);
        foreach ($part->images() as $image){
            $this->imageDeleter($image);
        }
        $this->folderDeleter('part');
        $part->delete();
        return $this->toJson('Part deleted successfully', 200,null);
    }

    public function removeImage(array $ids, int $id)
    {
        $part = Part::findOrFail($id);
        $images = $part->images()->find($ids);
        foreach ($images as $image){
            $this->imageDeleter($image);
            $image->delete();
        }
        $this->folderDeleter('part');
        return $this->toJson('Part images deleted successfully', 200,null);
    }

    public function restoreImage(Request $request, int $id)
    {
        $part =  Part::findOrFail($id);
        foreach ($request->image as $image){
            $this->imageCreator($part,'part', new Photo, $image);
        }
        return $this->toJson('Part images restore successfully', 200,null);
    }
}
