<?php

namespace Modules\Authentification\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Modules\Authentification\Entities\User;
use Modules\Authentification\Transformers\UserResource;

class PermissionController extends Controller
{
    /**
     * Update a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function updatePermission(Request $request, User $user)
    {
        try {
            $check = $user->can($request->permission);
            if (!$check) {
                $user->givePermissionTo($request->permission);
                Log::error($request->all());
                $response = [
                    'message' => 'givePermissionTo   ' . $request->permission    . '  successfully',
                ];
                return response($response, 201);
            }
            $user->revokePermissionTo($request->permission);
            $response = [
                'message' => 'revokePermissionTo   ' . $request->permission    . '  successfully',
            ];
            return response($response, 201);
        } catch (Exception $ex) {
            Log::error($ex->getMessage());
        }
    }

    /**
     * Undocumented function
     *
     * @return Response
     */
    public function getmodules()
    {
        $results = DB::table('modules')->get();

        $noResults = $results->count() === 0;

        $response = [
            'message' => !$noResults ? 'la Liste des modules a été recupées avec succès' : 'La liste de modules est vide',
            'data' => !$noResults ? $results : [],
        ];

        return response($response);
    }

    public function getHistoryConnexion()
    {
        $results = DB::table('personal_access_tokens')->get();

        $noHistory = $results->count() === 0;

        $response = [
            'message' => !$noHistory ? 'la Liste  a été recupées avec succès' : 'La liste  est vide',
            'data' => !$noHistory ? $results : [],
        ];

        return response($response);
    }
}
