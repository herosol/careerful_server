<?php

class Event_categories extends Admin_Controller
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
        $this->data['pageView'] = ADMIN . '/event_categories';

        $this->data['rows'] = $this->master->getRows('event_categories', array(), '', '', 'desc', '');
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function manage()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/event_categories';
        if ($this->input->post()) {
            $vals = $this->input->post();

            $this->master->save('event_categories', $vals, 'id', $this->uri->segment(4));
            setMsg('success', 'Event Category has been saved successfully.');
            if(empty(intval($this->uri->segment(4)))){
                redirect(ADMIN . '/event_categories', 'refresh');
                exit;
            }
        }

        $this->data['row'] = $this->master->getRow('event_categories', array('id' => $this->uri->segment('4')));
        $this->data['page_title'] = $this->data['row'] ? "Edit Event Category" : "Add New Event Category";
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function delete()
    {
        $this->master->delete('event_categories', 'id', $this->uri->segment(4));
        setMsg('success', 'Event Category has been deleted successfully.');
        redirect(ADMIN . '/event_categories', 'refresh');
    }

}

?>