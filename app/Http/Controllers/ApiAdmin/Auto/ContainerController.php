<?php

namespace App\Http\Controllers\ApiAdmin\Auto;

use App\Contracts\ContractRepositories\Admin\ContainerContract;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContainerController extends Controller
{
    private $container ;

    public function __construct(ContainerContract $container)
    {
        $this->container = $container;
    }

    /**
     * @api {get} admin/get-container  Show all containers
     * @apiName Show all containers
     * @apiVersion 1.1.1
     * @apiGroup  Admin Container Action
     * @apiPermission Authorization
     * @apiHeader  Authorization token
     * @apiSampleRequest  admin/get-container
     */
    public function index()
    {
        return $this->container->index();
    }

    /**
     * @api {post} admin/store-container  Store container
     * @apiName Store Container
     * @apiVersion 1.1.1
     * @apiGroup Admin Container Action
     * @apiParam {String} container_number Container Number
     * @apiParam {String} booking_number Booking Number
     * @apiParam {String} shipping_line Shipping Line
     * @apiParam {String} point_of_loading Point of Loading
     * @apiParam {String} destination_port Destination Port
     * @apiParam {Date} loading_date Loading Date (2020-12-12)
     * @apiParam {Date} expected_sailing_date Expected Sailing Date (2020-12-12)
     * @apiParam {Date} expected_arrival_date Expected Arrival Date (2020-12-12)
     * @apiParam {String} vins Vin`s numbers (vin_number, vin_number) - delimiter by ','
     * @apiPermission Authorization
     * @apiHeader  Authorization token
     * @apiSampleRequest  admin/store-container
     */
    public function store(Request $request)
    {
        return $this->container->store($request);
    }

    /**
     * @api {get} admin/get-container/{id}  Show  container by id
     * @apiName Show container by id
     * @apiVersion 1.1.1
     * @apiGroup  Admin Container Action
     * @apiPermission Authorization
     * @apiHeader  Authorization token
     * @apiSampleRequest  admin/get-container/{id}
     */

    public function show(int $id)
    {
        return $this->container->show($id);
    }

    /**
     * @api {post} admin/delete-container  Multiple Delete container
     * @apiName  Multiple Delete container
     * @apiVersion 1.1.1
     * @apiGroup Admin Container Action
     * @apiParam {Array} container_id Array of Containers ID
     * @apiPermission Authorization
     * @apiHeader  Authorization token
     * @apiSampleRequest  admin/delete-container
     */

    public function delete(Request $request)
    {
        return $this->container->delete($request);
    }

    /**
     * @api {delete} admin/delete-container/{id}  Delete  container by id
     * @apiName Delete  container by id
     * @apiVersion 1.1.1
     * @apiGroup  Admin Container Action
     * @apiPermission Authorization
     * @apiHeader  Authorization token
     * @apiSampleRequest  admin/delete-container/{id}
     */

    public function destroy(int $id)
    {
        return $this->container->destroy($id);
    }

    /**
     * @api {post} admin/update-container/{id}  Update container
     * @apiName Update container
     * @apiVersion 1.1.1
     * @apiGroup Admin Container Action
     * @apiParam {String} container_number Container Number
     * @apiParam {String} booking_number Booking Number
     * @apiParam {String} shipping_line Shipping Line
     * @apiParam {String} point_of_loading Point of Loading
     * @apiParam {String} destination_port Destination Port
     * @apiParam {Date} loading_date Loading Date (2020-12-12)
     * @apiParam {Date} expected_sailing_date Expected Sailing Date (2020-12-12)
     * @apiParam {Date} expected_arrival_date Expected Arrival Date (2020-12-12)
     * @apiParam {String} vins Vin`s numbers (vin_number, vin_number) - delimiter by ','
     * @apiPermission Authorization
     * @apiHeader  Authorization token
     * @apiSampleRequest  admin/update-container/{id}
     */

    public function update(Request $request, int $id)
    {
        return $this->container->update($request, $id);
    }
}
