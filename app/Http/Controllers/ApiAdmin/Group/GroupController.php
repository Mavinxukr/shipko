<?php

namespace App\Http\Controllers\ApiAdmin\Group;

use App\Contracts\ContractRepositories\Admin\GroupContract;
use App\Contracts\ContractRepositories\Admin\ClientContract;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    private $group;

    public function __construct(GroupContract $group)
    {
        $this->group = $group;
    }

    /**
     * @api {get} admin/get-groups  Show All Groups
     * @apiName Show All Groups
     * @apiVersion 1.1.1
     * @apiGroup Admin Groups Action
     * @apiPermission Authorization
     * @apiHeader  Authorization token
     * @apiSampleRequest  admin/get-groups
     */

    public function index()
    {
        return $this->group->index();
    }

    /**
     * @api {post} admin/store-group  Store Group
     * @apiName Store Group
     * @apiVersion 1.1.1
     * @apiGroup Admin Groups Action
     * @apiPermission Authorization
     * @apiParam {String} name Name
     * @apiParam {String} clients Clients ID Exm: 1,2,3,4,...
     * @apiHeader  Authorization token
     * @apiSampleRequest  admin/store-group
     */

    public function store(Request $request)
    {
        return $this->group->store($request);
    }

    /**
     * @api {get} admin/get-group/{id}  Show Group By Id
     * @apiName Show Group By Id
     * @apiVersion 1.1.1
     * @apiGroup Admin Groups Action
     * @apiPermission Authorization
     * @apiHeader  Authorization token
     * @apiSampleRequest  admin/get-group/{id}
     */

    public function show(int $id)
    {
        return $this->group->show($id);
    }

    /**
     * @api {post} admin/update-group/{id}  Update Group
     * @apiName Update Group
     * @apiVersion 1.1.1
     * @apiGroup Admin Groups Action
     * @apiPermission Authorization
     * @apiParam {String} name Name
     * @apiParam {String} clients Clients ID Exm: 1,2,3,4,...
     * @apiHeader  Authorization token
     * @apiSampleRequest  admin/update-group/{id}
     */

    public function update(Request $request, int $id)
    {
        return $this->group->update($request, $id);
    }

    /**
     * @api {delete} admin/delete-group/{id}  Delete Group
     * @apiName  Delete Group
     * @apiVersion 1.1.1
     * @apiGroup Admin Groups Action
     * @apiPermission Authorization
     * @apiHeader  Authorization token
     * @apiSampleRequest  admin/delete-group/{id}
     */

    public function destroy(int $id)
    {
        return $this->group->destroy($id);
    }
}
