<?php

namespace App\Repositories\Admin;

use App\Contracts\ContractRepositories\Admin\GroupContract;
use App\Http\Resources\GroupResource;
use App\Models\Group\Group;
use App\Traits\FormattedJsonResponse;
use App\Traits\SortCollection;
use Illuminate\Http\Request;

class GroupRepository implements GroupContract
{
    use FormattedJsonResponse, SortCollection;

    public function index()
    {
        $search = \request('search');
        $model = Group::query();

        $groups = $this->getWithSort($model,
            \request('countpage'),
            \request('order_type'),
            \request('order_by'));

        return $this->toJson('Get all Groups successfully', 200, GroupResource::collection($groups), true);
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
        return $this->toJson('Store Group successfully', 201,
            new GroupResource($group));
    }

    public function update(Request $request, int $id)
    {
        $group = Group::findOrFail($id);
        $group->update(array_filter($request->all()));
        return $this->toJson('Update Group successfully', 200,
            new GroupResource($group));
    }

    public function destroy(int $id)
    {
        $group = Group::findOrFail($id);
        $group->delete();
        return $this->toJson('Delete Group successfully',200,null);
    }
}
