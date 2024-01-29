<?php

class UserModel
{
    // Access Modifier = public, private, protected
    private $name;
    private $email;
    private $password;
    private $profile_image;
    private $is_confirmed;
    private $is_active;
    private $is_login;
    private $token;
    private $date;

    public function setName($name)
    {
        $this->name = $name;
    }
    public function getName()
    {
        return $this->name;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function getEmail()
    {
        return $this->email;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }
    public function getPassword()
    {
        return $this->password;
    }

    public function setProfileImage($profile_image)
    {
        $this->profile_image = $profile_image;
    }
    public function getProfileImage()
    {
        return $this->profile_image;
    }

    public function setIsConfirmed($is_confirmed)
    {
        $this->is_confirmed = $is_confirmed;
    }
    public function getIsConfirmed()
    {
        return $this->is_confirmed;
    }

    public function setIsActive($is_active)
    {
        $this->is_active = $is_active;
    }
    public function getIsActive()
    {
        return $this->is_active;
    }

    public function setIsLogin($is_login)
    {
        $this->is_login = $is_login;
    }
    public function getIsLogin()
    {
        return $this->is_login;
    }

    public function setToken($token)
    {
        $this->token = $token;
    }
    public function getToken()
    {
        return $this->token;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }
    public function getDate()
    {
        return $this->date;
    }

    public function toArray() {
        return [
            "name" => $this->getName(),
            "email" => $this->getEmail(),
            "password" => $this->getPassword(),
            "profile_image" => $this->getProfileImage(),
            "is_confirmed" => $this->getIsConfirmed(),
            "is_active" => $this->getIsActive(),
            "is_login" => $this->getIsLogin(),
            "token" => $this->getToken(),
            "date" => $this->getDate()
        ];
    }
}