<?php 
//CRUD
    class TaskService{

        private $conection;
        private $task;

        public function __construct(Conection $conection, Task $task){
            $this->conection = $conection->conect(); //->conect para pegar o valor do método conect, ou seja, o link de conexão com o banco de dados, e não os valores da classe em si (sem o ->conect())
            $this->task = $task;
        }

        public function insert(){ //create
            $query = 'insert into tb_tarefas(tarefa)values(:taskP)';
            $stmt = $this->conection->prepare($query);
            $stmt->bindValue(':taskP', $this->task->__get('task')); 
            $stmt->execute();
        }

        public function recovering(){ //read
            $query = 'SELECT t.id, s.status, t.tarefa 
                    FROM tb_tarefas AS t
                    LEFT JOIN tb_status AS s ON(t.id_status = s.id)
                    
                    ';
            $stmt = $this->conection->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ); //receberá um array de objetos na chamada de recovering()
            //quando a função for chamada, retorna um array de obj
        }

        public function update(){ //update

            $query = ' UPDATE tb_tarefas set tarefa = ? WHERE id = ?';
            $stmt = $this->conection->prepare($query);
            $stmt->bindValue(1, $this->task->__get('task')); 
            $stmt->bindValue(2, $this->task->__get('id')); 
            return $stmt->execute(); //'return' para updates. exectute com sucesso retorna 1, varios executes retorna 'N'

            
        }

        public function remove(){ //delete
            $query = ' DELETE from tb_tarefas WHERE id = ?';
            $stmt = $this->conection->prepare($query);
            $stmt->bindValue(1, $this->task->__get('id')); 
            return $stmt->execute();
        }
    }

?>


<!-- 

linha 16: 
            $stmt->bindValue(':tastP', $this->task->__get('task')); 

            vá até a instancia de task, do construct, e faça um __get
            para pegar o valor que o usuário colocou no campo ("get o valor" e ponha em task),
            então, com a posse do valor escrito no campo, coloque em ':taskP', que será o parâmetro
            do SQL.

            OBS: sobre a $task: 1- O $_POST agarra pelo name o valor do campo.
            2- o valor desse campo foi setado na variável $task(na mode), que é a instancia da classTask.
            essa variável/class tem o método __get, pois ele pode setar em si o valor de $_POST ou pegar o valor de $_POST.
            Mas como o valor de $_POST[task] já está dentro de $task, o __get vai ser em $task e não em $_POST[task]
            isso é o que estamos fazendo. 
 -->