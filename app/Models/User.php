<?php

class User extends Model
{
    protected $table = 'users';
    protected $allowedColums = [
        'name',
        'email',
        'password'
    ];

}