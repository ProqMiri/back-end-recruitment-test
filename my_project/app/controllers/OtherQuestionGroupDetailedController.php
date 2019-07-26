<?php 

use Phalcon\Mvc\Controller;

class OtherQuestionGroupDetailedController extends Controller
{
	public function indexAction()
	{
		if(!$this->session->has('user-id'))
    	{
         	$this->dispatcher->forward(array("controller"=>"Login","acton"=>"index"));
    	}
		$id = (int)$this->dispatcher->getParam('id');
	}
}