<?php
class Role {
    public $roleId;
    public $roleName;
    public $roleDescription;
    public $roleStatus;
    function __construct($roleId, $roleName, $roleDescription, $roleStatus) {
        $this->roleId = $roleId;
        $this->roleName = $roleName;
        $this->roleDescription = $roleDescription;
        $this->roleStatus = $roleStatus;
    }
}
?>