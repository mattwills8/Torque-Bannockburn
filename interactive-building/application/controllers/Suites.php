<?php
/**
 * Created by Michal Lichwa.
 * User: Michal
 * Date: 9/8/14
 * Time: 11:52 AM
 */
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Suites extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->database();
        $this->load->helper('url');

        $this->load->library('grocery_CRUD');
    }

    public function _suite_output($output = null)
    {
        $this->load->view('suite.php',$output);
    }

    public function suites()
    {
        $output = $this->grocery_crud->render();

        $this->_suite_output($output);

    }

    public function index()
    {
        $this->_suite_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
    }

    //
    public function suites_management()
    {
        try{
            $crud = new grocery_CRUD();

            //$crud->set_theme('datatables');

            $crud->set_table('Suite');
            $crud->set_subject('Suite');
            $crud->fields('name','building', 'vacant', 'sqr_ft', 'floor_number', 'pdf_url' );
            $crud->required_fields('name');


            $crud->display_as('name', 'Suite Name');
            $crud->display_as('building', 'Building');
            $crud->display_as('vacant', 'Vacant');
            $crud->display_as('sqr_ft', 'Square Feet');
            $crud->display_as('floor_number', 'Floor Number');
            $crud->display_as('pdf_url', 'PDF File');


            $crud->set_field_upload('pdf_url','assets/uploads/pdfs');

            //$crud->change_field_type('building', 'true_false');
            //$crud->field_type('vacant','enum',array('Yes','No'));


            //$crud->change_field_type('vacant', 'true_false');
          //  $crud->change_field_type('floor', 'true_false');

            $output = $crud->render();

            $this->_suite_output($output);

        }catch(Exception $e){
            show_error($e->getMessage().' --- '.$e->getTraceAsString());
        }
    }

}
