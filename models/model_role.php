<?php
require_once 'nodes/node_role.php';
class modelRole {
    private $roles = [];
    private $nextId = 1;
    
    public function __construct() {
        if (isset($_SESSION['roles'])) {
            $this->roles = unserialize($_SESSION['roles']);
            $this->nextId = count($this->roles) + 1;
        } else {
            $this->initializeDefaultRole();
        }
    }
    public function initializeDefaultRole() {
        $this->addRole("Admin", "Administrator", 1);
        $this->addRole("User", "Customer/Member", 1);
        $this->addRole("Kasir", "Pembayaran", 0);
    }
    public function addRole($roleName, $roleDescription, $roleStatus) {
        $peran = new \Role($this->nextId++, $roleName, $roleDescription, $roleStatus);
        $this->roles[] = $peran;
        $this->saveToSession();
    }
    private function saveToSession() {
        $_SESSION['roles'] = serialize($this->roles);
    }
    public function getAllRoles() {
        return $this->roles;
    }
    public function getRoleById($roleId) {
        foreach($this->roles as $role) {
            if ($role->roleId == $roleId) {
                return $role;
            }
        }
        return null;
    }
    public function updateRole($roleId, $roleName, $roleDescription, $roleStatus) {
        foreach($this->roles as $role) {
            if ($role->roleId == $roleId) {
                $role->roleName = $roleName;
                $role->roleDescription = $roleDescription;
                $role->roleStatus = $roleStatus;
                $this->saveToSession();
                return true;
            }
        }
        return false;
    }
    public function deleteRole($roleId) {
        foreach($this->roles as $key => $role) {
            if ($role->roleId == $roleId) {
                unset($this->roles[$key]);
                $this->roles = array_values($this->roles);

                $this->saveToSession();
                return true;
            }
        }
        return false;
    }
    public function getRoleByName($roleName) {
        foreach($this->roles as $role) {
            if ($role->roleName == $roleName) {
                return $role;
            }
        }
    }
}
?>