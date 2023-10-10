<?php
namespace Projet\GestionHopital;
use PHPUnit\Framework\TestCase;
require 'vendor/autoload.php';

class examinationModelTest extends TestCase{

    public function  testgetexaminationByid_medecin(){
        $med=examinationModel:: getexaminationByid_medecin(1);
        
        $this->assertEquals($med->specialité,'Rhumatologie');
    }

    public function testmodifierExamination(){
        $this->assertEquals(true,examinationModel::modifierExamination(1,1,''));
    }



    public function testajouterExamination(){
        $this->assertEquals(true,examinationModel::ajouterExamination(1,4));
}
}

