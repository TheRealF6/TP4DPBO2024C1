<?php

class Members extends DB
{
    function getMembers()
    {
        $query = "SELECT * FROM members";
        return $this->execute($query);
    }

    function add($data)
    {
        $name = $data['mname'];
        $email = $data['memail'];
        $phone = $data['mphone'];
        $join_date = $data['mdate'];;
        $rank = $data['cmbrank'];
        $status = $data['cmbstatus'];

        $query = "insert into members values ('', '$name', '$email', '$phone', '$join_date', '$rank', '$status')";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function delete($id)
    {

        $query = "delete FROM members WHERE id_members = '$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }
}

?>