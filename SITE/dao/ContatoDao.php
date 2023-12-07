<?php  

require_once (__DIR__ . '../../model/Conexao.php');


    class ContatoDao{
        public static function insert($contato){
            $cod = $contato->getCod();
            $nome = $contato->getNome();
            $email = $contato->getEmail();
            $categoria = $contato->getCategoria();
            $comentario = $contato->getComentario();
        
            $conn = Conexao::conectar(); // Estabeleça a conexão com o banco de dados
            
            $stmt = $conn->prepare("INSERT INTO tbcontato (codContato, nomeContato, emailContato, categoriaContato, comentarioContato) 
                            VALUES (:cod, :nome, :email, :categoria, :comentario)");
        
            $stmt->bindParam(':cod', $cod);        
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':categoria', $categoria);
            $stmt->bindParam(':comentario', $comentario);
        
            $result = $stmt->execute();
        
            if ($result) {
                return true; // Inserção bem-sucedida
            } else {
                return false; // Erro na inserção
            }
        }
        
        public static function selectAll(){
            $conexao = Conexao::conectar();
            $query = "SELECT * FROM tbcontato";
            $stmt = $conexao->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll();
        }
        

        public static function selectById($cod){
            $conexao = Conexao::conectar();
            $query = "SELECT * FROM tbcontato WHERE codContato = :cod";
            $stmt = $conexao->prepare($query);
            $stmt->bindParam(':cod', $cod,  PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);

        }

        public static function delete($cod){
            $conexao = Conexao::conectar();
            $query = "DELETE FROM tbcontato WHERE codContato = :cod";
            $stmt = $conexao->prepare($query);
            $stmt->bindParam(':cod', $cod);
            return  $stmt->execute();

        }

        public static function update($cod, $contato){
            $conexao = Conexao::conectar();
        
            $query = "UPDATE tbcontato SET 
                nomeContato = :nome, 
                emailContato = :email, 
                categoriaContato = :categoria,
                comentarioContato = :comentario
                WHERE codContato = :cod";
            
            $stmt = $conexao->prepare($query);
        
            // Atribuir os valores a variáveis antes de chamar bindParam
            $nome = $contato->getNome();
            $email = $contato->getEmail();
            $categoria = $contato->getCategoria();
            $comentario = $contato->getComentario();
               
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':categoria', $categoria);
            $stmt->bindParam(':comentario', $comentario);
            $stmt->bindParam(':cod', $cod);
        
            return $stmt->execute();

        }
    }


?>