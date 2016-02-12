<?php

namespace TabelasAdmin\Controller;

class CampeonatoController extends CrudController
{

    public function __construct() {
        $this->entity = 'Tabelas\Entity\Campeonato';
        $this->form = 'TabelasAdmin\Form\CampeonatoForm';
        $this->service = 'Tabelas\Service\CampeonatoService';
        $this->controller = 'campeonato';
        $this->route = 'campeonato-admin';

    }

}