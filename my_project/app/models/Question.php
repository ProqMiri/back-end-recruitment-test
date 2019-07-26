<?php

use Phalcon\Mvc\Model;

class Question extends Model
{
	private $id; 
    private $name;
    private $question_group_id;
	private $correct_answer_id;
    public function initialize()
    {
        $this->setSource('questions');
        $this->hasMany(
            'id',
            'Answer',
            'question_id'
        );
    }
    public function setName(string $name)
    {
    	$len = mb_strlen($name);
    	if ($len<=10 && $len>4000) throw new InvalidArgumentException("Invalid name");
        $this->name = $name;
    }
    public function setQuestionGroupId(int $question_group_id)
    {
        $this->question_group_id = $question_group_id;
    }
    public function getName():string { return $this->name; }
    public function getId():int { return $this->id; }
    public function getQuestionGroupId():int { return $this->question_group_id; }
}