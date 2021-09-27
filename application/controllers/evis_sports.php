<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Evis_Sports extends CI_Controller {
    
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
        
    public function add_team() 
    {
        $data = array();
        $data['title'] = 'Add Team';
        $data['dashboard'] = $this->load->view('admin/add_team', $data, true);
        $this->load->view('admin/master', $data);
    }
    
    public function save_team()
    {
        $this->evis_sports_model->save_team_info();
        $sdata = array();
        $sdata['save_team'] = 'Team Saved';
        $this->session->set_userdata($sdata);
        redirect('evis_sports/add_team');
    }
    
    public function manage_team()
    {
        $data = array();
        $data['title'] = 'Manage Teams';
        $data['all_team'] = $this->evis_sports_model->select_all_team();
        $data['dashboard'] = $this->load->view('admin/manage_team', $data, true);
        $this->load->view('admin/master', $data);
    }
    
    public function edit_team($team_id) 
    {
        $data = array();
        $data['title'] = 'Edit Team';
        $data['team_info'] = $this->evis_sports_model->select_team_by_id($team_id);
        $data['dashboard'] = $this->load->view('admin/edit_team', $data, true);
        $sdata = array();
        $sdata['edit_team'] = 'Update Team Successfully';
        $this->session->set_userdata($sdata);
        $this->load->view('admin/master', $data);
    }

    public function update_team() 
    {
        $this->evis_sports_model->update_team_info();
        redirect('evis_sports/manage_team');
    }
    
    public function delete_team($team_id) 
    {
        $this->evis_sports_model->delete_team_by_id($team_id);
        redirect('evis_sports/manage_team');
    }
    
    public function add_match_schedule() 
    {
        $data = array();
        $data['title'] = 'Add Match Schedule';
        $data['dashboard'] = $this->load->view('admin/add_match_schedule', $data, true);
        $this->load->view('admin/master', $data);
    }
    
    public function save_match_schedule()
    {
        $this->evis_sports_model->save_match_schedule_info();
        $sdata = array();
        $sdata['save_match_schedule'] = 'Match Schedule Saved';
        $this->session->set_userdata($sdata);
        redirect('evis_sports/add_match_schedule');
    }
    
    public function manage_match_schedule()
    {
        $data = array();
        $data['title'] = 'Manage Match Schedules';
        $data['all_match_schedule'] = $this->evis_sports_model->select_all_match_schedule();
        $data['dashboard'] = $this->load->view('admin/manage_match_schedule', $data, true);
        $this->load->view('admin/master', $data);
    }
    
    public function edit_match_schedule($match_schedule_id) 
    {
        $data = array();
        $data['title'] = 'Edit Match Schedule';
        $data['match_schedule_info'] = $this->evis_sports_model->select_match_schedule_by_id($match_schedule_id);
        $data['dashboard'] = $this->load->view('admin/edit_match_schedule', $data, true);
        $sdata = array();
        $sdata['edit_match_schedule'] = 'Update Match Schedule Successfully';
        $this->session->set_userdata($sdata);
        $this->load->view('admin/master', $data);
    }

    public function update_match_schedule() 
    {
        $this->evis_sports_model->update_match_schedule_info();
        redirect('evis_sports/manage_match_schedule');
    }
    
    public function delete_match_schedule($match_schedule_id) 
    {
        $this->evis_sports_model->delete_match_schedule_by_id($match_schedule_id);
        redirect('evis_sports/manage_match_schedule');
    }
    
    public function manage_prediction()
    {
        $data = array();
        $data['title'] = 'Manage Prediction';
        $config['base_url'] = base_url() . 'evis_sports/manage_prediction/';
        $config['total_rows'] = $this->db->count_all('tbl_prediction');
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
        $data['all_prediction'] = $this->evis_sports_model->select_all_prediction($config['per_page'], $this->uri->segment(3));
        $data['dashboard'] = $this->load->view('admin/manage_prediction', $data, true);
        $this->load->view('admin/master', $data);
    }
    
    public function delete_prediction($prediction_id) 
    {        
        $this->evis_sports_model->delete_prediction_by_id($prediction_id);
        redirect('evis_sports/manage_prediction');
    }
}