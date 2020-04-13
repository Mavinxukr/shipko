<?php

namespace App\Http\Controllers\ApiAdmin\Auto;

use App\Contracts\ContractRepositories\Admin\AutoContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\AutoRequest;
use Illuminate\Http\Request;

class AutoController extends Controller
{
    private $auto ;

    public function __construct(AutoContract $auto)
    {
        $this->auto = $auto;
    }

    /**
     * @api {get} admin/get-autos-by-container  Show all autos by container
     * @apiName Show all autos by container
     * @apiVersion 1.1.1
     * @apiGroup  Admin Auto Action
     * @apiParam tracking_id Tracking or Container ID
     * @apiPermission Authorization
     * @apiHeader  Authorization token
     * @apiSampleRequest  admin/get-autos-by-container
     */
    public function autoByContainer(Request $request)
    {
        return $this->auto->autoByContainer($request);
    }

    /**
     * @api {get} admin/get-autos  Show all autos
     * @apiName Show all autos
     * @apiVersion 1.1.1
     * @apiGroup  Admin Auto Action
     * @apiDescription (client_id - for all autos byclient, countpage - for set Item PerPage,
     * order_type - (asc, desc), order_by - column name for sort,
     * search - for search by (vin_code))
     * @apiPermission Authorization
     * @apiHeader  Authorization token
     * @apiSampleRequest  admin/get-autos
     */
    public function index()
    {
        return $this->auto->index();
    }

    /**
     * @api {post} admin/store-auto  Store Auto
     * @apiName Store Auto
     * @apiVersion 1.1.1
     * @apiGroup Admin Auto Action
     * @apiPermission Authorization
     * @apiParam {String} model_name Model name
     * @apiParam {Number} client_id Client id
     * @apiParam {String} status Status (new, not_approved, pending, delivered)
     * @apiParam {Number} ship Ship block has or has not
     * @apiParam {String} tracking_id Tracking id
     * @apiParam {String} container_id Container id
     * @apiParam {String} point_load_city Point load city
     * @apiParam {String} point_load_date Point load date
     * @apiParam {String} point_delivery_city Point delivery city
     * @apiParam {String} point_delivery_date Point delivery date
     * @apiParam {Number} disassembly Disassembly Exp - 1 true, 0 - false
     * @apiParam {Number} lot Lot block has or has not
     * @apiParam {String} lot_number Lot Number
     * @apiParam {String} doc_type Document type
     * @apiParam {String} odometer Odometer
     * @apiParam {String} highlight Highlight
     * @apiParam {String} pri_damage Primary damage
     * @apiParam {String} sec_damage Secondary damage
     * @apiParam {String} ret_value Retail value
     * @apiParam {String} vin_code Vin code
     * @apiParam {Number} sale Sale block has or has not
     * @apiParam {String} location Location
     * @apiParam {String} grid_item Grid item
     * @apiParam {String} sale_name Saller name
     * @apiParam {String} ret_date Retail date
     * @apiParam {Number} feature Feature block has or has not
     * @apiParam {String} body_style Body style
     * @apiParam {String} color Color
     * @apiParam {String} eng_type Engine type
     * @apiParam {String} cylinder Cylinder
     * @apiParam {String} trans Transmission
     * @apiParam {String} drive Drive
     * @apiParam {String} fuel Fuel
     * @apiParam {String} key Key
     * @apiParam {String} note Note
     * @apiParam {Number} document Document block has or has not
     * @apiParam {Array} type Document type Exp : (auction_picture, warehouse_picture,container_picture <br>
     *                          car_fax_report , invoice, checklist_report , shipping_damage
     * @apiParam {Array} file Document Exp : document[0][file],document[0][type]
     * @apiHeader  Authorization token
     * @apiSampleRequest  admin/store-auto
     */
    public function store(AutoRequest $request)
    {
        return $this->auto->store($request);
    }

    /**
     * @api {get} admin/get-auto/{id}  Show  auto by id
     * @apiName Show  auto by id
     * @apiVersion 1.1.1
     * @apiGroup  Admin Auto Action
     * @apiPermission Authorization
     * @apiHeader  Authorization token
     * @apiSampleRequest  admin/get-auto/{id}
     */

