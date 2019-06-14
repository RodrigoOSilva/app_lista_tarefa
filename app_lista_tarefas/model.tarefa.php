<?php

    class Task{ //análogo às colunas no db
        private $id;
        private $id_status;
        private $task;
        private $register_date; //data_registro

        public function __get($attr){
            return $this->$attr;
        }

        public function __set($attr, $value){
            $this->$attr = $value;
        }

    }

?>