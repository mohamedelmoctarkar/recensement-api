<?php

namespace App\Http\services;


use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use App\Models\Sous_groupe;
use App\Http\Resource\Sous_groupeResource;

class Sous_groupeService
{

     static function displaySous_groupe()
    {
         $sous_groupes = Sous_groupe::latest()->get();

        $emptySous_groupe = $sous_groupes->count() === 0;

        $response = [
            'message' => !$emptySous_groupe ? 'la Liste des Sous_groupe a été recupées avec succès' : 'La liste de Sous_groupe est vide',
            'data' => !$emptySous_groupe ? $sous_groupes : []
        ];

        return response($response);
    }


    static function createSous_groupe($data)
    {
        
        try {
            $sous_groupe = Sous_groupe::create($data);
        } catch(Exception $ex) {
            Log::info("Problem lors de la creation d'une Sous_groupe: ". json_encode($data));
            Log::error($ex->getMessage());

            return response(['message' => 'Un problème est survenu lors de la création de la Sous_groupe.'], 500);
        }

        $response = [
            'message' => 'La Sous_groupe à été créé avec succèss',
            'data' => $sous_groupe
        ];

        return response($response, 201);

    }

    static function showSous_groupe($data)
    {
         $sous_groupe = Sous_groupe::findOrFail($data);

        return response(['data', $sous_groupe ], 200);
    }

    static function updateSous_groupe($data,$id)
    {
        try {
            $sous_groupe = Sous_groupe::findOrFail($id);
            $sous_groupe->update($data);
        } catch(Exception $ex) {
            Log::info("Problem lors de la lors du mise à jour d'une Sous_groupe: ". json_encode($data));
            Log::error($ex->getMessage());

            return response(['message' => 'Un problème est survenu lors du mise à jour de la Sous_groupe.'], 500);
        }


        $response = [
            'message' => 'La Sous_groupe à été modifié avec succèss',
            'data' => $sous_groupe
        ];

        return response($response);
    }

    static function deleteSous_groupe($id)
    {
         Sous_groupe::destroy($id);

        return response(['data' => null ], 204);
    }
}
