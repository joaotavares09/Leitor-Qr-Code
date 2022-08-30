<?php
class FuncionarioModel {
    public function relatorio_entrada($conexao,$data_inicial,$data_final) {
        $sql = $conexao->prepare("SELECT funcionario.nome,funcionario.matricula, funcionario.cargo, registrar_entrada.data_hora FROM funcionario,registrar_entrada where funcionario_id=funcionario.id and registrar_entrada.data_hora BETWEEN :data_inicial and :data_final order by registrar_entrada.id desc limit 10 ");
        $sql->execute(
            array(
                ":data_inicial"=>$data_inicial,
                ":data_final"=>$data_final
            )
        );
        return $sql->fetchAll();
    }

    public function ultimas_entradas($conexao) {
        $sql = $conexao->prepare("SELECT funcionario.nome, funcionario.cargo, registrar_entrada.data_hora FROM funcionario,registrar_entrada where funcionario_id=funcionario.id order by registrar_entrada.id desc limit 10 ");
        $sql->execute();
        return $sql->fetchAll();
    }    

    public function pesquisar_funcionario_por_matricula($conexao,$matricula) {
        $sql = $conexao->prepare("SELECT * FROM funcionario where matricula like :matricula ");
        $sql->bindParam(':matricula', $matricula);
        $sql->execute();
        return $sql->fetchAll();
    }

    public function registrar_entrada($conexao,$funcionario_id) {
        $sql = $conexao->prepare("INSERT INTO registrar_entrada (funcionario_id) VALUES(:funcionario_id)");
        $sql->bindParam(':funcionario_id', $funcionario_id);
        $sql->execute();
    }
}
?>