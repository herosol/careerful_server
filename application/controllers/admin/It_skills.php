<?php

class It_skills extends Admin_Controller
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
        $this->data['pageView'] = ADMIN . '/it_skills';

        $this->data['rows'] = $this->master->getRows('it_skills', array(), '', '', 'acs', 'id');
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function manage()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/it_skills';
        if ($this->input->post()) {
            $vals = $this->input->post();

            $this->master->save('it_skills', $vals, 'id', $this->uri->segment(4));
            setMsg('success', 'IT Skill has been saved successfully.');
            if(empty(intval($this->uri->segment(4)))){
                redirect(ADMIN . '/it_skills', 'refresh');
                exit;
            }
        }

        $this->data['row'] = $this->master->getRow('it_skills', array('id' => $this->uri->segment('4')));
        $this->data['page_title'] = $this->data['row'] ? "Edit IT Skill" : "Add New IT Skill";
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function delete()
    {
        $this->master->delete('it_skills', 'id', $this->uri->segment(4));
        setMsg('success', 'IT Skill has been deleted successfully.');
        redirect(ADMIN . '/it_skills', 'refresh');
    }

}

?>