    public function show(int $id)
    {
     return $this->auto->show($id);
    }

    /**
     * @api {post} admin/delete-auto  Multiple Delete Auto
     * @apiName  Multiple Delete Auto
     * @apiVersion 1.1.1
     * @apiGroup Admin Auto Action
     * @apiParam {Array} auto_id Array of Autos ID
     * @apiPermission Authorization
     * @apiHeader  Authorization token
     * @apiSampleRequest  admin/delete-auto
     */

    public function delete(Request $request)
    {
        return $this->auto->delete($request);
    }

    /**
     * @api {delete} admin/delete-auto/{id}  Delete  auto by id
     * @apiName Delete  auto by id
     * @apiVersion 1.1.1
     * @apiGroup  Admin Auto Action
     * @apiPermission Authorization
     * @apiHeader  Authorization token
     * @apiSampleRequest  admin/delete-auto/{id}
     */

    public function destroy(int $id)
    {
        return $this->auto->destroy($id);
    }


    /**
     * @api {post} admin/restore-auto-document/{id}  Restore document  auto by id
     * @apiName  Restore document  auto by id
     * @apiVersion 1.1.1
     * @apiGroup  Admin Auto Action
     * @apiParam {Array} document Document
     * @apiPermission Authorization
     * @apiHeader  Authorization token
     * @apiSampleRequest  admin/restore-auto-document/{id}
     */


    public function restoreDocument(Request $request, int $id)
    {
        return $this->auto->restoreImage($request, $id);
    }

    /**
     * @api {post} admin/delete-auto-document/{id}  Delete document  auto by id
     * @apiName  Delete document  auto by id
     * @apiVersion 1.1.1
     * @apiGroup  Admin Auto Action
     * @apiParam {String} ids Delete ids
     * @apiPermission Authorization
     * @apiHeader  Authorization token
     * @apiSampleRequest  admin/delete-auto-document/{id}
     */


    public function deleteDocument(Request $request, int $id)
    {
        return $this->auto->deleteImage($request, $id);
    }


    /**
     * @api {post} admin/update-auto/{id}  Update Auto
     * @apiName Update Auto
     * @apiVersion 1.1.1
     * @apiGroup Admin Auto Action
     * @apiPermission Authorization
     * @apiParam {String} model_name Model name
     * @apiParam {Number} client_id Client id
     * @apiParam {String} status Status (new, not_approved, pending, delivered)
     * @apiParam {Number} ship Ship block has or has not
     * @apiParam {String} tracking_id Tracking id
     * @apiParam {String} container_id Container id
     * @apiParam {String} point_load_city Point load city
     * @apiParam {String} point_load_date Point load date
     * @apiParam {String} point_delivery_city Point delivery city
     * @apiParam {String} point_delivery_date Point delivery date
     * @apiParam {Number} disassembly Disassembly Exp - 1 true, 0 - false
     * @apiParam {Number} lot Lot block has or has not
     * @apiParam {String} lot_number Lot Number
     * @apiParam {String} doc_type Document type
     * @apiParam {String} odometer Odometer
     * @apiParam {String} highlight Highlight
     * @apiParam {String} pri_damage Primary damage
     * @apiParam {String} sec_damage Secondary damage
     * @apiParam {String} ret_value Retail value
     * @apiParam {String} vin_code Vin code
     * @apiParam {Number} sale Sale block has or has not
     * @apiParam {String} location Location
     * @apiParam {String} grid_item Grid item
     * @apiParam {String} sale_name Saller name
     * @apiParam {String} ret_date Secondary damage
     * @apiParam {Number} feature Feature block has or has not
     * @apiParam {String} body_style Body style
     * @apiParam {String} color Color
     * @apiParam {String} eng_type Engine type
     * @apiParam {String} cylinder Cylinder
     * @apiParam {String} trans Transmission
     * @apiParam {String} drive Drive
     * @apiParam {String} fuel Fuel
     * @apiParam {String} key Key
     * @apiParam {String} note Note
     * @apiHeader  Authorization token
     * @apiSampleRequest  admin/update-auto/{id}
     */

    public function update(Request $request, int $id)
    {
     return $this->auto->update($request, $id);
    }
}
