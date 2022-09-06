<?php

class Job_companies extends Admin_Controller
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
        $this->data['pageView'] = ADMIN . '/job_companies';

        $this->data['rows'] = $this->master->getRows('job_companies', array(), '', '', 'acs', '');
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function manage()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/job_companies';
        if ($this->input->post()) {
            $vals = $this->input->post();
            if (isset($_FILES["image"]["name"]) && $_FILES["image"]["name"] != "") {
                $image1 = upload_file(UPLOAD_PATH.'companies/', 'image');
                    generate_thumb(UPLOAD_PATH . "companies/", UPLOAD_PATH . "companies/", $image1['file_name'],100,'thumb_');
                $vals['image']=$image1['file_name'];
            }

            $this->master->save('job_companies', $vals, 'id', $this->uri->segment(4));
            setMsg('success', 'Job Category has been saved successfully.');
            if(empty(intval($this->uri->segment(4)))){
                redirect(ADMIN . '/job_companies', 'refresh');
                exit;
            }
        }

        $this->data['row'] = $this->master->getRow('job_companies', array('id' => $this->uri->segment('4')));
        $this->data['page_title'] = $this->data['row'] ? "Edit Job Category" : "Add New Job Category";
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function delete()
    {
        $this->master->delete('job_companies', 'id', $this->uri->segment(4));
        setMsg('success', 'Job Category has been deleted successfully.');
        redirect(ADMIN . '/job_companies', 'refresh');
    }

}

?>