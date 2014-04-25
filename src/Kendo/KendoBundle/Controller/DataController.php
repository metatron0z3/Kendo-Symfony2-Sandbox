<?php

namespace Kendo\KendoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DataController extends Controller
{
    public function indexAction()
    {
        $name = 'Works!';
        return $this->render('KendoBundle:Data:index.html.twig', array('name' => $name));
    }
    
    public function datasourceAction()
    {
        $datasource = new \Kendo\Data\DataSource();
        
        return $this->render('KendoBundle:Data:datasource.html.twig', array('datasource' => $datasource));
    }
    
    public function heirarchicalDatasourceAction()
    {
        $heirarchicaldatasource = new \Kendo\Data\HierarchicalDataSource();
        
        return $this->render('KendoBundle:Data:heirarchicaldatasource.html.twig', array('heirarchicaldatasource' => $heirarchicaldatasource));
    }
}
