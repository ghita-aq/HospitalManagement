<?php

namespace Projet\GestionHopital;

use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertEquals;

class statistiqueModelTest extends TestCase
{
    public function testnbPatient()
    {
        assertEquals(statistiqueModel::nbPatient()->total, 23);
    }

    public function testnbHospitalisationActuel()
    {
        assertEquals(statistiqueModel::nbHospitalisationActuel()->total, 3);
    }

    public function testnbInfirmier()
    {
        assertEquals(statistiqueModel::nbInfirmier()->total, 4);
    }

    public function testnbMedecin()
    {
        assertEquals(statistiqueModel::nbMedecin()->total, 5);
    }
}
