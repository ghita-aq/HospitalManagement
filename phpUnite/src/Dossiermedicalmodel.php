<?php

namespace Projet\GestionHopital;

use PDO;

require_once("Model.php");

class Dossiermedicalmodel
{

    public static function getDossierMedical(int $id)
    {
        $stm = Model::executerRequete('select * from patient where id_patient=?', [$id]);
        $result = $stm->fetch(PDO::FETCH_OBJ);
        return $result;
    }
    public static function getOldConsulatations(int $id_patient)
    {
        $stm = Model::executerRequete('select * from Consultation where id_patient=?', [$id_patient]);
        $result = $stm->fetch(PDO::FETCH_OBJ);
        return $result;
    }
    public static function getOldHospitalisations(int $id_patient){
        $stm=Model::executerRequete('select * from hospitalisation where id_patient=?',[$id_patient]);
        $result= $stm->fetch(PDO::FETCH_OBJ);
        return $result;
    }
}
