<?php
  class MembersView {
    public function render($data){
      $no = 1;
      $dataMembers = null;
      $dataRank = null;
      $dataStatus = null;
      foreach($data['members'] as $val){
        list($id, $name, $email, $phone, $join_date, $rank_id, $status_id) = $val;
        $dataMembers .= "<tr>
                <td>" . $no++ . "</td>
                <td>" . $name . "</td>
                <td>" . $email . "</td>
                <td>" . $phone . "</td>
                <td>" . $join_date . "</td>
                <td>" . $rank_id . "</td>
                <td>" . $status_id . "</td>";

        $dataMembers .= "
        <td>
          <a href='index1.php?id_edit=" . $id .  "' class='btn btn-warning' '>EDIT</a>
          <a href='index1.php?id_hapus=" . $id . "' class='btn btn-danger' '>DELETE</a>
        </td>";
        

        $dataMembers .= "</tr>";
      }

      foreach($data['rank'] as $val){
        list($id, $name) = $val;
        $dataRank .= "<option value='".$id."'>".$name."</option>";
      }

      foreach($data['status'] as $val){
        list($id, $name) = $val;
        $dataStatus .= "<option value='".$id."'>".$name."</option>";
      }

      $tpl = new Template("templates/index.html");

      $tpl->replace("OPTION_RANK", $dataRank);
      $tpl->replace("OPTION_STATUS", $dataStatus);
      $tpl->replace("DATA_TABEL", $dataMembers);
      $tpl->write(); 
    }
  }
?>