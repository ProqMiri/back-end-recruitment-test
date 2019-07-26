<?php 

use Phalcon\Mvc\Controller;
use Phalcon\Http\Request;

class RegistrationController extends Controller
{
	public function indexAction()
	{
		$this->session->remove('user-id');
		if ($this->request->isPost()) {
			if ($this->session->get('csrf') === $this->request->get('csrf')) {
				$this->session->remove('csrf');
				$name = $this->request->get('name');
			 	$username = $this->request->get('username');   
			 	$password = $this->request->get('password');   
			 	$repassword = $this->request->get('repassword');
			 	$check = true;
			 	if($password != $repassword) {
			 		$this->flashSession->error('Şifrələr eyni olmalıdır!');
			 		$check = false;
			 	}
			 	if($check)
			 	{
			 		$user = Users::query()->where('username = :username:')->bind(['username' => $username])->execute();
				 	if(!(isset($user[0]) && $user[0]->getId()))
				 	{
				 		$user = new Users();
						$user->setName($name);
						$user->setUsername($username);
						$user->setPassword($this->getDI()->getSecurity()->hash($password));
						$user->save();
						$this->session->set('user-id', $user->getId());
						$this->dispatcher->forward(array("controller"=>"Index","acton"=>"index"));
				 	}
				 	else
				 	{
				 		$this->flashSession->error('Bu adda istifadəçi artıq mövcuddur!');
				 	}
			 	}
			}
		}
		$this->session->remove('csrf');
		if(!$this->session->has('csrf'))
		{
			$this->session->set('csrf', $this->security->getToken());
		}
	}
}