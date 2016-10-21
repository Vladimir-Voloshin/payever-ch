<?php

namespace Payever\TestBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;


class AlbumControllerTest extends WebTestCase
{
    /**
     * Tests index url response contains specific data
     * @return boolean|null
     */
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');

        $this->assertContains('Welcome', $client->getResponse()->getContent());
    }
    
    /**
     * Tests urls return 200 code
     * @dataProvider urlProvider
     * @return boolean|null
     */
    public function testPageIsSuccessful($url)
    {
        $client = self::createClient();
        $client->request('GET', $url);

        $this->assertTrue($client->getResponse()->isSuccessful());
    }

    /**
     * Returns array of links to test
     * @return string[]
     */
    public function urlProvider()
    {
        return array(
            array('/'),
            array('/albums/'),
            array('/album/1'),
            array('/album/1/page/1'),
            // ...
        );
    }
}
