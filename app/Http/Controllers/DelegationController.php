<?php

namespace App\Http\Controllers;

use App\Http\Requests\DelegationRequest;
use App\Http\Services\DelegationService;


class DelegationController extends Controller
{
    public function index()
    {
       return DelegationService::displayDelegation();
    }

    public function store(DelegationRequest $request)
    {
       return DelegationService::createDelegation($request->all());
    }

    public function show($id)
    {
        return DelegationService::showDelegation($id);
    }

    public function update(DelegationRequest $request, $id)
    {
        return DelegationService::updateDelegation($request->all(), $id);
    }

    public function destroy($id)
    {
        return DelegationService::deleteDelegation($id);
    }
}
