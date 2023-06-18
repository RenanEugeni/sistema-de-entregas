<?php
include_once 'dbconfig.php';

Class Crud extends DbConfig
{
    public function _construct()
    {
        parent::__construct();
    }

    public function execute($query)
    {
        $result = $this->connection->query($query);

        if ($result == false) {
            echo $this->connection->error;
            return false;
        } else {
            return $result;
        }
    }

    public function getData($query)
    {
        $result = $this->connection->query($query);

        if ($result == false) {
            return false;
        }

        $rows = array();

        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }
    public function escape($value)
    {
        return $this->connection->real_escape_string($value);
    }

    public function delete($id, $tabela)
    {
   $query = "CALL deleteByid('$id', '$tabela')";
   $result = $this->connection->query($query);

      if ($result == false) {
        echo $this->connection->error;
         return false;
      }else{
       return true;
     }
   }

}
?>