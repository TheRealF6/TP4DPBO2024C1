<?php

class Status extends DB
{
    function getStatus()
    {
        $query = "SELECT * FROM status";
        return $this->execute($query);
    }

    function add($data)
    {
        $name = $data['sname'];

        $query = "insert into status values ('', '$name')";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function delete($id)
    {

        $query = "delete FROM status WHERE status_id = '$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }
}
