<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Message_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get message by ID
     */
    function get_message($ID)
    {
        return $this->db->get_where('MESSAGE',array('ID'=>$ID))->row_array();
    }
        
    /*
     * Get all message
     */
    function get_all_message()
    {
        $this->db->order_by('ID', 'desc');
        return $this->db->get('MESSAGE')->result_array();
    }
        
    /*
     * function to add new message
     */
    function add_message($params)
    {
        $this->db->insert('MESSAGE',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update message
     */
    function update_message($ID,$params)
    {
        $this->db->where('ID',$ID);
        return $this->db->update('MESSAGE',$params);
    }
    
    /*
     * function to delete message
     */
    function delete_message($ID)
    {
        return $this->db->delete('MESSAGE',array('ID'=>$ID));
    }
}