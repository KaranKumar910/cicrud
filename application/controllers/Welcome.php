<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct()
    {
        parent::__construct();
    }

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$post = $this->input->post();
		if($post){
		$this->form_validation->set_rules('fname','First Name','required');
		$this->form_validation->set_rules('lname','Last Name', 'required');
		$this->form_validation->set_rules('email','Email',array('required','valid_email'));
		$this->form_validation->set_rules('password','Password',array('required','min_length[3]','max_length[6]'));
		$this->form_validation->set_rules('confirm_password','Confirm Password',array('required','matches[password]'));

		if($this->form_validation->run() == False){
			$this->load->view('index');
		}
		else{
				$data = array(
					'fname' => $this->input->post('fname'),
					'lname' =>$this->input->post('lname'),
					'email' => $this->input->post('email'),
					'password' =>$this->input->post('password')

				);
			$this->db->insert('data',$data);
			redirect('welcome/listdata');
		}
		
		}
		else
			$this->load->view('index');
	}

	public function listdata(){
		$this->load->view('listdata');
	}

	public function EditData($id) {
  $edit = $this->db->where('id', $id)->get('data');

  if ($edit->num_rows() > 0) {
    $data['key'] = $edit->row();
    $this->load->view('EditData', $data);
  } else {
    echo "No data found";
  }
}

public function UpdateData($id) {
  $post = $this->input->post();

  if ($post) {
    $this->form_validation->set_rules('fname', 'First Name', 'required');
    $this->form_validation->set_rules('lname', 'Last Name', 'required');
    $this->form_validation->set_rules('email', 'Email', array('required', 'valid_email'));
    $this->form_validation->set_rules('password', 'Password', array('required', 'min_length[3]', 'max_length[6]'));
    $this->form_validation->set_rules('confirm_password', 'Confirm Password', array('required', 'matches[password]'));

    if ($this->form_validation->run() == false) {
      $response['success'] = false;
      $response['message'] = validation_errors();
    } else {
      $data = array(
        'fname' => $this->input->post('fname'),
        'lname' => $this->input->post('lname'),
        'email' => $this->input->post('email'),
        'password' => $this->input->post('password')
      );

      $this->db->where('id', $id)->update('data', $data);

      $response['success'] = true;
      $response['message'] = 'Data updated successfully';
    }
    
    echo json_encode($response);
  } else {
    $this->load->view('index');
  }
}


		function DeleteData($id = 0) {
 
				  echo '
				    <script>
				      	var confirmation = confirm(\'Are you sure you want to delete this record?\');
				      	if (confirmation === true) {
				        	window.location.href = \'' . site_url('controller/perform_delete/'.$id) . '\';
				      	} else {
				        	alert(\'Deletion cancelled\');
				      	}
				    </script>';
				  	// redirect(site_url('welcome/index'));
		}


		public function perform_delete($id) {
  			$this->db->where('id',$id)->delete('data');
 			redirect(site_url('welcome/listdata'));
		}
}
	