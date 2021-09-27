<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Evis_Inventory extends CI_Controller {
        
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
    
    public function add_category()
    {
        $data = array();
        $data['title'] = 'New Category';
        $data['all_color_code'] = $this->evis_sale_model->select_all_color_code();
        $data['dashboard'] = $this->load->view('admin/add_category', $data, true);
        $this->load->view('admin/master', $data);
    }
    
    public function save_category()
    {
        $this->evis_inventory_model->save_category_info();
        $sdata = array();
        $sdata['save_category'] = 'Category Saved';
        $this->session->set_userdata($sdata);
        redirect('evis_inventory/add_category');
    }
    
    public function manage_category()
    {
        $data = array();
        $data['title'] = 'Manage Category';
        $data['all_category'] = $this->evis_inventory_model->select_all_category();
        $data['dashboard'] = $this->load->view('admin/manage_category', $data, true);
        $this->load->view('admin/master', $data);
    }
    
    public function edit_category($category_id) 
    {
        $data = array();
        $data['title'] = 'Edit Category';
        $data['all_color_code'] = $this->evis_sale_model->select_all_color_code();
        $data['category_info'] = $this->evis_inventory_model->select_category_by_id($category_id);
        $data['dashboard'] = $this->load->view('admin/edit_category', $data, true);
        $sdata = array();
        $sdata['edit_category'] = 'Update Category Successfully';
        $this->session->set_userdata($sdata);
        $this->load->view('admin/master', $data);
    }

    public function update_category() 
    {
        $this->evis_inventory_model->update_category_info();
        redirect('evis_inventory/manage_category');
    }
    
    public function delete_category($category_id) 
    {
        $this->evis_inventory_model->delete_category_by_id($category_id);
        redirect('evis_inventory/manage_category');
    }
    
    public function add_product()
    {
        $data = array();
        $data['title'] = 'New Product';
        $data['all_category'] = $this->evis_inventory_model->select_all_published_category();
        $data['all_color'] = $this->evis_sale_model->select_all_color();
        $data['all_size'] = $this->evis_sale_model->select_all_size();
        $data['dashboard'] = $this->load->view('admin/add_product', $data, true);
        $this->load->view('admin/master', $data);
    }
    
    public function save_product()
    {
        $this->form_validation->set_rules('color_name','Select Color','required');
        $this->form_validation->set_rules('size_name','Select Size','required');
        $this->form_validation->set_rules('product_status','Product Status','required|greater_than[0]');
        if ($this->form_validation->run() == False)
        {
            $data = array();
            $data['title'] = 'New Product';
            $data['all_category'] = $this->evis_inventory_model->select_all_published_category();
            $data['all_color'] = $this->evis_sale_model->select_all_color();
            $data['all_size'] = $this->evis_sale_model->select_all_size();
            $data['dashboard'] = $this->load->view('admin/add_product', $data, true);
            $this->load->view('admin/master', $data);
        } 
        else 
        {
            $color_name = $this->input->post('color_name', true);
            $color = implode(",",$color_name);
            $size_name = $this->input->post('size_name', true);
            $size = implode(",",$size_name);
            $data=array();
            $data['category_id'] = $this->input->post('category_id', true);
            $data['product_color'] = $color;     
            $data['product_size'] = $size;
            $data['product_name'] = $this->input->post('product_name', true);
            $data['product_tag'] = $this->input->post('product_tag', true);
            /** IF THEY DO NOT SELECT A IMAGE **/
            $cnt = 0;
            foreach ($_FILES as $eachFile)
            {
                if ($eachFile['size'] > 0)
                {

                    $config['upload_path'] = 'upload_image/product_image_' . $cnt . '/';
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['max_size'] = '10240';
                    $config['max_width'] = '5000';
                    $config['max_height'] = '5000';
                    $error = '';
                    $fdata = array();
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    if (!$this->upload->do_upload('product_image_' . $cnt))
                    {
                        $error = $this->upload->display_errors();
                        echo $error;
                        exit();
                    } 
                    else 
                    {
                        $fdata = $this->upload->data();
                        $index = 'product_image_' . $cnt;
                        $up['main'] = $config['upload_path'] . $fdata['file_name'];
                    }        
                    /** START IMAGE RESIZE **/
                    $config['image_library'] = 'gd2';
                    $config['new_image'] = 'upload_image/product_image_' . $cnt . '/';
                    $config['source_image'] = $up['main'];
                    $config['create_thumb'] = TRUE;
                    $config['maintain_ratio'] = TRUE;
                    $config['overwrite'] = TRUE;
                    $config['maintain_ratio'] = true;
                    $config['width'] = '300';
                    $config['height'] = '300';
                    $this->load->library('image_lib', $config);
                    $this->image_lib->initialize($config);
                    $this->image_lib->resize();
                    if (!$this->image_lib->resize()) {
                        $error = $this->image_lib->display_errors();
                        echo $error;
                        exit();
                    } else {
                        $index = 'product_image_' . $cnt;
                        $data[$index] = $config['new_image'] . $fdata['raw_name'] . '_thumb' . $fdata['file_ext'];
                        unlink($fdata['full_path']);
                        }
                    /** END IMAGE RESIZE **/
                    }
                    $cnt++;
            }
            /** END OF IF THEY DO NOT SELECT A IMAGE **/
            $data['product_quantity'] = $this->input->post('product_quantity', true);
            $data['product_price'] = $this->input->post('product_price', true);
            $data['product_old_price'] = $this->input->post('product_old_price', true);
            $data['product_summery'] = $this->input->post('product_summery', true);
            $data['product_description'] = $this->input->post('product_description', true);
            $data['product_status'] = $this->input->post('product_status', true);
            $this->evis_inventory_model->save_product_info($data);
            $sdata = array();
            $sdata['save_product'] = 'Product Saved';
            $this->session->set_userdata($sdata);
            redirect('evis_inventory/add_product');
            }
    }
    
    public function manage_product()
    {
        $data = array();
        $data['title'] = 'Manage Product';
        $config['base_url'] = base_url() . 'evis_inventory/manage_product/';
        $config['total_rows'] = $this->db->count_all('tbl_product');
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
        $data['all_product'] = $this->evis_inventory_model->select_all_product($config['per_page'], $this->uri->segment(3));
        $data['dashboard'] = $this->load->view('admin/manage_product', $data, true);
        $this->load->view('admin/master', $data);
    }
    
    public function edit_product($product_id) 
    {
        $data = array();
        $data['title'] = 'Edit Product';
        $data['all_category'] = $this->evis_inventory_model->select_all_published_category();
        $data['all_color'] = $this->evis_sale_model->select_all_color();
        $data['all_size'] = $this->evis_sale_model->select_all_size();
        $data['product_info'] = $this->evis_inventory_model->select_product_by_id($product_id);
        $data['dashboard'] = $this->load->view('admin/edit_product', $data, true);
        $sdata = array();
        $sdata['edit_product'] = 'Update Product Successfully';
        $this->session->set_userdata($sdata);
        $this->load->view('admin/master', $data);
    }

    public function update_product() 
    {
        $this->evis_inventory_model->update_product_info();
        redirect('evis_inventory/manage_product');
    }
    
    public function delete_product($product_id) 
    {        
        $this->evis_inventory_model->delete_product_by_id($product_id);
        redirect('evis_inventory/manage_product');
    }
    
    public function edit_image_one()
    {
        $data=array();
        /** IF THEY DO NOT SELECT A IMAGE **/
	foreach ($_FILES as $eachFile)
	{
            if ($eachFile['size'] > 0)
            {
                $config['upload_path'] = 'upload_image/product_image_0/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '10240';
                $config['max_width'] = '5000';
                $config['max_height'] = '5000';
                $error = '';
                $fdata = array();
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('product_image_0'))
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
                $config['new_image'] = 'upload_image/product_image_0/';
                $config['source_image'] = $up['main'];
                $config['create_thumb'] = TRUE;
                $config['maintain_ratio'] = TRUE;
                $config['overwrite'] = TRUE;
                $config['maintain_ratio'] = true;
                $config['width'] = '300';
                $config['height'] = '300';
                $this->load->library('image_lib', $config);
                $this->image_lib->initialize($config);
                $this->image_lib->resize();
                if (!$this->image_lib->resize()) {
                    $error = $this->image_lib->display_errors();
                    echo $error;
                    exit();
                } else {
                    $index = 'product_image_0';
                    $data[$index] = $config['new_image'] . $fdata['raw_name'] . '_thumb' . $fdata['file_ext'];
                    unlink($fdata['full_path']);
                    }
                /** END IMAGE RESIZE **/
		}
	}
        /** END OF IF THEY DO NOT SELECT A IMAGE **/
        $data['product_id'] = $this->input->post('product_id', true);
        $this->evis_inventory_model->edit_image_one($data);
        $sdata = array();
        $sdata['edit_product'] = 'Updated';
        $this->session->set_userdata($sdata);
        redirect('evis_inventory/manage_product');
    }
    
    public function edit_image_two()
    {
        $data=array();
        /** IF THEY DO NOT SELECT A IMAGE **/
	foreach ($_FILES as $eachFile)
	{
            if ($eachFile['size'] > 0)
            {
                $config['upload_path'] = 'upload_image/product_image_1/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '10240';
                $config['max_width'] = '5000';
                $config['max_height'] = '5000';
                $error = '';
                $fdata = array();
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('product_image_1'))
                {
                    $error = $this->upload->display_errors();
                    echo $error;
                    exit();
                } 
                else 
                {
                    $fdata = $this->upload->data();
                    $index = 'product_image_1';
                    $up['main'] = $config['upload_path'] . $fdata['file_name'];
                }        
                /** START IMAGE RESIZE **/
                $config['image_library'] = 'gd2';
                $config['new_image'] = 'upload_image/product_image_1/';
                $config['source_image'] = $up['main'];
                $config['create_thumb'] = TRUE;
                $config['maintain_ratio'] = TRUE;
                $config['overwrite'] = TRUE;
                $config['maintain_ratio'] = true;
                $config['width'] = '300';
                $config['height'] = '300';
                $this->load->library('image_lib', $config);
                $this->image_lib->initialize($config);
                $this->image_lib->resize();
                if (!$this->image_lib->resize()) {
                    $error = $this->image_lib->display_errors();
                    echo $error;
                    exit();
                } else {
                    $index = 'product_image_1';
                    $data[$index] = $config['new_image'] . $fdata['raw_name'] . '_thumb' . $fdata['file_ext'];
                    unlink($fdata['full_path']);
                    }
                /** END IMAGE RESIZE **/
		}
	}
        /** END OF IF THEY DO NOT SELECT A IMAGE **/
        $data['product_id'] = $this->input->post('product_id', true);
        $this->evis_inventory_model->edit_image_one($data);
        $sdata = array();
        $sdata['edit_product'] = 'Updated';
        $this->session->set_userdata($sdata);
        redirect('evis_inventory/manage_product');
    }
    
    public function edit_image_three()
    {
        $data=array();
        /** IF THEY DO NOT SELECT A IMAGE **/
	foreach ($_FILES as $eachFile)
	{
            if ($eachFile['size'] > 0)
            {
                $config['upload_path'] = 'upload_image/product_image_2/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '10240';
                $config['max_width'] = '5000';
                $config['max_height'] = '5000';
                $error = '';
                $fdata = array();
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('product_image_2'))
                {
                    $error = $this->upload->display_errors();
                    echo $error;
                    exit();
                } 
                else 
                {
                    $fdata = $this->upload->data();
                    $index = 'product_image_2';
                    $up['main'] = $config['upload_path'] . $fdata['file_name'];
                }        
                /** START IMAGE RESIZE **/
                $config['image_library'] = 'gd2';
                $config['new_image'] = 'upload_image/product_image_2/';
                $config['source_image'] = $up['main'];
                $config['create_thumb'] = TRUE;
                $config['maintain_ratio'] = TRUE;
                $config['overwrite'] = TRUE;
                $config['maintain_ratio'] = true;
                $config['width'] = '300';
                $config['height'] = '300';
                $this->load->library('image_lib', $config);
                $this->image_lib->initialize($config);
                $this->image_lib->resize();
                if (!$this->image_lib->resize()) {
                    $error = $this->image_lib->display_errors();
                    echo $error;
                    exit();
                } else {
                    $index = 'product_image_2';
                    $data[$index] = $config['new_image'] . $fdata['raw_name'] . '_thumb' . $fdata['file_ext'];
                    unlink($fdata['full_path']);
                    }
                /** END IMAGE RESIZE **/
		}
	}
        /** END OF IF THEY DO NOT SELECT A IMAGE **/
        $data['product_id'] = $this->input->post('product_id', true);
        $this->evis_inventory_model->edit_image_one($data);
        $sdata = array();
        $sdata['edit_product'] = 'Updated';
        $this->session->set_userdata($sdata);
        redirect('evis_inventory/manage_product');
    }
    
    public function edit_image_four()
    {
        $data=array();
        /** IF THEY DO NOT SELECT A IMAGE **/
	foreach ($_FILES as $eachFile)
	{
            if ($eachFile['size'] > 0)
            {
                $config['upload_path'] = 'upload_image/product_image_3/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '10240';
                $config['max_width'] = '5000';
                $config['max_height'] = '5000';
                $error = '';
                $fdata = array();
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('product_image_3'))
                {
                    $error = $this->upload->display_errors();
                    echo $error;
                    exit();
                } 
                else 
                {
                    $fdata = $this->upload->data();
                    $index = 'product_image_3';
                    $up['main'] = $config['upload_path'] . $fdata['file_name'];
                }        
                /** START IMAGE RESIZE **/
                $config['image_library'] = 'gd2';
                $config['new_image'] = 'upload_image/product_image_3/';
                $config['source_image'] = $up['main'];
                $config['create_thumb'] = TRUE;
                $config['maintain_ratio'] = TRUE;
                $config['overwrite'] = TRUE;
                $config['maintain_ratio'] = true;
                $config['width'] = '300';
                $config['height'] = '300';
                $this->load->library('image_lib', $config);
                $this->image_lib->initialize($config);
                $this->image_lib->resize();
                if (!$this->image_lib->resize()) {
                    $error = $this->image_lib->display_errors();
                    echo $error;
                    exit();
                } else {
                    $index = 'product_image_3';
                    $data[$index] = $config['new_image'] . $fdata['raw_name'] . '_thumb' . $fdata['file_ext'];
                    unlink($fdata['full_path']);
                    }
                /** END IMAGE RESIZE **/
		}
	}
        /** END OF IF THEY DO NOT SELECT A IMAGE **/
        $data['product_id'] = $this->input->post('product_id', true);
        $this->evis_inventory_model->edit_image_one($data);
        $sdata = array();
        $sdata['edit_product'] = 'Updated';
        $this->session->set_userdata($sdata);
        redirect('evis_inventory/manage_product');
    }
    
    public function edit_image_five()
    {
        $data=array();
        /** IF THEY DO NOT SELECT A IMAGE **/
	foreach ($_FILES as $eachFile)
	{
            if ($eachFile['size'] > 0)
            {
                $config['upload_path'] = 'upload_image/product_image_4/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '10240';
                $config['max_width'] = '5000';
                $config['max_height'] = '5000';
                $error = '';
                $fdata = array();
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('product_image_4'))
                {
                    $error = $this->upload->display_errors();
                    echo $error;
                    exit();
                } 
                else 
                {
                    $fdata = $this->upload->data();
                    $index = 'product_image_4';
                    $up['main'] = $config['upload_path'] . $fdata['file_name'];
                }        
                /** START IMAGE RESIZE **/
                $config['image_library'] = 'gd2';
                $config['new_image'] = 'upload_image/product_image_4/';
                $config['source_image'] = $up['main'];
                $config['create_thumb'] = TRUE;
                $config['maintain_ratio'] = TRUE;
                $config['overwrite'] = TRUE;
                $config['maintain_ratio'] = true;
                $config['width'] = '300';
                $config['height'] = '300';
                $this->load->library('image_lib', $config);
                $this->image_lib->initialize($config);
                $this->image_lib->resize();
                if (!$this->image_lib->resize()) {
                    $error = $this->image_lib->display_errors();
                    echo $error;
                    exit();
                } else {
                    $index = 'product_image_4';
                    $data[$index] = $config['new_image'] . $fdata['raw_name'] . '_thumb' . $fdata['file_ext'];
                    unlink($fdata['full_path']);
                    }
                /** END IMAGE RESIZE **/
		}
	}
        /** END OF IF THEY DO NOT SELECT A IMAGE **/
        $data['product_id'] = $this->input->post('product_id', true);
        $this->evis_inventory_model->edit_image_one($data);
        $sdata = array();
        $sdata['edit_product'] = 'Updated';
        $this->session->set_userdata($sdata);
        redirect('evis_inventory/manage_product');
    }
}