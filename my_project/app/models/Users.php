<?php

use Phalcon\Mvc\Model;

class Users extends Model
{
	private $id; 
	private $name; 
	private $username;
	private $password;
    public function initialize()
    {
        $this->setSource('users');
    }
    public function setName(string $name)
    {
    	$len = mb_strlen($name);
    	if ($len<=3 && $len>100) throw new InvalidArgumentException("Invalid name");
        $this->name = $name;
    }
    public function setUsername(string $username)
    {
    	$len = mb_strlen($username);
    	if ($len<=6 && $len>100) throw new InvalidArgumentException("Invalid username");
        $this->username = $username;
    }
    public function setPassword(string $password)
    {
        $this->password = $password;
    }
    public function getName():string { return $this->name; }
    public function getUsername():string { return $this->username; }
    public function getId():int { return $this->id; }
    public function getPassword():string { return $this->password; }
}