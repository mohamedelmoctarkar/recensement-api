<?php

namespace Modules\Authentification\Http\services;

use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class RolesService
{

    static  function displayRoles()
    {
        $roles = Role::all();
        $noRoles = $roles->count() === 0;

        $response = [
            'message' => !$noRoles ? 'la Liste des roles a été recupées avec succès' : 'La liste de role est vide',
            'data' => !$noRoles ? RoleResource::collection($roles) : []
        ];

        return response($response);
    }


    static function createRole($role)
    {
        try {
            $role = Role::create([
                'name' => $role->name,
                'guard_name' => 'web'
            ]);
        } catch (Exception $ex) {
            Log::info("Problem lors de la creation d'une role: " . json_encode($role));
            Log::error($ex->getMessage());

            return response(['message' => 'Un problème est survenu lors de la création de la role.'], 500);
        }

        $response = [
            'message' => 'Le role a été créé avec succèss',
            'data' => new RoleResource($role)
        ];

        return response($response, 201);
    }


    static function updateRole($data, $role)
    {

        try {

            $role->update($data);
        } catch (Exception $ex) {
            Log::info("Problem lors de la lors du mise à jour d'une role: " . json_encode($data));
            Log::error($ex->getMessage());

            return response(['message' => 'Un problème est survenu lors du mise à jour de la role.'], 500);
        }


        $response = [
            'message' => 'Le role a été modifié avec succèss',
            'data' => new RoleResource($role)
        ];

        return response($response);
    }



    static function deleteRole($role)
    {

        try {
            $name = $role->name;
            $role->delete();
        } catch (Exception $ex) {
            Log::info("Problem lors de la supression de la role avec l'id: " . $role->id);
            Log::error($ex->getMessage());

            return response(['message' => 'Un problème est survenu lors de la suppression de la role.'], 500);
        }

        Log::info("Suppression de la role: " . json_encode($role->toArray()));
        $response = [
            'message' => "Le role $name à été supprimée avec succèss",
            'data' => null
        ];

        return response($response);
    }
}
