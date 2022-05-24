<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeclarationRequest;
use App\Http\Services\DeclarationService;
use Illuminate\Http\Request;

class DeclarationController extends Controller
{
    public function index(Request $request)
    {
       return DeclarationService::displayDeclaration($request->id);
    }

    public function store(DeclarationRequest $request)
    {
       return DeclarationService::createDeclaration($request->all());
    }

    public function show($id)
    {
        return DeclarationService::showDeclaration($id);
    }

    public function update(DeclarationRequest $request, $id)
    {
        return DeclarationService::updateDeclaration($request->all(), $id);
    }

    public function destroy($id)
    {
        return DeclarationService::deleteDeclaration($id);
    }
}
