<?php  

require_once ( __DIR__ . '../../model/Conexao.php');

    class ServicoDao{
        public static function insert($servico){
           // echo "<pre>" ."chegamos aqui";
            //var_dump($servico);
            $cod = $servico->getCod();
            $nome = $servico->getNome();
            $valor = $servico->getValor();
            $duracao = $servico->getDuracao();
            $descricao = $servico->getDescricao();
            $imagem = $servico->getImagem();
            $token = $servico->getToken();
            
            $conn = Conexao::conectar(); // Estabeleça a conexão com o banco de dados
            
            $stmt = $conn->prepare("INSERT INTO tbservico (codServico, nomeServico, valorServico, duracaoServico, descricaoServico, imagemServico, tokenServico) 
                            VALUES (:cod, :nome, :valor, :duracao,:descricao, :imagem, :token)");

            $stmt->bindParam(':cod', $cod);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':valor', $valor);
            $stmt->bindParam(':duracao', $duracao);
            $stmt->bindParam(':descricao', $descricao);
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
            $query = "SELECT * FROM tbservico";
            $stmt = $conexao->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll();
        }

        public static function selectById($cod){
            $conexao = Conexao::conectar();
            $query = "SELECT * FROM tbservico WHERE codServico = :cod";
            $stmt = $conexao->prepare($query);
            $stmt->bindParam(':cod', $cod,  PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public static function delete($cod){
            $conexao = Conexao::conectar();
            $query = "DELETE FROM tbservico WHERE codServico = :cod";
            $stmt = $conexao->prepare($query);
            $stmt->bindParam(':cod', $cod);
            return  $stmt->execute();

        }

        public static function update($cod, $servico){
            $conexao = Conexao::conectar();
        
            $query = "UPDATE tbservico SET 
                nomeServico = :nome,
                valorServico = :valor,
                duracaoServico = :duracao, 
                descricaoServico = :descricao, 
                imagemServico = :imagem,
                tokenServico = :token
                WHERE codServico = :cod";
            
            $stmt = $conexao->prepare($query);
        
            // Atribuir os valores a variáveis antes de chamar bindParam
            $nome = $servico->getNome();
            $valor = $servico->getValor();
            $duracao = $servico->getDuracao();
            $descricao = $servico->getDescricao();
            $imagem = $servico->getImagem();
            $token = $servico->getToken();
               
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':valor', $valor);
            $stmt->bindParam(':duracao', $duracao);
            $stmt->bindParam(':descricao', $descricao);
            $stmt->bindParam(':imagem', $imagem);
            $stmt->bindParam(':token', $token);
            $stmt->bindParam(':cod', $cod);
            return $stmt->execute();


        }
        public static function getTotalServicos(){
            $conexao = Conexao::conectar();
            $query = "SELECT COUNT(*) as totalServicos FROM tbservico";
            $stmt = $conexao->prepare($query);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
            return $result['totalServicos']; 
    }
    }


?>