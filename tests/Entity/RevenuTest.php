<?php 

namespace App\Tests\Entity;

use App\Entity\Members;
use App\Entity\Revenu;
use App\Entity\TypeRevenus;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class RevenuTest extends KernelTestCase{

    public function getRevenu($montant=null,DateTime $dateReception=null,$typeRevenu=null,$member=null){
        return (new Revenu())->setMontant($montant)->setDateReception($dateReception)
                            ->setMember($member)->setTypeRevenu($typeRevenu);
    }

    public function testGetterSetterMontant(){
        $revenu=$this->getRevenu(1700.45);
        $this->assertEquals(1700.45,$revenu->getMontant(),"erro: testGetterSetterMontant()");
    }

    public function testGetterSetterdateReception(){
        $revenu=$this->getRevenu(1700.45,new DateTime());
        $this->assertEquals((new DateTime())->format("d m Y"),$revenu->getDateReception()->format("d m Y"),"erro: testGetterSetterdateReception()");
    }

    public function testGetterSetterTypeRevenu(){
        $revenu=$this->getRevenu(1700.45,new DateTime(),(new TypeRevenus())->setNom("Salaire"));
        $this->assertEquals("Salaire",$revenu->getTypeRevenu()->getNom(),"erro: testGetterSetterTypeRevenu");
    }

    public function testGetterSetterMembers(){
        $revenu=$this->getRevenu(1700.45,
                                new DateTime(),
                                (new TypeRevenus())->setNom("Salaire"),
                                (new Members)->setNom("nomMembers"));
        $this->assertEquals("nomMembers",$revenu->getMember()->getNom("nomMembers"),"erro: testGetterSetterTypeRevenu");
    }
}