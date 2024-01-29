<?php
//for user login and logout

class Auth extends Controller
{
    private $db;
    public function __construct()
    {
        $this->model('UserModel');
        $this->db = new Database();
    }

    public function formRegister()
    {
        if (
            $_SERVER['REQUEST_METHOD'] == 'POST' &&
            isset($_POST['email_check']) &&
            $_POST['email_check'] == 1
        ) {
            $email = $_POST['email'];
            // call columnFilter Method from Database.php
            $isUserExist = $this->db->columnFilter('users', 'email', $email);
            if ($isUserExist) {
                echo 'Sorry! email has already taken. Please try another.';
            }
        }
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Check user exist
            $email = $_POST['email'];
            // call columnFilter Method from Database.php
            $isUserExist = $this->db->columnFilter('users', 'email', $email);
            if ($isUserExist) {
                setMessage('error', 'This email is already registered !');
                redirect('pages/register');
            } else {
                // Validate entries
                $validation = new UserValidator($_POST);
                $data = $validation->validateForm();
                if (count($data) > 0) {
                    $this->view('pages/register', $data);
                } else {
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $password = $_POST['password'];

                    $profile_image = 'default_profile.jpg';
                    $token = bin2hex(random_bytes(50));

                    //Hash Password before saving
                    $password = base64_encode($password);

                    $user = new UserModel();
                    $user->setName($name);
                    $user->setEmail($email);
                    $user->setPassword($password);
                    $user->setToken($token);
                    $user->setProfileImage($profile_image);
                    $user->setIsLogin(0);
                    $user->setIsActive(0);
                    $user->setIsConfirmed(0);
                    $user->setDate(date('Y-m-d H:i:s'));

                    $userCreated = $this->db->create('users', $user->toArray());
                    //$userCreated="true";

                    if ($userCreated) {
                        //Instatiate mail
                        $mail = new Mail();

                        $verify_token = URLROOT . '/auth/verify/' . $token;
                        $mail->verifyMail($email, $name, $verify_token);

                        setMessage('success', 'Please check your Mail box !');
                        redirect('pages/login');
                    }
                    redirect('pages/register');
                } // end of validation check
            } // end of user-exist
        }
    }

    public function verify($token)
    {
        $user = $this->db->columnFilter('users', 'token', $token);

        if ($user) {
            $success = $this->db->setLogin($user[0]['id']);

            if ($success) {
                setMessage(
                    'success',
                    'Successfully Verified . Please log in !'
                );
            } else {
                setMessage('error', 'Fail to Verify . Please try again!');
            }
        } else {
            setMessage('error', 'Incrorrect Token . Please try again!');
        }

        redirect('');
    }

    public function login()
    {
       
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['email']) && isset($_POST['password'])) {
                $email = $_POST['email'];
                $password = base64_encode($_POST['password']);

                $isLogin = $this->db->loginCheck($email, $password);

                if ($isLogin) {
                    setMessage('id', base64_encode($isLogin['id']));
                    $id = $isLogin['id'];
                    $setLogin = $this->db->setLogin($id);
                    redirect('pages/dashboard');
                } else {
                    setMessage('error', 'Login Fail!');
                    redirect('pages/login');
                }

            }
        }
    }

    function logout($id)
    {
        // session_start();
        // $this->db->unsetLogin(base64_decode($_SESSION['id']));

        //$this->db->unsetLogin($this->auth->getAuthId());
        $this->db->unsetLogin($id);
        redirect('pages/login');
    }
}
