<?php
namespace App\Helpers;

class CommonHelper{
    public function get_cdn_url()
    {
        return "http://localhost:8888/CloudflareApiPurgeZones";
    }

    public static function get_request_url()
    {
        return "https://api.cloudflare.com/client/v4/zones/";
    }

    public static function get_api_key()
    {
        return "Bearer Your API Key";
    }
}
?>