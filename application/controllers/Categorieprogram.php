<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Categorieprogram extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Categorieprogram_model');
    } 

    /*
     * Listing of categorieprogram
     */
    function index()
    {
        $data['categorieprogram'] = $this->Categorieprogram_model->get_all_categorieprogram();
        
        $data['_view'] = 'categorieprogram/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new categorieprogram
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'STATUT' => $this->input->post('STATUT'),
				'REPETITION' => $this->input->post('REPETITION'),
				'MIN' => $this->input->post('MIN'),
				'MAX' => $this->input->post('MAX'),
				'PAUSE' => $this->input->post('PAUSE'),
            );
            
            $categorieprogram_id = $this->Categorieprogram_model->add_categorieprogram($params);
            redirect('categorieprogram/index');
        }
        else
        {            
            $data['_view'] = 'categorieprogram/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a categorieprogram
     */
    function edit($IDCATEGORIE)
    {   
        // check if the categorieprogram exists before trying to edit it
        $data['categorieprogram'] = $this->Categorieprogram_model->get_categorieprogram($IDCATEGORIE);
        
        if(isset($data['categorieprogram']['IDCATEGORIE']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'STATUT' => $this->input->post('STATUT'),
					'REPETITION' => $this->input->post('REPETITION'),
					'MIN' => $this->input->post('MIN'),
					'MAX' => $this->input->post('MAX'),
					'PAUSE' => $this->input->post('PAUSE'),
                );

                $this->Categorieprogram_model->update_categorieprogram($IDCATEGORIE,$params);            
                redirect('categorieprogram/index');
            }
            else
            {
                $data['_view'] = 'categorieprogram/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The categorieprogram you are trying to edit does not exist.');
    } 

    /*
     * Deleting categorieprogram
     */
    function remove($IDCATEGORIE)
    {
        $categorieprogram = $this->Categorieprogram_model->get_categorieprogram($IDCATEGORIE);

        // check if the categorieprogram exists before trying to delete it
        if(isset($categorieprogram['IDCATEGORIE']))
        {
            $this->Categorieprogram_model->delete_categorieprogram($IDCATEGORIE);
            redirect('categorieprogram/index');
        }
        else
            show_error('The categorieprogram you are trying to delete does not exist.');
    }
    
}
