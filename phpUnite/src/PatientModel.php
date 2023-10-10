<?php
namespace Projet\GestionHopital;
require_once("Model.php");
use PDO;
class PatientModel{
    public static function getPatients(){
        $stm=Model::executerRequete("
        SELECT p.*,h.id_hospitalisation,h.etat
FROM Patient p
LEFT JOIN (
    SELECT h1.*,
        CASE 
            WHEN h1.date_sortie IS NULL or h1.date_sortie='0000-00-00 'THEN 'hospitalisé'
            ELSE 'non hospitalisé'
        END AS etat
    FROM hospitalisation h1
    INNER JOIN (
        SELECT id_patient, MAX(id_hospitalisation) AS max_id
        FROM hospitalisation
        GROUP BY id_patient
    ) h2 ON h1.id_patient = h2.id_patient AND h1.id_hospitalisation = h2.max_id
) h ON p.id_patient = h.id_patient
ORDER BY p.id_patient;
        ",[]);
        $result = $stm->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
    public static function getPatientsHospitalise(){
        $stm=Model::executerRequete("
        SELECT p.*,h.id_hospitalisation,h.etat
FROM Patient p
LEFT JOIN (
    SELECT h1.*,
        CASE 
            WHEN h1.date_sortie IS NULL or h1.date_sortie='0000-00-00 'THEN 'hospitalisé'
            ELSE 'non hospitalisé'
        END AS etat
    FROM hospitalisation h1
    INNER JOIN (
        SELECT id_patient, MAX(id_hospitalisation) AS max_id
        FROM hospitalisation
        GROUP BY id_patient
    ) h2 ON h1.id_patient = h2.id_patient AND h1.id_hospitalisation = h2.max_id
) h ON p.id_patient = h.id_patient WHERE h.etat='hospitalisé'
ORDER BY p.id_patient;
        ",[]);
        $result = $stm->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
    public static function getPatienteById($id)
    {
        $stm = Model::executerRequete("
        SELECT p.*,h.id_hospitalisation,h.etat
FROM Patient p
LEFT JOIN (
    SELECT h1.*,
        CASE 
            WHEN h1.date_sortie IS NULL or h1.date_sortie='0000-00-00 'THEN 'hospitalisé'
            ELSE 'non hospitalisé'
        END AS etat
    FROM hospitalisation h1
    INNER JOIN (
        SELECT id_patient, MAX(id_hospitalisation) AS max_id
        FROM hospitalisation
        GROUP BY id_patient
    ) h2 ON h1.id_patient = h2.id_patient AND h1.id_hospitalisation = h2.max_id
) h ON p.id_patient = h.id_patient WHERE p.id_patient=?
ORDER BY p.id_patient;
        ", [$id]);
        $result = $stm->fetch(PDO::FETCH_OBJ);
        return $result;
    }
 
    public static function insererHospitalisation($date_sortie,$motif_entre,$id_chambre,$id_patient){
        $flag=Model::executerRequete("insert into hospitalisation values(default,current_date(),:d,:me,'',:ic,:ip)",[
            ":d"=>$date_sortie,
            ":me"=>$motif_entre,
            ":ic"=>$id_chambre,
            ":ip"=>$id_patient
        ]);
        $flag2=Model::executerRequete('update Chambre set état="non disponible" where id_chambre=?',[$id_chambre]);
        return $flag;
    }
    public static function modifierHospitalisation($motif_sortie,$id_hospitalisation){
        $flag=Model::executerRequete('update hospitalisation set motif_sortie=:m,date_sortie=current_date() where id_hospitalisation=:i',[
            ':m'=>$motif_sortie,
            ':i'=>$id_hospitalisation
        ]);
        $flag2=Model::executerRequete('update Chambre set état="disponible" where id_chambre=(select id_chambre from hospitalisation where id_hospitalisation=?)',[$id_hospitalisation]);
        return $flag;
    }
    public static function insertPatient($nom,$prenom,$cin,$sexe,$telephone,$naissance,$antécédents,$maladies,$sensibilité){
        $flag=model::executerRequete("INSERT INTO patient (Nom,Prenom ,Cin ,Sexe ,Telephone ,date_naissance ,Antécédents ,Maladies,Sensibilité) values 
        ('$nom','$prenom','$cin','$sexe','$telephone','$naissance','$antécédents','$maladies','$sensibilité')",[]);
        return $flag;
    }
}

