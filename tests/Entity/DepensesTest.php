<?php

namespace App\Tests\Entity;

use App\Entity\Depenses;
use App\Entity\Members;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class DepensesTest extends KernelTestCase
{
    public function getDepenses($montant=null,$datePaiment=null, $beneficiaire=null,?Members $members){
        return (new Depenses)->setMontant($montant)->setDatePaiement($datePaiment)
                                ->setBeneficiaire($beneficiaire)->setMember($members);
    }
   
    public function testGetterSetterMontant(){
        $depense=$this->getDepenses(100.3,null,null,new Members());
        $this->assertEquals(100.3,$depense->getMontant(),"error: testGetterSetterMontant()");
    }

    public function testGetterSetterDatePaiement(){
        $depense=$this->getDepenses(100.3,new DateTime(),null,new Members());
        $this->assertEquals((new DateTime())->format("d m Y"),$depense->getDatePaiement()->format("d m Y"),"error: testGetterSetterDatePaiement()");
    }

    public function testGetterSetterBeneficaire(){
        $depense=$this->getDepenses(100.3,new DateTime(),"banque",new Members());
        $this->assertEquals("banque",$depense->getBeneficiaire(),"error: testGetterSetterBeneficaire()");
    }

    public function testGetterSetterMembers(){
        $members=(new Members)->setNom("Nom");
        $depense=$this->getDepenses(100.3,new DateTime(),"banque",$members);
        $this->assertEquals("Nom",$depense->getMember()->getNom(),"error: testGetterSetterMembers()");
    }
}
