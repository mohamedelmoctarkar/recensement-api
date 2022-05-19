<?php

namespace Modules\Authentification\Http\services;


use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Modules\Authentification\Entities\User;
use Modules\Authentification\Transformers\UserResource;
use Modules\Authentification\Enums\Message;

class AuthenticationService
{

    static function displayService()
    {

        $users = User::with('roles', 'permissions')->get();
        $emptyUsers = $users->count() === 0;

        $response = [
            'message' => !$emptyUsers ? '' : '',
            'data' => !$emptyUsers  ? UserResource::Collection($users) : []
        ];
        return $response;
    }

    static function loginService($data)
    {
        //return permission user
        $user = User::firstWhere('email', $data['email']);
        if (!$user || !Hash::check($data['password'], $user->password)) {
            return response()->json(["message" => 'nnnnnnnnnn'], 401);
        }
        $token = $user->createToken('authToken')->plainTextToken;
        // $user = $user->with('roles', 'permissions')->get();
        return response([
            'token' => $token,
            'user' => new UserResource($user),

        ], 200);
    }



    static function registerService($data)
    {

        try {
            $data['password'] = Hash::make($data['password']);
            $user = User::create($data);
            $user->assignRole($data['roles']);
        } catch (Exception $ex) {
            Log::info(Message::error_message  . json_encode($data));
            Log::error($ex->getMessage());
        }

        $response = ['message' =>  Message::message_de_création_de_compte,];

        return response($response, 201);
    }



    static function updateService($data, $user)
    {

        try {
            $payload = $data;
            if ($data['password']) {
                $payload['password'] = Hash::make($data['password']);
            }
            $user->update($payload);
        } catch (Exception $ex) {
            Log::info(Message::error_message . json_encode($data));
            Log::error($ex->getMessage());

            return response(['message' => Message::error_message], 500);
        }

        $response = [
            'message' => Message::message_de_création_de_compte,
            'user' => new UserResource($user),
        ];

        return response($response, 201);
    }

    static function destroyService($user)
    {
        try {
            $user->delete();
        } catch (Exception $ex) {
            Log::info(Message::error_message . $user);
            Log::error($ex->getMessage());

            return response(['message' => Message::message_error_de_suppression_de_compte], 500);
        }
        Log::info(Message::message_de_suppression_de_compte . json_encode($user->toArray()));
        $response = [
            'message' => Message::message_de_suppression_de_compte,
        ];

        return response($response);
    }

    static function logoutService($user)
    {
        Log::info($user);
        try {

            $user = Auth::user();
            $user->tokens()->delete();
            $response = [
                'message' => "logout  succèss",
            ];
        } catch (Exception $ex) {
            Log::error($ex->getMessage());
            $response = [
                'message' => "probleme au niveau du deconnexion du utilisateur",
            ];
        }

        return response($response);
    }
}
