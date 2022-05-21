<?php

namespace App\Http\services;


use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use App\Models\Groupe;
use App\Http\Resource\GroupeResource;

class GroupeService
{

     static function displayGroupe()
    {
         $groupes = Groupe::latest()->get();

        $emptyGroupe = $groupes->count() === 0;

        $response = [
            'message' => !$emptyGroupe ? 'la Liste des Groupe a été recupées avec succès' : 'La liste de Groupe est vide',
            'data' => !$emptyGroupe ? $groupes : []
        ];

        return response($response);
    }


    static function createGroupe($data)
    {
        
        try {
            $groupe = Groupe::create($data);
        } catch(Exception $ex) {
            Log::info("Problem lors de la creation d'une Groupe: ". json_encode($data));
            Log::error($ex->getMessage());

            return response(['message' => 'Un problème est survenu lors de la création de la Groupe.'], 500);
        }

        $response = [
            'message' => 'La Groupe à été créé avec succèss',
            'data' => $groupe
        ];

        return response($response, 201);

    }

    static function showGroupe($data)
    {
         $groupe = Groupe::findOrFail($data);

        return response(['data', $groupe ], 200);
    }

    static function updateGroupe($data,$id)
    {
        try {
            $groupe = Groupe::findOrFail($id);
            $groupe->update($data);
        } catch(Exception $ex) {
            Log::info("Problem lors de la lors du mise à jour d'une Groupe: ". json_encode($data));
            Log::error($ex->getMessage());

            return response(['message' => 'Un problème est survenu lors du mise à jour de la Groupe.'], 500);
        }


        $response = [
            'message' => 'La Groupe à été modifié avec succèss',
            'data' => $groupe
        ];

        return response($response);
    }

    static function deleteGroupe($id)
    {
         Groupe::destroy($id);

        return response(['data' => null ], 204);
    }
}
