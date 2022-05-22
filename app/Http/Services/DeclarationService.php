<?php

namespace App\Http\services;


use Exception;
use App\Models\Declaration;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use App\Http\Resource\DeclarationResource;

class DeclarationService
{

    static function displayDeclaration()
    {
        $declarations = Declaration::with(['entity', 'region', 'user'])->get();

        $emptyDeclaration = $declarations->count() === 0;

        $response = [
            'message' => !$emptyDeclaration ? 'la Liste des Declaration a été recupées avec succès' : 'La liste de Declaration est vide',
            'data' => !$emptyDeclaration ?  DeclarationResource::collection($declarations) : []
        ];

        return response($response);
    }


    static function createDeclaration($data)
    {

        try {
            $declaration = Declaration::create($data);
        } catch (Exception $ex) {
            Log::info("Problem lors de la creation d'une Declaration: " . json_encode($data));
            Log::error($ex->getMessage());

            return response(['message' => 'Un problème est survenu lors de la création de la Declaration.'], 500);
        }

        $response = [
            'message' => 'La Declaration à été créé avec succèss',
            'data' => $declaration
        ];

        return response($response, 201);
    }

    static function showDeclaration($data)
    {
        $declaration = Declaration::findOrFail($data);

        return response(['data', $declaration], 200);
    }

    static function updateDeclaration($data, $id)
    {
        try {
            $declaration = Declaration::findOrFail($id);
            $declaration->update($data);
        } catch (Exception $ex) {
            Log::info("Problem lors de la lors du mise à jour d'une Declaration: " . json_encode($data));
            Log::error($ex->getMessage());

            return response(['message' => 'Un problème est survenu lors du mise à jour de la Declaration.'], 500);
        }


        $response = [
            'message' => 'La Declaration à été modifié avec succèss',
            'data' => $declaration
        ];

        return response($response);
    }

    static function deleteDeclaration($id)
    {
        Declaration::destroy($id);

        return response(['data' => null], 204);
    }
}
