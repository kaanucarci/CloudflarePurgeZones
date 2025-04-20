<?php
namespace Route;
use App\Controller\ZoneController;
use App\Controller\LoginController;

class Web
{
    private $login;
    private $request;
    private $response;
    public function __construct()
    {
        $this->login = new LoginController();
        $this->request = new ZoneController();
    }

    public function login($request)
    {
        if (isset($request['username']) && isset($request['password']))
            return $this->login->login($request['username'], $request['password']);
        else
            return json_encode(['status' => 'error','message' => 'Invalid request']);
    }

    public function request($page = 1, $search = '')
    {
        if ($this->login->is_logged_in())
            return $this->request->get_zones($page, $search);
        else
            $this->login->logout();

        return false;
    }

    public function purge_cache($zone_id)
    {
        if ($this->login->is_logged_in())
        {
            if ($zone_id)
                return $this->request->purge_cache($zone_id);
            else
                return json_encode(['status' => 'error','message' => 'Invalid request']);
        }
        else
            $this->login->logout();

        return json_encode(['status' => 'error','message' => '500 Error']);
    }

}

