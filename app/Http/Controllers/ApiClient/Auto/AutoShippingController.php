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
     * @apiPermission Authorization
     * @apiHeader  Authorization token
     * @apiSampleRequest  client/get-autos-shipping
     */
    public function index(Request $request)
    {
        return $this->shipping->index($request);
    }
}
