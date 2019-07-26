<?php 

use Phalcon\Mvc\Controller;

class LoginController extends Controller
{
	public function indexAction()
	{
		$this->session->remove('user-id');
		if($this->request->isPost()) {
			if($this->session->get('csrf-login') === $this->request->get('csrf-login')) {
				$this->session->remove('csrf-login');
			 	$this->username = $this->request->get('username');
			 	$password =$this->request->get('password');
			 	$user = Users::find(['username = :username:', 'bind' => ['username' => $this->username]]);
				if(isset($user[0]) && $this->security->checkHash($password, $user[0]->getPassword()))
			 	{
					$this->session->set('user-id', $user[0]->getId());
					$this->dispatcher->forward(array("controller"=>"Index","acton"=>"index"));
			 	}
			 	else
			 	{
			 		$this->flashSession->error('Belə istifadəçi mövcud deyil!');
			 	}
			}
		}
		else if(!$this->session->has('csrf-login'))
		{
			$this->session->set('csrf-login', $this->security->getToken());
		}
	}
}