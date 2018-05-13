<?php
class ecilaAPI {
    /*
    ecilA Link Shortener API Wrapper
    Author: Alice Peters
    Website: https://alicepeters.de/
    */
    private $username;
    private $apiKey;
    private $api = 'https://api.ecila.ga/';

    function __construct($username, $apiKey) {
        $this->username = $username;
        $this->apiKey = $apiKey;
    }

    private function getApi($params) {
        $params['username'] = $this->username;
        $params['apiKey'] = $this->apiKey;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $this->api);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($params));
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($curl);
        curl_close($curl);
        return json_decode($result);
    }

    // Get public data of the short link with the given link key (example: a1ic3).
    public function getLinkData($linkKey) {
        $params = array(
            'action' => 'getLinkData',
            'shortlink' => $linkKey
        );
        return $this->getApi($params);
    }

    // Deletes the link with the given deletion key.
    // Does not output anything else than success => true or success => false and error.
    public function deleteLink($code) {
        $params = array(
            'action' => 'deleteLink',
            'code' => $code
        );
        return $this->getApi($params);
    }

    // Adds a new short link with the given url as the target.
    public function addLink($url) {
        $params = array(
            'action' => 'addLink',
            'url' => $url
        );
        return $this->getApi($params);
    }
}