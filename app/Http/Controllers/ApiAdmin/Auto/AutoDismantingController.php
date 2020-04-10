<?php

namespace App\Http\Controllers\ApiAdmin\Auto;

use App\Contracts\ContractRepositories\Admin\AutoDismantingContract;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AutoDismantingController extends Controller
{
    private $dismanting ;

    public function __construct(AutoDismantingContract $dismanting)
    {
        $this->dismanting = $dismanting;
    }

    /**
     * @api {get} admin/get-autos-dismanting  Show all autos dismanting
     * @apiName Show all autos dismanting
     * @apiVersion 1.1.1
     * @apiGroup  Admin Auto Dismanting
     * @apiDescription (countpage - for set Item PerPage, order_type - (asc, desc),
     * order_by - column name for sort, port - for filter by port
     * search - for search by (vin_code))
     * @apiPermission Authorization
     * @apiHeader  Authorization token
     * @apiSampleRequest  admin/get-autos-dismanting
     */
    public function index()
    {
        return $this->dismanting->index();
    }

    /**
     * @api {get} admin/get-auto-dismanting/{id}  Show  auto dismanting by Auto ID
     * @apiName Show auto dismanting by Auto ID
     * @apiVersion 1.1.1
     * @apiGroup  Admin Auto Dismanting
     * @apiPermission Authorization
     * @apiHeader  Authorization token
     * @apiSampleRequest  admin/get-auto-dismanting/{id}
     */

    public function show(int $id)
    {
        return $this->dismanting->show($id);
    }

    /**
     * @api {post} admin/update-auto-dismanting/{id}  Update auto dismanting by Auto ID
     * @apiName Update auto dismanting by Auto ID
     * @apiVersion 1.1.1
     * @apiGroup Admin Auto Dismanting
     * @apiPermission Authorization
     * @apiParam {Number} disassembly Disassembly Exp - 1 true, 0 - false
     * @apiHeader  Authorization token
     * @apiSampleRequest  admin/update-auto-dismanting/{id}
     */

    public function update(Request $request, int $id)
    {
        return $this->dismanting->update($request, $id);
    }
}
