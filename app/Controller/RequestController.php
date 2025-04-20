<?php

namespace App\Controller;

class RequestController
{
    private $method;
    private $url;
    private $querystring_params;
    private $body;
    private $api_token;
    private $response;

    public function send_request()
    {
        header('Content-Type: application/json');

        $apiUrl = $this->get_url().'?';

        if ($this->get_querystring_params())
            $apiUrl.= http_build_query($this->get_querystring_params());

        $ch = curl_init($apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, strtoupper($this->get_method()));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: '.$this->get_token(),
            'Content-Type: application/json'
        ]);
        if ($this->get_body())
            curl_setopt($ch, CURLOPT_POSTFIELDS, $this->get_body());

        $response = curl_exec($ch);
        curl_close($ch);

        $this->set_response($response);
    }

    private function get_method()
    {
        return $this->method;
    }
    private function get_url()
    {
        return $this->url;
    }

    private function get_querystring_params()
    {
        return $this->querystring_params;
    }
    private function get_token()
    {
        return $this->api_token;
    }
    private function get_body()
    {
        return $this->body;
    }
    public function get_response()
    {
        return $this->response;
    }
    public function set_url($url)
    {
        $this->url = $url;
    }
    public function set_querystring_params($querystring_params)
    {
        $this->querystring_params = $querystring_params;
    }

    public function set_token($api_token)
    {
        $this->api_token = $api_token;
    }

    public function set_method($method)
    {
        $this->method = $method;
    }
    public function set_response($response)
    {
        $this->response = $response;
    }

    public function set_body($body)
    {
        $this->body = $body;
    }
}