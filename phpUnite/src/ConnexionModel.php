<?php

namespace Projet\GestionHopital;

require 'vendor/autoload.php';

require_once('Model.php');

class ConnexionModel
{
    public static function getRole($email, $motpass)
    {
        $stm = Model::executerRequete('select * from personnel where email=:e and motdepass=:m', [
            ":e" => $email,
            ":m" => $motpass
        ]);
        return $stm;
    }
}
