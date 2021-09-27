<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Evis_Sports_Model extends CI_Model {
    
    public function save_team_info()
    {
        $data=array();
        $data['team_name'] = $this->input->post('team_name', true);
        $data['team_wins'] = $this->input->post('team_wins', true);
        $data['team_loses'] = $this->input->post('team_loses', true);
        $data['team_ties'] = $this->input->post('team_ties', true);
        $data['team_goals'] = $this->input->post('team_goals', true);
        $data['team_points'] = $this->input->post('team_points', true);
        $this->db->insert('tbl_team',$data);
    }
    
    public function select_all_team()
    {
        $sql = "SELECT * FROM tbl_team ORDER BY team_points DESC ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_team_by_id($team_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_team');
        $this->db->where('team_id',$team_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function update_team_info()
    {
        $data=array();
        $data['team_name'] = $this->input->post('team_name', true);
        $data['team_wins'] = $this->input->post('team_wins', true);
        $data['team_loses'] = $this->input->post('team_loses', true);
        $data['team_ties'] = $this->input->post('team_ties', true);
        $data['team_goals'] = $this->input->post('team_goals', true);
        $data['team_points'] = $this->input->post('team_points', true);
        $team_id = $this->input->post('team_id', true);
        $this->db->where('team_id',$team_id);
        $this->db->update('tbl_team',$data);
    }
    
    public function delete_team_by_id($team_id)
    {
        $this->db->where('team_id',$team_id);
        $this->db->delete('tbl_team');
    }
    
    public function save_match_schedule_info()
    {
        $data=array();
        $data['first_team'] = $this->input->post('first_team', true);
        $data['opposite_team'] = $this->input->post('opposite_team', true);
        $data['match_time'] = $this->input->post('match_time', true);
        $data['match_date'] = $this->input->post('match_date', true);
        $this->db->insert('tbl_match',$data);
    }
    
    public function select_all_match_schedule()
    {
        $sql = "SELECT * FROM tbl_match ORDER BY match_id DESC ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_coming_soon_match($today,$seventh)
    {
        $sql = "SELECT * FROM tbl_match WHERE match_date BETWEEN '$today' AND '$seventh' ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_match_schedule_by_id($match_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_match');
        $this->db->where('match_id',$match_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function update_match_schedule_info()
    {
        $data=array();
        $data['first_team'] = $this->input->post('first_team', true);
        $data['opposite_team'] = $this->input->post('opposite_team', true);
        $data['match_time'] = $this->input->post('match_time', true);
        $data['match_date'] = $this->input->post('match_date', true);
        $match_id = $this->input->post('match_id', true);
        $this->db->where('match_id',$match_id);
        $this->db->update('tbl_match',$data);
    }
    
    public function delete_match_schedule_by_id($match_id)
    {
        $this->db->where('match_id',$match_id);
        $this->db->delete('tbl_match');
    }
    
    public function save_match_prediction()
    {
        $customer_id = $this->session->userdata('customer_id');
        $data=array();
        $data['customer_id'] = $customer_id;
        $data['match_id'] = $this->input->post('match_id', true);
        $data['first_team_prediction'] = $this->input->post('first_team_prediction', true);
        $data['opposite_team_prediction'] = $this->input->post('opposite_team_prediction', true);
        $this->db->insert('tbl_prediction',$data);
    }
    
    public function select_current_prediction($match_id)
    {
        $sql = "SELECT * FROM tbl_customer AS c, tbl_match AS m, tbl_prediction AS p WHERE c.customer_id=p.customer_id AND m.match_id=p.match_id AND p.match_id='$match_id' ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    
    public function select_all_prediction($per_page, $offset)
    {
        if ($offset == NULL)
        {
            $offset = 0;
        }
        $sql = "SELECT * FROM tbl_prediction AS p, tbl_customer AS c, tbl_match AS m WHERE p.customer_id=c.customer_id AND p.match_id=m.match_id ORDER BY p.prediction_id DESC LIMIT $offset,$per_page ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function delete_prediction_by_id($prediction_id)
    {
        $this->db->where('prediction_id',$prediction_id);
        $this->db->delete('tbl_prediction');
    }
    
    
    
    
}