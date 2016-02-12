<?php

    namespace Tabelas\Entity;

    use Doctrine\ORM\Mapping as ORM;

    /**
    * @ORM\Entity
    * @ORM\Table(name="campeonato")
    * @ORM\Entity(repositoryClass="Tabelas\Entity\CampeonatoRepository")
    */
    class Campeonato
    {

        public function __construct($options = null)
        {
            Configurator::configure($this, $options);
        }

        /**
        * @ORM\Id
        * @ORM\Column(type="integer")
        * @ORM\GeneratedValue
        * @var int
        */
        private $id;

        /**
        * @ORM\Column(type="text")
        * @var string
        */
        private $nome;

        /**
        * @ORM\Column(type="integer", length=4)
        */
        private $ano;

        public function getId()
        {
            return $this->id;
        }

        public function getNome()
        {
            return $this->nome;
        }

        public function setNome($nome)
        {
            return $this->nome = $nome;
        }

        public function getAno()
        {
            return $this->ano;
        }

        public function setAno($ano)
        {
            return $this->ano = $ano;
        }

        public function __toString()
        {
            return $this->nome;
        }

        public function toArray()
        {
            return array('id' => $this->getId(), 'nome' => $this->getNome(), 'ano' => $this->getAno());
        }
    }