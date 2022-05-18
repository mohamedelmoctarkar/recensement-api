<?php

namespace App\Http\services;


use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use App\Models\Region;
use App\Http\Resource\RegionResource;

class RegionService
{

     static function displayRegion()
    {
         $regions = Region::latest()->get();

        $emptyRegion = $regions->count() === 0;

        $response = [
            'message' => !$emptyRegion ? 'la Liste des Region a été recupées avec succès' : 'La liste de Region est vide',
            'data' => !$emptyRegion ? $regions : []
        ];

        return response($response);
    }


    static function createRegion($data)
    {
        
        try {
            $region = Region::create($data);
        } catch(Exception $ex) {
            Log::info("Problem lors de la creation d'une Region: ". json_encode($data));
            Log::error($ex->getMessage());

            return response(['message' => 'Un problème est survenu lors de la création de la Region.'], 500);
        }

        $response = [
            'message' => 'La Region à été créé avec succèss',
            'data' => $region
        ];

        return response($response, 201);

    }

    static function showRegion($data)
    {
         $region = Region::findOrFail($data);

        return response(['data', $region ], 200);
    }

    static function updateRegion($data,$id)
    {
        try {
            $region = Region::findOrFail($id);
            $region->update($data);
        } catch(Exception $ex) {
            Log::info("Problem lors de la lors du mise à jour d'une Region: ". json_encode($data));
            Log::error($ex->getMessage());

            return response(['message' => 'Un problème est survenu lors du mise à jour de la Region.'], 500);
        }


        $response = [
            'message' => 'La Region à été modifié avec succèss',
            'data' => $region
        ];

        return response($response);
    }

    static function deleteRegion($id)
    {
         Region::destroy($id);

        return response(['data' => null ], 204);
    }
}
