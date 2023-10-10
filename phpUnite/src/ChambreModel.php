<?php

namespace Projet\GestionHopital;

require 'vendor/autoload.php';

require_once('model.php');

use PDO;

class ChambreModel
{
  public static function getChambreDisponible()
  {
    $stm = Model::executerRequete('select * from chambre where état="disponible"', []);
    $result = $stm->fetchAll(PDO::FETCH_OBJ);
    return $result;
  }
  public static function getChambreNonDisponible()
  {
    $stm = Model::executerRequete('select * from chambre where état="non disponible"', []);
    $result = $stm->fetch(PDO::FETCH_OBJ);
    return $result;
  }
  public static function getAllchambres()
  {
    $stm = Model::executerRequete("select * from chambre");
    $result = $stm->fetchAll(PDO::FETCH_OBJ);
    return $result;
  }
  public static function getchambreBynuméro(string $chaine)
  {
    $stm = Model::executerRequete("select * from chambre where numéro like ?", ["$chaine"]);
    $result = $stm->fetchAll(PDO::FETCH_OBJ);
    return $result;
  }
}
