
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>  
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alex+Brush&display=swap" rel="stylesheet">
    <script type="text/javascript" src="http://code.jquery.com/jquery-3.0.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous" defer></script>

    <script type="text/javascript" src="./../../js/jquery.mask.min.js"></script>
    <script type="text/javascript" src="./../../js/personalizar.js"></script>
    
    <style>
        
        .container {
            background-position: center center;
            min-height: 100vh;
            padding-top: 50px; 
        }
    </style>
</head>
<body style = "background-color:#aec492">
    
        <div class="d-flex justify-content-center">
            <form class="row justify-content-center" action="cadastroProcess.php" method="post" style="font-family:tahoma;" class="needs-validation">
                <div class="row box col-md-8 shadow-lg m-5 p-4" style="background-color: #e0e0e0; border-radius: 10px; border-top: 15px solid #848e3d;">
                    <h2>Cadastro</h2>
                    <div class="col-md-6 mb-3">
                        <input type="hidden" name="codCliente" id="codCliente" placeholder="id" >
                        <label for="Inputemail" class="form-label">E-mail:</label>
                        <input type="email" name="emailCliente" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="email@exemplo.com" required>
                    </div>
                    <div class=" col-md-6 mb-3">
                        <label for="Inputemail" class="form-label">Confirme seu e-mail:</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="InputPassword" class="form-label">Senha:</label>
                        <input type="password" name="senhaEmailCliente" class="form-control" id="password" required>
                        <div id="passwordHelpBlock" class="form-text">
                            Sua senha deve ter de 8-20 caracteres.
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" onclick="myFunction()">
                            <label class="form-check-label" for="gridCheck">
                                Mostrar senha
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="InputPassword" class="form-label">Confirme sua senha:</label>
                        <input type="password" name="senhaEmailCliente" class="form-control" id="password2" required>
                    </div>    
                    <script>
                        function myFunction() {
                        var x = document.getElementById("password");
                        var y = document.getElementById("password2")
                        if (x.type === "password") {
                            x.type = "text";
                            y.type = "text";
                        } else {
                            x.type = "password";
                            y.type = "password";
                        }
                        }
                    </script>
                </div>  
            
                <div class="row box col-md-4 shadow-lg m-2 p-4" style="background-color: #e0e0e0; border-radius: 10px; border-top: 15px solid #848e3d;">
                    <h2>Dados Pessoais</h2>
                    <div class="mb-3">
                        <label for="Inputnome" class="form-label">Nome completo:</label>
                        <input type="text" name="nomeCliente" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="Inputtelefone" class="form-label">Telefone:</label>
                        <input class="form-control" type="tel" maxlength="15" name="telCliente" data-mask="(00) 00000-0000" placeholder="(11) 12345-6789">
                        
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="Inputdata" class="form-label">Data de nascimento:</label>
                        <input type="date" name="dataNascimentoCliente" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="Inputcpf" class="form-label">CPF:</label>
                        <input type="text" name="cpfCliente" class="form-control" data-mask="000.000.000-00" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="Inputsexo" class="form-label">Sexo</label>
                        <select class="form-select" name="sexoCliente" aria-label="Default select example">
                            <option selected>selecione</option>
                            <option value="Feminino">Feminino</option>
                            <option value="Masculino">Masculino</option>
                            <option value="Outro">Outro</option>
                        </select>
                    </div>
                       
                </div>  
                <div class="row box col-md-4 shadow-lg m-2 p-4" style="background-color: #e0e0e0; border-radius: 10px; border-top: 15px solid #848e3d;">
                    <h2>Endereço</h2>
                    <div class="col-md-5 mb-3">
                        <label for="Inputcep" class="form-label">CEP:</label>
                        <input type="text" name="cepCliente" class="form-control" data-mask="00000-000" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="Inputendereco" class="form-label">Endereço:</label>
                        <input type="text" name="logradouroCliente" class="form-control" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="Inputnumero" class="form-label">Número:</label>
                        <input type="text" name="numLogCliente" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="Inputbairro" class="form-label">bairro:</label>
                        <input type="text" name="bairroCliente" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="Inputcidade" class="form-label">Cidade:</label>
                        <input type="text" name="cidadeCliente" class="form-control" required>
                    </div>
                    <div class="col-md-5">
                        <label for="Inputuf" class="form-label">Estado</label>
                        <select class="form-select" name="ufCliente" id="validationCustom04" required>
                            <option selected>selecione</option>
                            <option value="AC">AC</option>
                            <option value="AL">AL</option>
                            <option value="AP">AP</option>
                            <option value="AM">AM</option>
                            <option value="BA">BA</option>
                            <option value="CE">CE</option>
                            <option value="ES">ES</option>
                            <option value="GO">GO</option>
                            <option value="MA">MA</option>
                            <option value="MT">MT</option>
                            <option value="MS">MS</option>
                            <option value="MG">MG</option>
                            <option value="PA">PA</option>
                            <option value="PB">PB</option>
                            <option value="PR">PR</option>
                            <option value="PE">PE</option>
                            <option value="PI">PI</option>
                            <option value="RJ">RJ</option>
                            <option value="RN">RN</option>
                            <option value="RS">RS</option>
                            <option value="RO">RO</option>
                            <option value="RR">RR</option>
                            <option value="SC">SC</option>
                            <option value="SP">SP</option>
                            <option value="SE">SE</option>
                            <option value="TO">TO</option>
                            <option value="DF">DF</option>
                        </select>
                        <div class="invalid-feedback">
                            Please select a valid state.
                        </div>
                    </div>     
                </div>  
            <div class="col-md-5 m-2">
                <div class="row m-5 sm-2" style="font-family:tahoma;">
                    <button type="submit" class="btn btn-lg" id="acao" name="acao" value="SALVAR" style="background-color: #848e3d; color: #fff;">
                    <b>Criar Conta<b></button>
                </div>          
            </div> 
        </form>
    </div>
    <script type="text/javascript" src="http://code.jquery.com/jquery-3.0.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous" defer>
    </script>
    <!-- Para usar Mascara  -->
    <script type="text/javascript" src="./../js/jquery.mask.min.js"></script>
    <script type="text/javascript" src="./../js/personalizar.js"></script>
    <script type="text/javascript" src="./../js/modal.js"></script>

</body>
</html>