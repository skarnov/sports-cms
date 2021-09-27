<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

session_start();

class Checkout extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $customer_id = $this->session->userdata('customer_id');
        if ($customer_id == NULL) 
        {
            redirect('evis_customer', 'refresh');
        }
        $grand_total = $this->session->userdata('grand_total');
        if ($grand_total == NULL) 
        {
            redirect('cart/show_cart', 'refresh');
        }
        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
    }
    
    public function index() 
    {                        
        $customer_id = $this->session->userdata('customer_id');
        $data = array();
        $data['title'] = 'Checkout';      
        $data['all_city'] = $this->evis_sale_model->select_all_city();
        $data['customer_info'] = $this->evis_sale_model->select_customer_shipping_info($customer_id);
        $data['home'] = $this->load->view('shipping_form', $data, true);
        $this->load->view('master', $data);
    }
    
    public function save_shipping_form()
    {
        $shipping_data=array();
        $shipping_data['customer_id'] = $this->session->userdata('customer_id');
        $shipping_data['shipping_city'] = $this->input->post('shipping_city', true);
        $shipping_data['shipping_first_name'] = $this->input->post('shipping_first_name', true);
        $shipping_data['shipping_last_name'] = $this->input->post('shipping_last_name', true);
        $shipping_data['shipping_email'] = $this->input->post('shipping_email', true);
        $shipping_data['shipping_mobile'] = $this->input->post('shipping_mobile', true);
        $shipping_data['shipping_address'] = $this->input->post('shipping_address', true);
        $this->session->set_userdata($shipping_data);
        redirect('checkout/payment_form');
    }
    
    public function payment_form() 
    {
        $shipping_data=$this->session->userdata('first_name');
        if($shipping_data !=NULL)
        {
            $data = array();
            $data['title'] = 'Payment';
            $data['home'] = $this->load->view('payment_form', $data, true);
            $this->load->view('master', $data);
        }
        else
        {
            redirect('checkout');
        }
    }
    
    public function save_payment_form()
    {
        $payment_data=array();
        $payment_data['payment_type'] = $this->input->post('payment_type', true);  
        $this->session->set_userdata($payment_data);
        redirect('checkout/confirm_order');
    }
    
    public function confirm_order() 
    {
        $payment_data=$this->session->userdata('payment_type');
        if($payment_data !=NULL)
        {
            $shipping_data=array();
            $shipping_data['customer_id'] = $this->session->userdata('customer_id');
            $shipping_data['shipping_city'] = $this->session->userdata('shipping_city');
            $shipping_data['shipping_first_name'] = $this->session->userdata('shipping_first_name');
            $shipping_data['shipping_last_name'] = $this->session->userdata('shipping_last_name');
            $shipping_data['shipping_email'] = $this->session->userdata('shipping_email');
            $shipping_data['shipping_mobile'] = $this->session->userdata('shipping_mobile');
            $shipping_data['shipping_address'] = $this->session->userdata('shipping_address');
            $this->evis_sale_model->save_order_info($shipping_data);
            $mdata = array();
            $mdata['invoice_info'] = $this->evis_sale_model->select_invoice_info($shipping_data['customer_id']);     
            $mdata['from_address'] = 'info@evis.com';
            $mdata['admin_full_name'] = 'Invoice';
            $mdata['to_address'] = $mdata['invoice_info']->customer_email;
            $mdata['cc_address'] = 'info@evis.com';
            $mdata['subject'] = 'Order Invoice';
            $this->mailer_model->sendEmail($mdata, 'invoice');
            redirect('checkout/order_complete');
        }
        else
        {
            redirect('checkout/payment_form');
        }
    }

    public function order_complete() 
    {
        $this->cart->destroy();
        $data = array();
        $data['title'] = 'Checkout';
        $data['home'] = $this->load->view('order_complete', $data, true);
        $this->load->view('master', $data);
    }
}