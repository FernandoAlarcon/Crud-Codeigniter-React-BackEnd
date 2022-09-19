<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cantantes extends CI_Controller {

	 
	public function index()
	{
		$this->load->view('cantantes');
	}
}
