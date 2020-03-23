<?php


namespace App\Contracts\ContractRepositories\Admin;

use App\Contracts\vendor\TemplateContract;
use Illuminate\Http\Request;


interface AutoContract extends TemplateContract
{
    public function delete(Request $request);
    public function autoByContainer(Request $request);
    public function restoreImage(Request $request, int  $id);
    public function deleteImage(Request $request, int  $id);
}
