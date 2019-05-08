<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Menu_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get menu by ID
     */
    function get_menu($ID)
    {
        return $this->db->get_where('MENU',array('ID'=>$ID))->row_array();
    }
        
    /*
     * Get all menu
     */
    function get_all_menu()
    {
//        $this->db->order_by('ID', 'desc');
        return $this->db->get('MENU')->result_array();
    }
        
    /*
     * function to add new menu
     */
    function add_menu($params)
    {
        $this->db->insert('MENU',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update menu
     */
    function update_menu($ID,$params)
    {
        $this->db->where('ID',$ID);
        return $this->db->update('MENU',$params);
    }
    
    /*
     * function to delete menu
     */
    function delete_menu($ID)
    {
        return $this->db->delete('MENU',array('ID'=>$ID));
    }
}