<?php

namespace Tabelas\Service;

use Doctrine\ORM\EntityManager;

class CampeonatoService extends AbstractService
{

    public function __construct(EntityManager $em)
    {
        parent::__construct($em);
        $this->entity = 'Tabelas\Entity\Campeonato';
    }

}