<?php
class Sitecontent extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->isLogged();
        has_access(21);
        $this->table_name = 'sitecontent';
    }

    public function home()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/site_home';
        if ($vals = $this->input->post()) {
            $content_row = $this->master->getRow($this->table_name, array('ckey' => 'home'));
            $content_row = unserialize($content_row->code);

            if(!is_array($content_row))
                $content_row = array();

            for($i = 1; $i <= 5; $i++) {
                if (isset($_FILES["image".$i]["name"]) && $_FILES["image".$i]["name"] != "") {
                    $image = upload_file(UPLOAD_PATH.'images/', 'image'.$i);
                    generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],50,'thumb_');
                    generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],100,'100p_');
                    if(!empty($image['file_name'])){
                        if(isset($content_row['image'.$i]))
                            $this->remove_file(UPLOAD_PATH."images/".$content_row['image'.$i]);
                            $this->remove_file(UPLOAD_PATH."images/thumb_".$content_row['image'.$i]);
                        $vals['image'.$i] = $image['file_name'];
                    }
                }
            }
            

            if (isset($_FILES["video"]["name"]) && $_FILES["video"]["name"] != "") {

                    

                $image = upload_file(UPLOAD_PATH.'images/', 'video', 'video');

                generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],600,'thumb_');

                if(!empty($image['file_name'])){

                    if(isset($content_row['video']))
                        $this->remove_file(UPLOAD_PATH."images/".$content_row['video']);
                        $this->remove_file(UPLOAD_PATH."images/thumb_".$content_row['video']);


                    $vals['video'] = $image['file_name'];

                }

            }

            $sec6['title'] = $vals['sec6_title'];
            $sec6['order_no'] = $vals['sec6_order_no'];
            $sec6['txt1'] = $vals['sec6_txt1'];
            $sec6Phto['pics'] = $vals['sec6_pics'];
            unset($vals['sec6_pics'],$vals['sec6_detail'],$vals['sec6_order_no'],$vals['sec6_title'], $vals['sec6_txt1']);
            $this->master->delete_where('multi_text', array('section'=> 'home-sec6'));
            $sec6s = array('order_no' => $sec6['order_no'],'detail' => $sec6['detail'],'title' => $sec6['title'], 'txt1'=> $sec6['txt1']);
            saveMultiMediaFieldsImgs(UPLOAD_PATH.'images/', $_FILES['sec6_image'], 'sec6_image', 'home-sec6', $sec6Phto['pics'], $sec6s, 'eng', 100);

            // $sec7['title'] = $vals['sec7_title'];
            // $sec7['detail'] = $vals['sec7_detail'];
            // $sec7['order_no'] = $vals['sec7_order_no'];
            // unset($vals['sec7_pics'],$vals['sec7_detail'],$vals['sec7_order_no'],$vals['sec7_title']);
            // $this->master->delete_where('multi_text', array('section'=> 'home-sec7'));
            // $sec7s = array('order_no' => $sec7['order_no'],'detail' => $sec7['detail'],'title' => $sec7['title']);
            // saveMultiMediaFields($sec7s, 'home-sec7');

            $sec7['title'] = $vals['sec7_title'];
            $sec7['detail'] = $vals['sec7_detail'];
            $sec7['order_no'] = $vals['sec7_order_no'];
            $sec7Phto['pics'] = $vals['sec7_pics'];
            unset($vals['sec7_pics'],$vals['sec7_detail'],$vals['sec7_order_no'],$vals['sec7_title']);
            $this->master->delete_where('multi_text', array('section'=> 'home-sec7'));
            $sec7s = array('order_no' => $sec7['order_no'],'detail' => $sec7['detail'],'title' => $sec7['title']);
            saveMultiMediaFieldsImgs(UPLOAD_PATH.'images/', $_FILES['sec7_image'], 'sec7_image', 'home-sec7', $sec7Phto['pics'], $sec7s, 'eng',900);

            // $sec8['title'] = $vals['sec8_title'];
            // $sec8['order_no'] = $vals['sec8_order_no'];
            // $sec8Phto['pics'] = $vals['sec8_pics'];
            // unset($vals['sec8_pics'],$vals['sec8_detail'],$vals['sec8_order_no'],$vals['sec8_title']);
            // $this->master->delete_where('multi_text', array('section'=> 'home-sec8'));
            // $sec8s = array('order_no' => $sec8['order_no'],'detail' => $sec8['detail'],'title' => $sec8['title']);
            // saveMultiMediaFieldsImgs(UPLOAD_PATH.'images/', $_FILES['sec8_image'], 'sec8_image', 'home-sec8', $sec8Phto['pics'], $sec8s, 'eng',900);

            $data = serialize(array_merge($content_row, $vals));
            $this->master->save($this->table_name,array('code' => $data),'ckey', 'home');
            setMsg('success', 'Settings updated successfully !');
            redirect(ADMIN . "/sitecontent/home");
            exit;
        }

        $this->data['row'] = $this->master->getRow($this->table_name, array('ckey' => 'home'));
        $this->data['row'] = unserialize($this->data['row']->code);
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    public function about_us()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/site_about_us';
        if ($vals = $this->input->post()) {
            $content_row = $this->master->getRow($this->table_name, array('ckey' => 'about_us'));
            $content_row = unserialize($content_row->code);

            if(!is_array($content_row))
                $content_row = array();

            for($i = 1; $i <= 5; $i++) {
                if (isset($_FILES["image".$i]["name"]) && $_FILES["image".$i]["name"] != "") {
                    
                    $image = upload_file(UPLOAD_PATH.'images/', 'image'.$i);

                    if($i === 1)
                    {
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],300,'thumb_');
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],500,'500p_');
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],800,'800p_');
                    }

                    if(!empty($image['file_name'])){
                        if(isset($content_row['image'.$i])){
                            if($i === 1)
                            {
                                $this->remove_file(UPLOAD_PATH."images/".$content_row['image'.$i]);
                                $this->remove_file(UPLOAD_PATH."images/thumb_".$content_row['image'.$i]);
                                $this->remove_file(UPLOAD_PATH."images/500p_".$content_row['image'.$i]);
                                $this->remove_file(UPLOAD_PATH."images/800p_".$content_row['image'.$i]);
                            }
                        }
                        $vals['image'.$i] = $image['file_name'];
                    }
                }
            }

            $sec2['title'] = $vals['sec2_title'];
            $sec2['detail'] = $vals['sec2_detail'];
            $sec2['order_no'] = $vals['sec2_order_no'];
            unset($vals['sec2_pics'],$vals['sec2_detail'],$vals['sec2_order_no'],$vals['sec2_title']);
            $this->master->delete_where('multi_text', array('section'=> 'about-us-faq'));
            $sec2s = array('order_no' => $sec2['order_no'],'detail' => $sec2['detail'],'title' => $sec2['title']);
            saveMultiMediaFields($sec2s, 'about-us-faq');

            $data = serialize(array_merge($content_row, $vals));
            $this->master->save($this->table_name,array('code' => $data),'ckey', 'about_us');
            setMsg('success', 'Settings updated successfully !');
            redirect(ADMIN . "/sitecontent/about_us");
            exit;
        }

        $this->data['row'] = $this->master->getRow($this->table_name, array('ckey' => 'about_us'));
        $this->data['row'] = unserialize($this->data['row']->code);
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    public function signin()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/site_signin';
        if ($vals = $this->input->post()) {
            $content_row = $this->master->getRow($this->table_name, array('ckey' => 'signin'));
            $content_row = unserialize($content_row->code);

            if(!is_array($content_row))
                $content_row = array();

            for($i = 1; $i <= 1; $i++) {
                if (isset($_FILES["image".$i]["name"]) && $_FILES["image".$i]["name"] != "") {
                    
                    $image = upload_file(UPLOAD_PATH.'images/', 'image'.$i);

                    // if($i === 1)
                    // {
                    //     generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],300,'thumb_');
                    //     generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],500,'500p_');
                    //     generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],800,'800p_');
                    // }

                    if(!empty($image['file_name'])){
                        if(isset($content_row['image'.$i])){
                            if($i === 1)
                            {
                                $this->remove_file(UPLOAD_PATH."images/".$content_row['image'.$i]);
                                // $this->remove_file(UPLOAD_PATH."images/thumb_".$content_row['image'.$i]);
                                // $this->remove_file(UPLOAD_PATH."images/500p_".$content_row['image'.$i]);
                                // $this->remove_file(UPLOAD_PATH."images/800p_".$content_row['image'.$i]);
                            }
                        }
                        $vals['image'.$i] = $image['file_name'];
                    }
                }
            }

            $data = serialize(array_merge($content_row, $vals));
            $this->master->save($this->table_name,array('code' => $data),'ckey', 'signin');
            setMsg('success', 'Settings updated successfully !');
            redirect(ADMIN . "/sitecontent/signin");
            exit;
        }

        $this->data['row'] = $this->master->getRow($this->table_name, array('ckey' => 'signin'));
        $this->data['row'] = unserialize($this->data['row']->code);
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    public function forgot_password()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/site_forgot_password';
        if ($vals = $this->input->post()) {
            $content_row = $this->master->getRow($this->table_name, array('ckey' => 'forgot_password'));
            $content_row = unserialize($content_row->code);

            if(!is_array($content_row))
                $content_row = array();

            for($i = 1; $i <= 1; $i++) {
                if (isset($_FILES["image".$i]["name"]) && $_FILES["image".$i]["name"] != "") {
                    
                    $image = upload_file(UPLOAD_PATH.'images/', 'image'.$i);

                    // if($i === 1)
                    // {
                    //     generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],300,'thumb_');
                    //     generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],500,'500p_');
                    //     generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],800,'800p_');
                    // }

                    if(!empty($image['file_name'])){
                        if(isset($content_row['image'.$i])){
                            if($i === 1)
                            {
                                $this->remove_file(UPLOAD_PATH."images/".$content_row['image'.$i]);
                                // $this->remove_file(UPLOAD_PATH."images/thumb_".$content_row['image'.$i]);
                                // $this->remove_file(UPLOAD_PATH."images/500p_".$content_row['image'.$i]);
                                // $this->remove_file(UPLOAD_PATH."images/800p_".$content_row['image'.$i]);
                            }
                        }
                        $vals['image'.$i] = $image['file_name'];
                    }
                }
            }

            $data = serialize(array_merge($content_row, $vals));
            $this->master->save($this->table_name,array('code' => $data),'ckey', 'forgot_password');
            setMsg('success', 'Settings updated successfully !');
            redirect(ADMIN . "/sitecontent/forgot_password");
            exit;
        }

        $this->data['row'] = $this->master->getRow($this->table_name, array('ckey' => 'forgot_password'));
        $this->data['row'] = unserialize($this->data['row']->code);
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    public function reset_password()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/site_reset_password';
        if ($vals = $this->input->post()) {
            $content_row = $this->master->getRow($this->table_name, array('ckey' => 'reset_password'));
            $content_row = unserialize($content_row->code);

            if(!is_array($content_row))
                $content_row = array();

            for($i = 1; $i <= 1; $i++) {
                if (isset($_FILES["image".$i]["name"]) && $_FILES["image".$i]["name"] != "") {
                    
                    $image = upload_file(UPLOAD_PATH.'images/', 'image'.$i);

                    // if($i === 1)
                    // {
                    //     generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],300,'thumb_');
                    //     generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],500,'500p_');
                    //     generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],800,'800p_');
                    // }

                    if(!empty($image['file_name'])){
                        if(isset($content_row['image'.$i])){
                            if($i === 1)
                            {
                                $this->remove_file(UPLOAD_PATH."images/".$content_row['image'.$i]);
                                // $this->remove_file(UPLOAD_PATH."images/thumb_".$content_row['image'.$i]);
                                // $this->remove_file(UPLOAD_PATH."images/500p_".$content_row['image'.$i]);
                                // $this->remove_file(UPLOAD_PATH."images/800p_".$content_row['image'.$i]);
                            }
                        }
                        $vals['image'.$i] = $image['file_name'];
                    }
                }
            }

            $data = serialize(array_merge($content_row, $vals));
            $this->master->save($this->table_name,array('code' => $data),'ckey', 'reset_password');
            setMsg('success', 'Settings updated successfully !');
            redirect(ADMIN . "/sitecontent/reset_password");
            exit;
        }

        $this->data['row'] = $this->master->getRow($this->table_name, array('ckey' => 'reset_password'));
        $this->data['row'] = unserialize($this->data['row']->code);
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    public function careers()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/site_careers';
        if ($vals = $this->input->post()) {
            $content_row = $this->master->getRow($this->table_name, array('ckey' => 'careers'));
            $content_row = unserialize($content_row->code);

            if(!is_array($content_row))
                $content_row = array();

            for($i = 1; $i <= 9; $i++) {
                if (isset($_FILES["image".$i]["name"]) && $_FILES["image".$i]["name"] != "") {
                    
                    $image = upload_file(UPLOAD_PATH.'images/', 'image'.$i);
                    if($i === 1)
                    {
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],500,'thumb_');
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],800,'800p_');
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],700,'700p_');
                    }
                    else
                    {
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],100,'thumb_');
                    }
                    
                    if(!empty($image['file_name'])){
                        if(isset($content_row['image'.$i]))
                            $this->remove_file(UPLOAD_PATH."images/".$content_row['image'.$i]);
                            $this->remove_file(UPLOAD_PATH."images/thumb_".$content_row['image'.$i]);
                            $this->remove_file(UPLOAD_PATH."images/400p_".$content_row['image'.$i]);
                            $this->remove_file(UPLOAD_PATH."images/600p_".$content_row['image'.$i]);
                        $vals['image'.$i] = $image['file_name'];
                    }
                }
            }

            $data = serialize(array_merge($content_row, $vals));
            $this->master->save($this->table_name,array('code' => $data),'ckey', 'careers');
            setMsg('success', 'Settings updated successfully !');
            redirect(ADMIN . "/sitecontent/careers");
            exit;
        }

        $this->data['row'] = $this->master->getRow($this->table_name, array('ckey' => 'careers'));
        $this->data['row'] = unserialize($this->data['row']->code);
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    public function work_with_us()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/site_work_with_us';
        if ($vals = $this->input->post()) {
            $content_row = $this->master->getRow($this->table_name, array('ckey' => 'work_with_us'));
            $content_row = unserialize($content_row->code);

            if(!is_array($content_row))
                $content_row = array();

            for($i = 1; $i <= 5; $i++) {
                if (isset($_FILES["image".$i]["name"]) && $_FILES["image".$i]["name"] != "") {
                    
                    $image = upload_file(UPLOAD_PATH.'images/', 'image'.$i);
                    if($i === 1)
                    {
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],300,'thumb_');
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],500,'500p_');
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],800,'800p_');
                    }
                    if(!empty($image['file_name'])){
                        if(isset($content_row['image'.$i]))
                            // $this->remove_file(UPLOAD_PATH."images/".$content_row['image'.$i]);
                            // $this->remove_file(UPLOAD_PATH."images/thumb_".$content_row['image'.$i]);
                            // $this->remove_file(UPLOAD_PATH."images/400p_".$content_row['image'.$i]);
                            // $this->remove_file(UPLOAD_PATH."images/600p_".$content_row['image'.$i]);
                        $vals['image'.$i] = $image['file_name'];
                    }
                }
            }

            $sec2['title'] = $vals['sec2_title'];
            $sec2['detail'] = $vals['sec2_detail'];
            $sec2['order_no'] = $vals['sec2_order_no'];
            unset($vals['sec2_pics'],$vals['sec2_detail'],$vals['sec2_order_no'],$vals['sec2_title']);
            $this->master->delete_where('multi_text', array('section'=> 'for-university-faq'));
            $sec2s = array('order_no' => $sec2['order_no'],'detail' => $sec2['detail'],'title' => $sec2['title']);
            saveMultiMediaFields($sec2s, 'for-university-faq');

            $data = serialize(array_merge($content_row, $vals));
            $this->master->save($this->table_name,array('code' => $data),'ckey', 'work_with_us');
            setMsg('success', 'Settings updated successfully !');
            redirect(ADMIN . "/sitecontent/work_with_us");
            exit;
        }

        $this->data['row'] = $this->master->getRow($this->table_name, array('ckey' => 'work_with_us'));
        $this->data['row'] = unserialize($this->data['row']->code);
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    public function uk_corporate_culture()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/site_uk_corporate_culture';
        if ($vals = $this->input->post()) {
            $content_row = $this->master->getRow($this->table_name, array('ckey' => 'uk_corporate_culture'));
            $content_row = unserialize($content_row->code);

            if(!is_array($content_row))
                $content_row = array();

            for($i = 1; $i <=1; $i++) {
                if (isset($_FILES["image".$i]["name"]) && $_FILES["image".$i]["name"] != "") {
                    
                    $image = upload_file(UPLOAD_PATH.'images/', 'image'.$i);
                    if($i === 1)
                    {
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],300,'thumb_');
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],500,'500p_');
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],800,'800p_');
                    }
                    if(!empty($image['file_name'])){
                        if(isset($content_row['image'.$i]))
                            // $this->remove_file(UPLOAD_PATH."images/".$content_row['image'.$i]);
                            // $this->remove_file(UPLOAD_PATH."images/thumb_".$content_row['image'.$i]);
                            // $this->remove_file(UPLOAD_PATH."images/400p_".$content_row['image'.$i]);
                            // $this->remove_file(UPLOAD_PATH."images/600p_".$content_row['image'.$i]);
                        $vals['image'.$i] = $image['file_name'];
                    }
                }
            }

            $data = serialize(array_merge($content_row, $vals));
            $this->master->save($this->table_name,array('code' => $data),'ckey', 'uk_corporate_culture');
            setMsg('success', 'Settings updated successfully !');
            redirect(ADMIN . "/sitecontent/uk_corporate_culture");
            exit;
        }

        $this->data['row'] = $this->master->getRow($this->table_name, array('ckey' => 'uk_corporate_culture'));
        $this->data['row'] = unserialize($this->data['row']->code);
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }
    
    public function cv_guidence()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/site_cv_guidence';
        if ($vals = $this->input->post()) {
            $content_row = $this->master->getRow($this->table_name, array('ckey' => 'cv_guidence'));
            $content_row = unserialize($content_row->code);

            if(!is_array($content_row))
                $content_row = array();

            for($i = 1; $i <=1; $i++) {
                if (isset($_FILES["image".$i]["name"]) && $_FILES["image".$i]["name"] != "") {
                    
                    $image = upload_file(UPLOAD_PATH.'images/', 'image'.$i);
                    if($i === 1)
                    {
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],300,'thumb_');
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],500,'500p_');
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],800,'800p_');
                    }
                    if(!empty($image['file_name'])){
                        if(isset($content_row['image'.$i]))
                            // $this->remove_file(UPLOAD_PATH."images/".$content_row['image'.$i]);
                            // $this->remove_file(UPLOAD_PATH."images/thumb_".$content_row['image'.$i]);
                            // $this->remove_file(UPLOAD_PATH."images/400p_".$content_row['image'.$i]);
                            // $this->remove_file(UPLOAD_PATH."images/600p_".$content_row['image'.$i]);
                        $vals['image'.$i] = $image['file_name'];
                    }
                }
            }

            $data = serialize(array_merge($content_row, $vals));
            $this->master->save($this->table_name,array('code' => $data),'ckey', 'cv_guidence');
            setMsg('success', 'Settings updated successfully !');
            redirect(ADMIN . "/sitecontent/cv_guidence");
            exit;
        }

        $this->data['row'] = $this->master->getRow($this->table_name, array('ckey' => 'cv_guidence'));
        $this->data['row'] = unserialize($this->data['row']->code);
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    public function cover_letter_guidence()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/site_cover_letter_guidence';
        if ($vals = $this->input->post()) {
            $content_row = $this->master->getRow($this->table_name, array('ckey' => 'cover_letter_guidence'));
            $content_row = unserialize($content_row->code);

            if(!is_array($content_row))
                $content_row = array();

            for($i = 1; $i <=1; $i++) {
                if (isset($_FILES["image".$i]["name"]) && $_FILES["image".$i]["name"] != "") {
                    
                    $image = upload_file(UPLOAD_PATH.'images/', 'image'.$i);
                    if($i === 1)
                    {
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],300,'thumb_');
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],500,'500p_');
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],800,'800p_');
                    }
                    if(!empty($image['file_name'])){
                        if(isset($content_row['image'.$i]))
                            // $this->remove_file(UPLOAD_PATH."images/".$content_row['image'.$i]);
                            // $this->remove_file(UPLOAD_PATH."images/thumb_".$content_row['image'.$i]);
                            // $this->remove_file(UPLOAD_PATH."images/400p_".$content_row['image'.$i]);
                            // $this->remove_file(UPLOAD_PATH."images/600p_".$content_row['image'.$i]);
                        $vals['image'.$i] = $image['file_name'];
                    }
                }
            }

            $data = serialize(array_merge($content_row, $vals));
            $this->master->save($this->table_name,array('code' => $data),'ckey', 'cover_letter_guidence');
            setMsg('success', 'Settings updated successfully !');
            redirect(ADMIN . "/sitecontent/cover_letter_guidence");
            exit;
        }

        $this->data['row'] = $this->master->getRow($this->table_name, array('ckey' => 'cover_letter_guidence'));
        $this->data['row'] = unserialize($this->data['row']->code);
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }
    
    public function recruitement_process()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/site_recruitement_process';
        if ($vals = $this->input->post()) {
            $content_row = $this->master->getRow($this->table_name, array('ckey' => 'recruitement_process'));
            $content_row = unserialize($content_row->code);

            if(!is_array($content_row))
                $content_row = array();

            for($i = 1; $i <=1; $i++) {
                if (isset($_FILES["image".$i]["name"]) && $_FILES["image".$i]["name"] != "") {
                    
                    $image = upload_file(UPLOAD_PATH.'images/', 'image'.$i);
                    if($i === 1)
                    {
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],300,'thumb_');
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],500,'500p_');
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],800,'800p_');
                    }
                    if(!empty($image['file_name'])){
                        if(isset($content_row['image'.$i]))
                            // $this->remove_file(UPLOAD_PATH."images/".$content_row['image'.$i]);
                            // $this->remove_file(UPLOAD_PATH."images/thumb_".$content_row['image'.$i]);
                            // $this->remove_file(UPLOAD_PATH."images/400p_".$content_row['image'.$i]);
                            // $this->remove_file(UPLOAD_PATH."images/600p_".$content_row['image'.$i]);
                        $vals['image'.$i] = $image['file_name'];
                    }
                }
            }

            $sec2['title'] = $vals['sec2_title'];
            $sec2['detail'] = $vals['sec2_detail'];
            $sec2['order_no'] = $vals['sec2_order_no'];
            unset($vals['sec2_pics'],$vals['sec2_detail'],$vals['sec2_order_no'],$vals['sec2_title']);
            $this->master->delete_where('multi_text', array('section'=> 'recruitement-proccess-sec2'));
            $sec2s = array('order_no' => $sec2['order_no'],'detail' => $sec2['detail'],'title' => $sec2['title']);
            saveMultiMediaFields($sec2s, 'recruitement-proccess-sec2');

            $data = serialize(array_merge($content_row, $vals));
            $this->master->save($this->table_name,array('code' => $data),'ckey', 'recruitement_process');
            setMsg('success', 'Settings updated successfully !');
            redirect(ADMIN . "/sitecontent/recruitement_process");
            exit;
        }

        $this->data['row'] = $this->master->getRow($this->table_name, array('ckey' => 'recruitement_process'));
        $this->data['row'] = unserialize($this->data['row']->code);
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    public function assessment_center()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/site_assessment_center';
        if ($vals = $this->input->post()) {
            $content_row = $this->master->getRow($this->table_name, array('ckey' => 'assessment_center'));
            $content_row = unserialize($content_row->code);

            if(!is_array($content_row))
                $content_row = array();

            for($i = 1; $i <=1; $i++) {
                if (isset($_FILES["image".$i]["name"]) && $_FILES["image".$i]["name"] != "") {
                    
                    $image = upload_file(UPLOAD_PATH.'images/', 'image'.$i);
                    if($i === 1)
                    {
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],300,'thumb_');
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],500,'500p_');
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],800,'800p_');
                    }
                    if(!empty($image['file_name'])){
                        if(isset($content_row['image'.$i]))
                            // $this->remove_file(UPLOAD_PATH."images/".$content_row['image'.$i]);
                            // $this->remove_file(UPLOAD_PATH."images/thumb_".$content_row['image'.$i]);
                            // $this->remove_file(UPLOAD_PATH."images/400p_".$content_row['image'.$i]);
                            // $this->remove_file(UPLOAD_PATH."images/600p_".$content_row['image'.$i]);
                        $vals['image'.$i] = $image['file_name'];
                    }
                }
            }

            $sec2['title'] = $vals['sec2_title'];
            $sec2['detail'] = $vals['sec2_detail'];
            $sec2['order_no'] = $vals['sec2_order_no'];
            unset($vals['sec2_pics'],$vals['sec2_detail'],$vals['sec2_order_no'],$vals['sec2_title']);
            $this->master->delete_where('multi_text', array('section'=> 'assessment-center-sec2'));
            $sec2s = array('order_no' => $sec2['order_no'],'detail' => $sec2['detail'],'title' => $sec2['title']);
            saveMultiMediaFields($sec2s, 'assessment-center-sec2');

            $data = serialize(array_merge($content_row, $vals));
            $this->master->save($this->table_name,array('code' => $data),'ckey', 'assessment_center');
            setMsg('success', 'Settings updated successfully !');
            redirect(ADMIN . "/sitecontent/assessment_center");
            exit;
        }

        $this->data['row'] = $this->master->getRow($this->table_name, array('ckey' => 'assessment_center'));
        $this->data['row'] = unserialize($this->data['row']->code);
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    public function interview()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/site_interview';
        if ($vals = $this->input->post()) {
            $content_row = $this->master->getRow($this->table_name, array('ckey' => 'interview'));
            $content_row = unserialize($content_row->code);

            if(!is_array($content_row))
                $content_row = array();

            for($i = 1; $i <=1; $i++) {
                if (isset($_FILES["image".$i]["name"]) && $_FILES["image".$i]["name"] != "") {
                    
                    $image = upload_file(UPLOAD_PATH.'images/', 'image'.$i);
                    if($i === 1)
                    {
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],300,'thumb_');
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],500,'500p_');
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],800,'800p_');
                    }
                    if(!empty($image['file_name'])){
                        if(isset($content_row['image'.$i]))
                            // $this->remove_file(UPLOAD_PATH."images/".$content_row['image'.$i]);
                            // $this->remove_file(UPLOAD_PATH."images/thumb_".$content_row['image'.$i]);
                            // $this->remove_file(UPLOAD_PATH."images/400p_".$content_row['image'.$i]);
                            // $this->remove_file(UPLOAD_PATH."images/600p_".$content_row['image'.$i]);
                        $vals['image'.$i] = $image['file_name'];
                    }
                }
            }

            $sec2['title'] = $vals['sec2_title'];
            $sec2['detail'] = $vals['sec2_detail'];
            $sec2['order_no'] = $vals['sec2_order_no'];
            unset($vals['sec2_pics'],$vals['sec2_detail'],$vals['sec2_order_no'],$vals['sec2_title']);
            $this->master->delete_where('multi_text', array('section'=> 'interview-sec2'));
            $sec2s = array('order_no' => $sec2['order_no'],'detail' => $sec2['detail'],'title' => $sec2['title']);
            saveMultiMediaFields($sec2s, 'interview-sec2');

            $data = serialize(array_merge($content_row, $vals));
            $this->master->save($this->table_name,array('code' => $data),'ckey', 'interview');
            setMsg('success', 'Settings updated successfully !');
            redirect(ADMIN . "/sitecontent/interview");
            exit;
        }

        $this->data['row'] = $this->master->getRow($this->table_name, array('ckey' => 'interview'));
        $this->data['row'] = unserialize($this->data['row']->code);
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    public function cv_page()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/site_cv_page';
        if ($vals = $this->input->post()) {
            $content_row = $this->master->getRow($this->table_name, array('ckey' => 'cv_page'));
            $content_row = unserialize($content_row->code);

            if(!is_array($content_row))
                $content_row = array();

            // for($i = 1; $i <=1; $i++) {
            //     if (isset($_FILES["image".$i]["name"]) && $_FILES["image".$i]["name"] != "") {
                    
            //         $image = upload_file(UPLOAD_PATH.'images/', 'image'.$i);
            //         if($i === 1)
            //         {
            //             generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],300,'thumb_');
            //             generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],500,'500p_');
            //             generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],800,'800p_');
            //         }
            //         if(!empty($image['file_name'])){
            //             if(isset($content_row['image'.$i]))
            //                 // $this->remove_file(UPLOAD_PATH."images/".$content_row['image'.$i]);
            //                 // $this->remove_file(UPLOAD_PATH."images/thumb_".$content_row['image'.$i]);
            //                 // $this->remove_file(UPLOAD_PATH."images/400p_".$content_row['image'.$i]);
            //                 // $this->remove_file(UPLOAD_PATH."images/600p_".$content_row['image'.$i]);
            //             $vals['image'.$i] = $image['file_name'];
            //         }
            //     }
            // }

            $sec2['title'] = $vals['sec2_title'];
            $sec2['detail'] = $vals['sec2_detail'];
            $sec2['order_no'] = $vals['sec2_order_no'];
            unset($vals['sec2_pics'],$vals['sec2_detail'],$vals['sec2_order_no'],$vals['sec2_title']);
            $this->master->delete_where('multi_text', array('section'=> 'cv-page-left-instructions'));
            $sec2s = array('order_no' => $sec2['order_no'],'detail' => $sec2['detail'],'title' => $sec2['title']);
            saveMultiMediaFields($sec2s, 'cv-page-left-instructions');

            $data = serialize(array_merge($content_row, $vals));
            $this->master->save($this->table_name,array('code' => $data),'ckey', 'cv_page');
            setMsg('success', 'Settings updated successfully !');
            redirect(ADMIN . "/sitecontent/cv_page");
            exit;
        }

        $this->data['row'] = $this->master->getRow($this->table_name, array('ckey' => 'cv_page'));
        $this->data['row'] = unserialize($this->data['row']->code);
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    public function cover_letter_page()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/site_cover_letter_page';
        if ($vals = $this->input->post()) {
            $content_row = $this->master->getRow($this->table_name, array('ckey' => 'cover_letter_page'));
            $content_row = unserialize($content_row->code);

            if(!is_array($content_row))
                $content_row = array();

            // for($i = 1; $i <=1; $i++) {
            //     if (isset($_FILES["image".$i]["name"]) && $_FILES["image".$i]["name"] != "") {
                    
            //         $image = upload_file(UPLOAD_PATH.'images/', 'image'.$i);
            //         if($i === 1)
            //         {
            //             generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],300,'thumb_');
            //             generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],500,'500p_');
            //             generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],800,'800p_');
            //         }
            //         if(!empty($image['file_name'])){
            //             if(isset($content_row['image'.$i]))
            //                 // $this->remove_file(UPLOAD_PATH."images/".$content_row['image'.$i]);
            //                 // $this->remove_file(UPLOAD_PATH."images/thumb_".$content_row['image'.$i]);
            //                 // $this->remove_file(UPLOAD_PATH."images/400p_".$content_row['image'.$i]);
            //                 // $this->remove_file(UPLOAD_PATH."images/600p_".$content_row['image'.$i]);
            //             $vals['image'.$i] = $image['file_name'];
            //         }
            //     }
            // }

            $sec2['title'] = $vals['sec2_title'];
            $sec2['detail'] = $vals['sec2_detail'];
            $sec2['order_no'] = $vals['sec2_order_no'];
            unset($vals['sec2_pics'],$vals['sec2_detail'],$vals['sec2_order_no'],$vals['sec2_title']);
            $this->master->delete_where('multi_text', array('section'=> 'cover-letter-page-left-instructions'));
            $sec2s = array('order_no' => $sec2['order_no'],'detail' => $sec2['detail'],'title' => $sec2['title']);
            saveMultiMediaFields($sec2s, 'cover-letter-page-left-instructions');

            $data = serialize(array_merge($content_row, $vals));
            $this->master->save($this->table_name,array('code' => $data),'ckey', 'cover_letter_page');
            setMsg('success', 'Settings updated successfully !');
            redirect(ADMIN . "/sitecontent/cover_letter_page");
            exit;
        }

        $this->data['row'] = $this->master->getRow($this->table_name, array('ckey' => 'cover_letter_page'));
        $this->data['row'] = unserialize($this->data['row']->code);
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    public function cv_and_cover_letter()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/site_cv_and_cover_letter';
        if ($vals = $this->input->post()) {
            $content_row = $this->master->getRow($this->table_name, array('ckey' => 'cv_and_cover_letter'));
            $content_row = unserialize($content_row->code);

            if(!is_array($content_row))
                $content_row = array();

            for($i = 1; $i <=2; $i++) {
                if (isset($_FILES["image".$i]["name"]) && $_FILES["image".$i]["name"] != "") {
                    
                    $image = upload_file(UPLOAD_PATH.'images/', 'image'.$i);
                    generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],100,'thumb_');
                    if(!empty($image['file_name'])){
                        if(isset($content_row['image'.$i]))
                            // $this->remove_file(UPLOAD_PATH."images/".$content_row['image'.$i]);
                            // $this->remove_file(UPLOAD_PATH."images/thumb_".$content_row['image'.$i]);
                        $vals['image'.$i] = $image['file_name'];
                    }
                }
            }

            $data = serialize(array_merge($content_row, $vals));
            $this->master->save($this->table_name,array('code' => $data),'ckey', 'cv_and_cover_letter');
            setMsg('success', 'Settings updated successfully !');
            redirect(ADMIN . "/sitecontent/cv_and_cover_letter");
            exit;
        }

        $this->data['row'] = $this->master->getRow($this->table_name, array('ckey' => 'cv_and_cover_letter'));
        $this->data['row'] = unserialize($this->data['row']->code);
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    public function uni_vs_emp()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/site_uni_vs_emp';
        if ($vals = $this->input->post()) {
            $content_row = $this->master->getRow($this->table_name, array('ckey' => 'uni_vs_emp'));
            $content_row = unserialize($content_row->code);

            if(!is_array($content_row))
                $content_row = array();

            for($i = 1; $i <=2; $i++) {
                if (isset($_FILES["image".$i]["name"]) && $_FILES["image".$i]["name"] != "") {
                    
                    $image = upload_file(UPLOAD_PATH.'images/', 'image'.$i);
                    generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],100,'thumb_');
                    if(!empty($image['file_name'])){
                        if(isset($content_row['image'.$i]))
                            // $this->remove_file(UPLOAD_PATH."images/".$content_row['image'.$i]);
                            // $this->remove_file(UPLOAD_PATH."images/thumb_".$content_row['image'.$i]);
                        $vals['image'.$i] = $image['file_name'];
                    }
                }
            }

            $data = serialize(array_merge($content_row, $vals));
            $this->master->save($this->table_name,array('code' => $data),'ckey', 'uni_vs_emp');
            setMsg('success', 'Settings updated successfully !');
            redirect(ADMIN . "/sitecontent/uni_vs_emp");
            exit;
        }

        $this->data['row'] = $this->master->getRow($this->table_name, array('ckey' => 'uni_vs_emp'));
        $this->data['row'] = unserialize($this->data['row']->code);
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    public function partner_with_us()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/site_partner_with_us';
        if ($vals = $this->input->post()) {
            $content_row = $this->master->getRow($this->table_name, array('ckey' => 'partner_with_us'));
            $content_row = unserialize($content_row->code);

            if(!is_array($content_row))
                $content_row = array();

            for($i = 1; $i <= 5; $i++) {
                if (isset($_FILES["image".$i]["name"]) && $_FILES["image".$i]["name"] != "") {
                    
                    $image = upload_file(UPLOAD_PATH.'images/', 'image'.$i);
                    if($i === 1)
                    {
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],300,'thumb_');
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],500,'500p_');
                        generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$image['file_name'],800,'800p_');
                    }
                    if(!empty($image['file_name'])){
                        if(isset($content_row['image'.$i]))
                            // $this->remove_file(UPLOAD_PATH."images/".$content_row['image'.$i]);
                            // $this->remove_file(UPLOAD_PATH."images/thumb_".$content_row['image'.$i]);
                            // $this->remove_file(UPLOAD_PATH."images/400p_".$content_row['image'.$i]);
                            // $this->remove_file(UPLOAD_PATH."images/600p_".$content_row['image'.$i]);
                        $vals['image'.$i] = $image['file_name'];
                    }
                }
            }

            $sec2['title'] = $vals['sec2_title'];
            $sec2['detail'] = $vals['sec2_detail'];
            $sec2['order_no'] = $vals['sec2_order_no'];
            unset($vals['sec2_pics'],$vals['sec2_detail'],$vals['sec2_order_no'],$vals['sec2_title']);
            $this->master->delete_where('multi_text', array('section'=> 'for-employer-faq'));
            $sec2s = array('order_no' => $sec2['order_no'],'detail' => $sec2['detail'],'title' => $sec2['title']);
            saveMultiMediaFields($sec2s, 'for-employer-faq');

            $data = serialize(array_merge($content_row, $vals));
            $this->master->save($this->table_name,array('code' => $data),'ckey', 'partner_with_us');
            setMsg('success', 'Settings updated successfully !');
            redirect(ADMIN . "/sitecontent/partner_with_us");
            exit;
        }

        $this->data['row'] = $this->master->getRow($this->table_name, array('ckey' => 'partner_with_us'));
        $this->data['row'] = unserialize($this->data['row']->code);
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    public function job_profile()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/site_job_profile';
        if ($vals = $this->input->post()) {
            $content_row = $this->master->getRow($this->table_name, array('ckey' => 'job_profile'));
            $content_row = unserialize($content_row->code);

            if(!is_array($content_row))
                $content_row = array();


            $data = serialize(array_merge($content_row, $vals));
            $this->master->save($this->table_name,array('code' => $data),'ckey', 'job_profile');
            setMsg('success', 'Settings updated successfully !');
            redirect(ADMIN . "/sitecontent/job_profile");
            exit;
        }

        $this->data['row'] = $this->master->getRow($this->table_name, array('ckey' => 'job_profile'));
        $this->data['row'] = unserialize($this->data['row']->code);
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    public function faq()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/site_faq';
        if ($vals = $this->input->post()) {
            $content_row = $this->master->getRow($this->table_name, array('ckey' => 'faq'));
            $content_row = unserialize($content_row->code);

            if(!is_array($content_row))
                $content_row = array();

            $sec2['title'] = $vals['sec2_title'];
            $sec2['detail'] = $vals['sec2_detail'];
            $sec2['order_no'] = $vals['sec2_order_no'];
            unset($vals['sec2_pics'],$vals['sec2_detail'],$vals['sec2_order_no'],$vals['sec2_title']);
            $this->master->delete_where('multi_text', array('section'=> 'faqs'));
            $sec2s = array('order_no' => $sec2['order_no'],'detail' => $sec2['detail'],'title' => $sec2['title']);
            saveMultiMediaFields($sec2s, 'faqs');

            $data = serialize(array_merge($content_row, $vals));
            $this->master->save($this->table_name,array('code' => $data),'ckey', 'faq');
            setMsg('success', 'Settings updated successfully !');
            redirect(ADMIN . "/sitecontent/faq");
            exit;
        }



        $this->data['row'] = $this->master->getRow($this->table_name, array('ckey' => 'faq'));
        $this->data['row'] = unserialize($this->data['row']->code);
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    public function career_options()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/site_career_options';
        if ($vals = $this->input->post()) {
            $content_row = $this->master->getRow($this->table_name, array('ckey' => 'career_options'));
            $content_row = unserialize($content_row->code);

            if(!is_array($content_row))
                $content_row = array();

            $heading1['title'] = $vals['heading1_title'];
            $heading1['detail'] = $vals['heading1_detail'];
            $heading1['order_no'] = $vals['heading1_order_no'];
            unset($vals['heading1_pics'],$vals['heading1_detail'],$vals['heading1_order_no'],$vals['heading1_title']);
            $this->master->delete_where('multi_text', array('section'=> 'heading1-content'));
            $heading1s = array('order_no' => $heading1['order_no'],'detail' => $heading1['detail'],'title' => $heading1['title']);
            saveMultiMediaFields($heading1s, 'heading1-content');

            $heading2['title'] = $vals['heading2_title'];
            $heading2['detail'] = $vals['heading2_detail'];
            $heading2['order_no'] = $vals['heading2_order_no'];
            unset($vals['heading2_pics'],$vals['heading2_detail'],$vals['heading2_order_no'],$vals['heading2_title']);
            $this->master->delete_where('multi_text', array('section'=> 'heading2-content'));
            $heading2s = array('order_no' => $heading2['order_no'],'detail' => $heading2['detail'],'title' => $heading2['title']);
            saveMultiMediaFields($heading2s, 'heading2-content');

            $heading3['title'] = $vals['heading3_title'];
            $heading3['detail'] = $vals['heading3_detail'];
            $heading3['order_no'] = $vals['heading3_order_no'];
            unset($vals['heading3_pics'],$vals['heading3_detail'],$vals['heading3_order_no'],$vals['heading3_title']);
            $this->master->delete_where('multi_text', array('section'=> 'heading3-content'));
            $heading3s = array('order_no' => $heading3['order_no'],'detail' => $heading3['detail'],'title' => $heading3['title']);
            saveMultiMediaFields($heading3s, 'heading3-content');

            $data = serialize(array_merge($content_row, $vals));
            $this->master->save($this->table_name,array('code' => $data),'ckey', 'career_options');
            setMsg('success', 'Settings updated successfully !');
            redirect(ADMIN . "/sitecontent/career_options");
            exit;
        }



        $this->data['row'] = $this->master->getRow($this->table_name, array('ckey' => 'career_options'));
        $this->data['row'] = unserialize($this->data['row']->code);
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    public function online_test()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/site_online_test';
        if ($vals = $this->input->post()) {
            $content_row = $this->master->getRow($this->table_name, array('ckey' => 'online_test'));
            $content_row = unserialize($content_row->code);

            if(!is_array($content_row))
                $content_row = array();


            $data = serialize(array_merge($content_row, $vals));
            $this->master->save($this->table_name,array('code' => $data),'ckey', 'online_test');
            setMsg('success', 'Settings updated successfully !');
            redirect(ADMIN . "/sitecontent/online_test");
            exit;
        }

        $this->data['row'] = $this->master->getRow($this->table_name, array('ckey' => 'online_test'));
        $this->data['row'] = unserialize($this->data['row']->code);
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    public function video_interview_main()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/site_video_interview_main';
        if ($vals = $this->input->post()) {
            $content_row = $this->master->getRow($this->table_name, array('ckey' => 'video_interview_main'));
            $content_row = unserialize($content_row->code);

            if(!is_array($content_row))
                $content_row = array();


            $data = serialize(array_merge($content_row, $vals));
            $this->master->save($this->table_name,array('code' => $data),'ckey', 'video_interview_main');
            setMsg('success', 'Settings updated successfully !');
            redirect(ADMIN . "/sitecontent/video_interview_main");
            exit;
        }

        $this->data['row'] = $this->master->getRow($this->table_name, array('ckey' => 'video_interview_main'));
        $this->data['row'] = unserialize($this->data['row']->code);
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    public function testimonials()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/site_testimonials';
        if ($vals = $this->input->post()) {
            $content_row = $this->master->getRow($this->table_name, array('ckey' => 'testimonials'));
            $content_row = unserialize($content_row->code);

            if(!is_array($content_row))
                $content_row = array();


            $data = serialize(array_merge($content_row, $vals));
            $this->master->save($this->table_name,array('code' => $data),'ckey', 'testimonials');
            setMsg('success', 'Settings updated successfully !');
            redirect(ADMIN . "/sitecontent/testimonials");
            exit;
        }

        $this->data['row'] = $this->master->getRow($this->table_name, array('ckey' => 'testimonials'));
        $this->data['row'] = unserialize($this->data['row']->code);
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    public function blogs()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/site_blogs';
        if ($vals = $this->input->post()) {
            $content_row = $this->master->getRow($this->table_name, array('ckey' => 'blogs'));
            $content_row = unserialize($content_row->code);

            if(!is_array($content_row))
                $content_row = array();


            $data = serialize(array_merge($content_row, $vals));
            $this->master->save($this->table_name,array('code' => $data),'ckey', 'blogs');
            setMsg('success', 'Settings updated successfully !');
            redirect(ADMIN . "/sitecontent/blogs");
            exit;
        }

        $this->data['row'] = $this->master->getRow($this->table_name, array('ckey' => 'blogs'));
        $this->data['row'] = unserialize($this->data['row']->code);
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    public function terms_and_conditions()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/site_terms_and_conditions';
        if ($vals = $this->input->post()) {
            $content_row = $this->master->getRow($this->table_name, array('ckey' => 'terms_and_conditions'));
            $content_row = unserialize($content_row->code);

            if(!is_array($content_row))
                $content_row = array();


            $data = serialize(array_merge($content_row, $vals));
            $this->master->save($this->table_name,array('code' => $data),'ckey', 'terms_and_conditions');
            setMsg('success', 'Settings updated successfully !');
            redirect(ADMIN . "/sitecontent/terms_and_conditions");
            exit;
        }

        $this->data['row'] = $this->master->getRow($this->table_name, array('ckey' => 'terms_and_conditions'));
        $this->data['row'] = unserialize($this->data['row']->code);
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    public function privacy_policy()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/site_privacy_policy';
        if ($vals = $this->input->post()) {
            $content_row = $this->master->getRow($this->table_name, array('ckey' => 'privacy_policy'));
            $content_row = unserialize($content_row->code);

            if(!is_array($content_row))
                $content_row = array();


            $data = serialize(array_merge($content_row, $vals));
            $this->master->save($this->table_name,array('code' => $data),'ckey', 'privacy_policy');
            setMsg('success', 'Settings updated successfully !');
            redirect(ADMIN . "/sitecontent/privacy_policy");
            exit;
        }

        $this->data['row'] = $this->master->getRow($this->table_name, array('ckey' => 'privacy_policy'));
        $this->data['row'] = unserialize($this->data['row']->code);
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    public function signup()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/site_signup';
        if ($vals = $this->input->post()) {
            $content_row = $this->master->getRow($this->table_name, array('ckey' => 'signup'));
            $content_row = unserialize($content_row->code);

            if(!is_array($content_row))
                $content_row = array();


            $data = serialize(array_merge($content_row, $vals));
            $this->master->save($this->table_name,array('code' => $data),'ckey', 'signup');
            setMsg('success', 'Settings updated successfully !');
            redirect(ADMIN . "/sitecontent/signup");
            exit;
        }

        $this->data['row'] = $this->master->getRow($this->table_name, array('ckey' => 'signup'));
        $this->data['row'] = unserialize($this->data['row']->code);
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    public function disclaimer()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/site_disclaimer';
        if ($vals = $this->input->post()) {
            $content_row = $this->master->getRow($this->table_name, array('ckey' => 'disclaimer'));
            $content_row = unserialize($content_row->code);

            if(!is_array($content_row))
                $content_row = array();


            $data = serialize(array_merge($content_row, $vals));
            $this->master->save($this->table_name,array('code' => $data),'ckey', 'disclaimer');
            setMsg('success', 'Settings updated successfully !');
            redirect(ADMIN . "/sitecontent/disclaimer");
            exit;
        }

        $this->data['row'] = $this->master->getRow($this->table_name, array('ckey' => 'disclaimer'));
        $this->data['row'] = unserialize($this->data['row']->code);
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    public function delete()
    {
        $arr = $this->input->post('delete');
        foreach ($arr as $key => $values) {
            $this->master->delete($this->table_name, 'id', $values);
        }
        redirect("admin/sitecontent/slider", 'refresh');
    }

    function remove_file($filepath)
    {
        if (is_file($filepath))
            unlink($filepath);
        return;
    }

}
?>