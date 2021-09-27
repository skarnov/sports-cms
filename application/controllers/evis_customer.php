<?php defined('BASEPATH') OR exit('No direct script access allowed');

session_start();

class Evis_Customer extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $customer_id = $this->session->userdata('customer_id');
        if ($customer_id != NULL)
        {
            redirect('cart/show_cart', 'refresh');
        }
        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
    }
    
    public function index()
    {
        $data = array();
        $data['title'] = 'Login';
        $data['home'] = $this->load->view('customer_login', $data, true);
        $this->load->view('master', $data);
    }
 
    public function customer_login_check()
    { 
        $this->form_validation->set_rules('customer_email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('customer_password', 'Password', 'trim|required|min_length[6]|max_length[250]|xss_clean');
        if ($this->form_validation->run() == False)
        {
            $data = array();
            $data['title'] = 'خطأ';
            $data['home'] = $this->load->view('customer_login', $data, true);
            $this->load->view('master', $data);
        } 
        else 
        {
            $data = array();
            $data['customer_email'] = $this->input->post('customer_email', true);
            $data['customer_password'] = $this->input->post('customer_password', true);
            $result = $this->evis_store_model->user_login_check($data);
            $sdata = array();
            if ($result != NULL)
            {
                $sdata['customer_id'] = $result->customer_id;
                $sdata['first_name'] = $result->first_name;
                $this->session->set_userdata($sdata);
                redirect('cart/show_cart');
            } 
            if ($result == NULL)
            {
                $sdata['exception'] = 'اسم المستخدم او كلمة المرور خطأ';
                $this->session->set_userdata($sdata);
                redirect('evis_customer');
            }
        }
    }   
}