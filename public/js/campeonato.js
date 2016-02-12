function valida_nome() {
    var nome = document.getElementById("nome").value;

    if(nome.length > 3) {
        document.getElementById("div_nome").className = "form-group has-success has-feedback";
        document.getElementById("ok-nome").style.display = "block";
        document.getElementById("erro-nome").style.display = "none";
    } else {
        document.getElementById("div_nome").className = "form-group";
        document.getElementById("ok-nome").style.display = "none";
        document.getElementById("erro-nome").style.display = "none";
    }

    /*if(nome.length <= 3) {
        document.getElementById("div_nome").className = "form-group has-error has-feedback";
        document.getElementById("ok-nome").style.display = "none";
        document.getElementById("erro-nome").style.display = "block";
    }*/
}

function valida_ano() {
    var ano = document.getElementById("ano").value;

    if(ano.length == 4) {
        document.getElementById("div_ano").className = "form-group has-success has-feedback";
        document.getElementById("ok-ano").style.display = "block";
        document.getElementById("erro-ano").style.display = "none";
    } else {
        document.getElementById("div_ano").className = "form-group";
        document.getElementById("ok-ano").style.display = "none";
        document.getElementById("erro-ano").style.display = "none";
    }
}