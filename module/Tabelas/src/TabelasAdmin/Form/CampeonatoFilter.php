<?php

namespace TabelasAdmin\Form;

use Zend\InputFilter\InputFilter;

class CampeonatoFilter extends InputFilter
{

    public function __construct()
    {
        $this->add(array(
            'name' => 'nome',
            'required' => true,
            'filters' => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim')
            ),
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'options' => array(
                        'messages' => array('isEmpty' => 'Nome não pode ser nulo')
                    )
                ),
                array(
                    'name' => 'StringLength',
                    'options' => array(
                        'min' => 3,
                        'messages' => array('stringLengthTooShort' => 'Deve ser maior que 3')
                    )
                ),
            )
        ));

        $this->add(array(
            'name' => 'ano',
            'required' => true,
            'filters' => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim')
            ),
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'options' => array(
                        'messages' => array('isEmpty' => 'Ano não pode ser nulo')
                    )
                ),
                array(
                    'name' => 'StringLength',
                    'options' => array(
                        'min' => 4,
                        'max' => 4,
                        'messages' => array('stringLengthTooShort' => 'Deve ter no min 4'),
                        'messages' => array('stringLengthTooLong' => 'Deve ter no max 4'),
                    )
                ),
            )
        ));
    }
}