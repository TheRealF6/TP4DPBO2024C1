<?php
include_once("conn.php");
include_once("models/Members.class.php");
include_once("models/Rank.class.php");
include_once("models/Status.class.php");
include_once("views/Members.view.php");

class MembersController {
  private $members;
  private $rank;
  private $status;

  function __construct(){
    $this->members = new Members(Conn::$db_host, Conn::$db_user, Conn::$db_pass, Conn::$db_name);
    $this->rank = new Rank(Conn::$db_host, Conn::$db_user, Conn::$db_pass, Conn::$db_name);
    $this->status = new Status(Conn::$db_host, Conn::$db_user, Conn::$db_pass, Conn::$db_name);
  }

  public function index() {
    $this->members->open();
    $this->rank->open();
    $this->status->open();
    $this->members->getMembers();
    $this->rank->getRank();
    $this->status->getStatus();
    
    $data = array(
      'members' => array(),
      'rank' => array(),
      'status' => array()
    );
    while($row = $this->members->getResult()){
      array_push($data['members'], $row);
    }
    while($row = $this->rank->getResult()){
      array_push($data['rank'], $row);
    }
    while($row = $this->status->getResult()){
        array_push($data['status'], $row);
    }
    $this->members->close();
    $this->rank->close();
    $this->status->close();

    $view = new MembersView();
    $view->render($data);
  }

  
  function add($data){
    $this->members->open();
    $this->members->add($data);
    $this->members->close();
    
    header("location:index.php");
  }

  function edit($id){
    $this->members->open();
    $this->members->close();

    header("location:index.php");
  }

  function delete($id){
    $this->members->open();
    $this->members->delete($id);
    $this->members->close();

    header("location:index.php");
  }

}