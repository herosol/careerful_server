<?php

class ProductBrands extends Admin_Controller
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
        $this->data['pageView'] = ADMIN . '/product_brands';

        $this->data['rows'] = $this->master->getRows('brands', array(), '', '', 'desc', '');
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function manage()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/product_brands';
        if ($this->input->post()) {
            $vals = $this->input->post();

            $this->master->save('brands', $vals, 'id', $this->uri->segment(4));
            setMsg('success', 'Product Brand has been saved successfully.');
            // if(empty(intval($this->uri->segment(4)))){
                redirect(ADMIN . '/productbrands', 'refresh');
                exit;
            // }
        }

        $this->data['row'] = $this->master->getRow('brands', array('id' => $this->uri->segment('4')));
        $this->data['categories'] = $this->master->getRows('categories', ['status'=> 1], '', '', 'desc', '');
        $this->data['page_title'] = $this->data['row'] ? "Edit Product Brands" : "Add New Product Brands";
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function delete()
    {
        $this->master->delete('brands', 'id', $this->uri->segment(4));
        setMsg('success', 'Product Brand has been deleted successfully.');
        redirect(ADMIN . '/productbrands', 'refresh');
    }

}

?>