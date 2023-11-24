<?php

class SignupController extends Controller
{
    public function index()
    {
        $data['errors'] = [];
        $user = new User();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($user->validate($_POST)) {
                $password = sha1($_POST['password']);
                $_POST['date'] = date('Y-m-d H:i:s');
                $_POST['password'] = $password;
                $user->insert($_POST);
                message('Your Profile has been created successfully, please login now');
                redirect('login');
            }
        }
        $data['errors'] = $user->errors;
        $this->view('signup', $data);
    }

    // public function store()
    //{
    // $data['errors'] = [];
    // $user = new User();
    // if($user->validate($_POST)){
    //     $password = sha1($_POST['password']);
    //     $_POST['date'] = date('Y-m-d H:i:s');
    //     $_POST['password'] = $password;
    // }
    // $data['errors'] = $user->errors;
    // $user->insert($_POST);
    // $this->redirect('home');
    // }
}
