<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : Restaurant (RestaurantController)
 * restaurant Class to control all user related operations.
 * @author : Rajesh Gupta
 * @version : 1.1
 * @since : 15 November 2019
 */
class Restaurants extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('restaurant_model');
        $this->load->library('upload');
        $this->load->helper(array('form', 'url'));
        $this->isLoggedIn();   
    }
    
    /**
     * This function used to load the first screen of the restaurant
     */
    public function index()
    { 
        $this->global['pageTitle'] = 'Restaurant System : Dashboard';
        
        $this->loadViews("back_end/dashboard", $this->global, NULL , NULL);
    }
    
    /**
     * This function is used to load the restaurants list
     */
    function restaurantListing()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {        
			
			$this->global['searchBody'] = 'Yes';
			
            $data['restaurantRecords'] = $this->restaurant_model->restaurantListing();
            $this->global['pageTitle'] = 'Restaurant System : restaurant Listing';
            $this->loadViews("back_end/restaurants/restaurants", $this->global, $data, NULL);
        }
    }

    /**
     * This function is used to load the add new form
     */
    function addNewVehi()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->model('restaurant_model');
			$data = "";
			$this->global['add_customers'] = $this->restaurant_model->getCustomersName();
			
            $this->global['pageTitle'] = 'Restaurant System : Add New Restaurant';

            $this->loadViews("back_end/restaurants/addRestaurant", $this->global, $data, NULL);
        }
    }

    
    /**
     * This function is used to add new restaurant to the system
     */
    function addNewrestaurant()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {   
		
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('uid','Restaurant Id','trim|required|numeric');
            $this->form_validation->set_rules('business_id','Business Id','trim|required');
			$this->form_validation->set_rules('email','Email','trim|required');
			$this->form_validation->set_rules('name','Name','trim|required');
			$this->form_validation->set_rules('operating_day', 'Operating Day','trim|required');
			$this->form_validation->set_rules('contact_number', 'Contact Number','trim|required');
			$this->form_validation->set_rules('operatinghr_start','Operating Hr Start','trim|required');
			$this->form_validation->set_rules('operatinghr_end','Operating Hr End','trim|required');
			
            if($this->form_validation->run() == FALSE)
            {
                $this->addNewVehi();
            }
            else
            {   
                $uid = $this->security->xss_clean($this->input->post('uid'));
                $business_id = $this->security->xss_clean($this->input->post('business_id'));
                $email = $this->security->xss_clean($this->input->post('email'));
				$address = $this->security->xss_clean($this->input->post('address'));
				$location = $this->security->xss_clean($this->input->post('location'));
				$contact_number = $this->security->xss_clean($this->input->post('contact_number'));
				$name = ucwords(strtolower($this->security->xss_clean($this->input->post('name'))));
				$operating_day = $this->security->xss_clean($this->input->post('operating_day'));
				$operatinghr_start = $this->security->xss_clean($this->input->post('operatinghr_start'));
				$operatinghr_end = $this->security->xss_clean($this->input->post('operatinghr_end'));
				$description = $this->security->xss_clean($this->input->post('description'));
				$intro = $this->security->xss_clean($this->input->post('intro'));
				$waiting_time = $this->security->xss_clean($this->input->post('waiting_time'));
				$isOpenNow = $this->security->xss_clean($this->input->post('isOpenNow'));
                

                if ($isOpenNow == 'on') {
                    $isOpenNow = 1;
                }else{
                    $isOpenNow = 0;
                }
				
                $restaurantInfo = array(
                                    'uid'=> $uid, 
                                    'business_id'=>$business_id,
                                    'email'=>$email, 
                                    'address'=> $address,
                                    'location'=> $location,
                                    'contact_number'=> $contact_number,
                                    'name'=> $name,
                                    'operating_day'=> $operating_day,
                                    'operatinghr_start'=> $operatinghr_start,
                                    'operatinghr_end'=> $operatinghr_end,
                                    'description'=> $description,
                                    'intro'=> $intro, 
                                    'restaurant_photo'=> '', 
                                    'waiting_time'=> $waiting_time, 
                                    'isOpenNow' => $isOpenNow,
                                    'created_at'=>date('Y-m-d H:i:s'));
                
                $this->load->model('restaurant_model');
                $result = $this->restaurant_model->addNewrestaurant($restaurantInfo);
                
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'New restaurant created successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'restaurant creation failed');
                }
                
                redirect('addNewVehi');
            }
        }
    }

    
    /**
     * This function is used load restaurant edit information
     * @param number $restaurantsId : Optional : This is restaurant id
     */
    function modifyrestaurant($restaurantId = NULL)
    {
        
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            if($restaurantId == null)
            {
                redirect('dashboard');
            }
            
            $data['restaurantInfo'] = $this->restaurant_model->getrestaurantInfo($restaurantId);
			
			$this->global['edit_customers'] = $this->restaurant_model->getCustomersName();

            $this->global['pageTitle'] = 'Restaurant System : Edit restaurant';
            
            $this->loadViews("frontend/dashboard", $this->global, $data, NULL);
        }
    }
    
    
	
	  /**
     * This function is used load restaurant view information
     * @param number $restaurantId : Optional : This is restaurant id
     */
    function viewrestaurant($userId)
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            if($userId == null)
            {
                redirect('/dashboard');
            }
            $data = "";
            $this->global['restaurantInfo'] = $this->restaurant_model->getrestaurantInfoById($userId);
            
            
            
            $this->global['pageTitle'] = 'Restaurant System : View restaurant';
            
            $this->loadViews("frontend/viewrestaurant", $this->global, $data, NULL);
        }
    }
    
	
    /**
     * This function is used to edit the restaurant information
     */
    function editrestaurant()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            
            $this->load->library('form_validation');
            
			
			$restaurantId = $this->input->post('restaurantId');
			
            //$this->form_validation->set_rules('cid','Customer Name','required|in_list['.implode(array_keys($data["customers"]),',').']');
            #$this->form_validation->set_rules('business_id','Business Id','trim|required');
			$this->form_validation->set_rules('email','Email','trim|required');
			$this->form_validation->set_rules('name','Name','trim|required');
			$this->form_validation->set_rules('operating_day', 'Operating Day','trim|required');
			$this->form_validation->set_rules('contact_number', 'Contact Number','trim|required');
			$this->form_validation->set_rules('operatinghr_start','Operating Hr Start','trim|required');
			$this->form_validation->set_rules('operatinghr_end','Operating Hr End','trim|required');
			
			$this->load->library('form_validation');
            
            $restaurantId = $this->input->post('restaurantId');

            
            
            if($this->form_validation->run() == FALSE)
            {
                $this->modifyrestaurant($restaurantId);
            }
            else
            {   //pre($_POST);
                
                $email = $this->security->xss_clean($this->input->post('email'));
				$business_id = $this->security->xss_clean($this->input->post('business_id'));
                $address = $this->security->xss_clean($this->input->post('address'));
				$location = $this->security->xss_clean($this->input->post('location'));
				$contact_number = $this->security->xss_clean($this->input->post('contact_number'));
				$name = ucwords(strtolower($this->security->xss_clean($this->input->post('name'))));
				$operating_day = $this->security->xss_clean($this->input->post('operating_day'));
				$operatinghr_start = $this->security->xss_clean($this->input->post('operatinghr_start'));
				$operatinghr_end = $this->security->xss_clean($this->input->post('operatinghr_end'));
				$description = $this->security->xss_clean($this->input->post('description'));
				$intro = $this->security->xss_clean($this->input->post('intro'));
				$waiting_time = $this->security->xss_clean($this->input->post('waiting_time'));
				$restaurant_photo_existed = $this->security->xss_clean($this->input->post('restaurant_photo_existed'));
				$coordinates = $this->security->xss_clean($this->input->post('coordinates'));
                $isOpenNow = $this->security->xss_clean($this->input->post('isOpenNow'));
                $restaurantInfo = array();
               
                if ($isOpenNow == 'on') {
                    $isOpenNow = 1;
                }else{
                    $isOpenNow = 0;
                }
                
                $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 1000000;
                $config['max_width']            = 10204;
                $config['max_height']           = 7680;
                $config['encrypt_name']         = true;
                
                $this->upload->initialize($config);
                $file_name = '';
                
                if (isset($_FILES['restaurant_photo']) and !empty($_FILES['restaurant_photo']['name']))
                {
                    if ($this->upload->do_upload('restaurant_photo')) {
                        $file_name = $this->upload->data()['file_name'];
                       
                    }else{
                        $file_name = $restaurant_photo_existed;
                    }
                }else{
                    $file_name = $restaurant_photo_existed;
                }

                $result = $this->restaurant_model->getrestaurantInfo($restaurantId);

                if ($result) {

                     $restaurantInfo = array(
                    'email'=>$email, 
                    'address'=> $address,
                    'location'=> $location,
                    'coordinates'=> $coordinates,
                    'contact_number'=> $contact_number,
                    'name'=> $name,
                    'operating_day'=> $operating_day,
                    'operatinghr_start'=> $operatinghr_start,
                    'operatinghr_end'=> $operatinghr_end,
                    'description'=> $description,
                    'intro'=> $intro, 
                    'restaurant_photo'=> $file_name, 
                    'waiting_time'=> $waiting_time, 
                    'isOpenNow' => $isOpenNow,
                    'updated_at'=>date('Y-m-d H:i:s'));
                     if ($business_id) {
                        $restaurantInfo['business_id'] = $business_id;
                     }

                    $result = $this->restaurant_model->editrestaurant($restaurantInfo, $restaurantId);

                }else{


                    $restaurantInfo = array(
                        'uid' => $restaurantId,
                        'business_id' => $business_id,
                    'email'=>$email, 
                    'address'=> $address,
                    'location'=> $location,
                    'coordinates'=> $coordinates,
                    'contact_number'=> $contact_number,
                    'name'=> $name,
                    'operating_day'=> $operating_day,
                    'operatinghr_start'=> $operatinghr_start,
                    'operatinghr_end'=> $operatinghr_end,
                    'description'=> $description,
                    'intro'=> $intro, 
                    'restaurant_photo'=> $file_name, 
                    'waiting_time'=> $waiting_time, 
                    'updated_at'=>date('Y-m-d H:i:s'));

                    $result = $this->restaurant_model->addNewrestaurant($restaurantInfo);

                }
                
               
			
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'restaurant updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'restaurant updation failed');
                }
                
                redirect('/dashboard');
                die;
            }
        }
    }


    /**
     * This function is used to delete the restaurant using restaurantId
     * @return boolean $result : TRUE / FALSE
     */
    function deleterestaurant()
    {
        if($this->isAdmin() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {
            $id = $this->input->post('id');
            
            $result = $this->restaurant_model->deleterestaurant($id);
            if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
            else { echo(json_encode(array('status'=>FALSE))); }
        }
    }
    
}

?>