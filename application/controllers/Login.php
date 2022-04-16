<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller{
  function __construct() {
    parent::__construct();
    $this->load->model('Loginmodel');
  }
  public function index(){
    $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');
    if ($this->form_validation->run() == FALSE) {
      $this->load->view('Login/login');
    }
    else{
      $data = array(
      'user_name' => $this->input->post('username'),
      'password' => $this->input->post('password')
    );
    $result = $this->Loginmodel->checkUserLogin($data);
    if($result){
      $this->load->model('Dashboard_model');
      $_SESSION["notifications"]=$this->Dashboard_model->get_notifications();
      redirect('Dashboard');
      /* $type = $this->session->userdata['user_type'];
      if($type=='A')
      {
      redirect('Dashboard');
    }
    else if($type=='hr')
    {
    redirect('Hr');
  }
  else if($type=='inventory')
  {
  redirect('Inventory');
}
else if($type=='cag')
{
redirect('Cag');
}*/
}
else{
  $error['message'] = "The user name or password is invalid";
  $this->load->view('Login/login',$error);
}
}
}
public function logout(){
  $this->session->sess_destroy();
  redirect('/login/');
}
}
?>
