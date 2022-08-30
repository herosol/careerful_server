<?php



class Onlinetest_categories extends Admin_Controller {



    public function __construct() {

        parent::__construct();

        $this->isLogged();

    }



    public function index() {

        $this->data['enable_datatable'] = TRUE;

        $this->data['pageView'] = ADMIN . '/onlinetest_categories';



        $this->data['rows'] = $this->master->get_data_rows('online_test_categories', [], 'asc', 'sort_order');

        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);

    }

    function manage() {

        $this->data['enable_editor'] = TRUE;

        $this->data['settings'] = $this->master->getRow('siteadmin');

        $this->data['pageView'] = ADMIN . '/onlinetest_categories';

         if ($this->input->post()) {

            $vals = $this->input->post();

            

            $content_row = $this->master->getRow('online_test_categories', array('id'=>$this->uri->segment(4)));

           

            if($_FILES['image']['name'] != ""){

                

                $this->removeImage($this->uri->segment(4));

                $image = upload_file(UPLOAD_PATH.'online_test_categories/', 'image');

                generate_thumb(UPLOAD_PATH.'online_test_categories/',UPLOAD_PATH.'online_test_categories/',$image['file_name'],100,'thumb_');

                $vals["image"] = $image["file_name"];

            }

            else{

                $vals['image'] = $content_row->image;

            }

            $id=$this->master->save('online_test_categories',$vals,'id', $this->uri->segment(4));

            //print_r($id);die;

            if($id>0){

                //print_r($count_title);die;

                setMsg('success', 'Data has been saved successfully.');

                redirect(ADMIN . '/onlinetest_categories', 'refresh');

                exit;

            }

        }

        $this->data['row'] = $this->master->getRow('online_test_categories',array('id'=>$this->uri->segment('4')));

         $this->load->view(ADMIN . '/includes/siteMaster', $this->data);        

    }

    function changestatus($id){

        $content = $this->master->getRow('online_test_categories', array('id'=>$id));

        if ($content->status == 1 ){

            $content->status = 0;

            $content->deleted_date = date('Y-m-d H:i:s');

        }

        else{

            $content->status = 1;

        }

        $id=$this->master->save('online_test_categories',$content,'id', $id);

        setMsg('success', 'Status Changed !');

        redirect(ADMIN . '/onlinetest_categories', 'refresh');

    }

    function delete() {

        $this->removeImage($this->uri->segment('4'));

        $this->master->delete('online_test_categories', 'id', $this->uri->segment('4'));

        setMsg('success', 'Delete successfully !');

        redirect(ADMIN . '/onlinetest_categories', 'refresh');

    }

    function deleteAll(){

        $ids = $this->input->post('checkbox_id');

        if(!empty($ids)){

            $this->master->delete('online_test_categories','id',$ids);

            setMsg('success', 'Deleted successfully !');

        }

        else{

            setMsg('error', 'Please Select atleast 1 Record !');

        }

        redirect(ADMIN . '/onlinetest_categories', 'refresh');

    }

    function removeImage($id){

        $row = $this->master->getRow('online_test_categories',array('id'=>$id));

        $filename = "./".UPLOAD_PATH.'online_test_categories/'.$row->image;

        if(is_file($filename)){

             unlink($filename);

        }

        return;

    }

}



?>