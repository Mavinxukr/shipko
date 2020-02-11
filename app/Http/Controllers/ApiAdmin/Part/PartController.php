<?php

namespace App\Http\Controllers\ApiAdmin\Part;

use App\Contracts\ContractRepositories\Admin\PartContract;
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
     * @api {post} admin/store-part  Store Part
     * @apiName Store Part
     * @apiVersion 1.1.1
     * @apiGroup Admin Part Action
     * @apiPermission Authorization
     * @apiParam {String} client_id Client Id
     * @apiParam {String} catalog_number Catalog number
     * @apiParam {String} name Name
     * @apiParam {String} make Make
     * @apiParam {String} vin Vin
     * @apiParam {Number} quality Quality
     * @apiParam {String} container Container
     * @apiParam {File} image Client images  exp  - image[0],image[1]
     * @apiHeader  Authorization token
     * @apiSampleRequest  admin/store-part
     */

    public function store(PartRequest $request)
    {
        return $this->part->store($request);
    }

    /**
     * @api {get} admin/get-parts  Get Parts
     * @apiName Get Parts
     * @apiVersion 1.1.1
     * @apiGroup Admin Part Action
     * @apiPermission Authorization
     * @apiHeader  Authorization token
     * @apiSampleRequest  admin/get-parts
     */

    public function index()
    {
        return $this->part->index();
    }

    /**
     * @api {get} admin/get-part/{id}  Get Part
     * @apiName Get Part
     * @apiVersion 1.1.1
     * @apiGroup Admin Part Action
     * @apiPermission Authorization
     * @apiHeader  Authorization token
     * @apiSampleRequest  admin/get-part/{id}
     */

    public function show(int $id)
    {
        return $this->part->show($id);
    }

    /**
     * @api {post} admin/update-part/{id}  Update Part
     * @apiName Update Part
     * @apiVersion 1.1.1
     * @apiGroup Admin Part Action
     * @apiPermission Authorization
     * @apiParam {String} client_id Client Id
     * @apiParam {String} catalog_number Catalog number
     * @apiParam {String} name Name
     * @apiParam {String} make Make
     * @apiParam {String} vin Vin
     * @apiParam {Number} quality Quality
     * @apiParam {String} container Container
     * @apiHeader  Authorization token
     * @apiSampleRequest  admin/update-part/{id}
     */

    public function update(Request $request, int $id)
    {
        return $this->part->update($request, $id);
    }

    /**
     * @api {delete} admin/delete-part/{id}  Delete Part
     * @apiName Delete Part
     * @apiVersion 1.1.1
     * @apiGroup Admin Part Action
     * @apiPermission Authorization
     * @apiHeader  Authorization token
     * @apiSampleRequest  admin/delete-part/{id}
     */

    public function destroy(int  $id)
    {
        return $this->part->destroy($id);
    }

    /**
     * @api {delete} admin/delete-part-images/{id}  Remove Part Images
     * @apiName Remove Part Images
     * @apiVersion 1.1.1
     * @apiGroup Admin Part Action
     * @apiDescription
     * Example:  Allow get params for delete images exp: ids=1,2,3,4...
     * @apiPermission Authorization
     * @apiHeader  Authorization token
     * @apiSampleRequest  admin/delete-part-images/{id}
     */

    public function removeImage(Request $request, int $id)
    {
        $ids  = explode(',',$request->ids);
        return $this->part->removeImage($ids, $id);
    }

    /**
     * @api {post} admin/restore-part-images/{id}  Restore Part Images
     * @apiName Restore Part Images
     * @apiVersion 1.1.1
     * @apiGroup Admin Part Action
     * @apiPermission Authorization
     * @apiParam {File} image Client images  exp  - image[0],image[1]
     * @apiHeader  Authorization token
     * @apiSampleRequest  admin/restore-part-images/{id}
     */

    public function restoreImage (Request $request, int  $id)
    {
        return $this->part->restoreImage($request, $id);
    }
}
