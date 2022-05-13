<?php



namespace Modules\Authentification\Enums;

use Spatie\Enum\Laravel\Enum;


class Message extends Enum
{

    const users_list_success = 'la liste des utilisateur  a été recupées avec succès';
    const users_list_vide = 'la liste des utilisateur est vide';
    const message_de_création_de_compte = 'L\'utilisateur a é été créer avec succès';
    const error_message = "Problem lors de la creation d'utilistatuer: ";
    const login_ou_mot_de_passe_incorrect = "login ou mot de passe incorrect";
    const message_error_de_suppression_de_compte = 'Un problème est survenu lors de la suppression de l\'utilisateur ';
    const message_de_suppression_de_compte = "l\' utilisateur à été supprimé avec succèss";


    const error_check = 'Action non autorisée';
}
