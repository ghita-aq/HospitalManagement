<?php
namespace Projet\GestionHopital;

use Exception;
use PHPUnit\Framework\TestCase;
// use Projet\Gestion_hopital\PatientModel;


class ConsultationModelTest extends TestCase{
  

    public function testinsererConsultation(){
        $this->assertEquals(true,ConsultationModel::insererConsultation('2023',20,4));
    }
    public  function testdeleteConsultation($id)
    {
        $this->assertEquals(True,ConsultationModel::deleteConsultation(1));
    }
    public function testgetConsultationParMedcin(){
        $obj=ConsultationModel::getConsultationParMedcin(2);
        $this->assertEquals('2023-02-22',$obj->date_consultation);
}
    public function testgetConsultationById(){
        $obj=ConsultationModel::getConsultationById(2);
        $this->assertEquals(2,$obj->id_patient);
    }
    public function testdeleteConsultationn(){
        $this->assertEquals(True,ConsultationModel::deleteConsultation(10));
    }
    public function testupdateConsultation(){
       ConsultationModel::updateConsultation('','','','');
        $this->expectError();
    }
}