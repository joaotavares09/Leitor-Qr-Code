<?php
    session_start();
    require_once'../Model/Conexao.php';
    require_once'../Model/Login.class.php';
    $logar= new LoginModel();
    $login = ($_POST['login']);
    $senha = ($_POST['senha']);
    try {
        $res = $logar->login_usuario($conexao, $login, $senha);
        $conta = 0;
        foreach ($res as $value) {
            $_SESSION['id'] = $value['id'];
            $_SESSION['nome'] = ($value['nome']);
            $_SESSION['nivel_acesso'] = $value['nivel_acesso'];

            $_SESSION['status'] = 1;
            if ($value['nivel_acesso']==0) {
                header("location:../View/scanner.php?status=1");
            }else if ($value['nivel_acesso']==1) {
                header("location:../View/scanner.php?status=1");
            }
            $conta++;
        }
        if ($conta == 0) {
            $_SESSION['status'] = 0;
            header("location:../View/index.php?status=0");
        }
    } catch (Exception $ex) {
        $_SESSION['status'] = 0;
        header("location:../View/index.php?status=0");
    }
?>