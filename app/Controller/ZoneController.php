<?php
namespace App\Controller;

use App\Helpers\CommonHelper;
use App\Controller\RequestController;
class ZoneController{
    private $api_url;
    private $api_key;


    public function __construct()
    {
        $this->api_url = CommonHelper::get_request_url();
        $this->api_key = CommonHelper::get_api_key();

    }

    public function get_zones($page, $search)
    {
        $request = new RequestController();

        $request->set_url($this->api_url);
        $request->set_token($this->api_key);
        $request->set_method("GET");
        $request->set_querystring_params(array("page" => $page));
        if (!empty($search))
            $request->set_querystring_params(array("search" => $search));
        $request->send_request();
        return $request->get_response();
    }


    public function purge_cache($zone_id)
    {
        $request = new RequestController();
        $post_data = json_encode([
            "purge_everything" => true
        ]);
        $request->set_body($post_data);
        $request->set_url($this->api_url. $zone_id. "/purge_cache");
        $request->set_token($this->api_key);
        $request->set_method("POST");
        $request->send_request();
        return $request->get_response();
    }
}
