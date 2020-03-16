<?php
class Menumaster extends CI_controller{

   

public function __construct(){
parent::__construct();

    
}


public function index(){
    
    $this->load->view('master/header'); 
    $this->load->view('master/daftarmaster'); 
    $this->load->view('master/footer');
    
    }
    }

?>



