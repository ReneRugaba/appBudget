<?php 

namespace App\Tests\Entity;

use App\Entity\Members;
use App\Entity\Soldes;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class SoldesTest extends KernelTestCase{

    public function getSoldes($RevenuTotal=null,$depenseTotal=null,$dateDebut=null,$dateFin=null,$member=null)
    {
        return (new Soldes)->setRevenuTotal($RevenuTotal)->setDepenseTotal($depenseTotal)
                            ->setDateDebut($dateDebut)->setDateFin($dateFin)->setMember($member);
    }

    public function testGetterSetterRevenuTotal(){
        $soldes=$this->getSoldes(10200.00);
        $this->assertEquals(10200.00,$soldes->getRevenuTotal(),"error: testGetterSetterRevenuTotal()");
    }

    public function testGetterSetterDepenseTotal(){
        $soldes=$this->getSoldes(10200.00,7040);
        $this->assertEquals(7040.00,$soldes->getDepenseTotal(),"error: testGetterSetterRevenuTotal()");
    }

    public function testGetterSetterDateDebut(){
        $soldes=$this->getSoldes(10200.00,7040,new DateTime());
        $this->assertEquals((new DateTime())->format("d m Y"),$soldes->getDateDebut()->format("d m Y"),"error: testGetterSetterRevenuTotal()");
    }

    public function testGetterSetterDateFin(){
        $soldes=$this->getSoldes(10200.00,7040,new DateTime(),new DateTime());
        $this->assertEquals((new DateTime())->format("d m Y"),$soldes->getDateFin()->format("d m Y"),"error: testGetterSetterRevenuTotal()");
    }

    public function testGetterSetterMembers(){
        $soldes=$this->getSoldes(10200.00,
                                    7040,
                                    new DateTime(),
                                    new DateTime(),
                                    (new Members)->setNom("nomMember"));

        $this->assertEquals("nomMember",$soldes->getMember()->getNom(),"error: testGetterSetterRevenuTotal()");
    }
}