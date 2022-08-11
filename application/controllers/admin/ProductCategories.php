<?php

class ProductCategories extends Admin_Controller
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
        $this->data['pageView'] = ADMIN . '/product_categories';

        $this->data['rows'] = $this->master->getRows('categories', array(), '', '', 'desc', '');
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function manage()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/product_categories';
        if ($this->input->post()) {
            $vals = $this->input->post();

            $this->master->save('categories', $vals, 'id', $this->uri->segment(4));
            setMsg('success', 'Product Category has been saved successfully.');
            if(empty(intval($this->uri->segment(4)))){
                redirect(ADMIN . '/productcategories', 'refresh');
                exit;
            }
        }

        $this->data['row'] = $this->master->getRow('categories', array('id' => $this->uri->segment('4')));
        $this->data['page_title'] = $this->data['row'] ? "Edit FAQ" : "Add New FAQ";
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function delete()
    {
        $this->master->delete('categories', 'id', $this->uri->segment(4));
        setMsg('success', 'Product Category has been deleted successfully.');
        redirect(ADMIN . '/productcategories', 'refresh');
    }

}

?>