<?php
namespace App\Http\Controllers;

class UsersController extends Controller
{
    public function create($username, $password, $email)
    {
        if (empty($username) && empty($password) && empty($email)) {
            return json_encode(['error' => 'Username must not be empty.']);
        } else {
            //Insert DB
            return response()->json([
                'username' => (string)$username,
                'password' => $password,
                'email' => $email
            ]);    
        }        
    }
    
    public function read($id = null)
    {
        if (is_numeric($id)) {
            //Show user from users
            return 'Hey ID!';
        } else {
            return response()->json([
                'users' => [
                'id' => (int)1234567,
                'fname' => 'John',
                'lname' => 'Doe',
                'status' => [
                    'player_stat' => (bool)false,
                    'w3d_stat' => (bool)false,
                    'social_stat' => (bool)false,
                    '2d3d_stat' => (bool)false,
                    'vr_app' => (bool)false
                ]
                ]            
            ]);
        }        
    }
    
    public function update($id)
    {
        if (is_numeric($id)) {
            return 'Update';
        }        
    }
    
    public function junk($id)
    {
        if (is_numeric($id)) {
            return 'Junk';
        }
    }
}