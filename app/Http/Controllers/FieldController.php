<?php

namespace App\Http\Controllers;

use App\Http\Requests\FieldRequest;
use App\Http\Services\FieldService;


class FieldController extends Controller
{
    public function index()
    {
       return FieldService::displayField();
    }

    public function store(FieldRequest $request)
    {
       return FieldService::createField($request->all());
    }

    public function show($id)
    {
        return FieldService::showField($id);
    }

    public function update(FieldRequest $request, $id)
    {
        return FieldService::updateField($request->all(), $id);
    }

    public function destroy($id)
    {
        return FieldService::deleteField($id);
    }
}
