<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Titrepage extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Titrepage_model');
    } 

    /*
     * Listing of titrepage
     */
    function index()
    {
        $data['titrepage'] = $this->Titrepage_model->get_all_titrepage();
        
        $data['_view'] = 'titrepage/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new titrepage
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'PAGE' => $this->input->post('PAGE'),
				'TITRE' => $this->input->post('TITRE'),
            );
            
            $titrepage_id = $this->Titrepage_model->add_titrepage($params);
            redirect('titrepage/index');
        }
        else
        {            
            $data['_view'] = 'titrepage/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a titrepage
     */
    function edit($ID)
    {   
        // check if the titrepage exists before trying to edit it
        $data['titrepage'] = $this->Titrepage_model->get_titrepage($ID);
        
        if(isset($data['titrepage']['ID']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'PAGE' => $this->input->post('PAGE'),
					'TITRE' => $this->input->post('TITRE'),
                );

                $this->Titrepage_model->update_titrepage($ID,$params);            
                redirect('titrepage/index');
            }
            else
            {
                $data['_view'] = 'titrepage/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The titrepage you are trying to edit does not exist.');
    } 

    /*
     * Deleting titrepage
     */
    function remove($ID)
    {
        $titrepage = $this->Titrepage_model->get_titrepage($ID);

        // check if the titrepage exists before trying to delete it
        if(isset($titrepage['ID']))
        {
            $this->Titrepage_model->delete_titrepage($ID);
            redirect('titrepage/index');
        }
        else
            show_error('The titrepage you are trying to delete does not exist.');
    }
    
}