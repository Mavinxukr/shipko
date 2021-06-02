<?php

namespace App\Http\Controllers\ApiClient\Overview;

use App\Contracts\ContractRepositories\Client\OverviewContract;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OverviewController extends Controller
{
    private $overview;

    public function __construct(OverviewContract $overview)
    {
        $this->overview = $overview;
    }


    /**
     * @api {get} client/overview  Client Overview Page
     * @apiName Client Overview Page
     * @apiVersion 1.1.1
     * @apiGroup Client Overview
     * @apiPermission Authorization
     * @apiHeader  Authorization token
     * @apiSampleRequest  client/overview
     */
    public function index(Request $request)
    {
        return $this->overview->index($request);
    }
}
