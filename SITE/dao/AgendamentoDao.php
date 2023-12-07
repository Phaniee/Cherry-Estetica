<?php  

require_once ( __DIR__ . '../../model/Conexao.php');

    class AgendamentoDao{
        public static function insert($agendamento){
           // echo "<pre>" ."chegamos aqui";
            //var_dump($agendamento);
            $cod = $agendamento->getCod();
            $data = $agendamento->getData();
            $hora = $agendamento->getHora();
            $servico = $agendamento->getCodServico();
            $cliente = $agendamento->getCodCliente();
            
            $conn = Conexao::conectar(); // Estabeleça a conexão com o banco de dados
            
            $stmt = $conn->prepare("INSERT INTO tbagendamento (codAgendamento, dataAgendamento, horaAgendamento, codServico, codCliente) 
                            VALUES (:cod, :data, :hora,:servico, :cliente)");

            $stmt->bindParam(':cod', $cod);
            $stmt->bindParam(':data', $data);
            $stmt->bindParam(':hora', $hora);
            $stmt->bindParam(':servico', $servico);
            $stmt->bindParam(':cliente', $cliente);

            $result = $stmt->execute();

            if ($result) {
                return true; // Inserção bem-sucedida
            } else {
                return false; // Erro na inserção
            }
        }
        public static function selectAll(){
            $conexao = Conexao::conectar();
            $query = "SELECT * FROM tbagendamento";
            $stmt = $conexao->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll();
        }

        public static function selectById($cod){
            $conexao = Conexao::conectar();
            $query = "SELECT * FROM tbagendamento WHERE codAgendamento = :cod";
            $stmt = $conexao->prepare($query);
            $stmt->bindParam(':cod', $cod,  PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public static function delete($cod){
            $conexao = Conexao::conectar();
            $query = "DELETE FROM tbagendamento WHERE codagendamento = :cod";
            $stmt = $conexao->prepare($query);
            $stmt->bindParam(':cod', $cod);
            return  $stmt->execute();

        }

        public static function update($cod, $agendamento){
            $conexao = Conexao::conectar();
        
            $query = "UPDATE tbagendamento SET 
                dataAgendamento = :data,
                horaAgendamento = :hora, 
                codServico = :servico, 
                codCliente = :cliente
                WHERE codAgendamento = :cod";
            
            $stmt = $conexao->prepare($query);
        
            // Atribuir os valores a variáveis antes de chamar bindParam
            $data = $agendamento->getData();
            $hora = $agendamento->getHora();
            $servico = $agendamento->getCodServico();
            $cliente = $agendamento->getCodCliente();
               
            $stmt->bindParam(':data', $data);
            $stmt->bindParam(':hora', $hora);
            $stmt->bindParam(':servico', $servico);
            $stmt->bindParam(':cliente', $cliente);
            $stmt->bindParam(':cod', $cod);
            return $stmt->execute();


        }
        public static function getTotalAgendamentos(){
            $conexao = Conexao::conectar();
            $query = "SELECT COUNT(*) as totalAgendamentos FROM tbagendamento";
            $stmt = $conexao->prepare($query);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
            return $result['totalAgendamentos']; 
    }
    // AgendamentoDao.php

    public static function selectAllWithClientes() {
        try {
            $conexao = Conexao::conectar();
            
            $sql = "SELECT a.*, c.nomeCliente FROM tbagendamento a INNER JOIN tbcliente c ON a.codCliente = c.codCliente LIMIT 0, 25;";
            
            $stmt = $conexao->prepare($sql);
            $stmt->execute();
            
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            return $result;
        } catch (PDOException $e) {
            error_log('Erro ao selecionar agendamentos com clientes: ' . $e->getMessage());
            return array();
        } finally {
            $conexao = null; 
        }
    }
}

?>