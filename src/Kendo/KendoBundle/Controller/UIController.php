<?php

namespace Kendo\KendoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UIController extends Controller
{
    public function indexAction()
    {
        $name = 'Works';
        return $this->render('KendoBundle:UI:index.html.twig', array('name' => $name));
    }
    
    public function calendarAction()
    {
        $calendar = new \Kendo\UI\Calendar();
        
        return $this->render('KendoBundle:UI:calendar.html.twig', 
                [
                    'calendar' => $calendar
                ]
        );
    }
    
    public function datePickerAction()
    {
        $datepicker = new \Kendo\UI\DatePicker();
        
        return $this->render('KendoBundle:UI:datepicker.html.twig', array('datepicker' => $datepicker));
    }
    
    public function dropDownListAction()
    {
        $sampledata = ['option1', 'option2', 'option3', 'option4'];
        $jsonsample = json_encode($sampledata, JSON_FORCE_OBJECT);

        
        $dropdownlist = new \Kendo\UI\DropDownList($jsonsample);
        //calling dataSource just sets it. same as passing it in
        $withdata = $dropdownlist->dataSource($sampledata);
        
        return $this->render('KendoBundle:UI:dropdownlist.html.twig', 
                [
                    'sampledata'    => $sampledata,
                    'dropdownlist'  => $dropdownlist,
                    'jsonsample'    => $jsonsample
                ]
        );
    }
    
    public function gridAction()
    {
        $grid = new \Kendo\UI\Grid($id);
        
        return $this->render('KendoBundle:UI:grid.html.twig', array('grid' => $grid));
    }
    
    public function tooltipAction()
    {
        $tooltip = new \Kendo\UI\Tooltip($id);
        
        return $this->render('KendoBundle:UI:tooltip.html.twig', array('tooltip' => $tooltip));
    }
    
    public function treeViewAction()
    {
        $treeview = new \Kendo\UI\TreeView($id);
        
        return $this->render('KendoBundle:UI:treeview.html.twig', array('treeview' => $treeview));
    }
    
    public function uploadAction()
    {
        $upload = new \Kendo\UI\Upload($value);
        
        return $this->render('KendoBundle:UI:upload.html.twig', array('upload' => $upload));
    }
}
