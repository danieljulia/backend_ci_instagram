<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fotos extends CI_Controller {


	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function test($num=0)
	{
			//manera de passar els paràmetres a la vista
			$data=array(
				'num'=>$num,
				);
		$this->load->view('fotos',$data);
		
	}

	//correspon a la url fotos/usuari/username
	public function usuari($username="")
	{
		$photos=array();
		if ($this->input->get('username')==true) {
			$username=$this->input->get('username');
			redirect("fotos/usuari/".$username);
			exit();
		}

		if($username==""){
			
		}else{
			$this->load->model('instagram_model');
			$user_id=$this->instagram_model->get_user_id($username);
			$photos=$this->instagram_model->get_photos($user_id,8);
		}
		$this->load->view('fotos_user', array('username'=>$username,'fotos'=>$photos) ) ;

	}




	//correspon a la url fotos/tag/nom_tag
	public function tag($tag="")
	{

		$photos=array();
		if ($this->input->get('tag')==true) {
			$tag=$this->input->get('tag');
			redirect("fotos/tag/".$tag);
			exit();
		}

		if($tag==""){
			
		}else{
			$this->load->model('instagram_model');
			
			$photos=$this->instagram_model->get_photos_by_tag($tag,8);
		}


		
		$this->load->view('fotos_tag', array('tag'=>$tag,'fotos'=>$photos) ) ;

	}

}
