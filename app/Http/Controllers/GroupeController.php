<?php

namespace App\Http\Controllers;

use App\Http\Requests\GroupeRequest;
use App\Http\Services\GroupeService;


class GroupeController extends Controller
{
    public function index()
    {
       return GroupeService::displayGroupe();
    }

    public function store(GroupeRequest $request)
    {
       return GroupeService::createGroupe($request->all());
    }

    public function show($id)
    {
        return GroupeService::showGroupe($id);
    }

    public function update(GroupeRequest $request, $id)
    {
        return GroupeService::updateGroupe($request->all(), $id);
    }

    public function destroy($id)
    {
        return GroupeService::deleteGroupe($id);
    }
}
