<?php 

use Phalcon\Mvc\Controller;

class QuestionGroupDetailedController extends Controller
{
	public function indexAction()
	{
		if(!$this->session->has('user-id'))
    	{
         	$this->dispatcher->forward(array("controller"=>"Login","acton"=>"index"));
    	}
		$id = (int)$this->dispatcher->getParam('id');
		$get = QuestionGroup::find(['user_id = :user_id: AND id = :id:', 'bind' => ['user_id' => $this->session->get('user-id'), 'id' => $id]]);
		if(!isset($get[0]))
		{
			$this->dispatcher->forward(array("controller"=>"Index","acton"=>"index"));
		}
	}
}