<?php  
define('BASE_DIR', __DIR__ . '../../');

require_once BASE_DIR . 'model/Conexao.php';

    class ClienteDao{
        public static function insert($cliente){
            //echo "<pre>" ."chegamos aqui";
           // var_dump($cliente);
            $cod = $cliente->getCod();
            $nome = $cliente->getNome();
            $tel = $cliente->getTel();
            $cpf = $cliente->getCpf();
            $nasc = $cliente->getNasc();
            $sexo = $cliente->getSexo();
            $logradouro = $cliente->getLogradouro();
            $numLog = $cliente->getNumLog();
            $bairro = $cliente->getBairro();
            $cidade = $cliente->getCidade();
            $uf = $cliente->getUf();
            $cep = $cliente->getCep();
            $email = $cliente->getEmail();
            $senha = $cliente->getSenha();
            
            $conn = Conexao::conectar(); // Estabeleça a conexão com o banco de dados
            
            $stmt = $conn->prepare("INSERT INTO tbcliente (codCliente, nomeCliente, telCliente, cpfCliente, dataNascimentoCliente, sexoCliente, logradouroCliente, numLogCliente,
            bairroCliente, cidadeCliente, ufCliente, cepCliente, emailCliente, senhaEmailCliente) 
                            VALUES (:cod, :nome, :tel, :cpf, :dataNasc, :sexo, :logradouro, :numLog, :bairro, :cidade, :uf, :cep, :email, :senha)");

            $stmt->bindParam(':cod', $cod);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':tel', $tel);
            $stmt->bindParam(':cpf', $cpf);
            $stmt->bindParam(':dataNasc', $nasc);
            $stmt->bindParam(':sexo', $sexo);
            $stmt->bindParam(':logradouro', $logradouro);
            $stmt->bindParam(':numLog', $numLog);
            $stmt->bindParam(':bairro', $bairro);
            $stmt->bindParam(':cidade', $cidade);
            $stmt->bindParam(':uf', $uf);
            $stmt->bindParam(':cep', $cep);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':senha', $senha);

            $result = $stmt->execute();

            if ($result) {
                return true; // Inserção bem-sucedida
            } else {
                return false; // Erro na inserção
            }
        }
        public static function selectAll(){
            $conexao = Conexao::conectar();
            $query = "SELECT * FROM tbcliente";
            $stmt = $conexao->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll();

        }

        public static function selectById($cod){
            $conexao = Conexao::conectar();
            $query = "SELECT * FROM tbcliente WHERE codCliente = :cod";
            $stmt = $conexao->prepare($query);
            $stmt->bindParam(':cod', $cod);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);

        }

        public static function delete($cod){
            $conexao = Conexao::conectar();
            $query = "DELETE FROM tbcliente WHERE codCliente = :cod";
            $stmt = $conexao->prepare($query);
            $stmt->bindParam(':cod', $cod);
            return  $stmt->execute();

        }

        public static function update($cod, $cliente){
            $conexao = Conexao::conectar();
            $query = "UPDATE tbcliente SET 
            nomeCliente = :nome, 
            telCliente = :tel,
            cpfCliente  = :cpf,
            dataNascimentoCliente = :dataNasc, 
            sexoCliente = :sexo, 
            logradouroCliente = :logradouro, 
            numLogCliente = :numLog, 
            bairroCliente = :bairro,
            cidadeCliente = :cidade, 
            ufCliente = :uf, 
            cepCliente = :cep,
            emailCliente = :email, 
            senhaEmailCliente = :senha
            WHERE codCliente = :cod";
            $stmt = $conexao->prepare($query);
            $stmt->bindParam(':nome', $cliente->getNome());
            $stmt->bindParam(':tel', $cliente->getTel());
            $stmt->bindParam(':cpf', $cliente->getCpf());
            $stmt->bindParam(':dataNasc', $cliente->getNasc());
            $stmt->bindParam(':sexo', $cliente->getSexo());
            $stmt->bindParam(':logradouro', $cliente->getlogradouro());
            $stmt->bindParam(':numLog', $cliente->getNumLog());
            $stmt->bindParam(':bairro', $cliente->getBairro());
            $stmt->bindParam(':cidade', $cliente->getCidade());
            $stmt->bindParam(':uf', $cliente->getUf());
            $stmt->bindParam(':cep', $cliente->getCep());
            $stmt->bindParam(':email', $cliente->getEmail());
            $stmt->bindParam(':senha', $cliente->getSenha());
            $stmt->bindParam(':cod', $cod); // Certifique-se de que o ID seja o terceiro valor
            return $stmt->execute();

        }
        public static function updateParcial($cod, $cliente){
            $conexao = Conexao::conectar();

            $email = $cliente->getEmail();
            $senha = $cliente->getSenha();

            $query = "UPDATE tbcliente SET 
            emailCliente = :email, 
            senhaEmailCliente = :senha
            WHERE codCliente = :cod";
            $stmt = $conexao->prepare($query);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':senha', $senha);
            $stmt->bindParam(':cod', $cod); // Certifique-se de que o ID seja o terceiro valor
            return $stmt->execute();

        }
        public static function checkCredentials($email, $senha){
            $conexao = Conexao::conectar();
            $query = "SELECT * FROM tbcliente WHERE emailCliente = :email and senhaEmailCliente = :senha";
            $stmt = $conexao->prepare($query);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':senha', $senha);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public static function getTotalClientes(){
            $conexao = Conexao::conectar();
            $query = "SELECT COUNT(*) as totalClientes FROM tbcliente";
            $stmt = $conexao->prepare($query);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
            return $result['totalClientes']; 
    }
}

?>