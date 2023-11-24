<?php

class LoginController extends Controller
{
    public function index()
    {
        $data['errors'] = [];
        $user = new User();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $row = $user->first([
                'email' => $_POST['email']
            ]);
            // show($row);die;
            if ($row) {
                if ($row['password'] === sha1($_POST['password'])) {
                    //authenticate user
                    Auth::authenticate($row);
                    redirect('home');
                }
            }

            $data['errors']['email'] = 'the credentials do not match';
        }
        $this->view('login',$data);
    }
}
