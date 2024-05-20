function showConfirmation(nome, foto, id, event) {
    var response = confirm("Deseja remover o item '" + nome + "'?");
    if (response) {
        // Requisição via POST com os elementos das variáveis nome, foto para o remover.php
        const object = new XMLHttpRequest();
        object.open('POST', '../remover.php');
        object.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        object.send('nome='+nome+'&foto='+foto+'&id='+id);
        setTimeout(function(){
            location.reload();
        }, 200);
    }
    else{
        event.preventDefault();
    }
}