
<?php
/**
 * Login
 */
class Login extends CI_Controller
{
	
    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_md');
        $this->load->helper(array('form', 'url'));
        $this->load->library(array('session', 'form_validation'));
    }

	public function index()
	{
		 if($this->session->userdata('loggedIn') == true){
		 	redirect('UserAdd');        
        }else{
        	$this->user_Login();
        }
	}
	public function user_Login(){
	 $this->form_validation->set_rules('email', 'email', 'required');
	 $this->form_validation->set_rules('password', 'password', 'required');
	 if ($this->form_validation->run()==FALSE) {
	 	
	 	$this->load->view('login');	 	
	 }else{
	 	$this->load->model('login_md');
	 	$result=$this->login_md->login();
	 	if($result>0){
	 	 redirect('UserAdd');
         //$this->load->view('index');	
	 	}else{
	 		$this->session->set_flashdata('error','Invalid login. User not found');
			  $this->load->view('login');		
	 	}



	 }
	}

     public function logout(){
     	$this->session->unset_userdata('loggedIn');
     	$this->session->sess_destroy();
          redirect('Login','refresh'); 
     }
}

?>