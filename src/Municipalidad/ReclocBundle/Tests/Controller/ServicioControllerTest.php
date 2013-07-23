<?php

namespace Municipalidad\ReclocBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ServicioControllerTest extends WebTestCase
{
    public function testMostrar()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/mostrar');
    }

    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/index');
    }

    public function testNew()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/new');
    }

    public function testNuevo()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/nuevo');
    }

    public function testEditar()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/editar');
    }

}
