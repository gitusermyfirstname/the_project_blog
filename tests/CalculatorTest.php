<?php

namespace App\tests;

use App\Calculator;

use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
   protected $calculator;

   // appelée avant chaque test
   public function setUp(): void
   {
       $this->calculator = new Calculator();
   }

   // appelée après chaque test
   public function tearDown(): void
   {
       // libérer les ressources ou réinitialiser l'état ici si nécessaire
       $this->calculator = null;
   }

   // appelée avant le premier test de la classe
   public static function setUpBeforeClass(): void
   {
       // effectuer des configurations communes à tous les tests ici si nécessaire
       // par exemple, vous pourriez se connecter à une base de données
   }

   // appelée après le dernier test de la classe
   public static function tearDownAfterClass(): void
   {
       // nettoyer les configurations qui ont été faites dans setUpBeforeClass()
       // par exemple, vous pourriez déconnecter d'une base de données
   }

   public function testAdd()
   {
       $result = $this->calculator->add(5, 5);
       $this->assertEquals(10, $result);
   }

   public function testSubtract()
   {
       $result = $this->calculator->subtract(10, 5);
       $this->assertEquals(5, $result);
   }
}