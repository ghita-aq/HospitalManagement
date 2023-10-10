<?php
require('Model/PatientModel.php');
require('Model/ChambreModel.php');
class PatientController{
    public static function getAllPatient(){
        $tab_Patients=PatientModel::getPatients();
        ob_start();
        require_once("view/listePatient.php");
        $contenu=ob_get_clean();
        $titre='Liste des Patients';
        require_once("view\default.php");

    }
    public static function getAllPatientHospitalisé(){
            $tab_Patients=PatientModel::getPatientsHospitalise();
            ob_start();
            require_once("view/listePatient.php");
            $contenu=ob_get_clean();
            $titre='Liste des Patients Hospitalisées';
            require_once("view\default.php");
        
    }
    public static function rechercher($id)
    {
        $tab_Patients=PatientModel::getPatienteById($id);
        ob_start();
        require_once("view/listePatient.php");
        $contenu=ob_get_clean();
        $titre='Liste des Patients';
        require_once("view\default.php");
    }
    public static function versPageGererHospitalisation($id_patient){
        $tab_chambre=ChambreModel::getChambreDisponible();
        $titre="Affecter Chambre";
        ob_start();
        require_once("View/affecterChambre.php");
        $contenu=ob_get_clean();
        require_once("View/default.php");

    }
    public static function affecterChambre($date_sortie,$motif_entre,$id_chambre,$id_patient){
        if(PatientModel::insererHospitalisation($date_sortie,$motif_entre,$id_chambre,$id_patient)){
            PatientController::getAllPatient();
        }
    }
    public static function versPageDesaffecter($id_hospitalisation){
        $titre="Désaffecter Chambre";
        ob_start();
        require_once("View/desaffecterChambre.php");
        $contenu=ob_get_clean();
        require_once("View/default.php");
    }
    public static function desaffecterChambre($motif_sortie,$id_hospitalisation){
        if(PatientModel::modifierHospitalisation($motif_sortie,$id_hospitalisation)){
            PatientController::getAllPatient();
        }
    }
    public static function versPageAjouterpatient(){
        $titre="Ajouter Patient";
        ob_start();
        require_once("View/ajouterpatient.php");
        $contenu=ob_get_clean();
        require_once("View/default.php");
    }
    public static function Ajouterpatient($nom,$prenom,$cin,$sexe,$telephone,$naissance,$antécédents,$maladies,$sensibilité){
        if(PatientModel::insertPatient($nom,$prenom,$cin,$sexe,$telephone,$naissance,$antécédents,$maladies,$sensibilité)){
            PatientController::getAllPatient();
        }
        
    }
}
