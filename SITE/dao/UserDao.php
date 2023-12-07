<?php 
require_once (__DIR__ . '../../model/Conexao.php');

    class UserDao{
        public static function insert($user){
            $cod = $user->getCod();
            $nome = $user->getNome();
            $sobrenome = $user->getSobrenome();
            $cpf = $user->getCpf();
            $nasc = $user->getNasc();
            $email = $user->getEmail();
            $password = $user->getPassword();
            $imagem = $user->getImagem();
            $token = $user->getToken();
            
            $conn = Conexao::conectar(); // Estabeleça a conexão com o banco de dados
            
            $stmt = $conn->prepare("INSERT INTO tbUser (codUser, nomeUser, sobrenomeUser, cpfUser, nascUser, emailUser, passwordUser, imagemUser, tokenUser) 
                            VALUES (:cod, :nome, :sobrenome, :cpf, :nasc, :email, :password, :imagem, :token)");

            $stmt->bindParam(':cod', $cod);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':sobrenome', $sobrenome);
            $stmt->bindParam(':cpf', $cpf);
            $stmt->bindParam(':nasc', $nasc);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':imagem', $imagem);
            $stmt->bindParam(':token', $token);

            $result = $stmt->execute();

            if ($result) {
                return true; // Inserção bem-sucedida
            } else {
                return false; // Erro na inserção
            }
        }
        public static function selectAll(){
            $conexao = Conexao::conectar();
            $query = "SELECT * FROM tbUser";
            $stmt = $conexao->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll();

        }

        public static function selectById($cod){
            $conexao = Conexao::conectar();
            $query = "SELECT * FROM tbuser WHERE codUser = :cod";
            $stmt = $conexao->prepare($query);
            $stmt->bindParam(':cod', $cod,  PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);

        }

        public static function delete($cod){
            $conexao = Conexao::conectar();
            $query = "DELETE FROM tbuser WHERE codUser = :cod";
            $stmt = $conexao->prepare($query);
            $stmt->bindParam(':cod', $cod);
            return  $stmt->execute();

        }

        public static function update($cod, $user){
            $conexao = Conexao::conectar();
        
            $query = "UPDATE tbuser SET 
                nomeUser = :nome, 
                sobrenomeUser = :sobrenome, 
                cpfUser = :cpf,
                nascUser = :nasc, 
                emailUser = :email, 
                passwordUser = :password, 
                imagemUser = :imagem, 
                tokenUser = :token 
                WHERE codUser = :cod";
            
            $stmt = $conexao->prepare($query);
        
            // Atribuir os valores a variáveis antes de chamar bindParam
            $nome = $user->getNome();
            $sobrenome = $user->getSobrenome();
            $cpf = $user->getCpf();
            $nasc = $user->getNasc();
            $email = $user->getEmail();
            $password = $user->getPassword();
            $imagem = $user->getImagem();
            $token = $user->getToken();
        
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':sobrenome', $sobrenome);
            $stmt->bindParam(':cpf', $cpf);
            $stmt->bindParam(':nasc', $nasc);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':imagem', $imagem);
            $stmt->bindParam(':token', $token);
            $stmt->bindParam(':cod', $cod);
        
            return $stmt->execute();
        }
        public static function checkCredentials($email, $password){
            $conexao = Conexao::conectar();
            $query = "SELECT * FROM tbuser WHERE emailUser = :email and passwordUser = :password";
            $stmt = $conexao->prepare($query);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
    }


?>