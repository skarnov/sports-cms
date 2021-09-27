<?php defined('BASEPATH') OR exit('No direct script access allowed');

session_start();

class Evis_Store extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
    }
        
    public function index()
    {
        $today = date("d-m-Y");
        $tomorrow = date("d-m-Y", strtotime("1 day"));
        $second = date("d-m-Y", strtotime("2 day"));
        $third = date("d-m-Y", strtotime("3 day"));
        $fourth = date("d-m-Y", strtotime("4 day"));
        $fifth = date("d-m-Y", strtotime("5 day"));
        $sixth = date("d-m-Y", strtotime("6 day"));
        $seventh = date("d-m-Y", strtotime("7 day"));                   
        $data = array();
        $data['title'] = 'Home';
        $data['today_match'] = $this->evis_store_model->select_all_today_match($today);
        if($data['today_match']==NULL)
        {
            $data['today_match'] = $this->evis_store_model->select_all_tomorrow_match($tomorrow);
            if($data['today_match']==NULL)
            {
                $data['today_match'] = $this->evis_store_model->select_all_second_match($second);
                if($data['today_match']==NULL)
                {
                    $data['today_match'] = $this->evis_store_model->select_all_third_match($third);
                    if($data['today_match']==NULL)
                    {
                        $data['today_match'] = $this->evis_store_model->select_all_fourth_match($fourth);
                        if($data['today_match']==NULL)
                        {
                            $data['today_match'] = $this->evis_store_model->select_all_fifth_match($fifth);
                            if($data['today_match']==NULL)
                            {
                                $data['today_match'] = $this->evis_store_model->select_all_sixth_match($sixth);
                                if($data['today_match']==NULL)
                                {
                                    $data['today_match'] = $this->evis_store_model->select_all_seventh_match($fourth);
                                }
                            }
                        }
                    }
                }
            }
        }
        $data['all_slide'] = $this->evis_app_model->select_all_slide();
        $data['all_category'] = $this->evis_inventory_model->select_all_published_category();
        $data['new_product'] = $this->evis_store_model->select_new_product();
        $data['discount_product'] = $this->evis_store_model->select_discount_product();
        $data['all_team'] = $this->evis_sports_model->select_all_team();
        $data['latest_product'] = $this->evis_store_model->select_latest_product();
        $data['best_selling'] = $this->evis_store_model->select_best_selling_product();
        $data['all_banner'] = $this->evis_app_model->select_all_banner();
        $data['all_news'] = $this->evis_store_model->select_all_news();
        $data['home'] = $this->load->view('home', $data, true);
        $this->load->view('master', $data);
    }
    
    public function logout()
    {
        $this->session->unset_userdata('customer_id');
        $this->session->unset_userdata('first_name');
        $sdata['exception'] = 'You are Successfully Logout ';
        $this->session->set_userdata($sdata);
        redirect('evis_store');
    }
    
    public function product_details($product_id) 
    {
        $data = array();
        $data['title'] = 'Product Details';
        $data['product_info'] = $this->evis_inventory_model->select_product_by_id($product_id);   
        $this->load->view('product_details', $data);
    }
    
    public function product_listing($category_id = null, $start = null)
    {
	$data = array();
        $data['title'] = 'Product Listing';
        if(!$start)
        {
            $start=0;
        }
        $data['start']= $start;
        $data['limit']= 12;
        $data['total_product'] = count($this->evis_store_model->select_product_by_category($category_id, '', ''));
        $data['category_product'] = $this->evis_store_model->select_product_by_category($category_id, $start, $data['limit']);
        $data['this_page'] = count($data['category_product']);
        $data['category'] = $this->evis_store_model->select_category_by_name($category_id);    
        $data['home'] = $this->load->view('product_listing', $data, true);
        $this->load->view('master', $data);
    }
    
    public function contact_us() 
    {
        $data = array();
        $data['title'] = 'Contact Us';
        $data['home'] = $this->load->view('contact_us', $data, true);
        $this->load->view('master', $data);
    }
    
    public function all_match_schedule() 
    {
        $data = array();
        $data['title'] = 'Match Schedules';
        $data['all_match_schedule'] = $this->evis_sports_model->select_all_match_schedule();
        $data['home'] = $this->load->view('match_schedule', $data, true);
        $this->load->view('master', $data);
    }
    
    public function coming_soon_match()
    {
        $today = date("d-m-Y");
        $seventh = date("d-m-Y", strtotime("7 day")); 
        $data = array();
        $data['title'] = 'Coming Soon';
        $data['coming_soon_match'] = $this->evis_sports_model->select_coming_soon_match($today,$seventh);
        $data['home'] = $this->load->view('coming_soon_match', $data, true);
        $this->load->view('master', $data);
    }
    
    public function join_us() 
    {
        $data = array();
        $data['title'] = 'Join Us';
        $data['all_city'] = $this->evis_sale_model->select_all_city();
        $data['home'] = $this->load->view('join_us', $data, true);
        $this->load->view('master', $data);
    }
    
    public function match_prediction($match_id) 
    {
        $customer_id = $this->session->userdata('customer_id');
        if($customer_id==NULL)
        {
            redirect('login');
        }
        else
        {
            $data = array();
            $data['title'] = 'Match Prediction';
            $data['match_schedule_info'] = $this->evis_sports_model->select_match_schedule_by_id($match_id);
            $data['current_prediction'] = $this->evis_sports_model->select_current_prediction($match_id);
            $data['home'] = $this->load->view('match_prediction', $data, true);
            $this->load->view('master', $data);
        }    
    }
    
    public function save_match_prediction()
    {
        $this->evis_sports_model->save_match_prediction();
        $sdata = array();
        $sdata['save_match_prediction'] = 'شكر';
        $this->session->set_userdata($sdata);
        redirect('evis_store');
    }
    
    public function save_customer()
    {
        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
        $this->form_validation->set_rules('customer_email', 'Email', 'required|valid_email|is_unique[tbl_customer.customer_email]');
        $this->form_validation->set_rules('customer_password', 'Password', 'trim|required|min_length[6]|max_length[250]|matches[confirm_password]|xss_clean');
        $this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required');
        if ($this->form_validation->run() == False)
        {
            $data = array();
            $data['title'] = 'خطأ';
            $data['all_city'] = $this->evis_sale_model->select_all_city();
            $data['home'] = $this->load->view('join_us', $data, true);
            $this->load->view('master', $data);
        } 
        else 
        {
            $this->evis_store_model->save_customer_info();
            $sdata = array();
            $sdata['save_customer'] = 'تم التسجيل بنجاح';
            $this->session->set_userdata($sdata);
            redirect('evis_store/join_us');
        }
    }
    
    public function news()
    {
        $data = array();
        $data['title'] = 'News';
        $config['base_url'] = base_url() . 'evis_store/news/';
        $config['total_rows'] = $this->db->count_all('tbl_news');
        $config['per_page'] = '12';
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
        $data['all_news'] = $this->evis_store_model->news_archive($config['per_page'], $this->uri->segment(3));
        $data['home'] = $this->load->view('news', $data, true);
        $this->load->view('master', $data);
    }
    
    public function news_details($news_id) 
    {
        $data = array();
        $data['title'] = 'News Details';
        $data['news_info'] = $this->evis_sale_model->select_news_by_id($news_id);
        $data['home'] = $this->load->view('news_details', $data, true);
        $this->load->view('master', $data);
    }
    
    public function latest_product()
    {
        $data = array();
        $data['title'] = 'Latest Product';
        $config['base_url'] = base_url() . 'evis_store/latest_product/';
        $config['total_rows'] = $this->db->count_all('tbl_product');
        $config['per_page'] = '12';
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
        $data['latest_product'] = $this->evis_store_model->select_latest_product_product($config['per_page'], $this->uri->segment(3));
        $data['home'] = $this->load->view('latest_product', $data, true);
        $this->load->view('master', $data);
    }
    
    public function best_selling()
    {
        $data = array();
        $data['title'] = 'Best Selling';
        $data['all_brand'] = $this->evis_sale_model->select_all_brand();
        $data['all_category'] = $this->evis_inventory_model->select_all_published_category();
        $data['best_selling'] = $this->evis_store_model->select_best_selling_product();
        $data['home'] = $this->load->view('best_selling', $data, true);
        $this->load->view('master', $data);
    }
    
    public function search_product()
    {
        $data = array();
        $data['title'] = 'Search Product';
        $product_name = $this->input->post('product_name', true);
        $data['product_search'] = $this->evis_store_model->search_the_product($product_name);
        $data['home'] = $this->load->view('search_product', $data, true);
        $this->load->view('master', $data);
    }
    
    public function send_email()
    {
        $name = $this->input->post('name', true);
        $email = $this->input->post('email', true);
        $message = $this->input->post('message', true);
        $mdata = array();
        $mdata['from_address'] = $email;
        $mdata['admin_full_name'] = 'Contact Us';
        $mdata['to_address'] = 'info@evis.com';
        $mdata['cc_address'] = 'info@evis.com';
        $mdata['subject'] = 'Contact Form';
        $mdata['name'] = $name;
        $mdata['message'] = $message;
        $this->mailer_model->sendEmail($mdata, 'contact');
        $sdata = array();
        $sdata['send_email'] = 'Send Mail!';
        $this->session->set_userdata($sdata);
        redirect('evis_store/contact_us');
    }
    
    public function about() 
    {
        $data = array();
        $data['title'] = 'About';
        $data['all_brand'] = $this->evis_sale_model->select_all_brand();
        $data['show_setting'] = $this->evis_app_model->select_setting();
        $data['all_category'] = $this->evis_inventory_model->select_all_published_category();
        $data['home'] = $this->load->view('about', $data, true);
        $this->load->view('master', $data);
    }
    
    public function save_newsletter()
    {
        $this->evis_store_model->save_newsletter_info();
        $sdata = array();
        $sdata['save_newsletter'] = 'Thanks';
        $this->session->set_userdata($sdata);
        redirect('evis_store');
    }
}