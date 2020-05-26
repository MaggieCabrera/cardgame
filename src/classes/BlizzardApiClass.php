<?php 

use GuzzleHttp\Client;
use kamermans\OAuth2\GrantType\ClientCredentials;
use kamermans\OAuth2\OAuth2Middleware;
use GuzzleHttp\HandlerStack;

class BlizzardApi {

    private $http;
    
    public function __construct() {
        $this->accessApi();
    }

    public function accessApi() {
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

    public function cardList(string $type = 'minion', int $page = 1) {

        $api_url ='https://us.api.blizzard.com/hearthstone/cards?locale=en_US&collectible=1&type='.$type.'&page='.$page.'&pageSize=5&sort=name&order=desc';
        $response = $this->http->request('GET', $api_url);
        $list = json_decode($response->getBody()); 

        return $list;
    }

}
?>