<?php
    class Mysql extends Conexion
    {
        private $conexion;
        private $strQuery;
        private $arrValues;

        function __construct()
        {
            $this->conexion = new Conexion();
        }
        // Inserts registry
        public function insert(string $query, array $values)
        {
            $this->strQuery = $query;
            $this->arrValues = $values;
            $insert = $this->connect()->prepare($this->strQuery);
            $resInsert = $insert->execute($this->arrValues);
            if($resInsert)
            {
                $lastInsert = $this->connect()->lastInsertId();
            } else
            {
                $lastInsert = 0;
            }
            return $lastInsert;
        }

        // Searches registry
        public function select(string $query)
        {
            $this->strQuery = $query;
            $result= $this->connect()->prepare($this->strQuery);
            $result->execute();
            $data = $result->fetch(PDO::FETCH_ASSOC);
            return $data;
        }

        // Searches for a registry
        public function selectAll(string $query)
        {
            $this->strQuery = $query;
            $result= $this->connect()->prepare($this->strQuery);
            $result->execute();
            $data = $result->fetchAll();
            return $data;
        }

        // Searches all registries
        public function update(string $query, array $values)
        {
            $this->strQuery = $query;
            $this->arrValues = $values;
            $update= $this->connect()->prepare($this->strQuery);
            $resUpdate = $update->execute($this->arrValues);
            return $resUpdate;
        }

        // Deletes a registry
        public function delete(string $query)
        {
            $this->strQuery = $query;
            $result= $this->connect()->prepare($this->strQuery);
            $delResult = $result->execute();
            return $delResult;
        }


    }// End of class Mysql
?>