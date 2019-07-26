<?php 

use Phalcon\Mvc\Controller;

class QuestionGroupController extends Controller
{
	public function indexAction()
	{
		if(!$this->session->has('user-id'))
    	{
         	$this->dispatcher->forward(array("controller"=>"Login","acton"=>"index"));
    	}
		$id = (int)$this->dispatcher->getParam('id');
		if($this->request->isPost()) {
			if($this->session->get('csrf-question-group') === $this->request->get('csrf-question-group')) {
				$this->session->remove('csrf-question-group');
			 	$name = $this->request->get('name');
			 	$questionGroup = new QuestionGroup();
			 	$questionGroup->setName($name);
			 	$questionGroup->setUserId($this->session->get('user-id'));
			 	$questionGroup->save();
			 	$this->dispatcher->forward(array("controller"=>"index", "acton"=>"index"));
			}
		}
		else if(!$this->session->has('csrf-question-group'))
		{
			$this->session->set('csrf-question-group', $this->security->getToken());
		}
	}
}