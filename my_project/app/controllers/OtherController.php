<?php
use Phalcon\Mvc\Controller;
use Phalcon\Http\Response;

class OtherController extends Controller
{
    public function indexAction()
    {
    	if(!$this->session->has('user-id'))
    	{
         	$this->dispatcher->forward(array("controller"=>"Login","acton"=>"index"));
    	}
    }
}

