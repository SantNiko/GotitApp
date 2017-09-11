<?php
class LandPage extends CI_Controller {
    
        public function index()
        {
                $this->load->view('main/landpage');
        }
        public function showLandPage()
        {
                $this->load->view('main/landpage');
        }
        
        public function showLogin()
        {
                $this->load->view('main/login');
        }
        
        
}

