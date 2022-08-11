<?php

class Partner_companies extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->isLogged();
        // $this->load->model('newsletter_model');
        has_access(10);
    }

    public function index() {
        $this->data['enable_datatable'] = TRUE;
        $this->data['pageView'] = ADMIN . '/partner_companies';
        $this->data['blogs'] = $this->master->get_data_rows('partner_companies', [], 'desc');
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function manage() {
        $this->data['enable_editor'] = TRUE;
        $this->data['settings'] = $this->master->get_data_row('siteadmin');
        $this->data['pageView'] = ADMIN . '/partner_companies';
         if ($this->input->post()) {
            $vals = $this->input->post();
            $content_row = $this->master->get_data_row('partner_companies', array('id'=>$this->uri->segment(4)));
            if (isset($_FILES["image"]["name"]) && $_FILES["image"]["name"] != "") {
                $image1 = upload_file(UPLOAD_PATH.'partner_companies/', 'image');
                generate_thumb(UPLOAD_PATH . "partner_companies/", UPLOAD_PATH . "partner_companies/", $image1['file_name'],100,'thumb_');
                generate_thumb(UPLOAD_PATH . "partner_companies/", UPLOAD_PATH . "partner_companies/", $image1['file_name'],200,'300p_');
                $vals['image']=$image1['file_name'];
            }
            else{
                $vals['image']=$content_row->image;
            }
            $created_date="";
            if(empty($content_row->created_date)){
                $created_date=date('Y-m-d h:i:s');
            }
            else{
                $created_date=$content_row->created_date;
            }
            //pr($image1);
            //$categories=implode(",",$vals['categories']);
            $values=array(
                'image'       => $vals['image'],
                'title'       => $vals['title'],
                'short_desc'  => $vals['short_description'],
                'page'        => $vals['page'],
                'status'      => $vals['status'],
                'created_date'=> $created_date,
            );
            // pr($values);
            $id = $this->master->save('partner_companies', $values, 'id', $this->uri->segment(4));
            //print_r($id);die;
            if($id > 0){
                setMsg('success', 'Partner Company has been saved successfully.');
                redirect(ADMIN . '/partner_companies', 'refresh');
                exit;
            }
        }
        $this->data['row'] = $this->master->get_data_row('partner_companies',array('id'=>$this->uri->segment('4')));
        $this->data['cats'] = $this->master->get_data_rows('job_categories', ['status'=> 1]);
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);        
    }

    function add_category(){
        $data=$this->input->post();
        $res=array();
        if(empty($data['cat_name'])){
            $res['status']=false;
            $res['empty']=true;
            echo json_encode($res);
        }
        else{
            $vals=array(
                'name'=>$data['cat_name']
            );
            $q=$this->master->save("categories",$vals);
            if($q>0){
                $res['status']=true;
                $res['success']=true;
                $res['cat_id']=$q;
            }
            else{
                 $res['status']=false; 
                 $res['fail']=false;  
            }
            echo json_encode($res);
        }
    }	
    
    function delete()
    {
        has_access(17);
        $this->master->delete('partner_companies','id', $this->uri->segment(4));
        setMsg('success', 'Partner Company has been deleted successfully.');
        redirect(ADMIN . '/partner_companies', 'refresh');
    }
}

?>