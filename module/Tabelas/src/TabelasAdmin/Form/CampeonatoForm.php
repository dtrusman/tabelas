<?php

namespace TabelasAdmin\Form;

use Zend\Form\Form;

class CampeonatoForm extends Form
{

    public function __construct($name = null)
    {
        parent::__construct('campeonato');

        $this->setAttribute('method', 'post');
        $this->setInputFilter(new CampeonatoFilter);

        $this->add(array(
            'name' => 'id',
            'attributes' => array(
                'type' => 'hidden'
            )
        ));

        $this->add(array(
            'name' => 'nome',
            'options' => array(
                'type' => 'text'
            ),
            'attributes' => array(
                'id' => 'nome',
                'placeholder' => 'Nome do Campeonato',
                'class' => 'form-control',
                'onkeyup' => 'valida_nome()'
            )
        ));

        $this->add(array(
            'name' => 'ano',
            'options' => array(
                'type' => 'text'
            ),
            'attributes' => array(
                'id' => 'ano',
                'placeholder' => 'Ano do campeonato',
                'class' => 'form-control',
                'maxLength' => 4,
                'onkeyup' => 'valida_ano()'
            )
        ));

        $this->add(array(
            'name' => 'submit',
            'type' => 'Zend\Form\Element\Submit',
            'attributes' => array(
                'value' => 'Salvar',
                'class' => 'btn btn-primary'
            )
        ));
    }
}