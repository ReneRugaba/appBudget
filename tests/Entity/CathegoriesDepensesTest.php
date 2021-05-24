<?php

namespace App\Tests\Entity;

use App\Entity\CathegoriesDepenses;
use App\Entity\Depenses;
use App\Entity\Members;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class CathegoriesDepensesTest extends KernelTestCase
{
   public function getCathegorieDepense($nom,Depenses $depense){
       return (new CathegoriesDepenses())->setNom($nom)->addDepense($depense);
   }

   public function testGetterSetterNom(){
       $cathegorieDepenses=$this->getCathegorieDepense('Loisirs',new Depenses);
        $this->assertEquals('Loisirs',$cathegorieDepenses->getNom(),"error: testGetterSetterNom()");
   }

   public function testAddGetRemove(){
    $member=(new Members)->setNom("Nom")->setPrenom("Prenom");
    $depense=(new Depenses)->setMontant(100.20)->setDatePaiement(new DateTime())->setBeneficiaire("Beneficiaire")->setMember($member);
    $cathegori=$this->getCathegorieDepense("loisir", $depense);
    $this->assertCount(1,$cathegori->getDepenses(),"error: testAddGetRemove() 1");
    $cathegori->removeDepense($depense);
    $this->assertCount(0,$cathegori->getDepenses(),"error: testAddGetRemove() 2");
   }
}
