<?php

namespace Projet\GestionHopital;

require 'vendor/autoload.php';

require_once('Model.php');

use PDO;

class ConsultationModel
{
    public static function insererConsultation($date, $id_patient, $id_medecin)
    {
        $flag = Model::executerRequete('insert into Consultation values(default,:d,"",:im,:ip)', [
            ':d' => $date,
            ':im' => $id_medecin,
            ':ip' => $id_patient
        ]);
        return $flag;
    }
    public static function getAllConsultation()
    {
        $stm = Model::executerRequete("select c.*,concat(p.nom,' ',p.prenom) as nomMedcin,concat(pa.Nom,' ',pa.Prenom) as nomPatient from consultation c join medecin m  on c.id_medecin=m.id_medecin join personnel p on m.id_Personnel=p.id_Personnel join patient pa on c.id_Patient=pa.id_Patient where c.date_consultation>=current_date() group by c.id_consultation", []);
        $result = $stm->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
    public static function getAllMedecin()
    {
        $stm = Model::executerRequete('select m.id_medecin,p.nom,p.prenom from medecin m join personnel p on m.id_Personnel=p.id_Personnel', []);
        $result = $stm->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
    public static function getConsultationById($id_consultation)
    {
        $stm = Model::executerRequete("select * from consultation where id_consultation=? ", [$id_consultation]);
        $result = $stm->fetch(PDO::FETCH_OBJ);
        return $result;
    }
    public static function deleteConsultation($id)
    {
        $flag = Model::executerRequete('delete from consultation where id_consultation=?', [$id]);
        return $flag;
    }
    public static function updateConsultation($id_consultation, $date, $id_medecin, $id_patient)
    {
        $flag = Model::executerRequete('update consultation set date_consultation=:d,id_medecin=:im,id_patient=:ip where id_consultation=:ic', [
            ':d' => $date,
            ':im' => $id_medecin,
            ':ip' => $id_patient,
            ':ic' => $id_consultation
        ]);
        return $flag;
    }
    public static function getConsultationParMedcin($id_personnel)
    {
        $stm = Model::executerRequete("select c.*,concat(p.nom,' ',p.prenom) as nomMedcin,concat(pa.Nom,' ',pa.Prenom) as nomPatient from consultation c join medecin m on c.id_medecin=m.id_medecin join personnel p on m.id_Personnel=p.id_Personnel join patient pa on c.id_Patient=pa.id_Patient where c.date_consultation>=current_date() and p.id_Personnel=?", [$id_personnel]);
        $result = $stm->fetch(PDO::FETCH_OBJ);
        return $result;
    }
}
