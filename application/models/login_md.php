<?php

/**
 * login_md
 */
class login_md extends CI_Model
{
	
	public function login(){
		$email=$this->input->post('email');
		$password=$this->input->post('password');
		$this->db->where('email',$email);
		$this->db->where('password',$password);
		$result=$this->db->get('user_registation');
		if($result->num_rows()>0){
			$row=$result->row();
			$id=$row->id;
			$type=$row->type;
			$name=$row->name;
			$email=$row->email;
	        $storearray=array('id'=>$id, 'type'=>$type, 'name'=>$name, 'email'=>$email);
	          $this->session->set_userdata('loggedIn', true);
			$this->session->set_userdata($storearray);
			return $storearray;
		}else{
			return false;
		}
		}
	}


?>