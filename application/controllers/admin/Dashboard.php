<?php

class Dashboard extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->isLogged();
    }
    
    public function index()
    {
        $this->data['pageView']  = ADMIN."/dashboard";
        $this->data['dashboard'] = "1";
        $this->load->view(ADMIN.'/includes/siteMaster', $this->data);
    }
    
}

?>  