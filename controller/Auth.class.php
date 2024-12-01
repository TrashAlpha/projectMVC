<?php

class Auth extends Controller
{
    public function register()
    {
        $userModel = $this->loadModel('User');

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $username = $_POST['username'];
            $password = $_POST['password'];

            if ($userModel->register($username, $password)) {
                echo "<script>alert('Pendaftaran berhasil!');</script>";
                header("Location: ?c=Auth&m=login");
                exit;
            } else {
                echo "<script>alert('Gagal mendaftar!');</script>";
            }
        }

        $this->loadView('register');
    }

    public function login()
    {
        $userModel = $this->loadModel('User');

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $user = $userModel->login($username, $password);

            if ($user) {
                session_start();
                $_SESSION['username'] = $user['username'];
                header("Location: ?c=Wallpaper&m=list");
                exit;
            } else {
                echo "<script>alert('Username atau password salah!');</script>";
            }
        }

        $this->loadView('login');
    }

    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();

        header("Location: ?c=Auth&m=login");
        exit();
    }
}