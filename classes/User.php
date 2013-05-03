<?php

class User extends Database
{
    public $id = null;
    public $username = null;
    public $realname = null;
    public $email = null;
    public $website = null;
    public $born = null;
    public $about = null;

    public function isLoggedIn()
    {
        switch ($_COOKIE['security']) {
            case 0:
                $isLoggedIn = (isset($_COOKIE['username'], $_COOKIE['uid']));
                break;
            case 1:
                break;

            case 10:
                $id = base64_decode($_COOKIE['uid']);
                $user = base64_decode($_COOKIE['username']);
                $fingerprint = hash('sha512', $id.$_SERVER['USER_AGENT'].$_SERVER['REMOTE_ADDR'].$user);
                $isLoggedIn = ($fingerprint === $_SESSION['fingerprint']);
                break;

            default:
                $isLoggedIn = false;
        }
        return $isLoggedIn;
    }

    public function getUsername()
    {
        switch($_COOKIE['security']) {
            case 0:
                $username = $_COOKIE['username'];
                break;
            case 1:
                $username = $_COOKIE['username'];
                break;
            case 10:
                $username = base64_decode($_COOKIE['username']);
                break;
        }

        return $username;
    }

    public function loadPublicData()
    {
        switch ($_COOKIE['security']) {
            case 0:
            case 1:
                $id = $_COOKIE['uid'];
                break;
            case 10:
                $id = base64_decode($_COOKIE['uid']);
                break;
        }

        $sql = 'SELECT id, username, realname, email, website, born, about FROM users WHERE id=:id';
        $stmt = $this->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        foreach ($data as $column => $value) {
            $this->{$column} = $value;
        }
    }
}