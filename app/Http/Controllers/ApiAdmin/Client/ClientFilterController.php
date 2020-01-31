<?php

namespace App\Http\Controllers\ApiAdmin\Client;

use App\Contracts\Admin\ClientFilterInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientFilterController extends Controller
{
    private $filter;

    public function __construct(ClientFilterInterface $filter)
    {
        $this->filter = $filter;
    }


    /**
     * @api {get} admin/get-clients-by-filters  Show All Clients By Filters
     * @apiNameStore Show All Clients By Filters
     * @apiVersion 1.1.1
     * @apiGroup Admin Client Filter
     * @apiParam {Number} id Id
     * @apiParam {String} name Name
     * @apiParam {String} email Email
     * @apiParam {String} phone Phone
     * @apiParam {String} address Address
     * @apiParam {String} card Credit card
     * @apiPermission Authorization
     * @apiHeader  Authorization token
     * @apiSampleRequest  admin/get-clients-by-filters
     */

    public function filter(Request $request)
    {
        return $this->filter->generateResponse($request);
    }
}
