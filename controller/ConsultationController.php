<?php
require("model/ConsultationModel.php");

class ConsultationController{
    public static function versPageConsultation(){
        $tab_consultation=ConsultationModel::getAllConsultation();
        $tab_medecin=ConsultationModel::getAllMedecin();
        $titre="Réserver Consultation";
        ob_start();
        require_once("View/reserverConsultation.php");
        $contenu=ob_get_clean();
        require_once("View/default.php");
    }

    public static function RéserverConsultation($date,$id_patient,$id_medecin){
        if(ConsultationModel::insererConsultation($date,$id_patient,$id_medecin)){
            ConsultationController::versPageConsultation();
        }
    }
    public static function versPageModifierConcultation($id_consultation){
        $consultation=ConsultationModel::getConsultationById($id_consultation);
        $tab_medecin=ConsultationModel::getAllMedecin();
        $titre="Modifier Consultation ".$id_consultation;
        ob_start();
        require_once("View/modifierConsultation.php");
        $contenu=ob_get_clean();
        require_once("View/default.php");
    }
    public static function supprimerConsultation($id){
        if(ConsultationModel::deleteConsultation($id)){
            ConsultationController::versPageConsultation();
        }
    }
    public static function ModifierConsultation($id_consultation,$date,$id_medecin,$id_patient){
        if(ConsultationModel::updateConsultation($id_consultation,$date,$id_medecin,$id_patient)){
            ConsultationController::versPageConsultation();
        }
    }
    public static function versPageListeConsultations($id_personnel){
        $tab_consultation=ConsultationModel::getConsultationParMedcin($id_personnel);
        $titre="Liste Consultation";
        ob_start();
        require_once("View/listeConsultation.php");
        $contenu=ob_get_clean();
        require_once("View/default.php");
    }
}