<?php

require_once("Model\DossierMedicalModel.php");

class DossierMedicalController{
    public static function getDM(int $id){
        $DM=DossierMedicalModel::getDossierMedical($id);
        $Cons=DossierMedicalModel::getOldConsulatations($id);
        $Hos=DossierMedicalModel::getOldHospitalisations($id);
        ob_start();
        require_once("view\DossierMedical.php");
        $contenu=ob_get_clean();
        $titre='Dossier Medical';
        require_once("view\default.php");
    }
}
