<?php

namespace App\Http\Controllers\ApiAdmin\Parser;

use App\Contracts\ContractRepositories\Admin\ParserContract;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ParserController extends Controller
{
    private $parser;

    public function __construct(ParserContract $parser)
    {
        $this->parser = $parser;
    }

    /**
     * @api {post} admin/parser/{table}  Get Excel document
     * @apiName Get Excel document
     * @apiVersion 1.1.1
     * @apiGroup Excel
     * @apiDescription Allowed Tables
     * (client, base_clients, groups, parts, autos, invoices, shippings)
     * @apiParam {Number} client_id Client ID for Client
     * @apiParam {String} fields Fields for pars Exm: id,status,name,...
     * @apiPermission Authorization
     * @apiHeader  Authorization token
     * @apiSampleRequest  admin/parser/{table}
     */

    public function index(Request $request, $table)
    {
        return $this->parser->index($request, $table);
    }
}
