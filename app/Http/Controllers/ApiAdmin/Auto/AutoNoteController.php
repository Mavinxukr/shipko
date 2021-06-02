<?php

namespace App\Http\Controllers\ApiAdmin\Auto;

use App\Contracts\ContractRepositories\Admin\AutoNoteContract;
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
     * @api {post} admin/store-note  Store note
     * @apiName Store note
     * @apiParam {Number} auto_id Auto id
     * @apiParam {String} comment Comment
     * @apiVersion 1.1.1
     * @apiGroup Admin Auto Action
     * @apiPermission Authorization
     * @apiHeader  Authorization token
     * @apiSampleRequest  admin/store-note
     */

    public function store(Request $request)
    {
        return $this->note->store($request);
    }
}
