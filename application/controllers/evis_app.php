<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Evis_App extends CI_Controller {
    
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
    
    public function index()
    {
        $data = array();
        $data['title'] = 'Dashboard';        
        $data['all_order'] = $this->evis_app_model->select_all_order();
        $data['all_customer'] = $this->evis_app_model->select_all_customer();
        $data['all_sale'] = $this->evis_app_model->select_all_sale();
        $data['dashboard'] = $this->load->view('admin/dashboard', $data, true);
        $this->load->view('admin/master', $data);
    }
    
    public function logout()
    {
        $this->session->unset_userdata('admin_id');
        $this->session->unset_userdata('admin_name');
        $this->session->unset_userdata('admin_date_time');
        $sdata['exception'] = 'You are Successfully Logout ';
        $this->session->set_userdata($sdata);
        redirect('evis_login');
    }
    
    public function category_search($search)
    {
        $data = array();
        $data['category_search'] = $this->evis_app_model->search_the_category($search);
        $this->load->view('admin/search_category',$data);
    }
    
    public function product_search($search)
    {
        $data = array();
        $data['product_search'] = $this->evis_app_model->search_product($search);
        $this->load->view('admin/search_product',$data);
    }
    
    public function customer_search($search)
    {
        $data = array();
        $data['customer_search'] = $this->evis_app_model->search_the_customer($search);
        $this->load->view('admin/search_customer',$data);
    }
    
    public function order_search($search)
    {
        $data = array();
        $data['order_search'] = $this->evis_app_model->search_the_order($search);
        $this->load->view('admin/search_order',$data);
    }
    
    public function subscription_search($search)
    {
        $data = array();
        $data['subscription_search'] = $this->evis_app_model->search_the_subscription($search);
        $this->load->view('admin/search_subscription',$data);
    }
        
    public function add_admin() 
    {
        $data = array();
        $data['title'] = 'Add Admin';
        $data['dashboard'] = $this->load->view('admin/add_admin', $data, true);
        $this->load->view('admin/master', $data);
    }

    public function save_admin()
    {
        $this->form_validation->set_rules('admin_password', 'Password', 'trim|required|min_length[6]|max_length[250]|matches[conform_password]|xss_clean');
        $this->form_validation->set_rules('conform_password', 'Password Confirmation', 'trim|required');
        if ($this->form_validation->run() == False)
        {
            $data = array();
            $data['title'] = 'Password Did Not Match';
            $data['dashboard'] = $this->load->view('admin/add_admin', $data, true);
            $this->load->view('admin/master', $data);
        } 
        else 
        {
            $data['admin_status'] = $this->input->post('admin_status', true);
            $this->evis_app_model->save_admin_info($data);
            if ($data['admin_status'] == '1') 
            {
                $sdata = array();
                $sdata['save_admin'] = 'Admin Active';
                $this->session->set_userdata($sdata);
            }
            if ($data['admin_status'] == '0')
            {
                $sdata = array();
                $sdata['save_admin'] = 'Admin Info Saved';
                $this->session->set_userdata($sdata);
            }
            redirect('evis_app/add_admin');
        }
    }

    public function manage_admin()
    {
        $data = array();
        $data['title'] = 'Manage Admin';
        $data['all_admin'] = $this->evis_app_model->select_all_admin();
        $data['dashboard'] = $this->load->view('admin/manage_admin', $data, true);
        $this->load->view('admin/master', $data);
    }

    public function deactive_admin($admin_id) 
    {
        $this->evis_app_model->deactive_admin_by_id($admin_id);
        redirect('evis_app/manage_admin');
    }

    public function active_admin($admin_id)
    {
        $this->evis_app_model->active_admin_by_id($admin_id);
        redirect('evis_app/manage_admin');
    }

    public function edit_admin($admin_id) 
    {
        $data = array();
        $data['title'] = 'Edit Admin';
        $data['admin_info'] = $this->evis_app_model->select_admin_by_id($admin_id);
        $data['dashboard'] = $this->load->view('admin/edit_admin', $data, true);
        $sdata = array();
        $sdata['edit_admin'] = 'Update Admin Information Successfully';
        $this->session->set_userdata($sdata);
        $this->load->view('admin/master', $data);
    }

    public function update_admin() 
    {
        $this->evis_app_model->update_admin_info();
        redirect('evis_app/manage_admin');
    }

    public function delete_admin($admin_id) 
    {
        $this->evis_app_model->delete_admin_by_id($admin_id);
        redirect('evis_app/manage_admin');
    }
    
    public function add_slide()
    {
        $data = array();
        $data['title'] = 'Add Slide';
        $data['dashboard'] = $this->load->view('admin/add_slide', $data, true);
        $this->load->view('admin/master', $data);
    }
    
    public function save_slide()
    {
        $data=array();
        /** IF THEY DO NOT SELECT A IMAGE **/
	foreach ($_FILES as $eachFile)
	{
            if ($eachFile['size'] > 0)
            {
                $config['upload_path'] = 'upload_image/slide_image/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '10240';
                $config['max_width'] = '5000';
                $config['max_height'] = '5000';
                $error = '';
                $fdata = array();
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('slide_image'))
                {
                    $error = $this->upload->display_errors();
                    echo $error;
                    exit();
                } 
                else 
                {
                    $fdata = $this->upload->data();
                    $index = 'slide_image';
                    $up['main'] = $config['upload_path'] . $fdata['file_name'];
                }        
                /** START IMAGE RESIZE **/
                $config['image_library'] = 'gd2';
                $config['new_image'] = 'upload_image/slide_image/';
                $config['source_image'] = $up['main'];
                $config['create_thumb'] = TRUE;
                $config['maintain_ratio'] = TRUE;
                $config['overwrite'] = TRUE;
                $config['maintain_ratio'] = true;
                $config['width'] = '600';
                $config['height'] = '430';
                $this->load->library('image_lib', $config);
                $this->image_lib->initialize($config);
                $this->image_lib->resize();
                if (!$this->image_lib->resize()) {
                    $error = $this->image_lib->display_errors();
                    echo $error;
                    exit();
                } else {
                    $index = 'slide_image';
                    $data[$index] = $config['new_image'] . $fdata['raw_name'] . '_thumb' . $fdata['file_ext'];
                    unlink($fdata['full_path']);
                    }
                /** END IMAGE RESIZE **/
		}
	}
        /** END OF IF THEY DO NOT SELECT A IMAGE **/
        $data['slide_title'] = $this->input->post('slide_title', true);
        $this->evis_app_model->save_slide_info($data);
        $sdata = array();
        $sdata['save_slide'] = 'Slide Saved';
        $this->session->set_userdata($sdata);
        redirect('evis_app/add_slide');
    }
    
    public function manage_slider()
    {
        $data = array();
        $data['title'] = 'Manage Slider';
        $data['all_slide'] = $this->evis_app_model->select_all_slide();
        $data['dashboard'] = $this->load->view('admin/manage_slider', $data, true);
        $this->load->view('admin/master', $data);
    }
    
    public function edit_slide($slide_id) 
    {
        $data = array();
        $data['title'] = 'Edit Slide';
        $data['slide_info'] = $this->evis_app_model->select_slide_by_id($slide_id);
        $data['dashboard'] = $this->load->view('admin/edit_slide', $data, true);
        $sdata = array();
        $sdata['edit_slide'] = 'Update Slide Information Successfully';
        $this->session->set_userdata($sdata);
        $this->load->view('admin/master', $data);
    }

    public function update_slide() 
    {
        $data=array();
        /** IF THEY DO NOT SELECT A IMAGE **/
	foreach ($_FILES as $eachFile)
	{
            if ($eachFile['size'] > 0)
            {
                $config['upload_path'] = 'upload_image/slide_image/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '10240';
                $config['max_width'] = '5000';
                $config['max_height'] = '5000';
                $error = '';
                $fdata = array();
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('slide_image'))
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
                $config['new_image'] = 'upload_image/slide_image/';
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
                    $index = 'slide_image';
                    $data[$index] = $config['new_image'] . $fdata['raw_name'] . '_thumb' . $fdata['file_ext'];
                    unlink($fdata['full_path']);
                    }
                /** END IMAGE RESIZE **/
		}
	}
        /** END OF IF THEY DO NOT SELECT A IMAGE **/
        $data['slide_title'] = $this->input->post('slide_title', true);
        $this->evis_app_model->update_slide_info($data);
        redirect('evis_app/manage_slider');
    }
    
    public function delete_slide($slide_id) 
    {        
        $this->evis_app_model->delete_slide_by_id($slide_id);
        redirect('evis_app/manage_slider');
    }
    
    public function add_banner()
    {
        $data = array();
        $data['title'] = 'Add Banner';
        $data['dashboard'] = $this->load->view('admin/add_banner', $data, true);
        $this->load->view('admin/master', $data);
    }

    public function save_banner()
    {
        $data=array();
        /** IF THEY DO NOT SELECT A IMAGE **/
	foreach ($_FILES as $eachFile)
	{
            if ($eachFile['size'] > 0)
            {
                $config['upload_path'] = 'upload_image/banner_image/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '10240';
                $config['max_width'] = '5000';
                $config['max_height'] = '5000';
                $error = '';
                $fdata = array();
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('banner_image'))
                {
                    $error = $this->upload->display_errors();
                    echo $error;
                    exit();
                } 
                else 
                {
                    $fdata = $this->upload->data();
                    $index = 'banner_image';
                    $up['main'] = $config['upload_path'] . $fdata['file_name'];
                }        
                /** START IMAGE RESIZE **/
                $config['image_library'] = 'gd2';
                $config['new_image'] = 'upload_image/banner_image/';
                $config['source_image'] = $up['main'];
                $config['create_thumb'] = TRUE;
                $config['maintain_ratio'] = TRUE;
                $config['overwrite'] = TRUE;
                $config['maintain_ratio'] = true;
                $config['width'] = '576';
                $config['height'] = '120';
                $this->load->library('image_lib', $config);
                $this->image_lib->initialize($config);
                $this->image_lib->resize();
                if (!$this->image_lib->resize()) {
                    $error = $this->image_lib->display_errors();
                    echo $error;
                    exit();
                } else {
                    $index = 'banner_image';
                    $data[$index] = $config['new_image'] . $fdata['raw_name'] . '_thumb' . $fdata['file_ext'];
                    unlink($fdata['full_path']);
                    }
                /** END IMAGE RESIZE **/
		}
	}
        /** END OF IF THEY DO NOT SELECT A IMAGE **/
        $data['banner_position'] = $this->input->post('banner_position', true);
        $this->evis_app_model->save_banner_info($data);
        $sdata = array();
        $sdata['save_banner'] = 'Banner Saved';
        $this->session->set_userdata($sdata);
        redirect('evis_app/add_banner');
    }
    
    public function manage_banner()
    {
        $data = array();
        $data['title'] = 'Manage Banner';
        $data['all_banner'] = $this->evis_app_model->select_all_banner();
        $data['dashboard'] = $this->load->view('admin/manage_banner', $data, true);
        $this->load->view('admin/master', $data);
    }
    
    public function edit_banner($banner_id) 
    {
        $data = array();
        $data['title'] = 'Edit Banner';
        $data['banner_info'] = $this->evis_app_model->select_banner_by_id($banner_id);
        $data['dashboard'] = $this->load->view('admin/edit_banner', $data, true);
        $sdata = array();
        $sdata['edit_banner'] = 'Update Banner Position Successfully';
        $this->session->set_userdata($sdata);
        $this->load->view('admin/master', $data);
    }

    public function update_banner() 
    {
	$this->evis_app_model->update_banner_info();
        redirect('evis_app/manage_banner');
    }
    
    public function delete_banner($banner_id) 
    {        
        $this->evis_app_model->delete_banner_by_id($banner_id);
        redirect('evis_app/manage_banner');
    }
    
    public function setting()
    {
        $data = array();
        $data['title'] = 'Setting';
        $data['all_city'] = $this->evis_sale_model->select_all_city();
        $data['all_size'] = $this->evis_sale_model->select_all_size();
        $data['all_color'] = $this->evis_sale_model->select_all_color();
        $data['all_color_code'] = $this->evis_sale_model->select_all_color_code();
        $data['dashboard'] = $this->load->view('admin/setting', $data, true);
        $this->load->view('admin/master', $data);
    }
    
    public function about()
    {
        $data = array();
        $data['title'] = 'Evis Technology';
        $data['dashboard'] = $this->load->view('admin/about', $data, true);
        $this->load->view('admin/master', $data);
    }    
}