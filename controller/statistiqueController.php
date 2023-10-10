<?php
require_once('Model/statistiqueModel.php');
class statistiqueController{
    public static function getStatistique(){
        $nb_patients=statistiqueModel::nbPatient();
        $nb_hospitalisation=statistiqueModel::nbHospitalisationActuel();
        $nb_infirmier=statistiqueModel::nbInfirmier();
        $nb_medecin=statistiqueModel::nbMedecin();    
        ob_start();
        require_once("view/statistiques.php");
        $contenu=ob_get_clean();
        $titre='Statistique global';
        require_once("view\default.php");
    }
}