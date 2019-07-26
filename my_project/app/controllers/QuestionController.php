<?php 

use Phalcon\Mvc\Controller;

class QuestionController extends Controller
{
	public function indexAction()
	{
		if(!$this->session->has('user-id'))
    	{
         	$this->dispatcher->forward(array("controller"=>"Login","acton"=>"index"));
    	}
		$question_id = (int)$this->dispatcher->getParam('question_id');
		$question_group_id = (int)$this->dispatcher->getParam('question_group_id');
		$get = QuestionGroup::find(['user_id = :user_id: AND id = :id:', 'bind' => ['user_id' => $this->session->get('user-id'), 'id' => $question_group_id]]);
		if(!isset($get[0]))
		{
			$this->dispatcher->forward(array("controller"=>"Index","acton"=>"index"));
		}
		if($this->request->isPost())
		{
			if($this->session->get('csrf-question') === $this->request->get('csrf-question')) {
				$this->session->remove('csrf-question');
			 	$name = $this->request->get('name');
			 	$answer = $this->request->get('answer');
			 	$check = true;
			 	$iter = 0;
			 	foreach($answer as $key => $value)
			 	{
			 		if(mb_strlen(trim($value)) <= 10) $check = false;
			 		$iter = $key;
			 	}
			 	if(!$check)
			 	{
			 		$this->session->set('csrf-question', $this->security->getToken());
			 		$this->flashSession->error('Cavablarda səhv var!');
			 	}
			 	else
			 	{
			 		$question = new Question();
			 		$question->setName($name);
			 		$question->setQuestionGroupId($question_group_id);
			 		$question->save();
			 		$correct = rand(0, $iter);
			 		foreach($answer as $key => $value)
				 	{
				 		$answer = new Answer();
				 		$answer->setName($value);
				 		$answer->setIsAnswer($correct == $key ? 1 : 0);
				 		$answer->setQuestionId($question->getId());
				 		$answer->save();
				 	}
			 		$this->dispatcher->forward([
					    "controller" => "questiongroupdetailed",
					    "action"     => "index",
					    "params"     => ['id' => $question_group_id]
					]);
			 	}
			}
		}
		else if(!$this->session->has('csrf-question'))
		{
			$this->session->set('csrf-question', $this->security->getToken());
		}
	}
}