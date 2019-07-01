<?php
/**
 * 
 */
class UserModel extends CI_Model
{
	
	public function adduser(){
		$firstname=$this->input->post('firstname');
		$lastname=$this->input->post('lastname');
		$email=$this->input->post('email');
		         $useradd=array(
                               'firstname'=>$firstname,
                               'lastname'=>$lastname,
                               'email'=>$email
                                );

		if ($this->db->insert('useradd',$useradd)) {
                return true;
		 	
		 }else
		 { 
		 	return false;
		 }
	}
	public function getuserdata(){
		   $this->db->select('*');
            $this->db->from('useradd'); 
		  $query = $this->db->get();
		return $query->result_array();
	}
	public function deleteuserdata($id){
          //$id=$this->uri->segment(3);
		 //$id = $this->input->get('id');
		 $this->db->where('id',$id);
         return $this->db->delete('useradd');
	}
	public function getuserforedit(){
		    $id = $this->input->get('id');
             $this->db->where('id',$id); 
             $query= $this->db->get('useradd');
            if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
}

public function useredit(){
	$id=$this->input->post('id');
   $field=array(
		'firstname'=>$this->input->post('firstname'),
		'lastname'=>$this->input->post('lastname'),
		'email'=>$this->input->post('email'),
        );
		// $this->db->set('firstname',$firstname);
		// $this->db->set('lastname',$lastname);
		// $this->db->set('email',$email);
		$this->db->where('id',$id);
        $this->db->update('useradd',$field);
        if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
}
}

// $id = $this->input->post('txtId');
// 		$field = array(
// 		'employee_name'=>$this->input->post('txtEmployeeName'),
// 		'address'=>$this->input->post('txtAddress'),
// 		'updated_at'=>date('Y-m-d H:i:s')
// 		);
// 		$this->db->where('id', $id);
// 		$this->db->update('tbl_employees', $field);
// 		if($this->db->affected_rows() > 0){
// 			return true;
// 		}else{
// 			return false;
// 		}
 ?>