<?php

class Career_options extends Admin_Controller
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
        $this->data['pageView'] = ADMIN . '/career_options';

        $this->data['rows'] = $this->master->getRows('career_options_accordians', array(), '', '', 'asc', 'sort_order');
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function manage()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/career_options';
        if ($this->input->post()) {
            $vals = $this->input->post();

			$data = [];
			$data['status'] = $vals['status'];
			$data['title'] = $vals['title'];
			$data['sort_order'] = $vals['sort_order'];

			$id = $this->uri->segment(4);
			if(empty($id))
			{
				$id = $this->master->save('career_options_accordians', $data);	
			}
			else
			{
				$this->master->save('career_options_accordians', $data, 'id', $id);
			}

			$heading['title'] = $vals['heading_title'];
            $heading['detail'] = $vals['heading_detail'];
            $heading['order_no'] = $vals['heading_order_no'];
            unset($vals['heading_detail'],$vals['heading_order_no'],$vals['heading_title']);
            $this->master->delete_where('multi_text', array('section'=> 'career_options_'.$id));
            $headings = array('order_no' => $heading['order_no'],'detail' => $heading['detail'],'title' => $heading['title']);
            saveMultiMediaFields($headings, 'career_options_'.$id);
            
            setMsg('success', 'Heading has been saved successfully.');
            if(empty(intval($this->uri->segment(4)))){
                redirect(ADMIN . '/career_options', 'refresh');
                exit;
            }
        }

        $this->data['row'] = $this->master->getRow('career_options_accordians', array('id' => $this->uri->segment('4')));
        $this->data['page_title'] = $this->data['row'] ? "Edit Heading" : "Add New Heading";
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function delete()
    {
        $this->master->delete('career_options_accordians', 'id', $this->uri->segment(4));
        setMsg('success', 'Heading has been deleted successfully.');
        redirect(ADMIN . '/career_options', 'refresh');
    }

}

?>
