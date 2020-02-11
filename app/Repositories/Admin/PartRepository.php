<?php


namespace App\Repositories\Admin;


use App\Contracts\ContractRepositories\Admin\PartContract;
use App\Http\Resources\PartResource;
use App\Models\Part\Part;
use App\Models\Part\Photo;
use App\Traits\FormattedJsonResponse;
use App\Traits\Service\ClientService\FileService;
use Illuminate\Http\Request;

class PartRepository implements PartContract
{
    use FormattedJsonResponse, FileService;

    public function index()
    {
        $client =   PartResource::collection(Part::latest('id')->paginate(10));
        return $this->toJson('Client get by id successfully', 200, $client);
    }

    public function show(int $id)
    {
        $part = Part::findOrFail($id);
        return $this->toJson('Part get by id successfully', 200, new PartResource($part));
    }

    public function store(Request $request)
    {
        $part = Part::create($request->all());
        if (!empty($request->image)){
            foreach ($request->image as $image){
                $this->imageCreator($part,'part', new Photo, $image);
            }
        }
        return $this->toJson('Part created successfully',
            200, new PartResource($part));
    }

    public function update(Request $request, int $id)
    {
        Part::updateOrCreate(['id'=> $id],array_filter($request->all()));
        return $this->toJson('Part get by id successfully', 200,
                                            new PartResource(Part::findOrFail($id)));
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
