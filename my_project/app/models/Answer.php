<?php

use Phalcon\Mvc\Model;

class Answer extends Model
{
	private $id; 
    private $name;
    private $question_id;
	private $is_answer;
    public function initialize()
    {
        $this->setSource('answers');
        $this->belongsTo(
            'question_id',
            'Question',
            'id'
        );
    }
    public function setName(string $name)
    {
    	$len = mb_strlen($name);
    	if ($len<=10 && $len>4000) throw new InvalidArgumentException("Invalid name");
        $this->name = $name;
    }
    public function setQuestionId(int $question_id)
    {
        $this->question_id = $question_id;
    }
    public function setIsAnswer(int $is_answer)
    {
        $this->is_answer = $is_answer;
    }
    public function getName():string { return $this->name; }
    public function getId():int { return $this->id; }
    public function getIsAnswer():int { return $this->is_answer; }
    public function getQuestionId():int { return $this->question_id; }
}