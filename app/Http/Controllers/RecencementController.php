<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\Entity;
use App\Models\Declaration;
use Illuminate\Http\Request;

class RecencementController extends Controller
{
    public function getDeclaration($id)
    {
        $declaration = Declaration::Where('entity_id', $id)->with(['form', 'entity', 'region', 'user'])->get();
        if ($declaration) {
            $response = [
                'message' => 'la  Declaration a été recupées avec succès',
                'data' =>  $declaration
            ];

            return response($response);
        }
        $response = [
            'message' => 'la  Declaration  n existe pas',
            'data' =>  []
        ];

        return response($response);
    }

    public function getForms($id)
    {
        $forms = Form::Where('entity_id', $id)->with(['entity', 'fileds.form', 'groupes.fields'])->get();
        if ($forms) {
            $response = [
                'message' => 'les Form a été recupées avec succès',
                'data' =>  $forms
            ];

            return response($response);
        }
        $response = [
            'message' => 'la  Form  n existe pas',
            'data' =>  []
        ];

        return response($response);
    }
}
