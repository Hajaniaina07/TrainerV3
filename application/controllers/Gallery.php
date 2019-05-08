<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Gallery extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Gallery_model');
    } 

    /*
     * Listing of gallery
     */
    function index()
    {
        $data['gallery'] = $this->Gallery_model->get_all_gallery();
        
        $data['_view'] = 'gallery/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new gallery
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'IDIMAGE' => $this->input->post('IDIMAGE'),
				'DESCRIPTION' => $this->input->post('DESCRIPTION'),
            );
            
            $gallery_id = $this->Gallery_model->add_gallery($params);
            redirect('gallery/index');
        }
        else
        {            
            $data['_view'] = 'gallery/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a gallery
     */
    function edit($ID)
    {   
        // check if the gallery exists before trying to edit it
        $data['gallery'] = $this->Gallery_model->get_gallery($ID);
        
        if(isset($data['gallery']['ID']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'IDIMAGE' => $this->input->post('IDIMAGE'),
					'DESCRIPTION' => $this->input->post('DESCRIPTION'),
                );

                $this->Gallery_model->update_gallery($ID,$params);            
                redirect('gallery/index');
            }
            else
            {
                $data['_view'] = 'gallery/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The gallery you are trying to edit does not exist.');
    } 

    /*
     * Deleting gallery
     */
    function remove($ID)
    {
        $gallery = $this->Gallery_model->get_gallery($ID);

        // check if the gallery exists before trying to delete it
        if(isset($gallery['ID']))
        {
            $this->Gallery_model->delete_gallery($ID);
            redirect('gallery/index');
        }
        else
            show_error('The gallery you are trying to delete does not exist.');
    }
    
}