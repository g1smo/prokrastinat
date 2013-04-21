<?php
namespace Deska\Form;

use Zend\Form\Form;

class DeskaForm extends Form
{
    public function __construct()
    {
        parent::__construct();
        $this->setAttribute('method', 'post');
        
        $this->add(array(
            'name' => 'id',
            'attributes' => array(
                'type' => 'hidden',
            ),
        ));
        
        $this->add(array(
            'name' => 'naslov',
            'attributes' => array(
                'type' => 'text',
            ),
            'options' => array(
                'label' => 'Naslov',
            ),
        ));
        
        $this->add(array(
            'name' => 'vsebina',
            'attributes' => array(
                'type' => 'textarea',
                'cols' => '50',
                'rows' => '10',
            ),
            'options' => array(
                'label' => 'vsebina',
            ),
        ));
        
        // TODO: oznake
        
        $this->add(array(
           'name' => 'submit',
            'attributes' => array(
                'type' => 'submit',
                'value' => 'Dodaj',
                'id' => 'submitbutton',
            ),
        ));
    }
}