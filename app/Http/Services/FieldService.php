<?php

namespace App\Http\services;


use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use App\Models\Field;
use App\Http\Resource\FieldResource;

class FieldService
{

     static function displayField()
    {
         $fields = Field::latest()->get();

        $emptyField = $fields->count() === 0;

        $response = [
            'message' => !$emptyField ? 'la Liste des Field a été recupées avec succès' : 'La liste de Field est vide',
            'data' => !$emptyField ? $fields : []
        ];

        return response($response);
    }


    static function createField($data)
    {
        
        try {
            $field = Field::create($data);
        } catch(Exception $ex) {
            Log::info("Problem lors de la creation d'une Field: ". json_encode($data));
            Log::error($ex->getMessage());

            return response(['message' => 'Un problème est survenu lors de la création de la Field.'], 500);
        }

        $response = [
            'message' => 'La Field à été créé avec succèss',
            'data' => $field
        ];

        return response($response, 201);

    }

    static function showField($data)
    {
         $field = Field::findOrFail($data);

        return response(['data', $field ], 200);
    }

    static function updateField($data,$id)
    {
        try {
            $field = Field::findOrFail($id);
            $field->update($data);
        } catch(Exception $ex) {
            Log::info("Problem lors de la lors du mise à jour d'une Field: ". json_encode($data));
            Log::error($ex->getMessage());

            return response(['message' => 'Un problème est survenu lors du mise à jour de la Field.'], 500);
        }


        $response = [
            'message' => 'La Field à été modifié avec succèss',
            'data' => $field
        ];

        return response($response);
    }

    static function deleteField($id)
    {
         Field::destroy($id);

        return response(['data' => null ], 204);
    }
}
