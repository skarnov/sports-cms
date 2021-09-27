<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Evis_App_Model extends CI_Model {
    
    public function admin_login_check($data)
    {
        $this->db->select('*');
        $this->db->from('tbl_admin');
        $this->db->where('admin_email', $data['admin_email']);
        $this->db->where('admin_password', $data['admin_password']);
        $this->db->where('admin_status', 1);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
    
    public function check_password($data)
    {
        $sql="select * from tbl_admin where admin_email='$data'";
        $result = $this->db->query($sql)->row();
        return $result;
    }
    
    public function search_the_category($search)
    {
        $sql = "SELECT * FROM tbl_category AS c, tbl_color AS k WHERE category_name LIKE '%$search%' AND c.color_id=k.color_id";
        $result = $this->db->query($sql)->result();
        return $result;   
    }
    
    public function search_product($search)
    {
        $sql = "SELECT * FROM tbl_product AS p, tbl_category AS c WHERE product_name LIKE '%$search%' AND p.category_id=c.category_id";
        $result = $this->db->query($sql)->result();
        return $result;   
    }
    
    public function search_the_customer($search)
    {
        $sql = "SELECT * FROM tbl_customer WHERE first_name LIKE '%$search%'";
        $result = $this->db->query($sql)->result();
        return $result;   
    }
    
    public function search_the_order($search)
    {
        $sql = "SELECT * FROM tbl_order WHERE order_status='0' AND order_id LIKE '%$search%'";
        $result = $this->db->query($sql)->result();
        return $result;   
    }
    
    public function search_the_subscription($search)
    {
        $sql = "SELECT * FROM tbl_newsletter_subscription WHERE subscription_email LIKE '%$search%'";
        $result = $this->db->query($sql)->result();
        return $result;   
    }

    public function select_all_order()
    {
        $sql = "SELECT count(order_id) AS all_order FROM tbl_order WHERE order_status=0 ";
        $query_result = $this->db->query($sql);
        $result = $query_result->row();
        return $result;
    }
    
    public function select_all_customer()
    {
        $sql = "SELECT count(customer_id) AS all_customer FROM tbl_customer WHERE customer_status=1 ";
        $query_result = $this->db->query($sql);
        $result = $query_result->row();
        return $result;
    }
    
    public function select_all_sale()
    {
        $sql = "SELECT count(order_id) AS all_sale, sum(order_total) AS sale_amount FROM tbl_order WHERE order_status=1 ";
        $query_result = $this->db->query($sql);
        $result = $query_result->row();
        return $result;
    }
    
    public function save_admin_info()
    {
        $data = array();
        $data['admin_name'] = $this->input->post('admin_name', true);
        $data['admin_email'] = $this->input->post('admin_email', true);
        $data['admin_password'] = $this->input->post('admin_password', true);
        $data['admin_level'] = $this->input->post('admin_level', true);
        $data['admin_status'] = $this->input->post('admin_status', true);
        $this->db->insert('tbl_admin',$data);
    }
    
    public function select_all_admin()
    {
        $sql = "SELECT * FROM tbl_admin ORDER BY admin_id DESC ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function deactive_admin_by_id($admin_id)
    {
        $this->db->set('admin_status',0);
        $this->db->where('admin_id',$admin_id);
        $this->db->update('tbl_admin');
    }
    
    public function active_admin_by_id($admin_id)
    {
        $this->db->set('admin_status',1);
        $this->db->where('admin_id',$admin_id);
        $this->db->update('tbl_admin');
    }
    
    public function select_admin_by_id($admin_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_admin');
        $this->db->where('admin_id',$admin_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function update_admin_info()
    {
        $data=array();
        $data['admin_name'] = $this->input->post('admin_name', true);
        $data['admin_email'] = $this->input->post('admin_email', true);
        $data['admin_level'] = $this->input->post('admin_level', true);
        $data['admin_status'] = $this->input->post('admin_status', true);
        $data['admin_password'] = $this->input->post('admin_password', true);
        $admin_id=$this->input->post('admin_id',true);
        $this->db->where('admin_id',$admin_id);
        $this->db->update('tbl_admin',$data);
    }
    
    public function delete_admin_by_id($admin_id)
    {
        $this->db->where('admin_id',$admin_id);
        $this->db->delete('tbl_admin');
    }
    
    public function save_slide_info($data)
    {
        $this->db->insert('tbl_slide',$data);
    }
    
    public function select_all_slide()
    {
        $this->db->select('*');
        $this->db->from('tbl_slide');
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
    }
    
    public function select_slide_by_id($slide_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_slide');
        $this->db->where('slide_id',$slide_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function update_slide_info($data)
    {
        $slide_id=$this->input->post('slide_id',true);
        $this->db->where('slide_id',$slide_id);
        $this->db->update('tbl_slide',$data);
    }
    
    public function delete_slide_by_id($slide_id)
    {
        $this->db->where('slide_id',$slide_id);
        $this->db->delete('tbl_slide');
    }
    
    public function save_banner_info($data)
    {
        $this->db->insert('tbl_banner',$data);
    }
    
    public function select_all_banner()
    {
        $this->db->select('*');
        $this->db->from('tbl_banner');
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
    }
    
    public function select_banner_by_id($banner_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_banner');
        $this->db->where('banner_id',$banner_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function update_banner_info()
    {
        $data['banner_position'] = $this->input->post('banner_position', true);
        $banner_id=$this->input->post('banner_id',true);
        $this->db->where('banner_id',$banner_id);
        $this->db->update('tbl_banner',$data);
    }
    
    public function delete_banner_by_id($banner_id)
    {
        $this->db->where('banner_id',$banner_id);
        $this->db->delete('tbl_banner');
    }
}