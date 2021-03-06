<?php

namespace App\Repositories\Admin;

use App\Contracts\ContractRepositories\Admin\ClientContract;
use App\Facades\Clients\LocationFacade;
use App\Http\Resources\ClientResource;
use App\Models\Client\Client;
use App\Models\Client\ClientImage;
use App\Traits\FormattedJsonResponse;
use App\Traits\GetAdditional;
use App\Traits\Service\ClientService\FileService;
use App\Traits\SortCollection;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ClientRepository implements ClientContract
{
    use FormattedJsonResponse, FileService, SortCollection;

    public function index()
    {
        $search = \request('search');
        $model = Client::query();

        if(!is_null($search)){
            $model->whereHas('autos', function (Builder $query) use($search){
                $query->whereHas('lotInfo', function (Builder $autoQuery) use($search){
                    $autoQuery->where('vin_code', 'like', "%$search%");
                });
            })->orWhere('name', 'like', "%$search%")
                ->orWhere('email', 'like', "%$search%");
        }

        $clients = $this->getWithSort($model,
            \request('countpage'),
            \request('order_type'),
            \request('order_by'));

        return $this->toJson('Clients get all successfully', 200, ClientResource::collection($clients)->additional($this->getAdditional()), true);
    }

    public function show(int $id)
    {
        return $this->toJson('Client get by id successfully', 200, new ClientResource(Client::findOrFail($id)));
    }

    public function store(Request $request)
    {
        $client = Client::create($request->only(
            ['name','username','phone','email']) +
            ['password'      => bcrypt($request->password)]);
        $location = LocationFacade::resultCreator($request->only(
            ['country','city','zip','address']));
        $client->update($location);
        if (!empty($request->image)){
            $this->imageCreator($client,'client',new ClientImage ,$request->image);
        }

        return $this->index();
        /*return $this->toJson('Client created successfully', 201,
                    new ClientResource(Client::findOrFail($client->id)));*/
    }

    public function update(Request $request, int $id)
    {
        $client = Client::findOrFail($id);
        $location =  LocationFacade::resultCreator($request->only(['country','city','zip','address']));
        $client->update(
            array_filter($request->only(['name','phone','username','email'])) +
            $location);
        $client->save();

        return $this->toJson('Client updated successfully', 200,
            new ClientResource($client));
    }

    public function delete(Request $request)
    {
        $clients =  Client::whereIn('id', $request->client_id);
        foreach ($clients as $client){
            $this->imageDeleter($client->image);
            $this->folderDeleter('client');
        }
        $clients->delete();

        return $this->index();
        /*return $this->toJson('Clients deleted successfully', 200, null);*/
    }

    public function destroy(int $id)
    {
        $client =  Client::findOrFail($id);
        if (!is_null($client->image))
            $this->imageDeleter($client->image);
        $this->folderDeleter('client');
        $client->delete();

        return $this->index();
        /*return $this->toJson('Client deleted successfully', 200, null);*/
    }

    public function getAdditional()
    {
        return GetAdditional::get(['cities', 'states']);
    }
}
