<?php

namespace App\Repositories\Admin;

use App\Contracts\ContractRepositories\Admin\GroupContract;
use App\Http\Resources\GroupResource;
use App\Models\Client\Client;
use App\Models\Group\Group;
use App\Models\Group\GroupAttach;
use App\Traits\FormattedJsonResponse;
use App\Traits\SortCollection;
use Illuminate\Http\Request;

class GroupRepository implements GroupContract
{
    use FormattedJsonResponse, SortCollection;

    public function index()
    {
        $model = Group::query();

        $groups = $this->getWithSort($model,
            \request('countpage'),
            \request('order_type'),
            \request('order_by'));

        return $this->toJson('Get all Groups successfully', 200, GroupResource::collection($groups)->additional($this->getClients()), true);
    }

    public function show(int $id)
    {
        $group = Group::findOrFail($id);
        return $this->toJson('Get Group by id successfully', 200,
            new GroupResource($group));
    }

    public function store(Request $request)
    {
        $group = Group::create($request->all());

        $clients = explode(',', $request->clients);
        foreach ($clients as $client){
            if(Client::whereId($client)->exists()) {
                GroupAttach::create([
                    'group_id' => $group->id,
                    'client_id' => $client,
                ]);
            }
        }

        return $this->index();
        /*return $this->toJson('Store Group successfully', 201,
            new GroupResource($group));*/
    }

    public function update(Request $request, int $id)
    {
        $group = Group::findOrFail($id);
        $group->update(array_filter($request->all()));

        $group->clients()->delete();
        $clients = explode(',', $request->clients);
        foreach ($clients as $client){
            if(Client::whereId($client)->exists()){
                GroupAttach::create([
                    'group_id'  => $group->id,
                    'client_id' => $client,
                ]);
            }
        }

        return $this->toJson('Update Group successfully', 200,
            new GroupResource($group));
    }

    public function destroy(int $id)
    {
        $group = Group::findOrFail($id);
        $group->delete();

        return $this->index();
        /*return $this->toJson('Delete Group successfully',200,null);*/
    }

    public function getClients()
    {
        $data['clients'] = Client::all('id', 'name');
        return $data;
    }
}
