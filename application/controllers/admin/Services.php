<?php

class Services extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->isLogged();
        $this->load->model('services_model');
    }

    function index()
    {
        $this->data['enable_datatable'] = TRUE;
        $this->data['pageView'] = ADMIN . '/services';

        $this->data['rows'] = $this->services_model->get_rows(array());
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function manage()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/services';
        if ($this->input->post()) {
            $vals = $this->input->post();
            if (($_FILES["image"]["name"] != "")) {
                $this->remove_file($this->uri->segment(4));
                $image = upload_image(UPLOAD_PATH . "services/", 'image');
                if (!empty($image['file_name'])) {
                    $vals['image'] = $image['file_name'];
                    generate_thumb(UPLOAD_PATH . "services/", UPLOAD_PATH . "services/", $image['file_name'],100,'thumb_');
                    generate_thumb(UPLOAD_PATH . "services/", UPLOAD_PATH . "services/", $image['file_name'],300,'300p_');
                    generate_thumb(UPLOAD_PATH . "services/", UPLOAD_PATH . "services/", $image['file_name'],500,'500p_');
                } else {
                    setMsg('error', 'Please upload a valid image file >> ' . strip_tags($image['error']));
                    redirect(ADMIN . '/services/manage/' . $this->uri->segment(4), 'refresh');
                    exit;
                }
            }
            $this->services_model->save($vals, $this->uri->segment(4));
            setMsg('success', 'Service has been saved successfully.');
            redirect(ADMIN . '/services', 'refresh');
            exit;
        }
        $this->data['row'] = $this->services_model->get_row_where(array('id' => $this->uri->segment('4')));
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function delete($id) {
        $id = intval($id);
        if ($row = $this->services_model->get_row($id)) {
            $this->services_model->delete($this->uri->segment('4'));
            setMsg('success', 'Service has been deleted successfully.');
            redirect(ADMIN . '/services', 'refresh');
            exit;
        }
        else
            show_404();
    }

    function remove_file($id) {
        $arr = $this->services_model->get_row($id);

        $filepath = "./" . UPLOAD_PATH . "/services/" . $arr->image;
        $filepath_thumb = "./" . UPLOAD_PATH . "/services/thumb_" . $arr->image;
        if (is_file($filepath)) {
            unlink($filepath);
        }
        if (is_file($filepath_thumb)) {
            unlink($filepath_thumb);
        }
        return;
    }

}

?>