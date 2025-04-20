<?php
namespace App\Controller;

class LoginController {
    const LOGIN_USERNAME = "username";
    const LOGIN_PASSWORD = '5f4dcc3b5aa765d61d8327deb882cf99'; //md5('password')

    public function is_logged_in()
    {
        return isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
    }
    function login($username, $password)
    {
        if ($username === self::LOGIN_USERNAME && md5($password) === self::LOGIN_PASSWORD) {
            $_SESSION['logged_in'] = true;
            $_SESSION['username'] = $username;
            return die(json_encode(['status' => 'success','message' => 'Login Successful!']));
        }
        return die(json_encode(['status' => 'error','message' => 'Login Unsuccessful!']));
    }
    function logout()
    {
        session_unset();
        session_destroy();
        header('Location: /CloudflareApiPurgeZones');
    }
}
?>