<?php

include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Status.controller.php");

$status = new StatusController();

if (isset($_POST['add'])) {
    //memanggil add
    $status->add($_POST);
}
//mengecek apakah ada id_hapus, jika ada maka memanggil fungsi delete
else if (!empty($_GET['id_hapus'])) {
    //memanggil add
    $id = $_GET['id_hapus'];
    $status->delete($id);
}
else if (!empty($_GET['id_edit'])) {
    //memanggil add
    $id = $_GET['id_edit'];
    $status->edit($id);
}
else{
    $status->index();
}

