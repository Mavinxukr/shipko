<?php

namespace App\Http\Controllers\ApiAdmin\Price;

use App\Contracts\ContractRepositories\Admin\PriceContract;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    private $price;

    public function __construct(PriceContract $price)
    {
        $this->price = $price;
    }

    /**
     * @api {get} admin/get-prices  Show All Prices
     * @apiName Show All Prices
     * @apiVersion 1.1.1
     * @apiGroup Admin Prices Action
     * @apiPermission Authorization
     * @apiHeader  Authorization token
     * @apiSampleRequest  admin/get-prices
     */

    public function index()
    {
        return $this->price->index();
    }

    /**
     * @api {post} admin/store-price  Store Price
     * @apiName Store Price
     * @apiVersion 1.1.1
     * @apiGroup Admin Prices Action
     * @apiPermission Authorization
     * @apiParam {String} name Name
     * @apiParam {String} priceable_type  Attach Type (client, group)
     * @apiParam {String} priceable_id Client or Group ID
     * @apiParam {Integer} country_id Country ID
     * @apiParam {String} cities Cities ID
     * @apiHeader  Authorization token
     * @apiSampleRequest  admin/store-price
     */

    public function store(Request $request)
    {
        return $this->price->store($request);
    }

    /**
     * @api {get} admin/get-price/{id}  Show Price By Id
     * @apiName Show Price By Id
     * @apiVersion 1.1.1
     * @apiGroup Admin Prices Action
     * @apiPermission Authorization
     * @apiHeader  Authorization token
     * @apiSampleRequest  admin/get-price/{id}
     */

    public function show(int $id)
    {
        return $this->price->show($id);
    }

    /**
     * @api {post} admin/update-price/{id}  Update Price
     * @apiName Update Price
     * @apiVersion 1.1.1
     * @apiGroup Admin Prices Action
     * @apiPermission Authorization
     * @apiParam {String} name Name
     * @apiParam {String} priceable_type  Attach Type (client, group)
     * @apiParam {String} priceable_id Client or Group ID
     * * @apiParam {Integer} country_id Country ID
     * @apiParam {String} cities Cities ID
     * @apiHeader  Authorization token
     * @apiSampleRequest  admin/update-price/{id}
     */

    public function update(Request $request, int $id)
    {
        return $this->price->update($request, $id);
    }

    /**
     * @api {delete} admin/delete-price/{id}  Delete Price
     * @apiName  Delete Price
     * @apiVersion 1.1.1
     * @apiGroup Admin Prices Action
     * @apiPermission Authorization
     * @apiHeader  Authorization token
     * @apiSampleRequest  admin/delete-price/{id}
     */

    public function destroy(int $id)
    {
        return $this->price->destroy($id);
    }
}
