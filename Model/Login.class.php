<?php
class LoginModel{
    public function login_usuario($conexao,$usuario,$senha) {
        $sql = $conexao->prepare("SELECT * FROM usuario WHERE email =:usuario and senha=:senha and status=1");
        $sql->bindParam(':usuario', $usuario);
        $sql->bindParam(':senha', $senha);
        $sql->execute();
        return $sql->fetchAll();
    }
}
?>