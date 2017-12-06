<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Class DefaultControllerTest
 *
 * @package AppBundle\Tests\Controller
 */
class DefaultControllerTest extends WebTestCase
{
    public function testHelloWorld()
    {
        $message = "Hello world!";
        $this->assertEquals("Hello world!", $message);
    }
}