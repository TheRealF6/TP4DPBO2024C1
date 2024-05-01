<?php

include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Rank.controller.php");

$rank = new RankController();

if (isset($_POST['add'])) {
    //memanggil add
    $rank->add($_POST);
}
//mengecek apakah ada id_hapus, jika ada maka memanggil fungsi delete
else if (!empty($_GET['id_hapus'])) {
    //memanggil add
    $id = $_GET['id_hapus'];
    $rank->delete($id);
}
else if (!empty($_GET['id_edit'])) {
    //memanggil add
    $id = $_GET['id_edit'];
    $rank->edit($id);
}
else{
    $rank->index();
}

