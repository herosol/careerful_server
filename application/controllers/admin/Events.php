<?php

class Events extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->isLogged();
        // $this->load->model('newsletter_model');
        has_access(10);
    }

    public function index() {
        $this->data['enable_datatable'] = TRUE;
        $this->data['pageView'] = ADMIN . '/events';
        $this->data['blogs'] = $this->master->get_data_rows('events', [], 'desc');
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function manage() {
        $this->data['enable_editor'] = TRUE;
        $this->data['settings'] = $this->master->get_data_row('siteadmin');
        $this->data['pageView'] = ADMIN . '/events';
         if ($this->input->post()) {
            $vals = $this->input->post();
            $content_row = $this->master->get_data_row('events', array('id'=>$this->uri->segment(4)));
            if (isset($_FILES["image"]["name"]) && $_FILES["image"]["name"] != "") {
                $image1 = upload_file(UPLOAD_PATH.'events/', 'image');
                    generate_thumb(UPLOAD_PATH . "events/", UPLOAD_PATH . "events/", $image1['file_name'],100,'thumb_');
                    generate_thumb(UPLOAD_PATH . "events/", UPLOAD_PATH . "events/", $image1['file_name'],300,'300p_');
                    generate_thumb(UPLOAD_PATH . "events/", UPLOAD_PATH . "events/", $image1['file_name'],500,'500p_');
                    generate_thumb(UPLOAD_PATH . "events/", UPLOAD_PATH . "events/", $image1['file_name'],1000,'1000p_');
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
                'image'=>$vals['image'],
                'title'=>$vals['title'],
                'event_type'=>$vals['event_type'],
                'description'=>$vals['description'],
                'event_date'=>$vals['event_date'],
                'location'=>$vals['location'],
                'time_from'=>$vals['time_from'],
                'time_to'=>$vals['time_to'],
                'status'=>$vals['status'],
                'created_date'=>$created_date,
            );
            // pr($values);
            $id = $this->master->save('events', $values, 'id', $this->uri->segment(4));
            //print_r($id);die;
            if($id > 0){
                setMsg('success', 'Event has been saved successfully.');
                redirect(ADMIN . '/events', 'refresh');
                exit;
            }
        }
        $this->data['row'] = $this->master->get_data_row('events',array('id'=>$this->uri->segment('4')));
        $this->data['cats'] = $this->master->get_data_rows('event_categories', ['status'=> 1]);
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
        $this->master->delete('events','id', $this->uri->segment(4));
        setMsg('success', 'Event has been deleted successfully.');
        redirect(ADMIN . '/events', 'refresh');
    }
}

?>