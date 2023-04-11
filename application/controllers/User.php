    <?php
    class User extends CI_controller{

        public function __construct(){
            parent::__construct();
            $this->load->model('Home_model','model');
        }

        function index() {
            $this->load->model('User_model');

            $users = $this->User_model->all();
            $data = array();
            $data['users'] = $users;
            $this->load->view('list',$data);
        }

        function create() {

            $this->load->model('User_model');
            $this->form_validation->set_rules('name','Name','required');
            $this->form_validation->set_rules('email','Email','required|valid_email');

            if ($this->form_validation->run() == false) {
                $this->load->view('create');
            } else {

                $formArray = array();
                $formArray['name'] = $this->input->post('name');
                $formArray['email'] = $this->input->post('email');
                $formArray['created_at'] = date('Y-m-d');
                $this->User_model->create($formArray);
                $this->session->set_flashdata('success','Record added successfully!');
                redirect(base_url().'index.php/user/index');

            }

        }
        function edit($userId)
        {
            $this->load->model('User_model');
            $user = $this->User_model->getUser($userId);  
            $data = array();
            $data['user'] = $user;
            $this->form_validation->set_rules('name','Name','required');
            $this->form_validation->set_rules('email','Email','required|valid_email');

            if($this->form_validation->run() == false ) {
                $this->load->view('edit',$data);
            } else {

                $formArray = array();
                $formArray['name'] = $this->input->post('name');
                $formArray['email'] = $this->input->post('email');
                $this->User_model->updateUser($userId,$formArray);
                $this->session->set_flashdata('success','Record update successfully');
                redirect(base_url().'index.php/user/index');
            }

            
        }
        function delete($userId)
        {
            $this->load->model('User_model');
            $user = $this->User_model->getUser($userId);
            if(empty($user)) {
                $this->session->set_flashdata('failure','Record not found in database');
                redirect(base_url().'index.php/user/index');
            }
            $this->User_model->deleteUser($userId);
            $this->session->set_flashdata('success','Record delete successfully');
            redirect(base_url().'index.php/user/index');
        }

        function employee() {

            
            // $this->load->view('employee');
            $this->load->model('Emp_model');
            $this->form_validation->set_rules('emp_name','Employee Name','required');
            $this->form_validation->set_rules('emp_salary','Employee Salary','required');
            $this->form_validation->set_rules('mobile','Mobile','required');
            
            if ($this->form_validation->run() == false) {
                $this->load->view('employee');
            } else {

                $formArray = array();
                $formArray['emp_name'] = $this->input->post('emp_name');
                $formArray['emp_salary'] = $this->input->post('emp_salary');
                $formArray['mobile'] = $this->input->post('mobile');
                $this->Emp_model->employee($formArray);
                $this->session->set_flashdata('success','Record added successfully!');
                redirect(base_url().'index.php/user/sample');

        }
    }

        function sample() {
            $this->load->model('Emp_model');
            $emp = $this->Emp_model->all();
            $data = array();
            $data['emp'] = $emp;
            $this->load->view('finish',$data);
        }

        function finish() {
            $this->load->view('finish');
        }

        function dynamic_form() {
            $data = array();
            $this->load->view('dynamic_form');
        }

        function save ()
        {
            $form = array();


            for ($i = 1; $i < $_POST['total_count']; $i++) {
            
                if (isset($_POST['vName_' . $i]) && !empty($_POST['vName_' . $i])) {
                    // echo $i;
                    $form[$i]['vName'] = $_POST['vName_' . $i];
                    $form[$i]['vEmail'] = $_POST['vEmail_' . $i];
                    $form[$i]['vCity'] = $_POST['vCity_' . $i];
                } else {
                    $_POST['total_count']++;
                    continue;
                }
            }


            $form = array_values($form);

        

            $result = $this->db->insert_batch('form', $form);

            if($result)
            {
                redirect('user/dynamic_form');
            }
        
        }
        

        function new() {
            $this->load->view('new');
        }
        function addData() 
        {
            $config=[
                'upload_path'=>'./upload/',
                'allowed_types'=>'jpg|jpeg|png'
            ];
            $this->load->library('upload',$config);
            $this->form_validation->set_rules('name','Name','trim|required');
            if($this->form_validation->run()&& $this->upload->do_upload('image')){
                $name=$this->input->post('name');
                $img=$this->upload->data();
                $image=$img['file_name'];
           
                $data=array(
                    'name'=>$name,
                    'image'=>$image,
                    // 'created_at' => date('Y-m-d')
                );
                if($this->model->addData($data));

                echo "Success,Record added successfully!";

            } else {
                    $this->load->view('new');
        
            
                }
    }
}
    ?>   