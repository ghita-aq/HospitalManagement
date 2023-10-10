<?php
require_once("Model/PersonnelModel.php");
class PersonnelController{
    public static function AllPersonnel(){
        $tab_personnels=PersonnelModel::getAllPersonnel();
        ob_start();
        require_once("view/listePersonnel.php");
        $contenu=ob_get_clean();
        $titre='Liste des personnels';
        require_once("view\default.php");
    }
    public static function supprimerpersonnel($id_Personnel){
        if(personnelModel::deletepersonnel($id_Personnel)){
            PersonnelController::AllPersonnel();
        }
    }
    public static function versAjouterpersonnel(){
        $titre="Ajouter Personnel";
        ob_start();
        require_once("View/ajouterPersonnel.php");
        $contenu=ob_get_clean();
        require_once("View/default.php");
    }
    public static function AjouterPersonnel($NOM,$PRENOM,$ROLE,$Email,$PASSWORD,$TELEPHONE,$ADRESSE,$NAISSANCE,$DATEDEBUT,$specialité){
        if(PersonnelModel::AjouterPersonnel($NOM,$PRENOM,$ROLE,$Email,$PASSWORD,$TELEPHONE,$ADRESSE,$NAISSANCE,$DATEDEBUT,$specialité)){
            PersonnelController::AllPersonnel();
        }
    }
}