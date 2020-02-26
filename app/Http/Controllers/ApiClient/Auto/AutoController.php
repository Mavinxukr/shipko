<?php

namespace App\Http\Controllers\ApiClient\Auto;

use App\Contracts\ContractRepositories\Client\AutoContract;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AutoController extends Controller
{
    private $auto ;

    public function __construct(AutoContract $auto)
    {
        $this->auto = $auto;
    }

    /**
     * @api {get} client/get-autos  Show all autos
     * @apiName Show all autos
     * @apiVersion 1.1.1
     * @apiGroup  Client Auto Action
     * @apiPermission Authorization
     * @apiHeader  Authorization token
     * @apiSampleRequest  client/get-autos
     */
    public function index(Request $request)
    {
        return $this->auto->index($request);
    }
}
