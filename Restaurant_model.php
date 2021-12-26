<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Restaurant (Restaurant Model)
 * Restaurant model class to get to handle user related data 
 * @author : Rajesh Gupta
 * @version : 1.1
 * @since : 15 November 2019
 */
class Restaurant_model extends CI_Model
{
    
	   /**
     * This function is used to get the restaurant listing 
     * @return array $result : This is result
     */
    function restaurantListing($search = '')
    {
        $this->db->select('BaseTbl.*');
        $this->db->from('tbl_restaurants as BaseTbl');
        $this->db->join('tbl_users', 'tbl_users.userId = BaseTbl.uid'); 
        $this->db->order_by('BaseTbl.id', 'DESC');
        if ($search) {
            
            $where = array('BaseTbl.name' => $search, 'BaseTbl.address' => $search, 'BaseTbl.location' => $search);
            $this->db->or_like($where);

        }
        $this->db->where(array('tbl_users.roleId' => 1));
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
        
    /**
     * This function is used to add new restaurant to system
     * @return number $insert_id : This is last inserted id
     */
    function addNewrestaurant($restaurantInfo)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_restaurants', $restaurantInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    
    /**
     * This function used to get restaurant information by id
     * @param number $userId : This is restaurant id
     * @return array $result : This is restaurant information
     */
    function getrestaurantInfo($restaurantId)
    {
        $this->db->from('tbl_restaurants');
        $this->db->where('uid', $restaurantId);
        $query = $this->db->get();
        
        return $query->row();
    }
    
    /**
     * This function is used to update the restaurant information
     * @param array $restaurantInfo : This is restaurants updated information
     * @param number $restaurantId : This is restaurant id
     */
    function editrestaurant($restaurantInfo, $restaurantId)
    {
        $this->db->where('uid', $restaurantId);
        $this->db->update('tbl_restaurants', $restaurantInfo);
        
        return TRUE;
    }
    
    /**
     * This function is used to delete the restaurant information
     * @param number $restaurantId : This is restaurant id
     * @return boolean $result : TRUE / FALSE
     */
    function deleterestaurant($id)
    {
		$this->db->where('id', $id);
		$this->db->delete('tbl_restaurants');
        
        return $this->db->affected_rows();
    }

    /**
     * This function used to get restaurant information by id
     * @param number $restaurantId : This is restaurant id
     * @return array $result : This is restaurant information
     */
    function getrestaurantInfoById($userId)
    {
        $this->db->from('tbl_restaurants');
        $this->db->where('uid', $userId);
        $query = $this->db->get();
        
        return $query->row();
    }


/**
     * This function used to get customer information by id
     * @param number $uid : This is customer id
     * @return array $result : This is Customer information
     */
    function getCustomerInfoById($uid)
    {
        $this->db->select('userid, name');
        $this->db->from('tbl_users');
        $this->db->where('id', $uid);
        $query = $this->db->get();
        
        return $query->row();
    }

/**
     * This function is used to get the user roles information
     * @return array $result : This is result of the query
     */
    function getCustomersName()
    {
        $this->db->select('userid, name');
        $this->db->from('tbl_users');
		$this->db->order_by('name', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }
}  