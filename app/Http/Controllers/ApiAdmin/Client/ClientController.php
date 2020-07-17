<?php

namespace App\Http\Controllers\ApiAdmin\Client;

use App\Contracts\ContratRepositories\Admin\ClientContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClientRequest;
use App\Http\Requests\UpdateClientRequest;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    private $client;

    public function __construct(ClientContract $client)
    {
        $this->client = $client;
    }

    /**
     * @api {get} admin/get-clients  Show All Clients
     * @apiName Show All Clients
     * @apiVersion 1.1.1
     * @apiGroup Admin Client Action
     * @apiDescription (countpage - for set Item PerPage, order_type - (asc, desc),
     * order_by - column name for sort, search - for search by (name, email))
     * @apiPermission Authorization
     * @apiHeader  Authorization token
     * @apiSampleRequest  admin/get-clients
     */

    public function index()
    {
        return $this->client->index();
    }

    /**
     * @api {post} admin/store-client  Store Client
     * @apiName Store Client
     * @apiVersion 1.1.1
     * @apiGroup Admin Client Action
     * @apiPermission Authorization
     * @apiParam {String} name Name
     * @apiParam {String} username Username
     * @apiParam {String} phone Phone
     * @apiParam {String} email Email
     * @apiParam {String} password Password
     * @apiParam {String} country Country
     * @apiParam {String} city City
     * @apiParam {File} image Client image
     * @apiHeader  Authorization token
     * @apiSampleRequest  admin/store-client
     */

    public function store(ClientRequest $request)
    {
        return $this->client->store($request);
    }

    /**
     * @api {get} admin/get-client/{id}  Show Client By Id
     * @apiName Show Client By Id
     * @apiVersion 1.1.1
     * @apiGroup Admin Client Action
     * @apiPermission Authorization
     * @apiHeader  Authorization token
     * @apiSampleRequest  admin/get-client/{id}
     */

    public function show(int $id)
    {
        return $this->client->show($id);
    }

    /**
     * @api {post} admin/update-client/{id}  Update Client
     * @apiName Update Client
     * @apiVersion 1.1.1
     * @apiGroup Admin Client Action
     * @apiPermission Authorization
     * @apiParam {String} name Name
     * @apiParam {String} username Username
     * @apiParam {String} phone Phone
     * @apiParam {String} email Email
     * @apiParam {String} password Password
     * @apiParam {String} country Country
     * @apiParam {String} city City
     * @apiParam {File} image Client image
     * @apiHeader  Authorization token
     * @apiSampleRequest  admin/update-client/{id}
     */

    public function update (UpdateClientRequest $request, int  $id)
    {
        return $this->client->update($request,$id);
    }

    /**
     * @api {post} admin/delete-client  Multiple Delete Client
     * @apiName  Multiple Delete Client
     * @apiVersion 1.1.1
     * @apiGroup Admin Client Action
     * @apiParam {Array} client_id Array of Clients ID
     * @apiPermission Authorization
     * @apiHeader  Authorization token
     * @apiSampleRequest  admin/delete-client
     */

    public function delete(Request $request)
    {
        return $this->client->delete($request);
    }

    /**
     * @api {delete} admin/delete-client/{id}  Delete Client
     * @apiName  Delete Client
     * @apiVersion 1.1.1
     * @apiGroup Admin Client Action
     * @apiPermission Authorization
     * @apiHeader  Authorization token
     * @apiSampleRequest  admin/delete-client/{id}
     */

    public function destroy(int $id)
    {
        return $this->client->destroy($id);
    }
}
