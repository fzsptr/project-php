<?php
class User {
    public $userId;
    public $username;
    public $password;
    public $role;
    function __construct($userId, $username, $password, $role) {
        $this->userId = $userId;
        $this->username = $username;
        $this->password = $password;
        $this->role = $role;
    }
}    
?>