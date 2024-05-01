<?php
  class RankView{
    public function render($data){
      $no = 1;
      $dataRank = null;
      foreach($data as $val){
        list($id, $name) = $val;
          $dataRank .= "<tr>
                  <td>" . $no++ . "</td>
                  <td>" . $name . "</td>
                  <td>
                  <a href='rank.php?id_hapus=" . $id . "' class='btn btn-danger''>Hapus</a>
                  </td>
                  </tr>";
      }

      $tpl = new Template("templates/rank.html");
      $tpl->replace("DATA_TABEL", $dataRank);
      $tpl->write();
    }
  }