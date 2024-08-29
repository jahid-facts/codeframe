<?php

namespace App\Models;

use App\Config\Database;

class User extends Database
{

    protected $table = 'users';

    public function __construct()
    {
        parent::__construct($this->table);
    }

    public static function getAllUsers()
    {
        $db = new self();
        return $db->getAll();
    }

    public static function getUserById(int $id)
    {
        $db = new self();
        return $db->getById($id);
    }
}
