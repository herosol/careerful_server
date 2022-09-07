<?php

class Job_degree extends Admin_Controller
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
        $this->data['pageView'] = ADMIN . '/job_degree';

        $this->data['rows'] = $this->master->getRows('job_degree', array(), '', '', 'acs', '');
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function manage()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/job_degree';
        if ($this->input->post()) {
            $vals = $this->input->post();

            $this->master->save('job_degree', $vals, 'id', $this->uri->segment(4));
            setMsg('success', 'Job Degree Requirement has been saved successfully.');
            if(empty(intval($this->uri->segment(4)))){
                redirect(ADMIN . '/job_degree', 'refresh');
                exit;
            }
        }

        $this->data['row'] = $this->master->getRow('job_degree', array('id' => $this->uri->segment('4')));
        $this->data['page_title'] = $this->data['row'] ? "Edit Job Degree Requirement" : "Add New Job Degree Requirement";
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function delete()
    {
        $this->master->delete('job_degree', 'id', $this->uri->segment(4));
        setMsg('success', 'Job Degree Requirement has been deleted successfully.');
        redirect(ADMIN . '/job_degree', 'refresh');
    }

}

?>
