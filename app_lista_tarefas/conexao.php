<?php
    class Conection{
        private $host = 'localhost';
        private $dbname = 'task_list_database';
        private $user = 'root';
        private $pass = '';
    

        public function conect(){
            try{
                $conection = new PDO(
                    "mysql:host=$this->host;dbname=$this->dbname",
                    "$this->user",
                    "$this->pass"
                );

                return $conection;
                


            } catch (PDOException $e) {
                echo '<p>' .$e->getMessage().'</p>';
            }
        }

    }
?>