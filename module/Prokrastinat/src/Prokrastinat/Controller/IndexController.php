<?php
namespace Prokrastinat\Controller;

use Zend\View\Model\ViewModel;
use Deska\Entity\Oglas;

class IndexController extends BaseController
{
    public function indexAction() 
    {
        $query = $this->em->createQuery("SELECT o FROM Deska\Entity\Oglas o WHERE o.datum_zapadlosti > CURRENT_DATE()");
        $query->setMaxResults(5);
        $oglasi = $query->getResult();

        return new ViewModel(array(
                'oglasi' => $oglasi, 
        ));
    }
    
    public function mapAction()
    {
        $id = $this->getEvent()->getRouteMatch()->getParam('id');
        if ($id > 6)
        {
            $id = NULL;
        }
            
        return new ViewModel(array(
            'id' => $id,
        ));
    }
}
