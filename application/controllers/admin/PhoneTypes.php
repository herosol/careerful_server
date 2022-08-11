<?php

class PhoneTypes extends Admin_Controller
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
        $this->data['pageView'] = ADMIN . '/phone_types';

        $this->data['rows'] = $this->master->getRows('phone_types', array(), '', '', 'desc', '');
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function manage()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/phone_types';
        if ($this->input->post()) {
            $vals = $this->input->post();

            $this->master->save('phone_types', $vals, 'id', $this->uri->segment(4));
            setMsg('success', 'Category Type has been saved successfully.');
                redirect(ADMIN . '/phonetypes', 'refresh');
                exit;
        }

        $this->data['row'] = $this->master->getRow('phone_types', array('id' => $this->uri->segment('4')));
        $this->data['categories'] = $this->master->getRows('categories', ['status'=> 1], '', '', 'desc', '');
        $this->data['page_title'] = $this->data['row'] ? "Edit Type" : "Add New Type";
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function delete()
    {
        $this->master->delete('phone_types', 'id', $this->uri->segment(4));
        setMsg('success', 'Category Type has been deleted successfully.');
        redirect(ADMIN . '/phonetypes', 'refresh');
    }

}

?>