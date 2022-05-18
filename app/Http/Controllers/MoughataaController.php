<?php

namespace App\Http\Controllers;

use App\Http\Requests\MoughataaRequest;
use App\Http\Services\MoughataaService;


class MoughataaController extends Controller
{
    public function index()
    {
       return MoughataaService::displayMoughataa();
    }

    public function store(MoughataaRequest $request)
    {
       return MoughataaService::createMoughataa($request->all());
    }

    public function show($id)
    {
        return MoughataaService::showMoughataa($id);
    }

    public function update(MoughataaRequest $request, $id)
    {
        return MoughataaService::updateMoughataa($request->all(), $id);
    }

    public function destroy($id)
    {
        return MoughataaService::deleteMoughataa($id);
    }
}
