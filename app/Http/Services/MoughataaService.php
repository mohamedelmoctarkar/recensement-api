<?php

namespace App\Http\services;


use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use App\Models\Moughataa;
use App\Http\Resource\MoughataaResource;

class MoughataaService
{

     static function displayMoughataa()
    {
         $moughataas = Moughataa::latest()->get();

        $emptyMoughataa = $moughataas->count() === 0;

        $response = [
            'message' => !$emptyMoughataa ? 'la Liste des Moughataa a été recupées avec succès' : 'La liste de Moughataa est vide',
            'data' => !$emptyMoughataa ? $moughataas : []
        ];

        return response($response);
    }


    static function createMoughataa($data)
    {
        
        try {
            $moughataa = Moughataa::create($data);
        } catch(Exception $ex) {
            Log::info("Problem lors de la creation d'une Moughataa: ". json_encode($data));
            Log::error($ex->getMessage());

            return response(['message' => 'Un problème est survenu lors de la création de la Moughataa.'], 500);
        }

        $response = [
            'message' => 'La Moughataa à été créé avec succèss',
            'data' => $moughataa
        ];

        return response($response, 201);

    }

    static function showMoughataa($data)
    {
         $moughataa = Moughataa::findOrFail($data);

        return response(['data', $moughataa ], 200);
    }

    static function updateMoughataa($data,$id)
    {
        try {
            $moughataa = Moughataa::findOrFail($id);
            $moughataa->update($data);
        } catch(Exception $ex) {
            Log::info("Problem lors de la lors du mise à jour d'une Moughataa: ". json_encode($data));
            Log::error($ex->getMessage());

            return response(['message' => 'Un problème est survenu lors du mise à jour de la Moughataa.'], 500);
        }


        $response = [
            'message' => 'La Moughataa à été modifié avec succèss',
            'data' => $moughataa
        ];

        return response($response);
    }

    static function deleteMoughataa($id)
    {
         Moughataa::destroy($id);

        return response(['data' => null ], 204);
    }
}
