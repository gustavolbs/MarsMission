
function myFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("tab_users");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}


$(document).ready( function () {
  $('#tab_users').DataTable();
} );

function mudarId(id,nome,usuario,senha,nacao,patente,status,nivel,login,imagem) {
  document.getElementById("idModal").value = id;
  document.getElementById('usuario').value = usuario;
  document.getElementById('senha').value = senha;
  document.getElementById('nome').value = nome;
  document.getElementById('nacao').value = nacao;
  document.getElementById('patente').value = patente;
  document.getElementById('status').value = status;
  document.getElementById('nivel').value = nivel;
  document.getElementById('login').value = login;
  document.getElementById('imagem').value = imagem;
  document.getElementById("tituloUser").innerHTML = id + " - " + nome + " - " + usuario;
}
