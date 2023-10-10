<?php
require('model/ConnexionModel.php');

class ConnexionController{
    public static function versAcceuil(){
        ob_start();
        require_once("view/connexion.php");
        $contenu=ob_get_clean();
        $titre='Accueil';
        require_once("view\default.php");
    }
    public static function verifierRole($email,$pass){
        $stm=ConnexionModel::getRole($email,$pass);
        if($stm->rowCount() == 1){
            $personnel= $stm->fetch(PDO::FETCH_OBJ);
            $_SESSION["login"] = $personnel->rôle;
            if($personnel->rôle=='infirmier'||$personnel->rôle=='Medecin'||$personnel->rôle=='chargé de réception'){
                $_SESSION["id"]=$personnel->id_Personnel;
                PatientController::getAllPatient();
            }elseif($_SESSION["login"]=='Administrateur'){
                PersonnelController::AllPersonnel();
            }
        }else{
            echo '<script>alert("Login et/ou mot de passe incorrects")</script>';
            ConnexionController::versAcceuil();
        }
    }
    public static function deconnexion(){
        session_unset();
        session_destroy();
        ConnexionController::versAcceuil();
    }
} 
