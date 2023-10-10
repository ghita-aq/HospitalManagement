<?php
namespace Projet\GestionHopital;

use PHPUnit\Framework\TestCase;
// use Projet\Gestion_hopital\PatientModel;


class ChambreModelTest extends TestCase{
    public function testgetchambreBynuméro(){
        $obj=ChambreModel::getchambreBynuméro('A1');
        $this->assertEquals(1,$this->$obj->id_chambre);
    }

    public function testgetChambreDisponible(){
        $obj=ChambreModel::getchambreDisponible();
        $this->assertEquals('simple',$this->$obj->type_chambre);
    }
    public function testgetChambreNonDisponible(){
        $obj=ChambreModel::getChambreNonDisponible();
        $this->assertEquals('NonDisponible',$this->$obj->état);
    }
}