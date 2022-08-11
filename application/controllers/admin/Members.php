<?php

class Members extends Admin_Controller {

    public function __construct() 
    {
        parent::__construct();
        $this->isLogged();
        $this->load->model('master');
        $this->load->model('Member_model','member');
    }

    public function index() 
    {
        $this->data['enable_datatable'] = TRUE;
        $this->data['pageView'] = ADMIN . '/members';
        $this->data['rows'] = $this->member->getMembers();
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }
    function manage() 
    {
        $this->data['pageView'] = ADMIN . '/members';
        
        if ($this->input->post()) {
            $vals = $this->input->post();
            // if($this->form_validation->run() === FALSE) {
            //     setMsg('error', validation_errors());
            //     redirect(ADMIN . '/members/manage/' . $this->uri->segment(4), 'refresh');
            // }

                
            $vals['mem_pswd'] = doEncode($vals['mem_pswd'] );
            
            if (($_FILES["mem_image"]["name"] != "")) {
                $this->remove_file($this->uri->segment(4), 'mem_image');
                $image = upload_file(UPLOAD_PATH . 'members', 'mem_image');
                if (!empty($image['file_name'])) {
                    $vals['mem_image'] = $image['file_name'];
                    generate_thumb(UPLOAD_PATH . "members/", UPLOAD_PATH . "members/", $image['file_name'], 100, 'thumb_');
                    generate_thumb(UPLOAD_PATH . "members/", UPLOAD_PATH . "members/", $image['file_name'], 300, '300p_');
                } else {
                    setMsg('error', 'Please upload a valid image file >> ' . strip_tags($image['error']));
                    redirect(ADMIN . '/members/manage/' . $this->uri->segment(4), 'refresh');
                }
            }
            $mem_id = $this->member->save($vals,$this->uri->segment(4));
            setMsg('success', 'Member has been saved successfully.');
            redirect(ADMIN . '/members', 'refresh');
        }

        $this->data['row'] = $this->member->getMember($this->uri->segment('4'));
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function active() 
    {
        $mem_id = $this->uri->segment(4);
        $vals['mem_status'] = '1';
        $this->member->save($vals,$mem_id);
        setMsg('success', 'Member has been activated successfully.');
        redirect(ADMIN . '/members', 'refresh');
    }
    function inactive() 
    {
        $mem_id = $this->uri->segment(4);
        $vals['mem_status'] = '0';
        $this->member->save($vals,$mem_id );

        setMsg('success', 'Member has been deactivated successfully.');
        redirect(ADMIN . '/members', 'refresh');
    }
    function delete() 
    {
        $this->remove_file($this->uri->segment(4));
        $this->member->delete($this->uri->segment('4'));
        setMsg('success', 'Member has been deleted successfully.');
        redirect(ADMIN . '/members', 'refresh');
    }

    function remove_file($id, $type = '') 
    {
        $arr = $this->member->getMember($id);
        $filepath = "./" . SITE_IMAGES . "/members/" . $arr->mem_image;
        $filepath_thumb = "./" . SITE_IMAGES . "/members/thumb_" . $arr->mem_image;
        $filepath_thumb2 = "./" . SITE_IMAGES . "/members/300p_" . $arr->mem_image;
        if (is_file($filepath)) {
            unlink($filepath);
        }
        if (is_file($filepath_thumb)) {
            unlink($filepath_thumb);
        }
        if (is_file($filepath_thumb2)) {
            unlink($filepath_thumb2);
        }
        return;
    }
}
?>