<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Evis_Store_Model extends CI_Model {
        
    public function user_login_check($data)
    {
        $this->db->select('*');
        $this->db->from('tbl_customer');
        $this->db->where('customer_email',$data['customer_email']);
        $this->db->where('customer_password', $data['customer_password']);
	$this->db->where('customer_status',1);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function select_all_published_product()
    {
        $this->db->select('*');
        $this->db->from('tbl_product');
        $this->db->where('product_status',1);
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
    }
    
    public function select_product_by_category($category_id = null, $start=null, $limit=null)
    {
        $sql = "SELECT * ". "FROM tbl_product p, tbl_category as c WHERE c.category_id = $category_id AND p.category_id = c.category_id ";
        if ($category_id) 
        {
            $sql .= "AND p.category_id = $category_id ";
        }
        if ($limit != '' && $start >= 0) 
        {
            $sql .= " LIMIT $start, $limit ";
        }
        $result = $this->db->query($sql)->result();
        return $result;
    }
    
    public function select_category_by_name($category_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_category');
        $this->db->where('category_id', $category_id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
        
    public function select_new_product()
    {
        $sql = "SELECT * FROM tbl_product WHERE product_status=1 ORDER BY product_id DESC LIMIT 3 ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_discount_product()
    {
        $sql = "SELECT * FROM tbl_product WHERE product_status=1 AND product_old_price != 0 LIMIT 10 ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_latest_product()
    {
        $sql = "SELECT * FROM tbl_product WHERE product_status=1 ORDER BY product_id DESC LIMIT 10 ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
        
    public function select_latest_product_product($per_page, $offset)
    {
        if ($offset == NULL)
        {
            $offset = 0;
        }
        $sql = "SELECT * FROM tbl_product WHERE product_status = 1 ORDER BY product_id DESC LIMIT $offset,$per_page ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
   
    public function select_best_selling_product()
    {
        $sql = "SELECT DISTINCT p.product_id,p.product_summery, p.product_name, p.product_price, p.product_old_price, p.product_tag, p.product_image_0 FROM tbl_product AS p, tbl_order_details AS o WHERE p.product_id=o.product_id AND p.product_status = 1 ORDER BY p.product_id DESC ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_all_news()
    {
        $sql = "SELECT * FROM tbl_news ORDER BY news_id DESC LIMIT 3 ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function save_wishlist_info($data)
    {        
        $this->db->insert('tbl_wishlist',$data);
    }
    
    public function select_user_wishlist($customer_id)
    {
        $sql = "SELECT * FROM tbl_product AS p, tbl_wishlist AS w WHERE p.product_id=w.product_id AND w.customer_id='$customer_id' ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function delete_product_from_wishlist($customer_id,$product_id)
    {
        $sql = "DELETE FROM tbl_wishlist WHERE customer_id='$customer_id' AND product_id='$product_id'";
        $this->db->query($sql);
    }
    
    public function search_the_product($product_name)
    {
        $sql = "SELECT * FROM tbl_product WHERE product_name LIKE '%$product_name%'";
        $result = $this->db->query($sql)->result();
        return $result;   
    }
    
    public function save_newsletter_info()
    {
        $data=array();
        $data['subscription_email'] = $this->input->post('subscription_email', true);
        $this->db->insert('tbl_newsletter_subscription',$data);
    }  
    
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
        $this->db->insert('tbl_customer',$data);
    }
    
    public function news_archive($per_page, $offset)
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
    
    
    public function select_all_today_match($today)
    {
        $sql = "SELECT * FROM tbl_match WHERE match_date='$today'";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_all_tomorrow_match($tomorrow)
    {
        $sql = "SELECT * FROM tbl_match WHERE match_date='$tomorrow'";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_all_second_match($second)
    {
        $sql = "SELECT * FROM tbl_match WHERE match_date='$second'";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_all_third_match($third)
    {
        $sql = "SELECT * FROM tbl_match WHERE match_date='$third'";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_all_fourth_match($fourth)
    {
        $sql = "SELECT * FROM tbl_match WHERE match_date='$fourth'";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_all_fifth_match($fifth)
    {
        $sql = "SELECT * FROM tbl_match WHERE match_date='$fifth'";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_all_sixth_match($sixth)
    {
        $sql = "SELECT * FROM tbl_match WHERE match_date='$sixth'";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_all_seventh_match($seventh)
    {
        $sql = "SELECT * FROM tbl_match WHERE match_date='$seventh'";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
}