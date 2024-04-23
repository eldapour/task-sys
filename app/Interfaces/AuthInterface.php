<?php

namespace App\Interfaces;

Interface AuthInterface {

    public function index();

    public function login($request);
    public function loginUser($request);

    public function logout();
    public function logoutUser();
}
