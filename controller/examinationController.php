<?php

require_once("Model/examinationModel.php");

class examinationController
{
    public static function getAll()
    {
        $tab_examinations = examinationModel::getexaminationByid_medecin($_SESSION["id"]);
        ob_start();
        require_once("View/listeexaminations.php");
        $contenu=ob_get_clean();
        $titre='Liste des Examinations';
        require_once("view\default.php");
    }
public static function versPageAjouterDesision($id_medecin,$id_hospitalisation){
        $titre="Ajouter Decision";
        ob_start();
        require_once("View/ModifierExamination.php");
        $contenu=ob_get_clean();
        require_once("View/default.php");
}
public static function ModifierHospitalisation($id_medecin,$id_hospitalisation,$decision){
    if(examinationModel::modifierExamination($id_medecin,$id_hospitalisation,$decision)){
        examinationController::getAll();
    }
}
public static function ajouterExamination($id_medecin,$id_hospitalisation){
    if(examinationModel::ajouterExamination($id_medecin,$id_hospitalisation)){
            examinationController::getAll();
        }
}

}