<?php

namespace App\Http\services;


use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use App\Models\Entity;
use App\Http\Resource\EntityResource;

class EntityService
{

     static function displayEntity()
    {
         $entities = Entity::latest()->get();

        $emptyEntity = $entities->count() === 0;

        $response = [
            'message' => !$emptyEntity ? 'la Liste des Entity a été recupées avec succès' : 'La liste de Entity est vide',
            'data' => !$emptyEntity ? $entities : []
        ];

        return response($response);
    }


    static function createEntity($data)
    {
        
        try {
            $entity = Entity::create($data);
        } catch(Exception $ex) {
            Log::info("Problem lors de la creation d'une Entity: ". json_encode($data));
            Log::error($ex->getMessage());

            return response(['message' => 'Un problème est survenu lors de la création de la Entity.'], 500);
        }

        $response = [
            'message' => 'La Entity à été créé avec succèss',
            'data' => $entity
        ];

        return response($response, 201);

    }

    static function showEntity($data)
    {
         $entity = Entity::findOrFail($data);

        return response(['data', $entity ], 200);
    }

    static function updateEntity($data,$id)
    {
        try {
            $entity = Entity::findOrFail($id);
            $entity->update($data);
        } catch(Exception $ex) {
            Log::info("Problem lors de la lors du mise à jour d'une Entity: ". json_encode($data));
            Log::error($ex->getMessage());

            return response(['message' => 'Un problème est survenu lors du mise à jour de la Entity.'], 500);
        }


        $response = [
            'message' => 'La Entity à été modifié avec succèss',
            'data' => $entity
        ];

        return response($response);
    }

    static function deleteEntity($id)
    {
         Entity::destroy($id);

        return response(['data' => null ], 204);
    }
}
