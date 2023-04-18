function exibir_ocultar(val) {  // Define a função "exibir_ocultar" que recebe um parâmetro "val"
    if(val.value == 'qntestoque') {// Verifica se o valor do parâmetro é "qntestoque"
      document.getElementById('cond').style.display = 'inline';// Se o valor for "qntestoque", mostra o elemento com o id "cond"
    }
    else {
      document.getElementById('cond').style.display = 'none';// Se não for "qntestoque", esconde o elemento com o id "cond"

    }
  };