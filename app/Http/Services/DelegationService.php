<?php

namespace App\Http\services;


use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use App\Models\Delegation;
use App\Http\Resource\DelegationResource;

class DelegationService
{

     static function displayDelegation()
    {
         $delegations = Delegation::latest()->get();

        $emptyDelegation = $delegations->count() === 0;

        $response = [
            'message' => !$emptyDelegation ? 'la Liste des Delegation a été recupées avec succès' : 'La liste de Delegation est vide',
            'data' => !$emptyDelegation ? $delegations : []
        ];

        return response($response);
    }


    static function createDelegation($data)
    {
        
        try {
            $delegation = Delegation::create($data);
        } catch(Exception $ex) {
            Log::info("Problem lors de la creation d'une Delegation: ". json_encode($data));
            Log::error($ex->getMessage());

            return response(['message' => 'Un problème est survenu lors de la création de la Delegation.'], 500);
        }

        $response = [
            'message' => 'La Delegation à été créé avec succèss',
            'data' => $delegation
        ];

        return response($response, 201);

    }

    static function showDelegation($data)
    {
         $delegation = Delegation::findOrFail($data);

        return response(['data', $delegation ], 200);
    }

    static function updateDelegation($data,$id)
    {
        try {
            $delegation = Delegation::findOrFail($id);
            $delegation->update($data);
        } catch(Exception $ex) {
            Log::info("Problem lors de la lors du mise à jour d'une Delegation: ". json_encode($data));
            Log::error($ex->getMessage());

            return response(['message' => 'Un problème est survenu lors du mise à jour de la Delegation.'], 500);
        }


        $response = [
            'message' => 'La Delegation à été modifié avec succèss',
            'data' => $delegation
        ];

        return response($response);
    }

    static function deleteDelegation($id)
    {
         Delegation::destroy($id);

        return response(['data' => null ], 204);
    }
}
