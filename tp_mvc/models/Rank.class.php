<?php

class Rank extends DB
{
    function getRank()
    {
        $query = "SELECT * FROM rank";
        return $this->execute($query);
    }

    function add($data)
    {
        $name = $data['rname'];

        $query = "insert into rank values ('', '$name')";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function delete($id)
    {

        $query = "delete FROM rank WHERE rank_id = '$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }
}
