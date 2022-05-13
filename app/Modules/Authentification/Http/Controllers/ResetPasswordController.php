<?php

namespace Modules\Authentification\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Config;
use Modules\Authentification\Entities\User;
use Modules\Authentification\Jobs\SendLinkJob;


class ResetPasswordController extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function forgotPassword(Request $request)
    {
        $request->validate(['email' => 'required|email']);
        $user = User::firstWhere('email', $request->email);
        if ($user) {
            $token = Str::random(60);
            DB::table('password_resets')->insert([
                'email' => $request->email,
                'token' => $token,
                'created_at' => Carbon::now()
            ]);

            dispatch(new SendLinkJob($token, $user));

            $response = [
                'message' =>  "lien de réinitialisation du mot de passe envoyé avec succès",
            ];
            return response($response);
        }

        $response = [
            'message' =>
            "le lien n'a pas pu être envoyé à cette adresse e-mail",
        ];

        return response($response);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function resetPassword(Request $request, $token)
    {

        $request->validate([
            'password' => 'required|min:6|confirmed',
        ]);
        $p__reset = DB::table('password_resets')->where('token', $token)->first();
        $user = User::whereEmail($p__reset->email)->first();
        $user->update(['password' => Hash::make($request->password)]);

        $response = [
            'message' =>
            $user
                ? "mot de passe réinitialisé avec succès"
                : "le mot de passe n'a pas pu être réinitialisé",
        ];

        return response($response);
    }
}
