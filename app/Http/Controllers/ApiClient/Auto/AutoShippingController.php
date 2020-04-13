<?php

namespace App\Http\Controllers\ApiClient\Auto;

use App\Contracts\ContractRepositories\Client\AutoShippingContract;
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
     * @api {get} client/get-autos-shipping  Show all autos shipping
     * @apiName Show all autos shipping
     * @apiVersion 1.1.1
     * @apiGroup  Client Auto
     * @apiDescription (countpage - for set Item PerPage, order_type - (asc, desc),
     * order_by - column name for sort, port - for filter by port
     * search - for search by (vin_code))
     * @apiPermission Authorization
     * @apiHeader  Authorization token
     * @apiSampleRequest  client/get-autos-shipping
     */
    public function index(Request $request)
    {
        return $this->shipping->index($request);
    }
}
