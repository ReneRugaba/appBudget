<?php 

namespace App\Tests\Entity;

use App\Entity\Members;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class MembersTest extends KernelTestCase{

    private ValidatorInterface $validator;

    public function getMembres($nom=null,$prenom=null,$email=null,$passWord=null){
        return (new Members())->setNom($nom)->setPrenom($prenom)->setEmail($email)
                              ->setPassword($passWord);
    }

    protected function setUp(): void
    {
        self::bootKernel();
        $this->validator= self::$container->get("validator");

    }

    public function testGetterSetterNom(){
        $members=$this->getMembres("nomMember");
        $this->assertEquals("nomMember",$members->getNom(),"error: testGetterSetterNom()");
    }

    public function testGetterSetterPrenom(){
        $members=$this->getMembres("nomMember","PrenomMembers");
        $this->assertEquals("PrenomMembers",$members->getPrenom(),"error: testGetterSetterPrenom()");
    }

    public function testGetterSetterEmail(){
        $members=$this->getMembres("nomMember","PrenomMembers","email@test.com");
        $this->assertEquals("email@test.com",$members->getEmail(),"error: testGetterSetterEmail()");
    }

    public function testGetterSetterPassWord(){
        $members=$this->getMembres("nomMember","PrenomMembers","email@test.com","1MotDePasse**");
        $this->assertEquals("1MotDePasse**",$members->getPassword(),"error: testGetterSetterEmail()");
    }

    public function testGetterSetterValidator(){
        $members=$this->getMembres("nomMember","PrenomMembers","@test.com","1MotDeP");
        $error=$this->validator->validate($members);
        $this->assertCount(2,$error,"error: testGetterSetterEmail()");
    }
}