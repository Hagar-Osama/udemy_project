<?php

class User extends Model
{
    protected $table = 'users';
    // public $errors = [];
    protected $allowedColumns = [
        'name',
        'email',
        'password',
        'role',
        'date'
    ];

    public function validate($data)
    {
        $this->errors = [];
        if (empty($data['name'])) {
            $this->errors['name'] = 'Name is required';
        }
        if (empty($data['email'])) {
            $this->errors['email'] = 'Email is required';
        } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $this->errors['email'] = 'Please enter a valid email address';
        }elseif($this->read(['email' =>$data['email']])) {
            $this->errors['email'] = 'this email already exists';

        }
        if (empty($data['password'])) {
            $this->errors['password'] = 'Password is required';
        } elseif (empty($data['confirm_password'])) {
            $this->errors['confirm_password'] = 'Please confirm your password';
        } elseif ($data['password'] !== $data['confirm_password']) {
            $this->errors['confirm_password'] = 'Password does not match';
        }
        if (empty($data['terms'])) {
            $this->errors['terms'] = 'You must agree before submitting';
        }
        if (empty($this->errors)) {
            return true;
        }
        return false;
    }
}
