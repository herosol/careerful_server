<?php

class Job_locations extends Admin_Controller
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
        $this->data['pageView'] = ADMIN . '/job_locations';

        $this->data['rows'] = $this->master->getRows('job_locations', array(), '', '', 'acs', '');
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function manage()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/job_locations';
        if ($this->input->post()) {
            $vals = $this->input->post();

            $this->master->save('job_locations', $vals, 'id', $this->uri->segment(4));
            setMsg('success', 'Job Location has been saved successfully.');
            if(empty(intval($this->uri->segment(4)))){
                redirect(ADMIN . '/job_locations', 'refresh');
                exit;
            }
        }

        $this->data['row'] = $this->master->getRow('job_locations', array('id' => $this->uri->segment('4')));
        $this->data['page_title'] = $this->data['row'] ? "Edit Job Location" : "Add New Job Location";
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function delete()
    {
        $this->master->delete('job_locations', 'id', $this->uri->segment(4));
        setMsg('success', 'Job Location has been deleted successfully.');
        redirect(ADMIN . '/job_locations', 'refresh');
    }

}

?>
