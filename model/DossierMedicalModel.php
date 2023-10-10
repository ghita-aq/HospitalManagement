<?php
require_once("Model\Model.php");


class DossierMedicalModel{


    public static function getDossierMedical(int $id){
        $stm=Model::executerRequete('select * from patient where id_Patient=?',[$id]);
        $result= $stm->fetch(PDO::FETCH_OBJ);
        return $result;
    }
    public static function getOldConsulatations(int $id_patient){
        $stm=Model::executerRequete('select c.date_consultation,c.traitement_demandé,p.nom,p.prenom from consultation c join Medecin m on m.id_medecin=c.id_medecin join personnel p on p.id_Personnel=m.id_Personnel where date_consultation<current_date() and c.id_patient=?',[$id_patient]);
        $result= $stm->fetchALL(PDO::FETCH_OBJ);
        return $result;
    }
    public static function getOldHospitalisations(int $id_patient){
        $stm=Model::executerRequete('select * from hospitalisation where id_patient=?',[$id_patient]);
        $result= $stm->fetchALL(PDO::FETCH_OBJ);
        return $result;
    }
}
