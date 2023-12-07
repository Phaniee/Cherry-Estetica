<?php  
define('BASE_DIR', __DIR__ . '../../');

require_once BASE_DIR . 'model/Conexao.php';

    class DepoimentoDao{
        public static function insert($depoimento){
            $cod = $depoimento->getCod();
            $titulo = $depoimento->getTitulo();
            $texto = $depoimento->getTexto();
            $categoria = $depoimento->getCategoria();
            $nomeCliente = $depoimento->getCliente();
        
            $conn = Conexao::conectar(); // Estabeleça a conexão com o banco de dados
            
            $stmt = $conn->prepare("INSERT INTO tbdepoimentocliente (codDepoimentoCliente, tituloDepoimentoCliente, textoDepoimentoCliente, categoriaDepoimentoCliente, nomeCliente) 
                            VALUES (:cod, :titulo, :texto, :categoria, :cliente)");
        
            $stmt->bindParam(':cod', $cod);        
            $stmt->bindParam(':titulo', $titulo);
            $stmt->bindParam(':texto', $texto);
            $stmt->bindParam(':categoria', $categoria);
            $stmt->bindParam(':cliente', $nomeCliente);
        
            $result = $stmt->execute();
        
            if ($result) {
                return true; // Inserção bem-sucedida
            } else {
                return false; // Erro na inserção
            }
        }
        
        public static function selectAll(){
            $conexao = Conexao::conectar();
            $query = "SELECT * FROM tbdepoimentocliente";
            $stmt = $conexao->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll();
        }
        

        public static function selectById($cod){
            $conexao = Conexao::conectar();
            $query = "SELECT * FROM tbdepoimentocliente WHERE codDepoimentoCliente = :cod";
            $stmt = $conexao->prepare($query);
            $stmt->bindParam(':cod', $cod,  PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);

        }

        public static function delete($cod){
            $conexao = Conexao::conectar();
            $query = "DELETE FROM tbdepoimentocliente WHERE codDepoimentoCliente = :cod";
            $stmt = $conexao->prepare($query);
            $stmt->bindParam(':cod', $cod);
            return  $stmt->execute();

        }

        public static function update($cod, $depoimento){
            $conexao = Conexao::conectar();
        
            $query = "UPDATE tbdepoimentocliente SET 
                tituloDepoimentoCliente = :titulo, 
                textoDepoimentoCliente = :texto, 
                categoriaDepoimentoCliente = :categoria,
                nomeCliente = :cliente
                WHERE codDepoimentoCliente = :cod";
            
            $stmt = $conexao->prepare($query);
        
            // Atribuir os valores a variáveis antes de chamar bindParam
            $titulo = $depoimento->getTitulo();
            $texto = $depoimento->getTexto();
            $categoria = $depoimento->getCategoria();
            $nomeCliente = $depoimento->getCliente();
               
            $stmt->bindParam(':titulo', $titulo);
            $stmt->bindParam(':texto', $texto);
            $stmt->bindParam(':categoria', $categoria);
            $stmt->bindParam(':cliente', $nomeCliente);
            $stmt->bindParam(':cod', $cod);
        
            return $stmt->execute();

        }
    }


?>