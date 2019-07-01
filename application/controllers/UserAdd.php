
<?php /**
 * 
 */
class UserAdd extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('userModel');
        $this->load->helper(array('form', 'url'));
        $this->load->library(array('session', 'form_validation'));
    }

	public function index()
	{
		$this->getuser(); 
	}
	
	public function addUser(){
		$this->form_validation->set_rules('firstname','firstname','required');
		$this->form_validation->set_rules('lastname','lastname','required');
		$this->form_validation->set_rules('email','email','required');
		 if ($this->form_validation->run() == FALSE)
                {
                        // $this->load->view('index');
                	//$this->load->view('login');
                	redirect('UserAdd');	
                }
                else
                {
                	$this->load->model('UserModel');
                	$result=$this->UserModel->adduser();
                	if($result>0){

                		$this->session->set_flashdata('error','User add');
                		  //$this->load->view('index');
                		redirect('UserAdd/getuser');

                	}else{
                		$this->session->set_flashdata('error','User not add');
                		 redirect('UserAdd/getuser');
                	}

                        
                }
	}

	public function getuser(){
		$this->load->model('UserModel');
		$result['data']=$this->UserModel->getuserdata();
		$this->load->view('index',$result);
	} 
	public function userdelete(){
		$id=$this->uri->segment(3);
		$this->load->model('UserModel');
		$result['data']=$this->UserModel->deleteuserdata($id);
		$this->load->view('index',$result);
		 redirect('UserAdd/getuser');
	}
	
	public function getuseredit(){
		$this->load->model('UserModel');
		$result=$this->UserModel->getuserforedit();
		echo json_encode($result);
		 } 

	public function useredit(){
		$this->form_validation->set_rules('firstname','firstname','required');
		$this->form_validation->set_rules('lastname','lastname','required');
		$this->form_validation->set_rules('email','email','required');
		 if ($this->form_validation->run() == FALSE)
                {
                        // $this->load->view('index');
                	//$this->load->view('login');
                	redirect('UserAdd');	
                }else{
         $this->load->model('UserModel');
    	$result=$this->UserModel->useredit();
    	echo json_encode($result);
    	//$this->load->view('index',$result);
    	 //redirect('UserAdd/getuser');
    	}
	 }
} 
?>