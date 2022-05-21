<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequest;
use App\Http\Services\FormService;


class FormController extends Controller
{
    public function index()
    {
       return FormService::displayForm();
    }

    public function store(FormRequest $request)
    {
       return FormService::createForm($request->all());
    }

    public function show($id)
    {
        return FormService::showForm($id);
    }

    public function update(FormRequest $request, $id)
    {
        return FormService::updateForm($request->all(), $id);
    }

    public function destroy($id)
    {
        return FormService::deleteForm($id);
    }
}
