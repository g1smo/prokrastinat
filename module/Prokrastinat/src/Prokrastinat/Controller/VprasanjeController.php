<?php
namespace Prokrastinat\Controller;

use Zend\View\Model\ViewModel;

class VprasanjeController extends BaseController
{
	public function indexAction()
	{
		return new ViewModel();
	}

	public function dodajAction()
	{
	}

	public function urediAction()
	{
		$id = (int) $this->params()->fromRoute('id', 0);
	}

	public function brisiAction()
	{
		$id = (int) $this->params()->fromRoute('id', 0);
	}
}