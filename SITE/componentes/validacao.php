<?php
  $erros=array();
  if (count($_POST) > 0) {
    if(!filter_input(INPUT_POST, "nome")){
      $erros['nome']= 'Nome Obrigatorio';
    }
    if(!filter_input(INPUT_POST, "sobrenome")){
      $erros['sobrenome']= 'Sobrenome Obrigatorio';
    }

    if($_POST['cpf']){
      $situacaoCpf = validarCPF($_POST['cpf']);
    }
    if(!filter_input(INPUT_POST, "cpf")){
      $erros['cpf']= 'CPF Obrigatorio';
    }elseif($situacaoCpf==0){
      $erros['cpf']= 'CPF Inválido';
    }
    if(!filter_input(INPUT_POST, "nasc")){
      $data = DateTime::createFromFormat('d/m/y', $_POST['nasc']);
      if(!$data){
        $erros['nasc']= 'Data de Nascimento Obrigatorio';
      }
    
    }
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
      $erros['email']= 'Email Obrigatorio';

    }
    $situacaoSenha = senhaValida($_POST['senha']);
    if(!filter_input(INPUT_POST, "senha")){
      $erros['senha']= 'Senha Obrigatorio';
    }elseif($situacaoSenha==0){
      $erros['senha']= 'Não é uma senha Válida';
    }
  }

  function senhaValida($senha) {
    //Expressões regulares em PHP
    return preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])[\w$@]{8,}$/', $senha);
  }

  function validarCPF($cpf){

    //removendo os pontos do cpf
    $cpf = str_replace(".","",$cpf);
    //removendo o traço do cpf
    $cpf = str_replace("-","",$cpf);

    // echo($cpf);

    //criando um vetor
    $vetorCpf = array();

    //separando os dígitos do cpf um em cada posição do vetor
    
    //length = tamanho/elementos
    // 11122233396
    for($i = 0; $i < ( strlen($cpf) ); $i++){ 
        //substring = pega um pedaço da string
        $vetorCpf[$i] = substr($cpf,$i,1); 
        //substr(variavel, início, qtde)
        //substr("amor", 2, 2) = or
        //substr("amor", 0, 1) = a
        // echo("<br>vetor[".$i."] = ".$vetorCpf[$i]);
    }

    //cálculo do 1º dígito do CPF
    $contador = 10;
    $soma1 = 0;

    for($i = 0; $i < 9; $i++){
        $soma1 = $soma1 + ($vetorCpf[$i] * $contador);
        $contador--;
    }

    $resto1 = ($soma1 % 11);

    if ($resto1 < 2){
        $digito1 = 0;
    }
    else{
        $digito1 = 11 - $resto1;
    }
    
    // echo("<br>".$digito1);

    // //cáldulo do 2º digito do CPF
    $contador = 11;
    $soma2 = 0;
    for($i = 0; $i < 9; $i++){
        $soma2 = $soma2 + ($vetorCpf[$i] * $contador);
        $contador--;
    }
    $soma2 = $soma2 + ($digito1 * $contador);
    
    $resto2 = ($soma2 % 11);
    
    if ($resto2 < 2)
        $digito2 = 0;
    else
        $digito2 = 11 - $resto2;
    
    //verificando se os dígitos informados são iguais aos calculados
    if(($digito1 == $vetorCpf[9]) && ($digito2 == $vetorCpf[10]))
        return 1;
    else
    return 0;
  }


?>