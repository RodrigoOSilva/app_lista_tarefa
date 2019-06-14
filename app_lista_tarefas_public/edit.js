function edit(id, txt_task){
    //criar um form
    let form = document.createElement('form')
    form.action = 'task_controller.php?action=update'
    form.method = 'post'
    form.className = 'row'


    // criar um input para entrada do texto
    let inputTask = document.createElement('input') //atualizar tarefa
    inputTask.type = 'text'
    inputTask.name = 'inputTask'
    inputTask.className = 'col-7 form-control mr-1'
    inputTask.value = txt_task




    // criar um botão de envio do formulário
    let button = document.createElement('button')
    button.type = 'submit'
    button.className = 'col-2 btn btn-info btn-sm'
    button.innerHTML = 'atualizar'


    //Input Hidden que armazena o ID da tarefa clicada
    let inputHiddenID = document.createElement('input')
    inputHiddenID.type = "hidden"
    inputHiddenID.name = 'id'
    inputHiddenID.value = id //passado por parâmetro

    // árvore
    form.appendChild(inputTask)
    form.appendChild(inputHiddenID)
    form.appendChild(button)

    // selecionar a div tarefa que foi clicada
    let task = document.getElementById('task_'+id) //task_ é o radical da div no html, e ID é o final, que é passado por parametro no evendo do click edit(iddeparametro)
            //limpar o campo html para inclusão do form
            task.innerHTML = ''
            // inclusão do form na página
            task.insertBefore(form, task[0]) 
            //insertBefore insere uma árvore de elementos em uma outra arvore HTML já renderizada
            //dois parametros: (oQueVaiSerInserido, ondeVaiInserir[qualNóFilhoDoElemento])


    console.log(form)

    //alert(txt_task)
}