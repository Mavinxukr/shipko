<?php


namespace App\Contracts\vendor;


use Illuminate\Http\Request;

interface TemplateContract
{
    public function index()  ;
    public function show(int $id)  ;
    public function store(Request $request)  ;
    public function update(Request $request, int $id)  ;
    public function destroy(int $id) ;

}
