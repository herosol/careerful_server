<?php

class Job_levels extends Admin_Controller
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
        $this->data['pageView'] = ADMIN . '/job_levels';

        $this->data['rows'] = $this->master->getRows('job_levels', array(), '', '', 'acs', '');
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function manage()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/job_levels';
        if ($this->input->post()) {
            $vals = $this->input->post();

            $this->master->save('job_levels', $vals, 'id', $this->uri->segment(4));
            setMsg('success', 'Job Levels has been saved successfully.');
            if(empty(intval($this->uri->segment(4)))){
                redirect(ADMIN . '/job_levels', 'refresh');
                exit;
            }
        }

        $this->data['row'] = $this->master->getRow('job_levels', array('id' => $this->uri->segment('4')));
        $this->data['page_title'] = $this->data['row'] ? "Edit Job Level" : "Add New Job Level";
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function delete()
    {
        $this->master->delete('job_levels', 'id', $this->uri->segment(4));
        setMsg('success', 'Job Levels has been deleted successfully.');
        redirect(ADMIN . '/job_levels', 'refresh');
    }

}

?>
