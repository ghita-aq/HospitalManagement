<?php
namespace Projet\GestionHopital;
use PHPUnit\Framework\TestCase;
require 'vendor/autoload.php';

class DossiermedicalmodelTest extends TestCase{

    public function testGetDossierMedical(){
        $obj=Dossiermedicalmodel::getDossierMedical(1);
        $this->assertEquals($obj->Nom,'AYTAOUI');
    }

    public function testgetOldConsulatations(){
        $tr=Dossiermedicalmodel::getOldConsulatations(1);
        
        $this->assertEquals($tr->date_consultation,'2023-01-22');
    }


    public function testgetOldHospitalisations(){
        $hos=Dossiermedicalmodel::getOldHospitalisations(1);
        $this->assertEquals($hos->motif_entre,'Chirurgie');
}
}

