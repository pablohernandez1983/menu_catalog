function menu(id) {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4){
            document.getElementById('menu_description').innerHTML = xhr.responseText;
        }
    };
    xhr.open('GET', '/description?id=' + id);
    xhr.send();
}

function validateForm() {
    const name = document.getElementById("name");
    const description = document.getElementById("description");
    if (name.value == "") {
        alert("Por favor, ingrese el nombre.");
        name.focus();
  
        return false;
    }

    if (description.value == "") {
        alert("Por favor, ingrese la descripción.");
        description.focus();
  
        return false;
    }

  }

  function remove(id){
    let text = "¿Desea eliminar el Menu ?";
    var params = 'id='+id;
    if(confirm(text) == true) {
        var xhr = new XMLHttpRequest();
        
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4){
                window.location.href = "/?message_delete=true"; 
            }
        };
        xhr.open('POST', '/delete', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.send(params);
    } 
  }