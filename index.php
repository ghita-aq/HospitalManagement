<?php
require_once("Controller\DossierMedicalController.php");
require_once("Controller\ConnexionController.php");
require_once("controller/PatientController.php");
require_once("Controller/ConsultationController.php");
require_once("Controller/chambreController.php");
require_once("Controller/PersonnelController.php");
require_once("Controller/statistiqueController.php");
require_once('Controller/examinationController.php');

session_start();
if (isset($_GET["action"])){
        $action=$_GET["action"];
        switch($action){
            case 'afficherdm':
                DossierMedicalController::getDM($_GET['id']);
                break;
            case 'connexion':
                if (isset($_POST["login"]) && isset($_POST["motPass"])){
                    ConnexionController::verifierRole($_POST["login"],$_POST["motPass"]);
                    break;
                }
            case 'deconnexion':
                ConnexionController::deconnexion();
                break;
            case 'afficherlistepatient':
                PatientController::getAllPatient();
                break;
            case 'Filtrer':
                if(isset($_GET["patients"]) && $_GET["patients"]==1){
                    PatientController::getAllPatient();
                    break;
                }elseif(isset($_GET["patients"]) && $_GET["patients"]==2){
                    PatientController::getAllPatientHospitalisé();
                    break;
                }
            case 'chercher':
                if (isset($_GET["idPatient"])){
                    PatientController::rechercher($_GET["idPatient"]);
                    break;
                }
            case 'Affecter Chambre':
                PatientController::versPageGererHospitalisation($_GET["id"]);
                break;
            case 'AjouterHospitalisation':
                $date_sortie=$_POST["date"];
                $motif_entre=$_POST['motif_entre'];
                $id_chambre=$_POST["chambre"];
                $id_patient=$_GET["ip"];
                PatientController::affecterChambre($date_sortie,$motif_entre,$id_chambre,$id_patient);
                break;
            case 'Désaffecter Chambre':
                PatientController::versPageDesaffecter($_GET["id_hos"]);
                break;
            case 'ModifierHospitalisation':
                $id_hos=$_POST["id_hos"];
                $motif_sortie=$_POST['motif_sortie'];
                PatientController::desaffecterChambre($motif_sortie,$id_hos);
                break;
            case 'versReserverConsultation':
                ConsultationController::versPageConsultation();
                break;
            case 'reserverConsulattion':
                $date=$_POST['date'];
                $id_patient=$_POST['id_patient'];
                $id_medecin=$_POST['id_medecin'];
                ConsultationController::RéserverConsultation($date,$id_patient,$id_medecin);
                break;
            case 'Modifier':
                ConsultationController::versPageModifierConcultation($_POST['id_consultation']);
                break;
            case 'ModifierConsultation':
                $id_consultation=$_POST["id_consultation"];
                $date=$_POST["date"];
                $id_medecin=$_POST["id_medecin"];
                $id_patient=$_POST['id_patient'];
                ConsultationController::ModifierConsultation($id_consultation,$date,$id_medecin,$id_patient);
                break;
            case 'Supprimer':
                ConsultationController::supprimerConsultation($_POST['id_consultation']);   
                break;
            case 'versPageAjouterPatient':
                PatientController::versPageAjouterpatient();
                break;
            case 'AjoutePatient':
                $nom=$_POST['nom'];
                $prenom=$_POST['prenom'];
                $cin=$_POST['cin'];
                $sexe=$_POST['sexe'];
                $telephone=$_POST['telephone'];
                $naissance=$_POST['naissance'];
                $antécédents=$_POST['antécédents'];
                $maladies=$_POST['maladies'];
                $sensibilité=$_POST['sensibilité'];
                PatientController::Ajouterpatient($nom,$prenom,$cin,$sexe,$telephone,$naissance,$antécédents,$maladies,$sensibilité);
                break;
            case 'versPageListeChambre':
                chambreController::versPageListeChambre();
                break;
            case "ChercherChambre": 
                if (isset($_POST["numéro"])){
                    chambreController::rechercher($_POST["numéro"]);
                    break;
                }
            case 'FiltrerChambre':
                if(isset($_GET["etat"]) && $_GET["etat"]=='disponible'){
                    chambreController::getChambreDisponible();
                    break;
                }elseif(isset($_GET["etat"]) && $_GET["etat"]=='nondisponible'){
                    chambreController::getChambreNonDisponible();
                    break;
                }
            case 'versListeConsultation':
                ConsultationController::versPageListeConsultations($_SESSION["id"]);
                break;   
            case 'versListePersonnels':
                PersonnelController::AllPersonnel();
                break;
            case 'versStatistiques':
                statistiqueController::getStatistique();
                break;
            case 'versListeExamination':
                examinationController::getAll();
                break;
            case 'Ajouterdecision':
                examinationController::versPageAjouterDesision($_POST["id_medecin"],$_POST["id_hospitalisation"]);
                break;
            case 'Ajouter':
                examinationController::ModifierHospitalisation($_POST["id_medecin"],$_POST["id_hospitalisation"],$_POST['decision']);
                break;
            case 'Examiner':
                examinationController::ajouterExamination($_SESSION["id"],$_GET['id_hos']);
                break;
            case 'SupprimerPersonnel':
                PersonnelController::supprimerpersonnel($_POST['id_Personnel']);   
                break;
            case 'versAjouterpersonnel':
                PersonnelController::versAjouterpersonnel();
                break;
            case'AjoutePersonnel':
                $nom=$_POST['nom'];
                $prenom=$_POST['prenom'];
                $telephone=$_POST['telephone'];
                $email=$_POST['email'];
                $motpass=$_POST['motpass'];
                $naissance=$_POST['naissance'];
                $adresse=$_POST['adresse'];
                $rôle=$_POST['rôle'];
                $date_debut_de_travail=$_POST['date_debut_de_travail'];
                $specialité='';
                try{
                    if(isset($_POST['specialité'])){
                        throw new Exception('specalité vide');
                        $specialité=$_POST['specialité'];
                    }
                }catch(Exception $e){
                    $specialité='';
                } 
                personnelController::AjouterPersonnel($nom,$prenom,$rôle,$email,$motpass,$telephone,$adresse,$naissance,$date_debut_de_travail,$specialité);
                break;
        }
}
elseif(isset($_SESSION["login"])){
    if(($_SESSION["login"]=='infirmier'||$_SESSION["login"]=='Medecin'||$_SESSION["login"]=='chargé de réception')){
        PatientController::getAllPatient();
    }elseif($_SESSION["login"]=='Administrateur'){
        PersonnelController::AllPersonnel();
    }
}elseif(!isset($_SESSION["login"])){
    ConnexionController::versAcceuil();
}

