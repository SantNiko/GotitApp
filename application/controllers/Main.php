<?php
class Main extends CI_Controller {
    
        public function index()
        {
            
                //$this->load->view('main/landpage');
        }
        public function showLandPage()
        {
                $this->load->view('main/landpage');
        }
        
        public function showLogin()
        {       
                $this->load->helper('url');
                $this->load->template('main/login');
                //$this->load->view('main/login');
        }
        
        
}