<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Info_model');
        $this->load->model('Mlogin');
    }
    function index()
    {
        $v= $this->session->userdata("validated");
        if ($v!=1) {
            $data['info'] = $this->Info_model->get_by_id($id=1);
            $data['err'] = $this->session->flashdata('flash_msg');
            $data['val'] = (object)@$this->session->flashdata('backval');
            $data['t']="log";
            $this->load->view('admin/auth/login', $data);
        }else{
            redirect(site_url('admin/dashboard'));
        }
    }
    public function process()
    {
        $username = $this->security->xss_clean($this->input->post('username'));
        $password = $this->security->xss_clean(md5($this->input->post('password')));
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
        $post = $this->input->post();
        if($this->form_validation->run() == false){
            $this->session->set_flashdata('flash_msgi', err_msg('Mohon Isi Username Dan Password'));
            $this->session->set_flashdata('backval', $post);
            redirect(site_url('login'));
        }
        else{
            $query = $this->Mlogin->validatelvl($username,$password);
            if(!empty($query)){
                $data = array(
                    'id' => $query->id,
                    'user_id' => $query->username,
                    'first_name' => $query->first_name,
                    'fot' => $query->Foto,
                    'is_blokir' => $query->active,
                    'lvl' => $query->item_name,
                    'validated' => true
                );
                if($query->active == '1'){
                    $this->session->set_userdata($data);
                    if ($query->id==1) {
                        redirect(site_url('admin/dashboard'));
                    }else{
                        redirect(site_url('admin/dashboard'));
                    }
                }
                else{
                    $this->session->set_flashdata('flash_msg', err_msg('Maaf Anda Tidak Di Perbolehkan Masuk, Hubungi Admin Segera'));
                    $this->session->set_flashdata('backval', $post);
                    redirect(site_url('login'));
                }
            }else{
                $this->session->set_flashdata('flash_msg', err_msg('Username Dan Password Salah'));
                $this->session->set_flashdata('backval', $post);
                redirect(site_url('login'));
            }   
        }
    }
    public function regis()
    {
        $data['info'] = $this->Info_model->get_by_id($id=1);
        $data['errs2'] = $this->session->flashdata('flash_msgi');
        $data['vals'] = (object)@$this->session->flashdata('users');
        $data['t']="regis";
        $this->load->view('admin/auth/login', $data);
    }       
    public function daftar() 
    {
        // print_r( $this->input->post());exit();
        $this->form_validation->set_rules('username', 'Username', 'trim|required|alpha_dash|is_unique[users.username]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_emails|is_unique[users.email]');
        $this->form_validation->set_rules('first_name', 'Nama', 'trim|required');
        // $this->form_validation->set_rules('nokartuidentitas', 'No Kartu Identitas', 'trim|required|numeric|is_unique[users.nokartuidentitas]');
        $this->form_validation->set_rules('phone', 'Hp', 'trim|required|numeric|min_length[10]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|matches[passretype]|min_length[6]|max_length[15]');
        $this->form_validation->set_rules('passretype', 'Password 2', 'trim|required|min_length[6]|max_length[15]');
        $post = $this->input->post();
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('flash_msgi', err_msg(validation_errors("<label>", "</label>")));
            $this->session->set_flashdata('users', $post);
            $this->regis();
        } else {
            $user= $this->input->post('username',TRUE);
            $email = $this->input->post('email',TRUE);
            $pas1 = $this->input->post('password',TRUE);
            $pas2 = $this->input->post('passretype',TRUE);
            $date = date("Y-m-d H:i:s");
            $data = array(
                // 'username' => "user".rand(10,1000),
                // 'nokartuidentitas' => $this->input->post('nokartuidentitas',TRUE),
                'username' => $user,
                'password' => md5($pas1),
                'email' => $email,
                'first_name' => $this->input->post('first_name',TRUE),
                'phone' => $this->input->post('phone',TRUE),
                'Foto' => 'default.png',
                'active' => '1',
            );
            $this->Mlogin->inserttabel('users',$data);
            $ida= $this->db->insert_id();

            $data2 = array(
                'id' => $ida,
                'ip_address' => $this->input->ip_address(),
                'created_on' => $date,
            );
            $this->Mlogin->inserttabel('users_detail',$data2);

            $data = array(
                'id_aunt' => '3',
                'item_name' => 'User',
                'user_id' => $ida,
                'created_at' => $date,
            );
            $this->load->model('Auth_assignment_model');
            $this->Auth_assignment_model->insert($data);

            $this->session->set_flashdata('flash_msg', succ_msg('Berhasil melakukan registrasi'));
            redirect(site_url('login'));
        }
    }
    public function next($if="")
    {
        if ($if=="next2") {
            $email = $this->security->xss_clean($this->input->post('email'));
            $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
            if (preg_match($regex, $email)) {
                $query = $this->Mlogin->get_by_email($email);
                if(!empty($query)){
                    echo "true";
                }
            }else{
                echo "true2";
            }
        }elseif ($if=="next3") {
            $username = $this->security->xss_clean($this->input->post('usernamep'));
            if (preg_match('/^[a-z\d_.]{6,20}$/i', $username) ){
                $query = $this->Mlogin->get_by_id($username);
                if(!empty($query)){
                    echo "true";
                }
            }else{
                echo "true2";
            }
        }elseif ($if=="next4") {
            $password = $this->security->xss_clean($this->input->post('password'));
            if (!preg_match('/^[a-z\d]{6,20}$/i', $password)){
                echo "true";
            }
        }
        
    }
    public function emailkonf($ida,$email)
    {
        //enkripsi id
        $encrypted_id = md5($ida);
        if(!empty($encrypted_id)){
            // Konfigurasi email
            $config = [
                   'mailtype'  => 'html',
                   'charset'   => 'utf-8',
                   'protocol'  => 'smtp',
                   'smtp_host' => 'ssl://srv8.niagahoster.com',
                   'smtp_user' => 'admin@jm.rumahrahil.com',    // Ganti dengan email gmail kamu
                   'smtp_pass' => 'p0lt3k0m',      // Password gmail kamu
                   'smtp_port' => 465,
                   'crlf'      => "\r\n",
                   'newline'   => "\r\n"
               ];
    
            // Load library email dan konfigurasinya
            $this->load->library('email', $config);
    
            // Email dan nama pengirim
            $this->email->from('admin@jm.rumahrahil.com', 'Admin Jowo Messenger.com');
    
            // Email penerima
            $this->email->to($email);// Ganti dengan email tujuan kamu
    
            // Lampiran email, isi dengan url/path file
            // $this->email->attach('https://masrud.com/content/images/20181215150137-codeigniter-smtp-gmail.png');
    
            // Subject email
            $this->email->subject("Verifikasi Akun");
    
            // Isi email
            $this->email->message(
                 "terimakasih telah melakuan registrasi, untuk memverifikasi silahkan klik tautan dibawah ini<br><br>".
                  site_url("login/verification/$encrypted_id"));
                      
            if($this->email->send())
            {
               $this->session->set_flashdata('flash_msg', 'Berhasil melakukan registrasi, silahkan cek email kamu');
            }else
            {
                $this->session->set_flashdata('flash_msg', 'Berhasil melakukan registrasi, namu gagal mengirim verifikasi email');
            }
        }
    }
    public function verification($key)
    {
         $this->load->helper('url');
         $this->Mlogin->changeActiveState($key);
         echo "Selamat kamu telah memverifikasi akun kamu";
         echo "<br><br><a href='".site_url("login")."'>Kembali ke Menu Login</a>";
    }
    function forget()
    {
        $data['errf'] = $this->session->flashdata('flash_msgw');
        $data['valf'] = (object)@$this->session->flashdata('backvalw');
        $data['t']="forget";
        $data['captcha'] = $this->recaptcha->getWidget(); // menampilkan recaptcha
        $data['script_captcha'] = $this->recaptcha->getScriptTag();
        $this->load->view('admin/auth/login', $data);
    }        
    function forgeten()
    {
        $username = $this->security->xss_clean($this->input->post('username'));
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $post = $this->input->post();
        $recaptcha = $this->input->post('g-recaptcha-response');
        $response = $this->recaptcha->verifyResponse($recaptcha);
        if ($this->form_validation->run() == FALSE || !isset($response['success']) || $response['success'] <> true) {
            $this->session->set_flashdata('flash_msgw', 'Mohon Isi Username');
            $this->session->set_flashdata('backvalw', $post);
            $this->forget();
        } else {
            $query = $this->Mlogin->get_by_id($username);
            if(!empty($query)){
                $data = array(
                'forgotten_password_time' => date("Y-m-d H:i:s"),
                );
                $this->Mlogin->update($query->id, $data);
                $queail = substr($query->email,0,3)."******@*****".substr($query->email,-4);
                $this->session->set_flashdata('flash_msgw', 'cek email anda '.$queail);
                $this->forget();
            }else{
                $this->session->set_flashdata('flash_msgw', 'Username Salah');
                $this->session->set_flashdata('backvalw', $post);
                $this->forget();
            } 
        }
    }    
    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }
}
