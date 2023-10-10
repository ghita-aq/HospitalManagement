<?php
require_once("Model/ChambreModel.php");

class chambreController{
    public static function versPageListeChambre(){
        $tab_chambres = chambreModel::getAllchambres();
        $titre="Liste Chambre";
        ob_start();
        require_once('view/listeChambre.php');
        $contenu=ob_get_clean();
        require_once("View/default.php");
    }
    
    public static function rechercher($numéro)
    {
        $tab_chambres = chambreModel::getchambreBynuméro($numéro);
        $titre="Chercher Chambre ".$numéro;
        ob_start();
        require_once('view/listeChambre.php');
        $contenu=ob_get_clean();
        require_once("View/default.php");
    }
    public static function getChambreDisponible(){
        $tab_chambres=chambreModel::getChambreDisponible();
        $titre="Chambre disponible";
        ob_start();
        require_once('view/listeChambre.php');
        $contenu=ob_get_clean();
        require_once("View/default.php");
    }
    public static function getChambreNonDisponible(){
        $tab_chambres=chambreModel::getChambreNonDisponible();
        $titre="Chambre Non Disponible";
        ob_start();
        require_once('view/listeChambre.php');
        $contenu=ob_get_clean();
        require_once("View/default.php");
    }

}