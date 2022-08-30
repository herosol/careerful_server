<?php

class Job_profile extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->isLogged();
        // $this->load->model('newsletter_model');
        has_access(10);
    }

    public function index() {
        $this->data['enable_datatable'] = TRUE;
        $this->data['pageView'] = ADMIN . '/job_profile';
        $this->data['blogs'] = $this->master->get_data_rows('job_profiles', [], 'asc', 'sort_order');
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function manage() {
        $this->data['enable_editor'] = TRUE;
        $this->data['settings'] = $this->master->get_data_row('siteadmin');
        $this->data['pageView'] = ADMIN . '/job_profile';
         if ($this->input->post()) {
            $vals = $this->input->post();
            $content_row = $this->master->get_data_row('job_profiles', array('id'=>$this->uri->segment(4)));
            if (isset($_FILES["image"]["name"]) && $_FILES["image"]["name"] != "") {
                $image1 = upload_file(UPLOAD_PATH.'job_profile/', 'image');
                generate_thumb(UPLOAD_PATH . "job_profile/", UPLOAD_PATH . "job_profile/", $image1['file_name'],200,'thumb_');
                generate_thumb(UPLOAD_PATH . "job_profile/", UPLOAD_PATH . "job_profile/", $image1['file_name'],300,'300p_');
                generate_thumb(UPLOAD_PATH . "job_profile/", UPLOAD_PATH . "job_profile/", $image1['file_name'],400,'400p_');
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
                'short_desc'=>$vals['short_description'],
                'designation'=>$vals['designation'],
                'avg_salary_min'=>$vals['avg_salary_min'],
                'avg_salary_max'=>$vals['avg_salary_max'],
                'degree_requirements'=>$vals['degree_requirements'],
                'working_hour_min'=>$vals['working_hour_min'],
                'working_hour_max'=>$vals['working_hour_max'],
                'location'=>$vals['location'],
                'bold_heading'=>$vals['bold_heading'],
                'long_description'=>$vals['long_description'],
                'status'=>$vals['status'],
                'sort_order'=>$vals['sort_order'],
                'created_date'=>$created_date,
            );
            // pr($values);
            $id = $this->master->save('job_profiles', $values, 'id', $this->uri->segment(4));
            //print_r($id);die;
            if($id > 0){
                setMsg('success', 'Job Profile has been saved successfully.');
                redirect(ADMIN . '/job_profile', 'refresh');
                exit;
            }
        }
        $this->data['row'] = $this->master->get_data_row('job_profiles',array('id'=>$this->uri->segment('4')));
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
        $this->master->delete('job_profiles','id', $this->uri->segment(4));
        setMsg('success', 'Job Profile has been deleted successfully.');
        redirect(ADMIN . '/job_profile', 'refresh');
    }
}

?>