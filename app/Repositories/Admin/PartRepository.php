<?php

namespace App\Repositories\Admin;

use App\Contracts\ContractRepositories\Admin\PartContract;
use App\Http\Resources\PartResource;
use App\Models\Auto\Auto;
use App\Models\Auto\LotInfo;
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
        $catalog_numbers = Part::select('catalog_number')->distinct()->get();
        $vin_numbers = LotInfo::select('vin_code')->distinct()->get();
        $this->additional = [
            'catalog_numbers'   => $catalog_numbers,
            'vin_numbers'       => $vin_numbers,
        ];
    }

    public function index()
    {
        $search = \request('search');
        $status = \request('part_status');
        $model = Part::latest('id');

        if(!is_null($search)){
            $model->where('vin', 'like', "%$search%" )
                ->orWhere('catalog_number', 'like', "%$search%" )
                ->orWhere('name', 'like', "%$search%" )
                ->orWhere('auto', 'like', "%$search%" )
                ->orWhere('quality', 'like', "%$search%" )
                ->orWhere('comment', 'like', "%$search%" );
        }

        if(!is_null($status)){
            $model->where('status', $status);
        }

        $parts = $this->getWithSort($model,
            \request('countpage'),
            \request('order_type'),
            \request('order_by'));

        return $this->toJson('Parts get all successfully', 200,
            PartResource::collection($parts)->additional($this->additional), true);
    }

    public function show(int $id)
    {
        return $this->toJson('Part get by id successfully', 200, new PartResource(Part::findOrFail($id)));
    }

    public function store(Request $request)
    {
        $part = Part::create($request->all());
        if (!empty($request->image)){
            foreach ($request->image as $image){
                $this->imageCreator($part,'part', new Photo, $image);
            }
        }

        return $this->index();
       /* return $this->toJson('Part created successfully', 201,
            (new PartResource($part->fresh()))->additional($this->additional));*/
    }

    public function update(Request $request, int $id)
    {
        $part = Part::findOrFail($id);
        $part->update(array_filter($request->all()));
        if (!empty($request->image)){
            foreach ($request->image as $image){
                $this->imageCreator($part,'part', new Photo, $image);
            }
        }

        return $this->toJson('Part get by id successfully', 200,
            (new PartResource($part->fresh()))->additional($this->additional));
    }

    public function destroy(int $id)
    {
        $part =  Part::findOrFail($id);
        foreach ($part->images() as $image){
            $this->imageDeleter($image);
        }
        $part->delete();

        return $this->index();
        /*return $this->toJson('Part deleted successfully',200,null);*/
    }

    public function removeImage(array $ids, int $id)
    {
        $part = Part::findOrFail($id);
        $images = $part->images()->WhereIn('id', $ids)->get();
        foreach ($images as $image){
            $this->imageDeleter($image);
            $image->delete();
        }

        return $this->toJson('Part images deleted successfully',200,
            new PartResource($part->fresh()));
    }

    public function restoreImage(Request $request, int $id)
    {
        $part =  Part::findOrFail($id);
        foreach ($request->image as $image){
            $this->imageCreator($part,'part', new Photo, $image);
        }

        return $this->toJson('Part images restore successfully',200,
            new PartResource($part->fresh()));
    }
}
