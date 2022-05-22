<?php

namespace App\Http\services;


use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use App\Models\Form;
use App\Http\Resource\FormResource;

class FormService
{

    static function displayForm()
    {
        $forms = Form::with(['entity', 'fileds', 'groupes'])->get();

        $emptyForm = $forms->count() === 0;

        $response = [
            'message' => !$emptyForm ? 'la Liste des Form a été recupées avec succès' : 'La liste de Form est vide',
            'data' => !$emptyForm ? $forms : []
        ];

        return response($response);
    }


    static function createForm($data)
    {

        try {
            $form = Form::create($data);
        } catch (Exception $ex) {
            Log::info("Problem lors de la creation d'une Form: " . json_encode($data));
            Log::error($ex->getMessage());

            return response(['message' => 'Un problème est survenu lors de la création de la Form.'], 500);
        }

        $response = [
            'message' => 'La Form à été créé avec succèss',
            'data' => $form
        ];

        return response($response, 201);
    }

    static function showForm($data)
    {
        $form = Form::findOrFail($data);

        return response(['data', $form], 200);
    }

    static function updateForm($data, $id)
    {
        try {
            $form = Form::findOrFail($id);
            $form->update($data);
        } catch (Exception $ex) {
            Log::info("Problem lors de la lors du mise à jour d'une Form: " . json_encode($data));
            Log::error($ex->getMessage());

            return response(['message' => 'Un problème est survenu lors du mise à jour de la Form.'], 500);
        }


        $response = [
            'message' => 'La Form à été modifié avec succèss',
            'data' => $form
        ];

        return response($response);
    }

    static function deleteForm($id)
    {
        Form::destroy($id);

        return response(['data' => null], 204);
    }
}
