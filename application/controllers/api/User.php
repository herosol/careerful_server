<?php
class User extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        header('Content-Type: application/json');
        $this->load->model('Member_model', 'member');
    }

    function dashboard()
    {
        if($this->input->post())
        {
            $post = $this->input->post();
            $token = explode('_', doDecode($post['token']));
            $mem_id = $token[1];
            $this->data['page_title'] = 'Dashboard'.' - '.$this->data['site_settings']->site_name;
            $this->data['jobs'] = $this->member->getSavedJobs($mem_id);
            http_response_code(200);
            echo json_encode($this->data);
            exit;
        }
        else
        {
            http_response_code(404);
            exit;
        }
    }

    function profile_settings()
    {
        if($this->input->post())
        {
            $post = $this->input->post();
            $token = explode('_', doDecode($post['token']));
            $mem_id = $token[1];
            $this->data['page_title'] = 'Profile Settings'.' - '.$this->data['site_settings']->site_name;
            $this->data['mem'] = $this->member->getMember($mem_id);
            http_response_code(200);
            echo json_encode($this->data);
            exit;
        }
        else
        {
            http_response_code(404);
            exit;
        }
    }

    function save_profile_settings()
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
            $this->form_validation->set_rules('phone', 'Email', 'trim|required');
            // $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[members.mem_email]', 
            //     [
            //         'valid_email' => 'Please enter a valid email.',
            //         'is_unique' => 'This email is already in use.'
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
                $token = explode('_', doDecode($post['authToken']));
                $mem_id = $token[1];
                // $rando = doEncode(rand(99, 999) . '-' . $post['email']);
                // $rando = strlen($rando) > 225 ? substr($rando, 0, 225) : $rando;
                $save_data = [
                    'mem_fname' => ucfirst($post['fname']),
                    'mem_lname' => ucfirst($post['lname']),
                    'mem_phone' => $post['phone'],
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
                    'mem_industry'      => $post['sector']
                ];
                $mem_id = $this->member->save($save_data, $mem_id);
                // $this->session->set_userdata('mem_id', $mem_id);
                // $this->session->set_userdata('mem_type', $as);


                // $verify_link = site_url('verification/' . $rando);
                // $mem_data = array('name' => ucfirst($post['firstName']) . ' ' . ucfirst($post['lasName']), "email" => $post['email'], "link" => $verify_link);
                // $this->send_site_email($mem_data, 'signup');

                if($mem_id)
                {
                    $res['status'] = 1;
                }
            }
            echo json_encode($res);
            exit;
        }
    }

    function save_job_stat()
    {
        if($this->input->post())
        {
            $res = [];
            $res['status'] = 0;
            $post = $this->input->post();
            
            $this->master->save('saved_jobs', [$post['field'] => $post['value']], 'id', $post['saved_id']);
            $res['status'] = 1;
            echo json_encode($res);
            exit;
        }
    }

    function change_password()
    {
        if ($this->input->post()) {
            $res = [];
            $res['status'] = 0;
            $res['validationErrors'] = '';

            $this->form_validation->set_rules('pass', 'Current Password', 'required');
            $this->form_validation->set_rules('new_pass', 'New Password', 'required');
            $this->form_validation->set_rules('confirm_pass', 'Confirm Password', 'required|matches[new_pass]');

            if ($this->form_validation->run() === FALSE) {
                $res['validationErrors'] = validation_errors();
            } else {
                $post = html_escape($this->input->post());
                $token = explode('_', doDecode($post['authToken']));
                $mem_id = $token[1];
                $row = $this->member->oldPswdCheck($mem_id, $post['pass']);
                if (count($row) > 0) {
                    $ary = array('mem_pswd' => doEncode($post['new_pass']));
                    $this->member->save($ary, $mem_id);

                    $res['status'] = 1;
                } else {
                    $res['status'] = 0;
                    $res['validationErrors'] = '<p>Old Password Does Not Match.</p>';
                }
            }
            exit(json_encode($res));
        }
    }

}
