<?php

namespace App\Http\Controllers;

use App\Http\Requests\Sous_groupeRequest;
use App\Http\Services\Sous_groupeService;


class Sous_groupeController extends Controller
{
    public function index()
    {
       return Sous_groupeService::displaySous_groupe();
    }

    public function store(Sous_groupeRequest $request)
    {
       return Sous_groupeService::createSous_groupe($request->all());
    }

    public function show($id)
    {
        return Sous_groupeService::showSous_groupe($id);
    }

    public function update(Sous_groupeRequest $request, $id)
    {
        return Sous_groupeService::updateSous_groupe($request->all(), $id);
    }

    public function destroy($id)
    {
        return Sous_groupeService::deleteSous_groupe($id);
    }
}
