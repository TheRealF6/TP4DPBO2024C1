<?php
include_once("conf.php");
include_once("models/Status.class.php");
include_once("views/Status.view.php");

class StatusController {
  private $status;

  function __construct(){
    $this->status = new Status(Conn::$db_host, Conn::$db_user, Conn::$db_pass, Conn::$db_name);
  }

  public function index() {
    $this->status->open();
    $this->status->getStatus();
    $data = array();
    while($row = $this->status->getResult()){
      array_push($data, $row);
    }

    $this->status->close();

    $view = new StatusView();
    $view->render($data);
  }

  
  function add($data){
    $this->status->open();
    $this->status->add($data);
    $this->status->close();
    
    header("location:status.php");
  }

  function edit($id){
    $this->status->open();
    $this->status->close();
    
    header("location:status.php");
  }

  function delete($id){
    $this->status->open();
    $this->status->delete($id);
    $this->status->close();
    
    header("location:status.php");
  }


}