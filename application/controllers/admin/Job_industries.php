<?php

class Job_industries extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->isLogged();
        has_access(7);
    }

    function index()
    {
        $this->data['enable_datatable'] = TRUE;
        $this->data['pageView'] = ADMIN . '/job_industries';

        $this->data['rows'] = $this->master->getRows('job_industries', array(), '', '', 'acs', '');
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function manage()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/job_industries';
        if ($this->input->post()) {
            $vals = $this->input->post();

            $this->master->save('job_industries', $vals, 'id', $this->uri->segment(4));
            setMsg('success', 'Job Industry has been saved successfully.');
            if(empty(intval($this->uri->segment(4)))){
                redirect(ADMIN . '/job_industries', 'refresh');
                exit;
            }
        }

        $this->data['row'] = $this->master->getRow('job_industries', array('id' => $this->uri->segment('4')));
        $this->data['page_title'] = $this->data['row'] ? "Edit Job Industry" : "Add New Job Industry";
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function delete()
    {
        $this->master->delete('job_industries', 'id', $this->uri->segment(4));
        setMsg('success', 'Job Industry has been deleted successfully.');
        redirect(ADMIN . '/job_industries', 'refresh');
    }

}

?>
