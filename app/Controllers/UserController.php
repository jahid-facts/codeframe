<?php
namespace App\Controllers;

use App\Models\User;

class UserController{
    public function index() {
        $users = User::getAllUsers();
        view('profile', ['users' => $users]);
    }

    public function show($id) {
        $user = User::getUserById($id);
        view('users.show', ['user' => $user]);
    }
}