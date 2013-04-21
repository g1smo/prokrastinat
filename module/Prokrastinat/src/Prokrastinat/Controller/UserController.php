<?php
namespace Prokrastinat\Controller;
use Zend\View\Model\ViewModel;

class UserController extends BaseController
{
	public function indexAction()
	{
		return new ViewModel();
	}
	
	public function loginAction()
	{
		$form = new \Prokrastinat\Form\Login();
		
		return new ViewModel (array(
			'form' => $form));
	}
}