<?php


class User extends Base
{
    public $email;

    public $password;

    public $role;
    
    public $username;


    
    public static function getTableName()
    {
        return 'users';
    }

    public function getUserName(){
        return $this->username;
    }
}