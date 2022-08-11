<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MY_Controller extends CI_Controller {

    public $data = array();

    public function __construct() {
        parent::__construct();
        $this->data['site_settings'] = $this->getSiteSettings();
        $this->data['page']          = $this->uri->segment(1);
    }

    public function isMemLogged($is_verified = true)
    {
        if (intval($this->session->mem_id) < 1) 
        {
            $remember_cookie = $this->input->cookie('cml_remember');
            if($remember_cookie && $row = $this->master->getRow('members', array('mem_remember' => $remember_cookie)))
            {
                $this->session->set_userdata('mem_id', $row->mem_id);

            }else{
                $this->session->set_userdata('redirect_url', currentURL());
                redirect('signin', 'refresh');
                exit;
            }

        }

        # IF USER EMAIL VERIFIED
        if($is_verified)
            $this->is_verified();
    }
    
    function send_proof_mail($proof_id)
    {
        $proof_id = doDecode($proof_id);
        $proof = $this->master->getRow('order_delivery_proof',array('proof_id'=>$proof_id));
        $order = $this->master->getRow('orders',array('order_id'=>$proof->order_id));
        $settings = $this->data['site_settings'];
        
        $name = $mem_data['name'];
        
        $msg_body = "<h4 style='text-align:left;padding:0px 20px;margin-bottom:0px;'>Hi " . $order->buyer_fname . ' ' . $order->buyer_fname . ",</h4>
        <p style='text-align:left;padding:5px 20px;'>A Delivery Proof is send to your profile. Please respond to it.</p>
        <p style='text-align:left;padding:5px 20px;'>If you didn;t respond , it will be automatically accepted after 24 Hours.</p>";
        eval("\$msg_body = \"$msg_body\";");
        
        $emailto = $order->buyer_email;
        $subject = $settings->site_name." - Delivery Proof";
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html;charset=utf-8\r\n";
        $headers .= "From: " . $settings->site_name . " <" . $settings->site_email . ">" . "\r\n";
        $headers .= "Reply-To: " . $settings->site_name . " <" . $settings->site_email . ">" . "\r\n";

        $this->data['email_body'] = $msg_body;
        $this->data['email_subject'] = $subject;
        $ebody = $this->load->view('includes/email_template', $this->data, TRUE);
        // pr($ebody);
        if (@mail($emailto, $subject, $ebody, $headers)) {
            return $ebody;
        } else {
            return 0;
        }
    }

    public function type_logged_checked($type_arr) {
        if ($this->session->mem_type && !in_array($this->session->mem_type, $type_arr)) 
        {
            redirect('sigin', 'refresh');
            exit;
        }
    }

    function is_verified()
    {
        if(empty($this->data['mem_data']->mem_verified) || $this->data['mem_data']->mem_verified == 0) 
        {
            redirect('user/dashboard', 'refresh');
            exit;
        }
    }

    public function MemLogged()
    {
        $remember_cookie = $this->input->cookie('cml_remember');
        if($remember_cookie && $row = $this->master->getRow('members', array('mem_remember' => $remember_cookie)))
        {
            $this->session->set_userdata('mem_id', $row->mem_id);
            $this->session->set_userdata('mem_type', $row->mem_type);
            redirect($this->session->mem_type.'/dashboard', 'refresh');
            exit;
        }
        elseif (($this->session->mem_id > 0))
        {
            redirect('user/dashboard', 'refresh');
            exit;
        }
    }

    function if_booking_running()
    {
        if(!isset($this->session->selection))
        {
            redirect(base_url(), 'refresh');
        }
    }

    function getActiveMem()
    {
        $row = $this->master->getRow('members', array('mem_id' => $this->session->mem_id));
        return $row;
    }

    function getSiteSettings()
    {
        return $this->master->getRow("siteadmin", array('site_id' => '1'));
    }

    

    // function send_site_email($mem_data, $key)
    // {

    //     // $this->load->model('member_model', 'member');
    //     $settings = $this->data['site_settings'];
    //     // $mem_row = $this->member->getMember($mem_id);
        
    //     $name = $mem_data['name'];
    //     // $name=$mem_row->mem_fname . ' ' . $mem_row->mem_lname;
        
    //     $msg_body = getSiteText('email',$key);
    //     eval("\$msg_body = \"$msg_body\";");
        
    //     if(!empty($mem_data['link'])){
    //         // $verify_link = site_url('verification/' .$mem_row->mem_code);
    //         $msg_body.="<p><a href='{$mem_data['link']}' style='color: #37b36f; text-decoration: none;'>".$mem_data['link']."</a></p><p>And this is your password: ".$mem_data['password']."</p>";
    //     }

    //     if(!empty($mem_data['password']))
    //     {
    //         $msg_body .= "<p>And this is your password: ".$mem_data['password']."</p>";
    //     }

    //     // $emailto = $mem_row->mem_email;
    //     $emailto = $mem_data['email'];
    //     $subject = $settings->site_name." - ".getSiteText('email', $key,'subject');
    //     $headers = "MIME-Version: 1.0\r\n";
    //     $headers .= "Content-type: text/html;charset=utf-8\r\n";
    //     $headers .= "From: " . $settings->site_name . " <" . $settings->site_email . ">" . "\r\n";
    //     $headers .= "Reply-To: " . $settings->site_name . " <" . $settings->site_email . ">" . "\r\n";

    //     $this->data['email_body'] = $msg_body;
    //     $this->data['email_subject'] = $subject;
    //     $ebody = $this->load->view('includes/email_template', $this->data, TRUE);
    //     if (@mail($emailto, $subject, $ebody, $headers)) {
    //         return 1;
    //     } else {
    //         return 0;
    //     }
    // }

    function send_site_email($mem_data, $key){
        $name = $mem_data['name'];
        $settings = $this->getSiteSettings();
        $from     = 'saad@herosolutions.com.pk';
        
        $subject  = $settings->site_name." - ".getSiteText('email', $key,'subject');
        $emailto  = $mem_data['email'];
        
        $this->load->library('email');
        $config = Array(
           'protocol'=>'smtp',
           'smtp_host'=>'ssl://mail.herosolutions.com.pk',
           'smtp_port'=> 465,
           'smtp_user'=>'saad@herosolutions.com.pk',
           'smtp_pass'=>'ctl@pxo4.Jz&',
           'mailtype' =>'html',
        //    'charset'  =>'iso-8859-1'
            'charset' => 'utf-8',
            'starttls'  => true
        );
        
        $msg_body = getSiteText('email', $key);
        eval("\$msg_body = \"$msg_body\";");
        
        if(!empty($mem_data['link'])){
            // $verify_link = site_url('verification/' .$mem_row->mem_code);
            $msg_body.="<p><a href='{$mem_data['link']}' style='color: #37b36f; text-decoration: none;'>".$mem_data['link']."</a></p>";
        }

        if(!empty($mem_data['password']))
        {
            $msg_body .= "<h4>And this is your password: ".$mem_data['password']."</h4>";
        }
        
        $this->email->initialize($config);
        $this->email->set_mailtype("html");
        $this->email->set_newline("\r\n");
        $this->email->from($from,$settings->site_name);
        $this->email->to($emailto);
        $this->email->subject($subject);
        $this->data['email_body']=$msg_body;
        $this->data['email_subject']=$subject;
        $this->data['settings']=$settings;
        $message = $this->load->view('includes/email_template',$this->data,TRUE);
        $this->email->message($message);
        if($this->email->send()){
            return true;
        }
        else{
            $error=$this->email->print_debugger();
            print_r($this->email->print_debugger());die;
            return $error;
        }
    }
}

class Admin_Controller extends CI_Controller
{

    protected $data = array();

    public function __construct()
    {
        parent::__construct();
        $this->data['adminsite_setting'] = $this->getAdmineSettings();
    }

    public function isLogged()
    {
        if ($this->session->loged_in < 1) {
            $this->session->set_userdata('admin_redirect_url', currentURL());
            redirect(ADMIN . '/login', 'refresh');
            exit;
        }
    }

    public function logged()
    {
        if ($this->session->loged_in > 0) {
            redirect(ADMIN , 'refresh');
            exit;
        }
    }

    function getAdmineSettings()
    {
        return $this->master->getRow("siteadmin", array('site_id' => '1'));
    }
}

?>