<?php
class Auth extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        header('Content-Type: application/json');
        $this->load->model('Member_model', 'member');
    }

    function sign_up()
    {
        if($this->input->post())
        {
            $res = [];
            $res['status'] = 0;
            $res['validationErrors'] = '';
            $this->form_validation->set_rules('fname', 'First Name', 'trim|required|alpha|min_length[2]|max_length[20]', 
                [
                    'alpha' => 'First Name should contains only letters and avoid space.',
                    'min_length' => 'First Name should contains atleast 2 letters.',
                    'max_length' => 'First Name should not be greater than 20 letters.'
                ]);
            $this->form_validation->set_rules('lname', 'Last Name', 'trim|required|alpha|min_length[2]|max_length[20]', 
                [
                    'alpha' => 'Last Name should contains only letters and avoid space.',
                    'min_length' => 'Last Name should contains atleast 2 letters.',
                    'max_length' => 'Last Name should not be greater than 20 letters.'
                ]);
            $this->form_validation->set_rules('phone', 'Email', 'trim|required|is_unique[members.mem_phone]', 
                [
                    'is_unique' => 'This phone is already in use.'
                ]);
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[members.mem_email]', 
                [
                    'valid_email' => 'Please enter a valid email.',
                    'is_unique' => 'This email is already in use.'
                ]);
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            // $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]|callback_is_password_strong', 
            //     [
            //         'is_password_strong' => 'Password should contains alteast 1 small letter, 1 capital letter, 1 number, and one special characher.'
            //     ]);
            $this->form_validation->set_rules('language', 'Language', 'trim|required');
            $this->form_validation->set_rules('ethnicity', 'Ethnicity', 'trim|required');
            $this->form_validation->set_rules('sexual', 'Sexual Orientation', 'trim|required');
            $this->form_validation->set_rules('nationality', 'Nationality', 'trim|required');
            $this->form_validation->set_rules('edu_current', 'Current Status', 'trim|required');
            $this->form_validation->set_rules('edu_uni', 'University', 'trim|required');
            $this->form_validation->set_rules('edu_degree', 'Degree Subject', 'trim|required');
            $this->form_validation->set_rules('edu_graduation', 'Graduation Year', 'trim|required');
            $this->form_validation->set_rules('job_type', 'Opportunity Type', 'trim|required');
            $this->form_validation->set_rules('sector', 'Industry/Sector', 'trim|required');

            if ($this->form_validation->run() === FALSE) {
                $res['validationErrors'] = validation_errors();
            }
            else
            {
                $post = html_escape($this->input->post());
                $rando = doEncode(rand(99, 999) . '-' . $post['email']);
                $rando = strlen($rando) > 225 ? substr($rando, 0, 225) : $rando;

                if (isset($_FILES["document"]["name"]) && $_FILES["document"]["name"] != "") {
                    $image = upload_file(UPLOAD_PATH . 'members', 'document', 'file');
                    $mem_cv = $image['file_name'];
                }

                $save_data = [
                    'mem_fname' => ucfirst($post['fname']),
                    'mem_lname' => ucfirst($post['lname']),
                    'mem_email' => $post['email'],
                    'mem_phone' => $post['phone'],
                    'mem_pswd'  => doEncode($post['password']),
                    'mem_language'      => $post['language'],
                    'mem_ethnicity'     => $post['ethnicity'],
                    'mem_sex'           => $post['sexual'],
                    'mem_disablity'     => $post['disability'],
                    'mem_nationality'   => $post['nationality'],
                    'mem_current_status'=> $post['edu_current'],
                    'mem_university'    => $post['edu_uni'],
                    'mem_subject'       => $post['edu_degree'],
                    'mem_graduate_year' => $post['edu_graduation'],
                    'mem_opportunity'   => $post['job_type'],
                    'mem_industry'      => $post['sector'],
                    'mem_cv'            => $mem_cv,
                    'mem_code'          => $rando,
                    'mem_status'        => 1,
                    'mem_last_login'    => date('Y-m-d h:i:s')
                ];
                $mem_id = $this->member->save($save_data);
                // $this->session->set_userdata('mem_id', $mem_id);
                // $this->session->set_userdata('mem_type', $as);


                // $verify_link = site_url('verification/' . $rando);
                // $mem_data = array('name' => ucfirst($post['firstName']) . ' ' . ucfirst($post['lasName']), "email" => $post['email'], "link" => $verify_link);
                // $this->send_site_email($mem_data, 'signup');

                $res['authToken'] = doEncode('auth_'.$mem_id);
                if($mem_id)
                {
                    $res['status'] = 1;
                }
            }
            echo json_encode($res);
            exit;
        }
    }

    function sign_in()
    {
        if($this->input->post())
        {
            $res = [];
            $res['status'] = 0;
            $res['validationErrors'] = '';
            $res['msg'] = '';
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'required');
            if ($this->form_validation->run() === FALSE) {
                $res['validationErrors'] = validation_errors();
            }
            else
            {
                $data = $this->input->post();
                $row = $this->member->authenticate($data['email'], $data['password']);

                if (count((array)$row) > 0) {
                    // if ($row->mem_status == 0) {
                    //     $res['msg'] = showMsg('error', 'Your account has been blocked!');
                    //     exit(json_encode($res));
                    // }

                    $this->member->save(['mem_first_time_login' => 'no'], $row->mem_id);
                    $this->member->update_last_login($row->mem_id, $remember_token);
                    // $this->session->set_userdata('mem_id', $row->mem_id);
                    // $this->session->set_userdata('mem_type', $row->mem_type);
                    $res['authToken'] = doEncode('auth_'. $row->mem_id);
                    $res['status'] = 1;
                } else {
                    $res['status'] = 0;
                    $res['validationErrors'] = '<p>Worng email or password.</p>';
                }
            }
            echo json_encode($res);
            exit;
        }
    }

    function forgot_password()
    {
        if($this->input->post())
        {
            $res = [];
            $res['status'] = 0;
            $res['validationErrors'] = '';
            $res['msg'] = '';
            $res['notExist'] = 0;

            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            if ($this->form_validation->run() === FALSE) {
                $res['validationErrors'] = validation_errors();
            } else {
                $post    = $this->input->post();
                if ($mem = $this->member->forgotEmailExists($post['email'])) {
                    $rando = doEncode(randCode(rand(15, 20)));
                    $this->master->save('members', array('mem_code' => $rando), 'mem_id', $mem->mem_id);

                    // $reset_link = site_url('reset/' . $rando);
                    $reset_link = 'http://localhost:3003/reset-password/' . $rando;
                    $mem_data = array('name' => $mem->mem_fname . ' ' . $mem->mem_lname, "email" => $mem->mem_email, "link" => $reset_link);
                    $this->send_site_email($mem_data, 'forgot_password');

                    // $res['msg'] = showMsg('success', 'We’ve sent a reset password link to the email address you entered to reset your password. If you don’t see the email, check your spam folder or email.');
                    $res['status'] = 1;
                    // $res['frm_reset'] = 1;
                } else {
                    // $res['msg'] = '<p>No such email address exists. Please try again.</p>';
                    $res['status'] = 0;
                    $res['notExist'] = 1;
                }
            }
            echo json_encode($res);
            exit;
        }
    }

    function reset_password()
    {
        if($this->input->post())
        {
            $res = [];
            $res['status'] = 0;
            $res['validationErrors'] = '';
            $res['msg'] = '';
            $res['notExist'] = 0;

            // pr($this->input->post());
            
            $mem_id = '';
            if ($row = $this->member->getMemCode($this->input->post('token'))) {
                $mem_id = $row->mem_id;
            } else {
                $res['notExist'] = 1;
                echo json_encode($res);
                exit;
            }


            $this->form_validation->set_rules('password', 'New Password', 'required|min_length[8]|callback_is_password_strong', ['is_password_strong' => 'Password should contains alteast 1 small letter, 1 capital letter, 1 number, and one special characher.']);
            $this->form_validation->set_rules('c_password', 'Confirm Password', 'required|matches[password]', ['matches' => 'Confirm password must be the as the password.']);
            if ($this->form_validation->run() === FALSE) {
                $res['validationErrors'] = validation_errors();
            } else {
                $post = html_escape($this->input->post());
                $this->member->save(array('mem_pswd' => doEncode($post['password'])), $mem_id);
                $this->member->save(array('mem_code' => ''), $mem_id);

                $mem_data = array('name' => $row->mem_fname . ' ' . $row->mem_lname, "email" => $row->mem_email);
                $this->send_site_email($mem_data, 'reset_password');


                $res['status'] = 1;
            }
            echo json_encode($res);
            exit;
        }
    }


    ### callback functions
    public function is_password_strong($password)
    {
        $whiteListedSpecial = "\$\@\#\^\|\!\~\=\+\-\_\.";
        if (preg_match('#[0-9]#', $password) && preg_match('#[a-zA-Z]#', $password) && preg_match('/[' . $whiteListedSpecial . ']/', $password)) {
            return TRUE;
        }
        return FALSE;
    }

}
