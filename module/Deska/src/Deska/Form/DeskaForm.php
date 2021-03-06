<?php

namespace Deska\Form;

use Zend\Form\Form;
use Deska\Entity\Oglas;

// za validacijo
use Zend\InputFilter\Factory;
use Zend\InputFilter\InputFilter;
use Zend\Validator;

class DeskaForm extends Form 
{
    public function __construct($options) 
    {
        parent::__construct('dodaj_oglas');
        $this->setAttribute('method', 'post');

        $this->add(array(
            'name' => 'id',
            'type' => 'hidden',
        ));

        $this->add(array(
            'type' => 'Zend\Form\Element\Text',
            'name' => 'naslov',
            'options' => array(
                'label' => 'Naslov ',
            ),
            'attributes' => array(
                'id' => 'txt-naslov',
            ),
        ));
        
        $this->add(array(
            'type' => 'Zend\Form\Element\Select',
            'name' => 'kategorija',
            'options' => array(
                'label' => 'Kategorija: ',
                'value_options' => $options,
            ),
            'attributes' => array(
                'id' => 'select-kategorija',
            ),
        ));

        $this->add(array(
            'type' => 'Zend\Form\Element\Date',
            'name' => 'datum-zapadlosti',
            'options' => array(
                'label' => 'Zapade ', //
            ),
            'attributes' => array(
                'class' => 'datepicker',
                'id' => 'Datum',
                'required' => true,
                //'data-format' => 'dd.MM.yyy',
            ),
        ));

        $this->add(array(
            'type' => 'Zend\Form\Element\Textarea',
            'name' => 'vsebina',
            'options' => array(
                'label' => 'Vsebina ',
            ),
            'attributes' => array(
                'id' => 'form-textarea',
                'cols' => '250',
                'rows' => '10',
                'class' => 'editor input-xxlarge',
            ),
        ));

        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type' => 'submit',
                'value' => 'Oddaj',
                'id' => 'submitbutton',
                'class' => 'btn btn-primary',
            ),
            'options' => array(
                'primary' => true,
            ),
        ));
    }
   
    public function getInputFilter()
    {
        $factory = new Factory();
        $filter = new InputFilter();
        
        $filter->add($factory->createInput(array(
            'name' => 'id',
            'required' => true,
            'filters' => array(
                array('name' => 'Int'),
            ),
        )));
        
        $filter->add($factory->createInput(array(
            'name' => 'naslov',
            'required' => 'true',
            'filters' => array(
                array('name' => 'StringTrim')
            ),
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'options' => array(
                        'messages' => array(
                            Validator\NotEmpty::IS_EMPTY => 'Vnesite naslov oglasa!',
                        ),
                    ),
                ),
            ),
        )));
        
        $filter->add($factory->createInput(array(
            'name' => 'vsebina',
            'required' => 'true',
            'filters' => array(
                array('name' => 'StringTrim')
            ),
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'options' => array(
                        'messages' => array(
                            Validator\NotEmpty::IS_EMPTY => 'Vnesite vsebino oglasa!',
                         ),
                    ),
                ),
            ),
        )));
        
        return $filter;
    }
    
    public function fill(Oglas $o)
    {
        $this->get('id')->setValue($o->id);
        $this->get('naslov')->setValue($o->naslov);
        $this->get('vsebina')->setValue($o->vsebina);
        $this->get('datum-zapadlosti')->setValue($o->datum_zapadlosti->format('d.m.Y'));
        $this->get('kategorija')->setValue($o->kategorija->id);
    }
}