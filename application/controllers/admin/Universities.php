<?php

class Universities extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->isLogged();
        // $this->load->model('newsletter_model');
        has_access(10);
    }

    public function index() {
        $this->data['enable_datatable'] = TRUE;
        $this->data['pageView'] = ADMIN . '/universities';
        $this->data['universities'] = $this->master->get_data_rows('universities', [], 'desc');
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function manage() {
        $this->data['enable_editor'] = TRUE;
        $this->data['settings'] = $this->master->get_data_row('siteadmin');
        $this->data['pageView'] = ADMIN . '/universities';
         if ($this->input->post()) {
            $vals = $this->input->post();
            $content_row = $this->master->get_data_row('universities', array('id'=>$this->uri->segment(4)));

            $created_date="";
            if(empty($content_row->created_date)){
                $created_date=date('Y-m-d h:i:s');
            }
            else{
                $created_date=$content_row->created_date;
            }

            $values=array(
                'uni_name'=>$vals['uni_name'],
                'uni_domain'=>$vals['uni_domain'],
                'uni_email'=>$vals['uni_email'],
                'uni_phone'=>$vals['uni_phone'],
                'uni_handling_person_name'=>$vals['uni_handling_person_name'],
                'uni_handling_person_email'=>$vals['uni_handling_person_email'],
                'uni_handling_person_phone'=>$vals['uni_handling_person_phone'],
                'status'=>$vals['status'],
                'created_at'=>$created_date,
            );
            // pr($values);
            $id = $this->master->save('universities', $values, 'id', $this->uri->segment(4));
            //print_r($id);die;
            if($id > 0){
                setMsg('success', 'University has been saved successfully.');
                redirect(ADMIN . '/universities', 'refresh');
                exit;
            }
        }
        $this->data['row'] = $this->master->get_data_row('universities',array('id'=>$this->uri->segment('4')));
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
        $this->master->delete('universities','id', $this->uri->segment(4));
        setMsg('success', 'University has been deleted successfully.');
        redirect(ADMIN . '/universities', 'refresh');
    }
}

?>