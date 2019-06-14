<?php
    require "../../app_lista_tarefas/model.tarefa.php";
    require "../../app_lista_tarefas/service.tarefa.php";
    require "../../app_lista_tarefas/conexao.php";

    $action = isset($_GET['action']) ? $_GET['action'] : $action;

    if($action == 'input') { //seta valor no banco
    $task = new Task();
    $task->__set('task', $_POST['task']); 

    $conection = new Conection();

    $taskService = new TaskService($conection, $task); //conection = pdo task = valor digitado no campo pelo usuario (Valor Ddigitado pelo Usuario (VDU))
    $taskService->insert(); //método insert() da class taskService em service.tarefa.php

    header('Location: nova_tarefa.php?inclusao=1');

    } else if ($action == 'recover') {

        $task = new Task();
        $conection = new Conection();
        $taskService = new TaskService($conection, $task);
        $tasks = $taskService->recovering(); //tasks = array de objetos retornado pela função em service.tarefa.php

    } else if ($action == 'update'){ //seta a atualização da tarefa no banco de dados

        $task = new Task(); //seta os valores do form de edição de tarefa no objeto $task
        $task->__set('id', $_POST['id']);
        $task->__set('task', $_POST['inputTask']);

        $conection = new Conection();

        $taskService = new TaskService($conection, $task); 
        if($taskService->update()) {
            header ('Location: todas_tarefas.php'); 
        }
        
    } else if ($action == 'remove'){
        $task = new Task();
        $task->__set('id', $_GET['id']); //get porque action é recuperada pelo metodo get e por que está sendo passao parametro em remode.js de método get

        $conection = new Conection();

        $taskService = new TaskService($conection, $task); 
        $taskService->remove();
            header ('Location: todas_tarefas.php');
    }
?>



<!-- tarefas
    
linha 16: insert() vai ser executado na controller
 -->