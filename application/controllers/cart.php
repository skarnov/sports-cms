<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Cart extends CI_Controller {
    
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
    
    public function add_to_cart($product_id)
    {
        $product_info = $this->evis_inventory_model->select_product_by_id($product_id);   
        if($product_info->product_quantity > 0)
        {
            $data = array(
            'id' => $product_info->product_id,
            'image' => $product_info->product_image_0,
            'name' => $product_info->product_name,
            'qty' => 1,
            'price' =>$product_info->product_price,
            'options' => array('colour' => 'Default','size' => 'Default',)
            );
            $this->cart->insert($data);
            echo $this->load->view('home_cart');
        }
        else
        {
            echo $this->load->view('home_cart');
        }
    }
    
    public function add_cart($product_id,$qty,$color,$size)
    {
        $product_info = $this->evis_inventory_model->select_product_by_id($product_id);   
        if($product_info->product_quantity > 0)
        {
            $data = array(
                'id' => $product_info->product_id,
                'image' => $product_info->product_image_0,
                'name' => $product_info->product_name,
                'qty' => $qty,
                'price' =>$product_info->product_price,  
                'options' => array('colour' => $color, 'size' => $size)
            );
            $this->cart->insert($data);
            echo $this->load->view('home_cart');
        }
        else
        {
            echo $this->load->view('home_cart');
        }
    }
    
    public function show_cart()
    {
        $data = array();
        $data['title'] = 'Shoping Cart';
        $data['home'] = $this->load->view('cart_view', $data, true);
        $this->load->view('master', $data);
    }

    public function update_cart()
    {
        $qty = $this->input->post('product_quantity', true);
        $rowid = $this->input->post('rowid', true);
        $data = array(
            'rowid' => $rowid,
            'qty' => $qty
        );
        $this->cart->update($data);
        redirect('cart/show_cart');
    }
    
    public function remove($rowid)
    {
        $data = array(
            'rowid' => $rowid,
            'qty' => '0'
        );
        $this->cart->update($data);
        redirect('cart/show_cart');
    }
}