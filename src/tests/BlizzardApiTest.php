<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client;
use kamermans\OAuth2\GrantType\ClientCredentials;
use kamermans\OAuth2\OAuth2Middleware;
use GuzzleHttp\HandlerStack;

class BlizzardApiTest extends TestCase {

    private $http;

    protected function setUp(): void {
        $oAuth2Client = new Client([
            'base_uri' => 'https://eu.battle.net/oauth/token',
        ]);
        $oAuth2Config = [
            'client_id' => $_ENV['CLIENT_ID'],
            'client_secret' => $_ENV['CLIENT_SECRET'],
        ];
        $clientCredentials = new ClientCredentials($oAuth2Client, $oAuth2Config);
        $oauth = new OAuth2Middleware($clientCredentials);

        $stack = HandlerStack::create();
        $stack->push($oauth);

        $this->http = new Client([
            'handler' => $stack,
            'auth'    => 'oauth',
        ]);
    }

    public function testGet() {
        $api_url ='https://us.api.blizzard.com/hearthstone/cards';
        $response = $this->http->request('GET', $api_url);

        $this->assertEquals(200, $response->getStatusCode());

        $contentType = $response->getHeader('content-type')[0];
        $this->assertEquals("application/json; charset=utf-8", $contentType);
    }

    protected function tearDown(): void {
        $this->http = null;
    }

}