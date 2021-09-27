<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

session_start();

class Wishlist extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $customer_id = $this->session->userdata('customer_id');
        if ($customer_id == NULL)
        {
            redirect('login', 'refresh');
        }
        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
    }
        
    public function add_to_wishlist($product_id)
    {
        $customer_id = $this->session->userdata('customer_id');
        $product_info = $this->evis_inventory_model->select_product_by_id($product_id);   
        $data = array(
            'customer_id' => $customer_id,
            'product_id' => $product_info->product_id,
        );
        $this->evis_store_model->save_wishlist_info($data);
    }

    public function show_wishlist()
    {
        $customer_id = $this->session->userdata('customer_id');
        $data = array();
        $data['title'] = 'Wishlist';
        $data['select_wishlist'] = $this->evis_store_model->select_user_wishlist($customer_id);
        $data['home'] = $this->load->view('wishlist', $data, true);
        $this->load->view('master', $data);
    }
    
    public function delete($product_id)
    {
        $customer_id = $this->session->userdata('customer_id');
        $this->evis_store_model->delete_product_from_wishlist($customer_id,$product_id);
        redirect('wishlist/show_wishlist');
    }
}