<?php

class Jobs extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->isLogged();
        // $this->load->model('newsletter_model');
        has_access(10);
    }

    public function index() {
        $this->data['enable_datatable'] = TRUE;
        $this->data['pageView'] = ADMIN . '/jobs';
        $this->data['blogs'] = $this->master->get_data_rows('jobs', [], 'desc');
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function manage() {
        $this->data['enable_editor'] = TRUE;
        $this->data['settings'] = $this->master->get_data_row('siteadmin');
        $this->data['pageView'] = ADMIN . '/jobs';
         if ($this->input->post()) {
            $vals = $this->input->post();
            $content_row = $this->master->get_data_row('jobs', array('id'=>$this->uri->segment(4)));
            if (isset($_FILES["image"]["name"]) && $_FILES["image"]["name"] != "") {
                $image1 = upload_file(UPLOAD_PATH.'jobs/', 'image');
                    generate_thumb(UPLOAD_PATH . "jobs/", UPLOAD_PATH . "jobs/", $image1['file_name'],100,'thumb_');
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
                'degree_requirement'=>$vals['degree_requirement'],
                'degree_in'=>$vals['degree_in'],
                'job_cat'=>$vals['job_category'],
                'company_name'=>$vals['company_name'],
                'company_link'=>$vals['company_link'],
                'job_link'=>$vals['job_link'],
                'visa_acceptance'=>$vals['visa_acceptance'],
                'years_of_experience'=>$vals['years_of_experience'],
                'min_salary'=>$vals['min_salary'],
                'max_salary'=>$vals['max_salary'],
                'job_type'=>$vals['job_type'],
                'city'=>$vals['city'],
                'status'=>$vals['status'],
                'created_date'=>$created_date,
            );
            // pr($values);
            $id = $this->master->save('jobs', $values, 'id', $this->uri->segment(4));
            //print_r($id);die;
            if($id > 0){
                setMsg('success', 'Job has been saved successfully.');
                redirect(ADMIN . '/jobs', 'refresh');
                exit;
            }
        }
        $this->data['row'] = $this->master->get_data_row('jobs',array('id'=>$this->uri->segment('4')));
        $this->data['cats'] = $this->master->get_data_rows('job_categories', ['status'=> 1]);
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);        
    }

	function upload_bulk()
	{
		if(isset($_FILES) && !empty($_FILES['jobsFile']['name']))
		{
			$file = $_FILES['jobsFile'];
			$extension = explode('.', $file['name']);
			if($extension[1] === 'csv')
			{
				$row = 0;
				if (($handle = fopen($file['tmp_name'], "r")) !== FALSE) {
					while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
						if(++$row === 1)
						{
							continue;
						}
						else
						{
							$insert = [];
							if(!empty(trim($data[0])) 
								&& !empty(trim($data[1]))
							 	&& !empty(trim($data[3]))
							 	&& !empty(trim($data[4]))
							 	&& !empty(trim($data[5]))
							 	&& !empty(trim($data[6]))
							 	&& !empty(trim($data[7]))
							 	&& !empty(trim($data[8]))
							 	&& !empty(trim($data[9]))
							 	&& !empty(trim($data[10]))
							 	&& !empty(trim($data[11]))
							 	&& !empty(trim($data[12]))
							 	&& !empty(trim($data[13]))
							 	&& !empty(trim($data[14]))
							){
								$insert['status'] = trim($data[0]) == 'Publish' ? 1 : 0;
								$insert['company_name'] = trim($data[1]);
								$insert['company_link'] = trim($data[2]);
								$insert['job_level'] 	= trim($data[3]);
								pr($data[0], false);
							}
							
						}
					}
				}
				die();	
			}
			else
			{
				setMsg('error', 'Please select only csv file.');
				redirect(ADMIN . '/jobs', 'refresh');
				exit;
			}
		}
		else
		{
			setMsg('error', 'No File was seleted.');
			redirect(ADMIN . '/jobs', 'refresh');
			exit;
		}
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
        $this->master->delete('jobs','id', $this->uri->segment(4));
        setMsg('success', 'Job has been deleted successfully.');
        redirect(ADMIN . '/jobs', 'refresh');
    }
}

?>
