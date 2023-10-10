<?php
namespace Projet\GestionHopital;

use Exception;
use PHPUnit\Framework\TestCase;
// use Projet\Gestion_hopital\PatientModel;


class PatientModelTest extends TestCase{
    public function testGetPatienteById(){
        $obj=PatientModel::getPatienteById(1);
        $this->assertEquals('AZIZ',$obj->Prenom);
    }

    public function testInsererHospitalisation(){
        PatientModel::insererHospitalisation('','','','');
        $this->expectException(Exception::class);
    }
    public function testModifierHospitalisation(){
        PatientModel::modifierHospitalisation('operation réussit',20);
        $this->expectError();
    }
}