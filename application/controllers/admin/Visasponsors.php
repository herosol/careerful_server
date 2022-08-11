<?php

class Visasponsors extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->isLogged();
    }

    public function index() {
        $this->data['enable_datatable'] = TRUE;
        $this->data['pageView'] = ADMIN . '/visa_sponsors';
        $this->data['rows'] = $this->master->get_data('visa_sponsors');
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function manage() {

        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/visa_sponsors';
        
        if ($this->input->post()) {
            $vals = $this->input->post();
            if (($_FILES["image"]["name"] != "")) {
                $this->remove_file($this->uri->segment(4));
                $image = upload_image(UPLOAD_PATH.'/visasponsors', 'image');
                generate_thumb(UPLOAD_PATH.'visasponsors/',UPLOAD_PATH.'visasponsors/',$image['file_name'],100,'thumb_');
                generate_thumb(UPLOAD_PATH.'visasponsors/',UPLOAD_PATH.'visasponsors/',$image['file_name'],200,'200p_');
                if (!empty($image['file_name'])) {
                    $vals['image'] = $image['file_name'];
                } else {
                    setMsg('error', 'Please upload a valid image file >> ' . strip_tags($image['error']));
                    redirect(ADMIN . '/visasponsors/manage/' . $this->uri->segment(4), 'refresh');
                }
               
            }
            $this->master->insert_data('visa_sponsors',$vals,'id',$this->uri->segment(4));
            setMsg('success', 'Visa Sponsor has been saved successfully.');
            redirect(ADMIN . '/visasponsors', 'refresh');
        }    
        $this->data['row'] = $this->master->get_data_row('visa_sponsors',array('id'=>$this->uri->segment(4)));
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function delete() {
        $this->remove_file($this->uri->segment(4));
        $this->master->delete_row('visa_sponsors',array('id'=>$this->uri->segment(4)));
        setMsg('success', 'Visa Sponsor has been deleted successfully.');
        redirect(base_url() . ADMIN . '/visasponsors', 'refresh');
    }

    function remove_file($id) {
        $arr = $this->master->get_data_row('visa_sponsors',array('id'=>$id));
        $filepath = "./" .UPLOAD_PATH. "/visasponsors/" . $arr->image;
        $thumb_filepath = "./" .UPLOAD_PATH. "/visasponsors/thumb_" . $arr->image;
        if (is_file($filepath)) {
            unlink($filepath);
        }
        if (is_file($thumb_filepath)) {
            unlink($thumb_filepath);
        }
        return;
    }

}

?>