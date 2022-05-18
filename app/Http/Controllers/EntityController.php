<?php

namespace App\Http\Controllers;

use App\Http\Requests\EntityRequest;
use App\Http\Services\EntityService;


class EntityController extends Controller
{
    public function index()
    {
       return EntityService::displayEntity();
    }

    public function store(EntityRequest $request)
    {
       return EntityService::createEntity($request->all());
    }

    public function show($id)
    {
        return EntityService::showEntity($id);
    }

    public function update(EntityRequest $request, $id)
    {
        return EntityService::updateEntity($request->all(), $id);
    }

    public function destroy($id)
    {
        return EntityService::deleteEntity($id);
    }
}
