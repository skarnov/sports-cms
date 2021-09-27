<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Evis_Sale extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $admin_id = $this->session->userdata('admin_id');
        if ($admin_id == NULL) 
        {
            redirect('evis_login', 'refresh');
        }
        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
    }
    
    public function add_customer()
    {
        $data = array();
        $data['title'] = 'New Customer';
        $data['all_city'] = $this->evis_sale_model->select_all_city();
        $data['dashboard'] = $this->load->view('admin/add_customer', $data, true);
        $this->load->view('admin/master', $data);
    }
    
    public function save_customer()
    {
        $this->evis_sale_model->save_customer_info();
        $sdata = array();
        $sdata['save_customer'] = 'Customer Saved';
        $this->session->set_userdata($sdata);
        redirect('evis_sale/add_customer');
    }
    
    public function manage_customer()
    {
        $data = array();
        $data['title'] = 'Manage Customer';
        $config['base_url'] = base_url() . 'evis_sale/manage_customer/';
        $config['total_rows'] = $this->db->count_all('tbl_customer');
        $config['per_page'] = '8';
        /** STYLE PAGINATION **/
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /** END STYLE PAGINATION **/
        $this->pagination->initialize($config);
        $data['all_customer'] = $this->evis_sale_model->select_all_customer($config['per_page'], $this->uri->segment(3));
        $data['dashboard'] = $this->load->view('admin/manage_customer', $data, true);
        $this->load->view('admin/master', $data);
    }
    
    public function edit_customer($customer_id) 
    {
        $data = array();
        $data['title'] = 'Edit Customer';
        $data['all_city'] = $this->evis_sale_model->select_all_city();
        $data['customer_info'] = $this->evis_sale_model->select_customer_by_id($customer_id);
        $data['dashboard'] = $this->load->view('admin/edit_customer', $data, true);
        $sdata = array();
        $sdata['edit_customer'] = 'Update Customer Product Successfully';
        $this->session->set_userdata($sdata);
        $this->load->view('admin/master', $data);
    }

    public function update_customer() 
    {
        $this->evis_sale_model->update_customer_info();
        redirect('evis_sale/manage_customer');
    }
    
    public function delete_customer($customer_id) 
    {
        $this->evis_sale_model->delete_customer_by_id($customer_id);
        redirect('evis_sale/manage_customer');
    }

    public function manage_sale()
    {
        $data = array();
        $data['title'] = 'Manage Sale';
        $config['base_url'] = base_url() . 'evis_sale/manage_sale/';
        $config['total_rows'] = $this->db->count_all('tbl_order');
        $config['per_page'] = '8';
        /** STYLE PAGINATION **/
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /** END STYLE PAGINATION **/
        $this->pagination->initialize($config);
        $data['all_sale'] = $this->evis_sale_model->select_all_sale($config['per_page'], $this->uri->segment(3));
        $data['dashboard'] = $this->load->view('admin/manage_sale', $data, true);
        $this->load->view('admin/master', $data);
    }

    public function manage_order()
    {
        $data = array();
        $data['title'] = 'Manage Order';
        $config['base_url'] = base_url() . 'evis_sale/manage_order/';
        $config['total_rows'] = $this->db->count_all('tbl_order');
        $config['per_page'] = '8';
        /** STYLE PAGINATION **/
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /** END STYLE PAGINATION **/
        $this->pagination->initialize($config);
        $data['all_order'] = $this->evis_sale_model->select_all_order($config['per_page'], $this->uri->segment(3));
        $data['dashboard'] = $this->load->view('admin/manage_order', $data, true);
        $this->load->view('admin/master', $data);
    }
    
    public function order_details($order_id) 
    {
        $data = array();
        $data['title'] = 'Order Details';
        $data['order_info'] = $this->evis_sale_model->select_order_by_id($order_id);
        $data['invoice_info'] = $this->evis_sale_model->invoice_info($order_id);
        $data['dashboard'] = $this->load->view('admin/order_details', $data, true);
        $this->load->view('admin/master', $data);
    }

    public function paid_order($order_id) 
    {
        $this->evis_sale_model->paid($order_id);
        redirect('evis_sale/manage_order');
    }

    public function sales_report()
    {
        $data = array();
        $data['title'] = 'Sales Report';
        $data['dashboard'] = $this->load->view('admin/sales_report', $data, true);
        $this->load->view('admin/master', $data);
    }
    
    public function show_sales_report()
    {
        $data = array();
        $data['title'] = 'Sales Report';
        $start = $this->input->post('start', true);
        $end = $this->input->post('end', true);
        $data['start'] = $start;
        $data['end'] = $end;
        $data['sales_report'] = $this->evis_sale_model->select_sales_report_info($start,$end,$data);
        $data['total_amount'] = $this->evis_sale_model->select_total_amount($start,$end,$data);
        $data['dashboard'] = $this->load->view('admin/show_sales_report', $data, true);
        $this->load->view('admin/master', $data);
    }
    
    public function download_sales_report($start,$end)
    {
        $data = array();
        $data['start'] = $start;
        $data['end'] = $end;
        $data['sales_report'] = $this->evis_sale_model->select_sales_report_info($start,$end,$data);
        $data['total_amount'] = $this->evis_sale_model->select_total_amount($start,$end,$data);
        $this->load->view('admin/download_sales_report', $data);
        $html = $this->output->get_output();
        $this->load->library('dompdf_gen');
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("download_sales_report.pdf");
    }
    
    public function delete_order($order_id) 
    {        
        $this->evis_sale_model->delete_order_by_id($order_id);
        redirect('evis_sale/manage_order');
    }
      
    public function send_newsletter()
    {
        $data = array();
        $data['title'] = 'Send Newsletter';
        $data['dashboard'] = $this->load->view('admin/send_newsletter', $data, true);
        $this->load->view('admin/master', $data);
    }
    
    public function send_newsletter_mail()
    {
        $all_subscribe = $this->evis_sale_model->select_subscribe_list();
        $subject = $this->input->post('subject', true);
        $message = $this->input->post('message', true);
        foreach($all_subscribe as $value){
            $mdata = array();
            $mdata['from_address'] = 'info@evistechnology.com';
            $mdata['to_address'] = $value->subscription_email;
            $mdata['admin_full_name'] = 'Evis Technology';
            $mdata['subject'] = $subject;
            $mdata['message'] = $message;
            $this->mailer_model->send_newsletter($mdata, 'newsletter');
        }
        $data = array();
        $data['title'] = 'Success';
        $data['dashboard'] = $this->load->view('admin/success', $data, true);
        $this->load->view('admin/master', $data);
    }
    
    public function manage_subscription()
    {
        $data = array();
        $data['title'] = 'Subscribe Email';
        $config['base_url'] = base_url() . 'evis_sale/manage_subscription/';
        $config['total_rows'] = $this->db->count_all('tbl_newsletter_subscription');
        $config['per_page'] = '8';
        /** STYLE PAGINATION **/
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /** END STYLE PAGINATION **/
        $this->pagination->initialize($config);
        $data['all_subscribe'] = $this->evis_sale_model->select_all_subscribe($config['per_page'], $this->uri->segment(3));
        $data['dashboard'] = $this->load->view('admin/manage_subscription', $data, true);
        $this->load->view('admin/master', $data);
    }
    
    public function deactive_subscription($subscription_id) 
    {
        $this->evis_sale_model->deactive_subscription_by_id($subscription_id);
        redirect('evis_sale/manage_subscription');
    }

    public function active_subscription($subscription_id)
    {
        $this->evis_sale_model->active_subscription_by_id($subscription_id);
        redirect('evis_sale/manage_subscription');
    }
    
    public function delete_subscription($subscription_id) 
    {
        $this->evis_sale_model->delete_subscription_by_id($subscription_id);
        redirect('evis_sale/manage_subscription');
    }    
    
    public function save_city()
    {
        $this->evis_sale_model->save_city_info();
        $sdata = array();
        $sdata['city'] = 'City Added';
        $this->session->set_userdata($sdata);
        redirect('evis_app/setting');
    }
    
    public function edit_city($city_id) 
    {
        $data = array();
        $data['title'] = 'Edit City';
        $data['city_info'] = $this->evis_sale_model->select_city_by_id($city_id);
        $data['dashboard'] = $this->load->view('admin/edit_city', $data, true);
        $sdata = array();
        $sdata['city'] = 'Update City Successfully';
        $this->session->set_userdata($sdata);
        $this->load->view('admin/master', $data);
    }

    public function update_city() 
    {
        $this->evis_sale_model->update_city_info();
        redirect('evis_app/setting');
    }
    
    public function delete_city($city_id) 
    {
        $this->evis_sale_model->delete_city_by_id($city_id);
        redirect('evis_app/setting');
    }
    
    public function save_color()
    {
        $this->evis_sale_model->save_color_info();
        $sdata = array();
        $sdata['color'] = 'Color Added';
        $this->session->set_userdata($sdata);
        redirect('evis_app/setting');
    }
    
    public function edit_color($color_id) 
    {
        $data = array();
        $data['title'] = 'Edit Color';
        $data['color_info'] = $this->evis_sale_model->select_color_by_id($color_id);
        $data['dashboard'] = $this->load->view('admin/edit_color', $data, true);
        $sdata = array();
        $sdata['color'] = 'Update Color Successfully';
        $this->session->set_userdata($sdata);
        $this->load->view('admin/master', $data);
    }

    public function update_color() 
    {
        $this->evis_sale_model->update_color_info();
        redirect('evis_app/setting');
    }
    
    public function delete_color($color_id) 
    {
        $this->evis_sale_model->delete_color_by_id($color_id);
        redirect('evis_app/setting');
    }
   
    public function save_color_code()
    {
        $this->evis_sale_model->save_color_code_info();
        $sdata = array();
        $sdata['color_code'] = 'Color Code Added';
        $this->session->set_userdata($sdata);
        redirect('evis_app/setting');
    }
    
    public function edit_color_code($color_code_id) 
    {
        $data = array();
        $data['title'] = 'Edit Color Code Code';
        $data['color_code_info'] = $this->evis_sale_model->select_color_code_by_id($color_code_id);
        $data['dashboard'] = $this->load->view('admin/edit_color_code', $data, true);
        $sdata = array();
        $sdata['color_code'] = 'Update Color Code Successfully';
        $this->session->set_userdata($sdata);
        $this->load->view('admin/master', $data);
    }

    public function update_color_code() 
    {
        $this->evis_sale_model->update_color_code_info();
        redirect('evis_app/setting');
    }
    
    public function delete_color_code($color_code_id) 
    {
        $this->evis_sale_model->delete_color_code_by_id($color_code_id);
        redirect('evis_app/setting');
    }
    
    public function save_size()
    {
        $this->evis_sale_model->save_size_info();
        $sdata = array();
        $sdata['size'] = 'Size Added To Product Module';
        $this->session->set_userdata($sdata);
        redirect('evis_app/setting');
    }
    
    public function edit_size($size_id) 
    {
        $data = array();
        $data['title'] = 'Edit Color';
        $data['size_info'] = $this->evis_sale_model->select_size_by_id($size_id);
        $data['dashboard'] = $this->load->view('admin/edit_size', $data, true);
        $sdata = array();
        $sdata['size'] = 'Update Size Successfully';
        $this->session->set_userdata($sdata);
        $this->load->view('admin/master', $data);
    }

    public function update_size() 
    {
        $this->evis_sale_model->update_size_info();
        redirect('evis_app/setting');
    }
    
    public function delete_size($size_id) 
    {
        $this->evis_sale_model->delete_size_by_id($size_id);
        redirect('evis_app/setting');
    }
    
    public function add_news()
    {
        $data = array();
        $data['title'] = 'New News';
        $data['dashboard'] = $this->load->view('admin/add_news', $data, true);
        $this->load->view('admin/master', $data);
    }
    
    public function save_news()
    {
        $data=array();
        $data['news_title'] = $this->input->post('news_title', true);
        /** IF THEY DO NOT SELECT A IMAGE **/
	foreach ($_FILES as $eachFile)
	{
            if ($eachFile['size'] > 0)
            {
                $config['upload_path'] = 'upload_image/news_image/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '10240';
                $config['max_width'] = '5000';
                $config['max_height'] = '5000';
                $error = '';
                $fdata = array();
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('news_image'))
                {
                    $error = $this->upload->display_errors();
                    echo $error;
                    exit();
                } 
                else 
                {
                    $fdata = $this->upload->data();
                    $index = 'news_image';
                    $up['main'] = $config['upload_path'] . $fdata['file_name'];
                }        
                /** START IMAGE RESIZE **/
                $config['image_library'] = 'gd2';
                $config['new_image'] = 'upload_image/news_image/';
                $config['source_image'] = $up['main'];
                $config['create_thumb'] = TRUE;
                $config['maintain_ratio'] = TRUE;
                $config['overwrite'] = TRUE;
                $config['maintain_ratio'] = true;
                $config['width'] = '870';
                $config['height'] = '440';
                $this->load->library('image_lib', $config);
                $this->image_lib->initialize($config);
                $this->image_lib->resize();
                if (!$this->image_lib->resize()) {
                    $error = $this->image_lib->display_errors();
                    echo $error;
                    exit();
                } else {
                    $index = 'news_image';
                    $data[$index] = $config['new_image'] . $fdata['raw_name'] . '_thumb' . $fdata['file_ext'];
                    unlink($fdata['full_path']);
                    }
                /** END IMAGE RESIZE **/
		}
	}
        /** END OF IF THEY DO NOT SELECT A IMAGE **/
        $data['news_date'] = $this->input->post('news_date', true);
        $data['news_summery'] = $this->input->post('news_summery', true);
        $data['full_news'] = $this->input->post('full_news', true);
        $this->evis_sale_model->save_news_info($data);
        $sdata = array();
        $sdata['save_news'] = 'News Saved';
        $this->session->set_userdata($sdata);
        redirect('evis_sale/add_news');
    }
    
    public function manage_news()
    {
        $data = array();
        $data['title'] = 'Manage News';
        $config['base_url'] = base_url() . 'evis_sale/manage_news/';
        $config['total_rows'] = $this->db->count_all('tbl_news');
        $config['per_page'] = '8';
        /** STYLE PAGINATION **/
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /** END STYLE PAGINATION **/
        $this->pagination->initialize($config);
        $data['all_news'] = $this->evis_sale_model->select_all_news($config['per_page'], $this->uri->segment(3));
        $data['dashboard'] = $this->load->view('admin/manage_news', $data, true);
        $this->load->view('admin/master', $data);
    }
    
    public function edit_news($news_id) 
    {
        $data = array();
        $data['title'] = 'Edit News';
        $data['news_info'] = $this->evis_sale_model->select_news_by_id($news_id);
        $data['dashboard'] = $this->load->view('admin/edit_news', $data, true);
        $sdata = array();
        $sdata['edit_news'] = 'Update News Successfully';
        $this->session->set_userdata($sdata);
        $this->load->view('admin/master', $data);
    }

    public function update_news() 
    {
        $data=array();
        $data['news_title'] = $this->input->post('news_title', true);
        /** IF THEY DO NOT SELECT A IMAGE **/
	foreach ($_FILES as $eachFile)
	{
            if ($eachFile['size'] > 0)
            {
                $config['upload_path'] = 'upload_image/news_image/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '10240';
                $config['max_width'] = '5000';
                $config['max_height'] = '5000';
                $error = '';
                $fdata = array();
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('news_image'))
                {
                    $error = $this->upload->display_errors();
                    echo $error;
                    exit();
                } 
                else 
                {
                    $fdata = $this->upload->data();
                    $index = 'product_image_0';
                    $up['main'] = $config['upload_path'] . $fdata['file_name'];
                }        
                /** START IMAGE RESIZE **/
                $config['image_library'] = 'gd2';
                $config['new_image'] = 'upload_image/news_image/';
                $config['source_image'] = $up['main'];
                $config['create_thumb'] = TRUE;
                $config['maintain_ratio'] = TRUE;
                $config['overwrite'] = TRUE;
                $config['maintain_ratio'] = true;
                $config['width'] = '870';
                $config['height'] = '440';
                $this->load->library('image_lib', $config);
                $this->image_lib->initialize($config);
                $this->image_lib->resize();
                if (!$this->image_lib->resize()) {
                    $error = $this->image_lib->display_errors();
                    echo $error;
                    exit();
                } else {
                    $index = 'news_image';
                    $data[$index] = $config['new_image'] . $fdata['raw_name'] . '_thumb' . $fdata['file_ext'];
                    unlink($fdata['full_path']);
                    }
                /** END IMAGE RESIZE **/
		}
	}
        /** END OF IF THEY DO NOT SELECT A IMAGE **/
        $data['news_date'] = $this->input->post('news_date', true);
        $data['news_summery'] = $this->input->post('news_summery', true);
        $data['full_news'] = $this->input->post('full_news', true);
        $this->evis_sale_model->update_news_info($data);
        redirect('evis_sale/manage_news');
    }
    
    public function delete_news($news_id) 
    {        
        $this->evis_sale_model->delete_news_by_id($news_id);
        redirect('evis_sale/manage_news');
    } 
}