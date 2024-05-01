<?php
  class StatusView{
    public function render($data){
      $no = 1;
      $dataStatus = null;
      foreach($data as $val){
        list($id, $name) = $val;
          $dataStatus .= "<tr>
                  <td>" . $no++ . "</td>
                  <td>" . $name . "</td>
                  <td>
                  <a href='status.php?id_hapus=" . $id . "' class='btn btn-danger''>Hapus</a>
                  </td>
                  </tr>";
      }

      $tpl = new Template("templates/status.html");
      $tpl->replace("DATA_TABEL", $dataStatus);
      $tpl->write();
    }
  }