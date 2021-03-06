<?php

namespace App\Http\Controllers\ApiAdmin\Auto;

use App\Contracts\ContractRepositories\Admin\AutoShippingContract;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AutoShippingController extends Controller
{
    private $shipping ;

    public function __construct(AutoShippingContract $shipping)
    {
        $this->shipping = $shipping;
    }

    /**
     * @api {get} admin/get-autos-shipping  Show all autos shipping
     * @apiName Show all autos shipping
     * @apiVersion 1.1.1
     * @apiGroup  Admin Auto Shipping
     * @apiDescription (countpage - for set Item PerPage, order_type - (asc, desc),
     * order_by - column name for sort, port - for filter by port
     * search - for search by (vin_code))
     * @apiPermission Authorization
     * @apiHeader  Authorization token
     * @apiSampleRequest  admin/get-autos-shipping
     */
    public function index()
    {
        return $this->shipping->index();
    }

    /**
     * @api {post} admin/store-auto-shipping  Store Auto Shipping
     * @apiName Store Auto Shipping
     * @apiVersion 1.1.1
     * @apiGroup Admin Auto Shipping
     * @apiPermission Authorization
     * @apiParam {String} auto_id Auto ID example: ["1", "2", "3"]
     * @apiHeader  Authorization token
     * @apiSampleRequest  admin/store-auto-shipping
     */
    public function store(Request $request)
    {
        return $this->shipping->store($request);
    }

    /**
     * @api {get} admin/get-auto-shipping/{id}  Show  auto shipping by Auto ID
     * @apiName Show auto shipping by Auto id
     * @apiVersion 1.1.1
     * @apiGroup  Admin Auto Shipping
     * @apiPermission Authorization
     * @apiHeader  Authorization token
     * @apiSampleRequest  admin/get-auto-shipping/{id}
     */

    public function show(int $id)
    {
        return $this->shipping->show($id);
    }

    /**
     * @api {post} admin/update-auto-shipping/{id}  Update Auto Shipping by Auto ID
     * @apiName Update Auto Shipping
     * @apiVersion 1.1.1
     * @apiGroup Admin Auto Shipping
     * @apiPermission Authorization
     * @apiParam {Number} status Status (at_loading, on_the_way, at_unloading, finish)
     * @apiHeader  Authorization token
     * @apiSampleRequest  admin/update-auto-shipping/{id}
     */

    public function update(Request $request, int $id)
    {
        return $this->shipping->update($request, $id);
    }
}
