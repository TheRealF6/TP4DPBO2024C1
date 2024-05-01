<?php
include_once("conf.php");
include_once("models/Rank.class.php");
include_once("views/Rank.view.php");

class RankController {
  private $rank;

  function __construct(){
    $this->rank = new Rank(Conn::$db_host, Conn::$db_user, Conn::$db_pass, Conn::$db_name);
  }

  public function index() {
    $this->rank->open();
    $this->rank->getRank();
    $data = array();
    while($row = $this->rank->getResult()){
      array_push($data, $row);
    }

    $this->rank->close();

    $view = new RankView();
    $view->render($data);
  }

  
  function add($data){
    $this->rank->open();
    $this->rank->add($data);
    $this->rank->close();
    
    header("location:rank.php");
  }

  function edit($id){
    $this->rank->open();
    $this->rank->close();
    
    header("location:rank.php");
  }

  function delete($id){
    $this->rank->open();
    $this->rank->delete($id);
    $this->rank->close();
    
    header("location:rank.php");
  }


}