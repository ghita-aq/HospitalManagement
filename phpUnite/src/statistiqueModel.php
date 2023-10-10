<?php

namespace Projet\GestionHopital;

require_once "vendor/autoload.php";
require_once('Model.php');

use PDO;

class statistiqueModel
{
    public static function nbPatient()
    {
        $stm = Model::executerRequete('select count(*) as total from patient', []);
        $result = $stm->fetch(PDO::FETCH_OBJ);
        return $result;
    }
    public static function nbHospitalisationActuel()
    {
        $stm = Model::executerRequete("
        SELECT count(*) as total
        FROM Patient p
        LEFT JOIN (
            SELECT h1.*,
                CASE 
                    WHEN h1.date_sortie IS NULL or h1.date_sortie='0000-00-00 'THEN 'hospitalisé'
                    ELSE 'non hospitalisé'
                END AS etat
            FROM hospitalisation h1
            INNER JOIN (
                SELECT id_patient, MAX(id_hospitalisation) AS max_id
                FROM hospitalisation
                GROUP BY id_patient
            ) h2 ON h1.id_patient = h2.id_patient AND h1.id_hospitalisation = h2.max_id
        ) h ON p.id_patient = h.id_patient WHERE h.etat='hospitalisé';
", []);
        $result = $stm->fetch(PDO::FETCH_OBJ);
        return $result;
    }
    public static function nbInfirmier()
    {
        $stm = Model::executerRequete('select count(*) as total from personnel where rôle="infirmier"', []);
        $result = $stm->fetch(PDO::FETCH_OBJ);
        return $result;
    }
    public static function nbMedecin()
    {
        $stm = Model::executerRequete('select count(*) as total from personnel where rôle="Medecin"', []);
        $result = $stm->fetch(PDO::FETCH_OBJ);
        return $result;
    }
}
