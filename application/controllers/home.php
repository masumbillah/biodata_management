<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller
{
    public function __construct() {
        parent::__construct();
        $this->checklogin() ;
    }
    
    public function index()
    {
     
        $datav = "";
    	$this->load->view('home/index', $datav);
    }


    
    
    
    
}


