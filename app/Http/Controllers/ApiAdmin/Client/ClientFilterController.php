<?php

namespace App\Http\Controllers\ApiAdmin\Client;

use App\Contracts\ContratRepositories\Admin\ClientFilterContract;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientFilterController extends Controller
{
    private $filter;

    public function __construct(ClientFilterContract $filter)
    {
        $this->filter = $filter;
    }


    /**
     * @api {get} admin/get-clients-by-filters  Show All Clients By Filters
     * @apiName Show All Clients By Filters
     * @apiVersion 1.1.1
     * @apiGroup Admin Client Filter
     * @apiDescription This is the Description.
     * Allow get params for filters exp: id, name, email, phone, address, card_number
     * @apiPermission Authorization
     * @apiHeader  Authorization token
     * @apiSampleRequest  admin/get-clients-by-filters
     */

    public function filter()
    {
        return $this->filter->generateResponse();
    }
}
