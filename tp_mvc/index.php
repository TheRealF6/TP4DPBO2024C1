<?php

include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Members.controller.php");

$buku = new MembersController();

if (isset($_POST['add'])) {
    //memanggil add
    $buku->add($_POST);
}
else if (!empty($_GET['id_hapus'])) {
    //memanggil add
    $id = $_GET['id_hapus'];
    $buku->delete($id);
}
else if (!empty($_GET['id_edit'])) {
    //memanggil add
    $id = $_GET['id_edit'];
    $buku->edit($id);
}
else{
    $buku->index();
}
