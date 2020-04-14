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
     * @api {post} admin/parser  Get Excel document
     * @apiName Get Excel document
     * @apiVersion 1.1.1
     * @apiGroup Excel
     * @apiParam {String} model Model (auto, client)
     * @apiParam {String} fields Fields for pars Exm: id,status,name,...
     * @apiPermission Authorization
     * @apiHeader  Authorization token
     * @apiSampleRequest  admin/parser
     */

    public function index(Request $request)
    {
        return $this->parser->index($request);
    }
}
