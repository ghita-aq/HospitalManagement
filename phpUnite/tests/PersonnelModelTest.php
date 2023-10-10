<?php
namespace Projet\GestionHopital;
use PHPUnit\Framework\TestCase;

class PersonnelModelTest extends TestCase{
    public function testDeletePersonnel(){
        $this->assertEquals(True,PersonnelModel::deletepersonnel(10));
    }
    public function testAjouterPersonnel(){
        $this->assertEquals(True,PersonnelModel::AjouterPersonnel('safae','alami','infirmier','safaeAlami@gmail.com','1234','086757215','atlas','1999-12-22','2023-01-01',''));
    }
}