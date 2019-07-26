<?php

use Phalcon\Mvc\Model;

class QuestionGroup extends Model
{
	private $id; 
	private $name; 
	private $user_id;
    public function initialize()
    {
        $this->setSource('question_group');
    }
    public function setName(string $name)
    {
    	$len = mb_strlen($name);
    	if ($len<=10 && $len>4000) throw new InvalidArgumentException("Invalid name");
        $this->name = $name;
    }
    public function setUserId(int $user_id)
    {
        $this->user_id = $user_id;
    }
    public function getName():string { return $this->name; }
    public function getId():int { return $this->id; }
}