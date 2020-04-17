<?php

namespace App\Http\Controllers\ApiAdmin\Document;

use App\Http\Controllers\Controller;
use App\Models\Auto\Document;
use App\Models\Invoice\InvoiceDocument;
use App\Traits\FormattedJsonResponse;

;

class DocumentController extends Controller
{
    use FormattedJsonResponse;
    /**
     * @api {get} admin/download  Download document
     * @apiName Download document
     * @apiVersion 1.1.1
     * @apiGroup Admin Download document
     * @apiPermission Authorization
     * @apiHeader  Authorization token
     * @apiSampleRequest  admin/download
     */

    public function index()
    {
        $data = \request()->all();
        if($data['type'] == 'invoice'){
            $document = InvoiceDocument::whereId($data['id'])->first();
        }else{
            $document = Document::whereId($data['id'])->first();
        }

        if($document){
            return response()->download('storage/' . $document->path_to_folder, $document->name);
        }else{
            return $this->toJson("File not found", 404, null);
        }
    }
}
