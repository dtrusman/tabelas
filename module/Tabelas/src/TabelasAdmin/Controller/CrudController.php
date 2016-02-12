<?php

namespace TabelasAdmin\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Paginator\Paginator,
    Zend\Paginator\Adapter\ArrayAdapter;


abstract class CrudController extends AbstractActionController
{

    protected $em;
    protected $service;
    protected $entity;
    protected $form;
    protected $route;
    protected $controller;

    /**
    * @var EntityManager
    */
    public function indexAction()
    {
        $list = $this->getEntityManager()
                     ->getRepository($this->entity)
                     ->findAll();

        $page = $this->params()->fromRoute('page');

        $paginator = new Paginator(new ArrayAdapter($list));
        $paginator->setCurrentPageNumber($page);
        $paginator->setDefaultItemCountPerPage(5);

        return new ViewModel(array('data' => $paginator, 'page' => $page));
    }

    public function newAction()
    {
        $form = new $this->form();

        if($this->request->isPost())
        {
            $form->setData($this->request->getPost());
            if($form->isValid()) {
                $service = $this->getServiceLocator()->get($this->service);
                $service->insert($this->request->getPost()->toArray());

                return $this->redirect()->toRoute($this->rounte, array('controller' => $this->controller));
            }
        }

        return new ViewModel(array('form' => $form));
    }

    public function editAction()
    {
        $form = new $this->form();
        $request = $this->getRequest();

        $repository = $this->getEntityManager()->getRepository($this->entity);
        $entity = $repository->find($this->params()->fromRoute('id', 0));

        if($this->params()->fromRoute('id', 0)) {
            $form->setData($entity->toArray());
        }

        if($request->isPost()) {
            $form->setData($request->getPost());
            if($form->isValid()) {
                $service = $this->getServiceLocator()->get($this->service);
                $service->update($this->request->getPost()->toArray());

                return $this->redirect()->toRoute($this->rounte, array('controller' => $this->controller));
            }
        }

        return new ViewModel(array('form' => $form));
    }

    public function deleteAction()
    {
        $service = $this->getServiceLocator()->get($this->service);
        if($service->delete($this->params()->fromRoute('id', 0)))
            return $this->redirect()->toRoute($this->route, array('controller' => $this->controller));
    }


    protected function getEntityManager()
    {
        if(null === $this->em)
            $this->em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');

        return $this->em;
    }
}