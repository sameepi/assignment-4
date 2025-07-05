<?php
class AuthController extends Controller {
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $userModel = $this->model('User');
    
            $user = $userModel->login($email, $password);
            if ($user) {
                $_SESSION['user_id'] = $user['id'];
                header('Location: /index.php?url=reminders/index');
                exit;
            } else {
                echo "Invalid credentials";
            }
        } else {
            $this->view('auth/login');
        }
    }
    
    public function register(){
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $userModel = $this->model('User');

        $first_name = trim($_POST['first_name']);
        $last_name = trim($_POST['last_name']);
        $email = trim($_POST['email']);
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $user = [
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $email,
            'password' => $password,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $userModel->insert($user);

                $_SESSION['user_email'] = $email;
        header("Location: /index.php?url=auth/login");
        exit;
    }

    $this->view('auth/register');
}

    public function logout() {
        session_destroy();
        header('Location: /index.php?url=auth/login');
    }
}
