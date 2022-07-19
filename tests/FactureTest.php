<?php

namespace App\Tests;

use App\Entity\Facture;
use PHPUnit\Framework\TestCase;

class FactureTest extends TestCase
{
    public function testDesignation()
    {
        $facture=new Facture();
        $facture->setDesignation("test_des");
        $this->assertTrue($facture->getDesignation()=="test_des");
    }
    public function testDescription()
    {
        $facture=new Facture();
        $facture->setDescription("test_description");
        $this->assertTrue($facture->getDescription()=="test_description");
    }

    public function testPrixHt()
    {
        $facture=new Facture();
        $facture->setPrixHt(50);
        $this->assertTrue($facture->getPrixHt()==50);
    }
    public function testPrixTTc()
    {
        $facture=new Facture();
        $facture->setPrixTtc(50);
        $this->assertTrue($facture->getPrixTtc()==50);
    }
    public function testPrixTTc2($ht=50)
    {
        $facture=new Facture();
        $facture->setPrixTtc($ht+$ht*20/100);
        $this->assertTrue($facture->getPrixTtc()==$ht+$ht*20/100);
    }
}
