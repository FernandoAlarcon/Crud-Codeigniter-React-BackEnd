<?php
defined('BASEPATH') OR exit('No direct script access allowed');

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
		
class Cantantes extends CI_Controller {

 
	public function __construct() {
		//load database in autoload libraries 
		
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
		header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
		$method = $_SERVER['REQUEST_METHOD'];
		if($method == "OPTIONS") {
			die();
		}
		
		parent::__construct(); 
		$this->load->helper('form'); //loading form helper
		$this->load->model('CantantesModel');         

	} 

   	
	public function index()
	{ 	
		$cantantes = $this->CantantesModel->get_Cantantes();
		$arr = [
			'resultado' => true,
			'data'      => $cantantes
		];

		header('Content-Type: application/json');
		echo json_encode( $arr );
	}

   
    public function store()
	{
 
		header('Content-Type: application/json');
 
		 
		  $nombre_artistico  = $this->input->post("nombre_artistico");
		  $nombre            = $this->input->post("nombre");
		  $apellido          = $this->input->post("apellido"); 
		  $genero_musical    = $this->input->post("genero_musical");

		$data = array(
			"nombre_artistico"  => $nombre_artistico,
			"nombre"     		=> $nombre,
			"apellido"   		=> $apellido,
			"genero_musical"	=> $genero_musical,
			"fecha_nacimiento"  => '20021200124',
		); 
		  		 
		$Cantantes = $this->CantantesModel->insert_Cantante($data);
			  
			if($Cantantes){
				$resultado = true;
			}else{
				$resultado = false;
			}

			$arr = [
				'resultado' => $resultado
			];
  
		echo json_encode( $arr );

		
	} 
 
   	public function update($id)
	{	 
		 
		$nombre_artistico  = $this->input->post("nombre_artistico");
		$nombre            = $this->input->post("nombre");
		$apellido          = $this->input->post("apellido"); 
		$genero_musical    = $this->input->post("genero_musical");

		 
			$data = array(
				"nombre_artistico"=>$nombre_artistico,
				"nombre"=>$nombre,
				"apellido"=>$apellido,
				"genero_musical"=>$genero_musical,
				"fecha_nacimiento"  => '20021200124'
			); 
 
			$Cantantes = $this->CantantesModel->update_cantante($data,$id);
   

			if($Cantantes){
				$resultado = true;
			}else{
				$resultado = false;
			}
			
			return [
				'resultado' => $resultado
			];
		 

		
	} 

	public function delete($id){

		$Cantantes = $this->CantantesModel->delete($id); 

		if($Cantantes){
			$resultado = true;
		}else{
			$resultado = false;
		}
		
		return [
			'resultado' => $resultado
		];
	}
} 
