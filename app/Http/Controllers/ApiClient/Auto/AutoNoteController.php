<?php

namespace App\Http\Controllers\ApiClient\Auto;

use App\Contracts\ContractRepositories\Client\AutoNoteContract;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AutoNoteController extends Controller
{
    private $note;

    public function __construct(AutoNoteContract $note)
    {
        $this->note = $note;
    }

    /**
     * @api {post} client/store-note  Store note
     * @apiName Store note
     * @apiParam {Number} auto_id Auto id
     * @apiParam {String} comment Comment
     * @apiVersion 1.1.1
     * @apiGroup Client Auto
     * @apiPermission Authorization
     * @apiHeader  Authorization token
     * @apiSampleRequest  client/store-note
     */

    public function store(Request $request)
    {
        return $this->note->store($request);
    }
}
