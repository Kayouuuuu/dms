<?php

namespace App\Controllers;
use CodeIgniter\Database\RawSql;
use App\Models\User;

class Home extends BaseController
{
    
    public function index()
    {
        $data = [
            'id'          => new RawSql('DEFAULT'),
            'name'        => 'My Name',
            'email'       => 'mayuri@infospace.com',
            'password'    => 'hehehe',
        ];

        $db      = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->select('name, email, password');
        $query = $builder->get();
        foreach ($query->getResult() as $row) {
            echo $row->name . "<br/>";
            echo $row->email . "<br/>";
            echo $row->password . "<br/>";
        } 
        /*$userModel = new User;
        $users['users'] = $userModel->findAll();
        return view('index', $users);*/
    }
}
