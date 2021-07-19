
function editar(id, txt_tarefa){
    // criar um form de edição
    let form = document.createElement('form')
    form.action = 'tarefa_controller.php?acao=atualizar'
    form.method = 'post'
    form.className = 'row'

    // criar um input para entrada do texto
    let inputTarefa = document.createElement('input')
    inputTarefa.type = 'text'
    inputTarefa.name = 'tarefa'
    inputTarefa.className = 'col-9 form-control'
    inputTarefa.value = txt_tarefa;

    // criar um input hidden para guardar o id da tarefa
    let inputId = document.createElement('input')
    inputId.type = 'hidden'
    inputId.name = 'id'
    inputId.value = id

    // criar um button para envio do form
    let button = document.createElement('button')
    button.type = 'submit'
    button.className = 'btn btn-info ml-2'
    button.innerHTML = 'Atualizar'

    form.appendChild(inputTarefa) // incluir inputTarefa no form
    form.appendChild(inputId) // incluir inputId no form
    form.appendChild(button) // incluir button ono form
    //console.log(form) // teste
    // alert(id)
    let tarefa = document.getElementById('tarefa_'+id)
    tarefa.innerHTML = '' // limpar o texto da tarefa para inclusão do form
    tarefa.insertBefore(form, tarefa[0]) // incluir form na página
    //alert(txt_tarefa)
}
function remover(id){
    // alert('excluindo: ' + id)
    location.href = 'todas_tarefas.php?acao=remover&id='+id;
}
function marcarRealizada(id){
    //alert('Mudando status: ' +id)
    location.href = 'todas_tarefas.php?acao=marcarRealizada&id='+id;
}