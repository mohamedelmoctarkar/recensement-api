<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegionRequest;
use App\Http\Services\RegionService;


class RegionController extends Controller
{
    public function index()
    {
       return RegionService::displayRegion();
    }

    public function store(RegionRequest $request)
    {
       return RegionService::createRegion($request->all());
    }

    public function show($id)
    {
        return RegionService::showRegion($id);
    }

    public function update(RegionRequest $request, $id)
    {
        return RegionService::updateRegion($request->all(), $id);
    }

    public function destroy($id)
    {
        return RegionService::deleteRegion($id);
    }
}
