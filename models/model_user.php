<?php
    require_once 'nodes/node_user.php';
    require_once 'nodes/node_role.php';

class modelUser{
    private $users = [];
    private $nextId = 1;

    public function __construct() {
        if (isset($_SESSION['users'])) {
            $this->users = unserialize($_SESSION['users']);
            $this->nextId = count($this->users) + 1;
        } else {
            $this->initializeDefaultUser();
        }
    }
    public function addUser($uname, $pass, $role) {
        $user = new \User($this->nextId++, $uname, $pass, $role);
        $this->users[] = $user;
        $this->saveToSession();
    }
    private function saveToSession() {
        $_SESSION['users'] = serialize($this->users);
    }
    public function getAllUsers(){
        return $this->users;
    }
    public function initializeDefaultUser() {
        $objRole1 = new \Role(1, "Admin", "Administrator", 1);
        $objRole2 = new \Role(2, "Kasir", "Pembayaran", 1);
        $objRole3 = new \Role(3, "User", "Customer", 0);
        $this->addUser("fauzi@gmail.com", "123", $objRole1);
        $this->addUser("zay@gmail.com", "123", $objRole2);
        $this->addUser("ujik@gmail.com", "123", $objRole3);
    }
    public function getUserById($userId) {
        foreach($this->users as $user) {
            if ($user->userId == $userId) {
                return $user;
            }
        }
        return null;
    }
    public function deleteUser($user){
        if ($user != null){
            $key = array_search($user, $this->users);
            unset($this->users[$key]);
            $this->users = array_values($this->users);
            $this->saveToSession() ;
            return true;
        }
        return false;
    }
    public function updateUser($userId, $username, $password, $role){
        $userlokal = $this->getUserById( $userId );
        if ( $userlokal != null ){
            $userlokal->username = $username;
            $userlokal->password = $password;
            $userlokal->role = $role;
            $this->saveToSession() ;
            return true;
        }
        return false;
    }

}
// session_start();
// session_destroy();
//testing input dan output
// $objUserModel = new modelUser(); //create object
// $users = $objUserModel->getAllUsers();
// // print_r($users);
// foreach ($users as $user){
//     echo "Username : ".$user->username."<br>";
//     echo "Password : ".$user->password."<br>";
//     echo "Role Name : ".$user->role->roleName."<br>"; 
// }
// echo "----------------------"."<br>";
// echo "testing search by id". "<br>";
// $userlokal = $objUserModel->getUserById(2);
// print_r($userlokal);
// echo "----------------------"."<br>";
// echo "testing delete by id". "<br>";
// $userlokal = $objUserModel->getUserById(1);
// $objUserModel->deleteUser($userlokal);
// foreach ($users as $user){
//     echo "Username : ".$user->username."<br>";
//     echo "Password : ".$user->password."<br>";
//     echo "Role Name : ".$user->role->roleName."<br>";
// }
// echo "----------------------"."<br>";
// echo "testing update by id". "<br>";
// $userlokal = $objUserModel->getUserById(1);
// $objRole1 = new \Role(1, "Admin", "Administrator", 1);
// $objUserModel->updateUser(2, "ujik@gmail.com", 1234, $objRole1);
// foreach ($users as $user){
//     echo "Username : ".$user->username."<br>";
//     echo "Password : ".$user->password."<br>";
//     echo "Role Name : ".$user->role->roleName."<br>";
// }
?>