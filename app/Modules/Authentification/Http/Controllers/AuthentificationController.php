<?php

namespace Modules\Authentification\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Authentification\Entities\User;
use Illuminate\Contracts\Support\Renderable;
use Modules\Authentification\Http\Requests\LoginUserRequest;
use Modules\Authentification\Http\Requests\CreateUserRequest;
use Modules\Authentification\Http\Requests\UpdateUserRequest;
use Modules\Authentification\Http\services\AuthenticationService;

class AuthentificationController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return  AuthenticationService::displayService();
    }
    /**
     * Permet à un utilisateur de se connecter
     * @param $request
     * @return
     */
    public function login(LoginUserRequest $request)
    {
        return  AuthenticationService::loginService($request->validated());
    }
    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function register(CreateUserRequest $request)
    {
        return  AuthenticationService::registerService($request->validated());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {

        return AuthenticationService::updateService($request->validated(), $user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {

        return AuthenticationService::destroyService($user);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function logout(User $user)
    {
        return AuthenticationService::logoutService($user);
    }
}
