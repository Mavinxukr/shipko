<?php

namespace App\Http\Controllers\ApiAdmin\Invoice;

use App\Contracts\ContractRepositories\Admin\InvoiceContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\InvoiceRequest;
use App\Models\Invoice\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{

    private  $invoice;

    public function __construct(InvoiceContract $invoice)
    {
        $this->invoice = $invoice;
    }
    /**
     * @api {get} admin/get-invoices  Show All Invoices
     * @apiName Show All Invoices
     * @apiVersion 1.1.1
     * @apiGroup Admin Invoice Action
     * @apiPermission Authorization
     * @apiHeader  Authorization token
     * @apiSampleRequest  admin/get-invoices
     */

    public function index()
    {
        return $this->invoice->index();
    }


    /**
     * @api {get} admin/get-invoice/{id}  Show  Invoice by id
     * @apiName Show  Invoice by id
     * @apiVersion 1.1.1
     * @apiGroup Admin Invoice Action
     * @apiPermission Authorization
     * @apiHeader  Authorization token
     * @apiSampleRequest  admin/get-invoice/{id}
     */

    public function show(int $id)
    {
        return $this->invoice->show($id);
    }

    /**
     * @api {post} admin/store-invoice  Store invoice
     * @apiName Store invoice
     * @apiParam {String} name_car Name car
     * @apiParam {Number} auto_id Auto id
     * @apiParam {String} status Status
     * @apiParam {Number} total_price Total price
     * @apiParam {Number} paid_price Paid price
     * @apiParam {Number} outstanding_price Outstanding price
     * @apiParam {Array} type Document type Exp : (auction_picture, warehouse_picture,container_picture <br>
     *                          car_fax_report , invoice, checklist_report , shipping_damage
     * @apiParam {Array} file Document Exp : document[0][file],document[0][type]
     * @apiVersion 1.1.1
     * @apiGroup Admin Invoice Action
     * @apiPermission Authorization
     * @apiHeader  Authorization token
     * @apiSampleRequest  admin/store-invoice
     */

    public function store(InvoiceRequest $request)
    {
        return $this->invoice->store($request);
    }


    /**
     * @api {post} admin/update-invoice/{id}  Update invoice
     * @apiName Update invoice
     * @apiParam {String} name_car Name car
     * @apiParam {Number} auto_id Auto id
     * @apiParam {String} status Status
     * @apiParam {Double} total_price Total price
     * @apiParam {Double} paid_price Paid price
     * @apiParam {Double} outstanding_price Outstanding price
     * @apiVersion 1.1.1
     * @apiGroup Admin Invoice Action
     * @apiPermission Authorization
     * @apiHeader  Authorization token
     * @apiSampleRequest  admin/update-invoice/{id}
     */

    public function update(Request $request, int  $id)
    {
        return $this->invoice->update($request, $id);
    }

    /**
     * @api {delete} admin/delete-invoice/{id}  Delete  invoice by id
     * @apiName Delete  invoice by id
     * @apiVersion 1.1.1
     * @apiGroup  Admin Invoice Action
     * @apiPermission Authorization
     * @apiHeader  Authorization token
     * @apiSampleRequest  admin/delete-invoice/{id}
     */

    public function delete(int $id)
    {
        return $this->invoice->destroy($id);
    }

    /**
     * @api {post} admin/restore-invoice-document/{id}  Restore document  invoice by id
     * @apiName  Restore document  invoice by id
     * @apiVersion 1.1.1
     * @apiGroup  Admin Invoice Action
     * @apiParam {Array} document Document
     * @apiPermission Authorization
     * @apiHeader  Authorization token
     * @apiSampleRequest  admin/invoice-auto-document/{id}
     */


    public function restoreDocument(Request $request, int $id)
    {
        return $this->invoice->restoreImage($request, $id);
    }

    /**
     * @api {post} admin/delete-invoice-image/{id}  Delete document  invoice by id
     * @apiName  Delete document  invoice by id
     * @apiVersion 1.1.1
     * @apiGroup  Admin Invoice Action
     * @apiParam {String} ids Delete ids
     * @apiPermission Authorization
     * @apiHeader  Authorization token
     * @apiSampleRequest  admin/delete-invoice-image/{id}
     */


    public function deleteDocument(Request $request, int $id)
    {
        return $this->invoice->deleteImage($request, $id);
    }
}
