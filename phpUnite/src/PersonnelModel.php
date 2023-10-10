<?php
namespace Projet\GestionHopital;
require_once('Model.php');
use PDO;
class PersonnelModel{
    public static function getAllPersonnel(){
        $stm=Model::executerRequete('select * from Personnel',[]);
        $result = $stm->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
    public static function deletepersonnel($id_Personnel){
        $stm=Model::executerRequete('select * from medecin where id_personnel=?',[$id_Personnel]);
        if($stm->rowCount() == 1){
            $obj_medecin = $stm->fetch(PDO::FETCH_OBJ);
            $flag1=Model::executerRequete('delete from Examination where id_medecin=?',[$obj_medecin->id_medecin]);
            $flag2=Model::executerRequete('delete from consultation where id_medecin=?',[$obj_medecin->id_medecin]);
            $flag3=Model::executerRequete('delete from medecin where id_medecin=?',[$obj_medecin->id_medecin]);
        }
        $flag=Model::executerRequete('delete from Personnel where id_Personnel=?',[$id_Personnel]);
        return $flag;
    }
    public static function AjouterPersonnel($NOM,$PRENOM,$ROLE,$Email,$PASSWORD,$TELEPHONE,$ADRESSE,$NAISSANCE,$DATEDEBUT,$specialité){
        $flag=Model::executerRequete("INSERT INTO Personnel (nom,prenom ,rôle ,email ,motdepass,telephone ,adresse ,date_naissance ,date_debut_de_travail) values 
        ('$NOM','$PRENOM','$ROLE','$Email','$PASSWORD','$TELEPHONE','$ADRESSE','$NAISSANCE','$DATEDEBUT')",[]);
        if($specialité!=''){
            $stm1=Model::executerRequete('SELECT LAST_INSERT_ID() as id_personnel',[]);
            $obj_personnel = $stm1->fetch(PDO::FETCH_OBJ);
            $stm2=Model::executerRequete('insert into medecin values(default,:s,:ip)',[
                ':s'=>$specialité,
                'ip'=>$obj_personnel->id_personnel
            ]);
        }
        return $flag;
    }
   
}