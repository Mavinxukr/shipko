<?php

namespace App\Http\Controllers\ApiClient\Part;

use App\Contracts\ContractRepositories\Client\PartContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\PartRequest;
use Illuminate\Http\Request;

class PartController extends Controller
{
    private $part;

    public function __construct(PartContract $part)
    {
        $this->part = $part;
    }

    /**
     * @api {post} client/store-part  Store Part
     * @apiName Store Part
     * @apiVersion 1.1.1
     * @apiGroup Client Part Action
     * @apiPermission Authorization
     * @apiParam {String} catalog_number Catalog number
     * @apiParam {String} name Name
     * @apiParam {String} auto Auto
     * @apiParam {String} vin Vin
     * @apiParam {Number} quality Quality
     * @apiParam {String} comment Comment
     * @apiParam {File} image Client images  exp  - image[0],image[1]
     * @apiHeader  Authorization token
     * @apiSampleRequest  client/store-part
     */

    public function store(Request $request)
    {
        return $this->part->store($request);
    }

    /**
     * @api {get} client/get-parts  Get Parts
     * @apiName Get Parts
     * @apiVersion 1.1.1
     * @apiGroup Client Part Action
     * @apiPermission Authorization
     * @apiHeader  Authorization token
     * @apiSampleRequest  client/get-parts
     */

    public function index()
    {
        return $this->part->index();
    }

    /**
     * @api {get} client/get-part/{id}  Get Part
     * @apiName Get Part
     * @apiVersion 1.1.1
     * @apiGroup Client Part Action
     * @apiPermission Authorization
     * @apiHeader  Authorization token
     * @apiSampleRequest  client/get-part/{id}
     */

    public function show(int $id)
    {
        return $this->part->show($id);
    }

    /**
     * @api {post} client/update-part/{id}  Update Part
     * @apiName Update Part
     * @apiVersion 1.1.1
     * @apiGroup Client Part Action
     * @apiPermission Authorization
     * @apiParam {String} catalog_number Catalog number
     * @apiParam {String} name Name
     * @apiParam {String} auto Auto
     * @apiParam {String} vin Vin
     * @apiParam {Number} quality Quality
     * @apiParam {String} comment Comment
     * @apiHeader  Authorization token
     * @apiSampleRequest  client/update-part/{id}
     */

    public function update(Request $request, int $id)
    {
        return $this->part->update($request, $id);
    }

    /**
     * @api {delete} client/delete-part/{id}  Delete Part
     * @apiName Delete Part
     * @apiVersion 1.1.1
     * @apiGroup Client Part Action
     * @apiPermission Authorization
     * @apiHeader  Authorization token
     * @apiSampleRequest  client/delete-part/{id}
     */

    public function destroy(int  $id)
    {
        return $this->part->destroy($id);
    }

    /**
     * @api {delete} client/delete-part-images/{id}  Remove Part Images
     * @apiName Remove Part Images
     * @apiVersion 1.1.1
     * @apiGroup Client Part Action
     * @apiDescription
     * Example:  Allow get params for delete images exp: ids=1,2,3,4...
     * @apiPermission Authorization
     * @apiHeader  Authorization token
     * @apiSampleRequest  client/delete-part-images/{id}
     */

    public function removeImage(Request $request, int $id)
    {
        $ids  = explode(',',$request->ids);
        return $this->part->removeImage($ids, $id);
    }

    /**
     * @api {post} client/restore-part-images/{id}  Restore Part Images
     * @apiName Restore Part Images
     * @apiVersion 1.1.1
     * @apiGroup Client Part Action
     * @apiPermission Authorization
     * @apiParam {File} image Client images  exp  - image[0],image[1]
     * @apiHeader  Authorization token
     * @apiSampleRequest  client/restore-part-images/{id}
     */

    public function restoreImage (Request $request, int  $id)
    {
        return $this->part->restoreImage($request, $id);
    }
}
