<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Evis_Sale_Model extends CI_Model {

    public function save_customer_info()
    {
        $data=array();
        $data['city_id'] = $this->input->post('city_id', true);
        $data['first_name'] = $this->input->post('first_name', true);
        $data['last_name'] = $this->input->post('last_name', true);
        $data['customer_email'] = $this->input->post('customer_email', true);
        $data['customer_password'] = $this->input->post('customer_password', true);
        $data['customer_mobile'] = $this->input->post('customer_mobile', true);
        $data['customer_address'] = $this->input->post('customer_address', true);
        $data['customer_status'] = $this->input->post('customer_status', true);
        $this->db->insert('tbl_customer',$data);
    }
    
    public function select_all_customer($per_page, $offset)
    {
        if ($offset == NULL)
        {
            $offset = 0;
        }
        $sql = "SELECT * FROM tbl_customer ORDER BY customer_id DESC LIMIT $offset,$per_page ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_customer_by_id($customer_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_customer');
        $this->db->where('customer_id',$customer_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function select_customer_shipping_info($customer_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_customer');
        $this->db->join('tbl_city', 'tbl_city.city_id=tbl_customer.city_id');
        $this->db->where('customer_id',$customer_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function update_customer_info()
    {
        $data=array();
        $data['city_id'] = $this->input->post('city_id', true);
        $data['first_name'] = $this->input->post('first_name', true);
        $data['last_name'] = $this->input->post('last_name', true);
        $data['customer_email'] = $this->input->post('customer_email', true);
        $data['customer_password'] = $this->input->post('customer_password', true);
        $data['customer_mobile'] = $this->input->post('customer_mobile', true);
        $data['customer_address'] = $this->input->post('customer_address', true);
        $data['customer_status'] = $this->input->post('customer_status', true);
        $customer_id = $this->input->post('customer_id', true);
        $this->db->where('customer_id',$customer_id);
        $this->db->update('tbl_customer',$data);
    }
    
    public function delete_customer_by_id($customer_id)
    {
        $this->db->where('customer_id',$customer_id);
        $this->db->delete('tbl_customer');
    }
        
    public function save_order_info($shipping_info)
    {
        $this->db->insert('tbl_shipping',$shipping_info);
        $shipping_id=$this->db->insert_id();
        $payment_data=array();
        $payment_data['payment_type'] = $this->session->userdata('payment_type', true);
        $payment_data['customer_id'] = $this->session->userdata('customer_id', true);
        $payment_data['shipping_id'] = $shipping_id;
        $this->db->insert('tbl_payment',$payment_data);
        $payment_id=$this->db->insert_id();        
        $data=array();
        $data['customer_id']=$this->session->userdata('customer_id', true);
        $data['shipping_id']=$shipping_id;
        $data['payment_id']=$payment_id;
        $data['order_total']=$this->session->userdata('grand_total');
        $data['invoice_date']= date('Y-m-d');
        $this->db->insert('tbl_order',$data);
        $order_id=$this->db->insert_id();
        $contents=$this->cart->contents();
        $oddata=array();
        foreach($contents as $values)
        {
           $oddata['order_id']=$order_id;
           $oddata['product_id']=$values['id'];
           $oddata['product_price']=$values['price'];
           $oddata['product_name']=$values['name'].' (Colour:- '.$values['options']['colour'].') (Size:- '.$values['options']['size'].')';
           $oddata['product_sales_quantity']=$values['qty'];
           $this->db->insert('tbl_order_details',$oddata);
        }
        $sql = "update tbl_product, tbl_order_details
            set tbl_product.product_quantity = tbl_product.product_quantity - tbl_order_details.product_sales_quantity 
            where tbl_product.product_id = tbl_order_details.product_id
            and tbl_order_details.order_id = '$order_id' ";
        $this->db->query($sql);
    }

    public function select_invoice_info($customer_id) 
    {
        $sql = "SELECT * FROM tbl_customer AS c, tbl_order AS o, tbl_city AS s WHERE c.customer_id = '$customer_id' AND c.customer_id = o.customer_id AND c.city_id=s.city_id ORDER BY o.order_id DESC LIMIT 1";
        $result = $this->db->query($sql)->row();
        return $result;
    }

    public function select_all_sale($per_page, $offset)
    {
        if ($offset == NULL)
        {
            $offset = 0;
        }
        $sql = "SELECT * FROM tbl_order AS o, tbl_customer AS c, tbl_payment AS p WHERE o.customer_id=c.customer_id AND o.payment_id=p.payment_id AND order_status='1' ORDER BY o.order_id DESC LIMIT $offset,$per_page ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_all_order($per_page, $offset)
    {
        if ($offset == NULL) 
        {
            $offset = 0;
        }
        $sql = "SELECT * FROM tbl_order AS o, tbl_customer AS c, tbl_payment AS p WHERE o.customer_id=c.customer_id AND o.payment_id=p.payment_id AND order_status='0' ORDER BY o.order_id DESC LIMIT $offset,$per_page ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function paid($order_id)
    {
        $this->db->set('order_status',1);
        $this->db->where('order_id',$order_id);
        $this->db->update('tbl_order');
    }
    
    public function select_sales_report_info($start,$end)
    {
        $sql = "SELECT * FROM tbl_order AS o, tbl_customer AS c WHERE o.customer_id=c.customer_id AND order_status=1 AND invoice_date BETWEEN '$start' AND '$end' ";
        $result = $this->db->query($sql)->result();
        return $result;  
    }
    
    public function select_total_amount($start,$end)
    {
        $sql = "SELECT SUM(order_total) AS total FROM tbl_order WHERE order_status=1 AND (invoice_date BETWEEN '$start' AND '$end')";
        $result = $this->db->query($sql)->row();
        return $result;   
    }

    public function select_order_by_id($order_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_order_details');
        $this->db->where('order_id',$order_id);
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
    }
    
    public function invoice_info($order_id)
    {
        $sql = "SELECT * FROM tbl_order AS o, tbl_customer AS c, tbl_shipping AS s, tbl_city AS t WHERE o.order_id='$order_id' AND o.customer_id=c.customer_id AND o.shipping_id=s.shipping_id AND c.city_id=t.city_id";
        $result = $this->db->query($sql)->row();
        return $result;
    }
    
    public function select_shipping_info($order_id)
    {
        $sql = "SELECT * FROM tbl_shipping AS s, tbl_order AS o WHERE o.shipping_id=s.shipping_id AND o.order_id='$order_id'";
        $result = $this->db->query($sql)->row();
        return $result;
    }
    
    public function select_customer_info($order_id)
    {
        $sql = "SELECT * FROM tbl_customer AS c, tbl_order AS o WHERE c.customer_id=o.customer_id AND o.order_id='$order_id'";
        $result = $this->db->query($sql)->row();
        return $result;
    }
    
    public function delete_order_by_id($order_id)
    {
        $this->db->where('order_id',$order_id);
        $this->db->delete('tbl_order');
    }
    
    public function select_all_city()
    {
        $this->db->select('*');
        $this->db->from('tbl_city');
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
    }
    
    public function save_city_info()
    {
        $data=array();
        $data['city_name'] = $this->input->post('city_name', true);
        $this->db->insert('tbl_city',$data);
    }
    
    public function select_city_by_id($city_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_city');
        $this->db->where('city_id',$city_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function update_city_info()
    {
        $data=array();
        $data['city_name'] = $this->input->post('city_name', true);
        $city_id = $this->input->post('city_id', true);
        $this->db->where('city_id',$city_id);
        $this->db->update('tbl_city',$data);
    }
    
    public function delete_city_by_id($city_id)
    {
        $this->db->where('city_id',$city_id);
        $this->db->delete('tbl_city');
    }

    public function select_all_country()
    {
        $this->db->select('*');
        $this->db->from('tbl_country');
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
    }
    
    public function save_country_info()
    {
        $data=array();
        $data['country_name'] = $this->input->post('country_name', true);
        $this->db->insert('tbl_country',$data);
    }
    
    public function select_country_by_id($country_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_country');
        $this->db->where('country_id',$country_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function update_country_info()
    {
        $data=array();
        $data['country_name'] = $this->input->post('country_name', true);
        $country_id = $this->input->post('country_id', true);
        $this->db->where('country_id',$country_id);
        $this->db->update('tbl_country',$data);
    }
    
    public function delete_country_by_id($country_id)
    {
        $this->db->where('country_id',$country_id);
        $this->db->delete('tbl_country');
    }
    
    public function select_subscribe_list()
    {
        $sql = "SELECT * FROM tbl_newsletter_subscription WHERE subscription_status='1'";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_all_subscribe($per_page, $offset)
    {
        if ($offset == NULL)
        {
            $offset = 0;
        }
        $sql = "SELECT * FROM tbl_newsletter_subscription ORDER BY subscription_id DESC LIMIT $offset,$per_page ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function deactive_subscription_by_id($subscription_id)
    {
        $this->db->set('subscription_status',0);
        $this->db->where('subscription_id',$subscription_id);
        $this->db->update('tbl_newsletter_subscription');
    }
    
    public function active_subscription_by_id($subscription_id)
    {
        $this->db->set('subscription_status',1);
        $this->db->where('subscription_id',$subscription_id);
        $this->db->update('tbl_newsletter_subscription');
    }
    
    public function delete_subscription_by_id($subscription_id)
    {
        $this->db->where('subscription_id',$subscription_id);
        $this->db->delete('tbl_newsletter_subscription');
    }

    public function select_all_color()
    {
        $this->db->select('*');
        $this->db->from('tbl_color');
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
    }
    
    public function save_color_info()
    {
        $data=array();
        $data['color_name'] = $this->input->post('color_name', true);
        $this->db->insert('tbl_color',$data);
    }
    
    public function select_color_by_id($color_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_color');
        $this->db->where('color_id',$color_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function update_color_info()
    {
        $data=array();
        $data['color_name'] = $this->input->post('color_name', true);
        $color_id = $this->input->post('color_id', true);
        $this->db->where('color_id',$color_id);
        $this->db->update('tbl_color',$data);
    }
    
    public function delete_color_by_id($color_id)
    {
        $this->db->where('color_id',$color_id);
        $this->db->delete('tbl_color');
    }
        
    public function select_all_color_code()
    {
        $this->db->select('*');
        $this->db->from('tbl_color_code');
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
    }
    
    public function save_color_code_info()
    {
        $data=array();
        $data['color_code_name'] = $this->input->post('color_code_name', true);
        $this->db->insert('tbl_color_code',$data);
    }
    
    public function select_color_code_by_id($color_code_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_color_code');
        $this->db->where('color_code_id',$color_code_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function update_color_code_info()
    {
        $data=array();
        $data['color_code_name'] = $this->input->post('color_code_name', true);
        $color_code_id = $this->input->post('color_code_id', true);
        $this->db->where('color_code_id',$color_code_id);
        $this->db->update('tbl_color_code',$data);
    }
    
    public function delete_color_code_by_id($color_code_id)
    {
        $this->db->where('color_code_id',$color_code_id);
        $this->db->delete('tbl_color_code');
    }
    
    
    public function select_all_size()
    {
        $this->db->select('*');
        $this->db->from('tbl_size');
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
    }
    
    public function save_size_info()
    {
        $data=array();
        $data['size_name'] = $this->input->post('size_name', true);
        $this->db->insert('tbl_size',$data);
    }
    
    public function select_size_by_id($size_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_size');
        $this->db->where('size_id',$size_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function update_size_info()
    {
        $data=array();
        $data['size_name'] = $this->input->post('size_name', true);
        $size_id = $this->input->post('size_id', true);
        $this->db->where('size_id',$size_id);
        $this->db->update('tbl_size',$data);
    }
    
    public function delete_size_by_id($size_id)
    {
        $this->db->where('size_id',$size_id);
        $this->db->delete('tbl_size');
    }
    
    public function save_news_info($data)
    {
        $this->db->insert('tbl_news',$data);
    }
        
    public function select_all_news($per_page, $offset)
    {
        if ($offset == NULL)
        {
            $offset = 0;
        }
        $sql = "SELECT * FROM tbl_news ORDER BY news_id DESC LIMIT $offset,$per_page ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_news_by_id($news_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_news');
        $this->db->where('news_id',$news_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function update_news_info($data)
    {
        $news_id = $this->input->post('news_id', true);
        $this->db->where('news_id',$news_id);
        $this->db->update('tbl_news',$data);
    }
    
    public function delete_news_by_id($news_id)
    {
        $this->db->where('news_id',$news_id);
        $this->db->delete('tbl_news');
    }
}