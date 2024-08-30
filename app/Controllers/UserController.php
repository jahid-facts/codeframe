<?php
namespace App\Controllers;

use App\Models\User;

class UserController{
    // view
    public function index() {
        $users = User::getAllUsers();
        view('profile', ['users' => $users]);
    }

    // show user's profile by ID
    public function show($id) {
        $user = User::getUserById($id);
        view('users.show', ['user' => $user]);
    }

    // edit user's profile by ID
    public function edit($id) {
        $user = User::getUserById($id);
        view('users.edit', ['user' => $user]);
    }

    // update user's profile by ID
    public function update($id) {
        $user = User::getUserById($id);
        view('users.update', ['user' => $user]);
    }

    // delete user's profile by ID
    public function delete($id) {
        $user = User::getUserById($id);
        view('users.delete', ['user' => $user]);
    }
}