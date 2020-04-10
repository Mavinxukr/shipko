<?php

namespace App\Http\Controllers\ApiClient\Auto;

use App\Contracts\ContractRepositories\Client\AutoDismantingContract;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AutoDismantingController extends Controller
{
    private $dismanting ;

    public function __construct(AutoDismantingContract $dismanting)
    {
        $this->dismanting = $dismanting;
    }

    /**
     * @api {get} client/get-autos-dismanting  Show all autos dismanting
     * @apiName Show all autos dismanting
     * @apiVersion 1.1.1
     * @apiGroup  Client Auto
     * @apiDescription (countpage - for set Item PerPage, order_type - (asc, desc),
     * order_by - column name for sort, port - for filter by port
     * search - for search by (vin_code))
     * @apiPermission Authorization
     * @apiHeader  Authorization token
     * @apiSampleRequest  client/get-autos-dismanting
     */
    public function index(Request $request)
    {
        return $this->dismanting->index($request);
    }
}
