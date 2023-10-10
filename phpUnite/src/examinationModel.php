<?php
namespace Projet\GestionHopital;
require_once('Model.php');
use PDO;
class examinationModel
    {
        public static function getexaminationByid_medecin(string $id)
    {
        $stm = Model::executerRequete("select e.*,h.id_chambre,h.id_patient,concat(p.Nom,' ',p.prenom) as nomcomplet from examination e join Hospitalisation h on h.id_hospitalisation=e.id_hospitalisation join patient p on p.id_patient=h.id_patient where e.id_medecin=?", [$id]);
        $result = $stm->fetch(PDO::FETCH_OBJ);
        return $result;
    }
    public static function modifierExamination($id_medecin,$id_hospitalisation,$decision){
        $flag = Model::executerRequete("update Examination set decision=:d,date_exam=current_date() where id_medecin=:im and id_hospitalisation=:ih", [
            ':d'=>$decision,
            ':im'=>$id_medecin,
            ':ih'=>$id_hospitalisation
        ]);
        return $flag;
    }
    public static function ajouterExamination($id_medecin,$id_hospitalisation){
        $stm=Model::executerRequete('select * from Examination where id_medecin=:im and id_hospitalisation=:ih',[
            ':im'=>$id_medecin,
            ':ih'=>$id_hospitalisation
        ]);
        if($stm->rowCount() == 1){
            return $stm;
        }else{
        $flag=Model::executerRequete('insert into Examination values (:im,:ih,"0000-00-00","")',[
            ':im'=>$id_medecin,
            ':ih'=>$id_hospitalisation
        ]);
        return $flag;
        }
        
    }
}