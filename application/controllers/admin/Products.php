<?php

class Products extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->isLogged();
        has_access(10);
    }

    public function index() {
        $this->data['enable_datatable'] = TRUE;
        $this->data['pageView'] = ADMIN . '/products';
        $this->data['products'] = $this->master->getRows('products', ['status'=> 1], '','', 'desc', 'id');
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function manage() {
        $this->data['enable_editor'] = TRUE;
        $this->data['settings'] = $this->master->get_data_row('siteadmin');
        $this->data['pageView'] = ADMIN . '/products';
         if ($this->input->post()) {
            $vals = $this->input->post();
            $content_row = $this->master->get_data_row('products', array('id'=>$this->uri->segment(4)));

            if (isset($_FILES["image"]["name"]) && $_FILES["image"]["name"] != "") {
                $image = upload_file(UPLOAD_PATH.'products/', 'image');
                generate_thumb(UPLOAD_PATH.'products/',UPLOAD_PATH.'products/',$image['file_name'], 100,'100p_');
                generate_thumb(UPLOAD_PATH.'products/',UPLOAD_PATH.'products/',$image['file_name'], 500,'thumb_');
                if(!empty($image['file_name'])){
                    // if(isset($content_row->image))
                        // $this->remove_file(UPLOAD_PATH."products/".$content_row->image);

                    $vals['image'] = $image['file_name'];
                }
            }
            else
            {
                $vals['image'] = $content_row->image;
            }


            $created_date="";
            if(empty($content_row->created_date)){
                $created_date=date('Y-m-d h:i:s');
            }
            else{
                $created_date=$content_row->created_date;
            }

            $values=array(
                'category_id'=>$vals['category_id'],
                'brand_id'=>$vals['brand_id'],
                'phone_type'=>$vals['phone_type'],
                'available'=>$vals['available'],
                'title'=>$vals['title'],
                'vendor'=>$vals['vendor'],
                'price'=>$vals['price'],
                'discount'=>$vals['discount'],
                'description'=>$vals['short_description'],
                'image'=>$vals['image'],
                'status'=>$vals['status'],
                'is_featured'=>$vals['is_featured'],
                'created_date'=>$created_date,
            );
            $product_id = $this->master->save('products', $values, 'id', $this->uri->segment(4));

            # Gallery Images
            if (isset($_FILES['gallery_images']) && is_array($_FILES['gallery_images']['name'])) {
                $image_path = array();
                $count = count($_FILES['gallery_images']['name']);
                for ($key = 0; $key < $count; $key++) {
                    $_FILES['file' . $key]['name']     = $_FILES['gallery_images']['name'][$key];
                    $_FILES['file' . $key]['type']     = $_FILES['gallery_images']['type'][$key];
                    $_FILES['file' . $key]['tmp_name'] = $_FILES['gallery_images']['tmp_name'][$key];
                    $_FILES['file' . $key]['error']    = $_FILES['gallery_images']['error'][$key];
                    $_FILES['file' . $key]['size']     = $_FILES['gallery_images']['size'][$key];
                }

                for ($i = 0; $i < $count; $i++) {
                    if (isset($_FILES["file" . $i]["name"]) && $_FILES["file" . $i]["name"] != "") {
                        $image = upload_file(UPLOAD_PATH . 'products', 'file' . $i);
                        generate_thumb(UPLOAD_PATH . "products/", UPLOAD_PATH . "products/", $image['file_name'],500,'thumb_');
                        generate_thumb(UPLOAD_PATH . "products/", UPLOAD_PATH . "products/", $image['file_name'],100,'100p_');
                        $product_images =
                            [
                                'product_id' => $product_id,
                                'image'  => $image['file_name']
                            ];
                        $this->master->save('product_images', $product_images);
                    }
                }
            }
            
            if($product_id > 0){
                setMsg('success', 'Product has been saved successfully.');
                redirect(ADMIN . '/products', 'refresh');
                exit;
            }
        }
        $this->data['row'] = $this->master->get_data_row('products',array('id'=>$this->uri->segment('4')));
        $this->data['categories'] = $this->master->getRows('categories', ['status'=> 1], '', '', 'desc', '');
        $this->data['brands'] = $this->master->getRows('brands', ['status'=> 1], '', '', 'desc', '');
        $this->data['phone_types'] = $this->master->getRows('phone_types', ['status'=> 1], '', '', 'desc', '');
         $this->load->view(ADMIN . '/includes/siteMaster', $this->data);        
    }
    
    function delete()
    {
        has_access(17);
        $this->master->delete('products','id', $this->uri->segment(4));
        setMsg('success', 'Product has been deleted successfully.');
        redirect(ADMIN . '/products', 'refresh');
    }
}

?>