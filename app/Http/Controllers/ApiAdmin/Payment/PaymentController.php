<?php

namespace App\Http\Controllers\ApiAdmin\Payment;

use App\Contracts\ContractRepositories\Admin\PaymentContract;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    private $payment;

    public function __construct(PaymentContract $payment)
    {
        $this->payment = $payment;
    }

    /**
     * @api {get} admin/get-payments  Show All Payments
     * @apiName Show All Payments
     * @apiVersion 1.1.1
     * @apiGroup Admin Payments Action
     * @apiPermission Authorization
     * @apiHeader  Authorization token
     * @apiSampleRequest  admin/get-payments
     */

    public function index()
    {
        return $this->payment->index();
    }

    /**
     * @api {post} admin/store-payment  Store Payment
     * @apiName Store Payment
     * @apiVersion 1.1.1
     * @apiGroup Admin Payments Action
     * @apiPermission Authorization
     * @apiParam {String} name Name
     * @apiParam {String} applicable_type  Attach Type (client, group)
     * @apiParam {String} applicable_id Client or Group ID
     * @apiParam {Integer} due_day Days To Pay
     * @apiHeader  Authorization token
     * @apiSampleRequest  admin/store-payment
     */

    public function store(Request $request)
    {
        return $this->payment->store($request);
    }

    /**
     * @api {get} admin/get-payment/{id}  Show Payment By Id
     * @apiName Show Payment By Id
     * @apiVersion 1.1.1
     * @apiGroup Admin Payments Action
     * @apiPermission Authorization
     * @apiHeader  Authorization token
     * @apiSampleRequest  admin/get-payment/{id}
     */

    public function show(int $id)
    {
        return $this->payment->show($id);
    }

    /**
     * @api {post} admin/update-payment/{id}  Update Payment
     * @apiName Update Payment
     * @apiVersion 1.1.1
     * @apiGroup Admin Payments Action
     * @apiPermission Authorization
     * @apiParam {String} name Name
     * @apiParam {String} applicable_type  Attach Type (client, group)
     * @apiParam {String} applicable_id Client or Group ID
     * @apiParam {Integer} due_day Days To Pay
     * @apiHeader  Authorization token
     * @apiSampleRequest  admin/update-payment/{id}
     */

    public function update(Request $request, int $id)
    {
        return $this->payment->update($request, $id);
    }

    /**
     * @api {delete} admin/delete-payment/{id}  Delete Payment
     * @apiName  Delete Payment
     * @apiVersion 1.1.1
     * @apiGroup Admin Payments Action
     * @apiPermission Authorization
     * @apiHeader  Authorization token
     * @apiSampleRequest  admin/delete-payment/{id}
     */

    public function destroy(int $id)
    {
        return $this->payment->destroy($id);
    }
}
