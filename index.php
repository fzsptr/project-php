<?php
session_start();
// session_destroy();

require_once "models/model_role.php";
require_once "models/model_barang.php";
require_once "models/model_user.php";

//create object role
$objRole = new modelRole();
$objBarang = new modelBarang();
$objUser = new modelUser();

if (isset($_GET['modul'])) {
  $model = $_GET['modul'];
} else {
  $model = "dashboard";
}

switch($model) {
  case "dashboard":
    include 'views/kosong.php';
    break;
  case "role":
    $fitur = isset($_GET['fitur']) ? $_GET['fitur'] : null;
    $id = isset($_GET['id']) ? $_GET['id'] : null;
    switch($fitur) {
      case 'add':
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          $name = $_POST['role_name'];
          $desc = $_POST['role_description'];
          $status = $_POST['role_status'];
          $objRole->addRole($name, $desc, $status);
          header('location: index.php?modul=role');
        } else {
          include 'views/role_input.php';
        }
        break;
      case 'delete':
        $objRole->deleteRole($id);
        header('location: index.php?modul=role');
        break;
      case 'update':
        $role = $objRole->getRoleById($id);
        include 'views/role_edit.php';
        break;
      case 'edit':
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          $name = $_POST['role_name'];
          $desc = $_POST['role_description'];
          $status = $_POST['role_status'];
          $objRole->updateRole($id,$name, $desc, $status);
          header('location: index.php?modul=role');
        } else {
          include 'views/role_list.php';
        }
        break;
      default:
        $roles = $objRole->getAllRoles();
        include 'views/role_list.php';
        break; 
    }
    break;

  case "user":
    $fitur = isset($_GET['fitur']) ? $_GET['fitur'] : null;
    $id = isset($_GET['id']) ? $_GET['id'] : null;
  
    switch ($fitur){
      case 'add':
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
          $uname = $_POST['username'];
          $pass = $_POST['password'];
          $roleName = $_POST['roleName'];
          $role = $objRole->getRoleByName($roleName);
          $objUser->addUser($uname, $pass, $role);
          header ('location: index.php?modul=user');
        }else{
          $roles = $objRole->getAllRoles();
          include 'views/user_input.php';
        }
      case 'delete':
        $objDel = $objUser->getUserById($id);
        $objUser->deleteUser($objDel);
        header('location: index.php?modul=user');
        break;
      case 'update':
        $roles = $objRole->getAllRoles();
        $user = $objUser->getUserById($id);
        include 'views/user_edit.php';
        break;
      case 'edit':
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
          $username = $_POST ['user_name'];
          $password = $_POST ['password'];
          $roleName = $_POST ['role_name'];
          $role = $objRole->getRoleByName($roleName);
          $objUser->updateUser($id, $username, $password, $role);
          header('locatuon: index.php?modul=user');
        }
        else{
          $roles = $objRole->getAllRoles();
          $users = $objUser->getUserById($id);
          include 'views/user_list.php';
        }
      default:
        $users = $objUser->getAllUsers();
        include 'views/user_list.php';
        break;
    }
    break;

  case "barang":
    $fitur = isset($_GET['fitur']) ? $_GET['fitur'] : null;
    $id = isset($_GET['id']) ? $_GET['id'] : null;

    switch($fitur){

      case 'add':
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          $nameBarang = $_POST['nameBarang'];
          $hargaBarang = $_POST['hargaBarang'];
          $jumlahBarang = $_POST['jumlahBarang'];
          $objBarang->addBarang($nameBarang, $hargaBarang, $jumlahBarang);
          header('location: index.php?modul=barang');
        } else {
          include 'views/barang_input.php';
        }
        break;
      case 'delete':
        $objBarang->deleteBarang( $id );
        header('location: index.php?modul=barang');
        break;
      case 'update':
        $barang = $objBarang->getBarangById($id);
        include 'views/barang_edit.php';
        break;
      case 'edit':
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          $nameBarang = $_POST['nameBarang'];
          $hargaBarang = $_POST['hargaBarang'];
          $jumlahBarang = $_POST['jumlahBarang'];
          $objBarang->updateBarang($id,$nameBarang, $hargaBarang, $jumlahBarang);
          header('location: index.php?modul=barang');
          } else {
          include 'views/barang_list.php';
          }
          break;
      default:
        $barangs = $objBarang->getAllBarangs();
        include 'views/barang_list.php';
        break;
    }
    break;
  }
?>