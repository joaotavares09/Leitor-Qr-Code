<?php
session_start();
$titulo_orgao="Painel Scanner QR-Code";
$nome_orgao="Área Restrita";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $titulo_orgao ?></title>

  <link rel="shortcut icon" href="dist/img/favicon.png">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
<script src="ajax.js?<?php echo rand(); ?>"></script>

</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="#" class="h1"><?php echo $nome_orgao ?> </a>
    </div>
    <div class="card-body">
      <!-- <p class="login-box-msg">Digite seu CPF e RG </p> -->
      <form action="../Controller/Login.php" method="post">
        <div class="row">
          <label>Digite seu Login(e-mail)</label><br>
          <span id="status_cpf" class="text-success"  ></span><br>
          <div class="input-group mb-6">
            <input type="text" name="login"  class="form-control" placeholder="Usuário" required="" >
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <label>Digite sua senha</label><br>
        <div class="input-group mb-6"> 
          <input type="password" name="senha" class="form-control" placeholder="Senha" required="">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
      </div>
      <br>
      <div class="row">
        <!-- /.col -->
        <div class="col-12">
          <button type="submit" class="btn btn-primary btn-block">Entrar</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
  </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->
<script type="text/javascript">
function fMasc(objeto,mascara) {
  obj=objeto
  masc=mascara
  setTimeout("fMascEx()",1)
}
function fMascEx() {
  obj.value=masc(obj.value)
}

function mCPF(cpf){
  cpf=cpf.replace(/\D/g,"")
  cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
  cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
  cpf=cpf.replace(/(\d{3})(\d{1,2})$/,"$1-$2")
  return cpf
}

cpfCheck = function (el) {
    document.getElementById('cpfResponse').innerHTML = is_cpf(el.value)? '<span style="color:green">CPF válido</span>' : '<span style="color:red">CPF inválido</span>';
    if(el.value=='') document.getElementById('cpfResponse').innerHTML = '';
}
function mask(o, f) {
  setTimeout(function() {
    var v = mphone(o.value);
    if (v != o.value) {
      o.value = v;
    }
  }, 1);
}
function mphone(v) {
  var r = v.replace(/\D/g, "");
  r = r.replace(/^0/, "");
  if (r.length > 10) {
    r = r.replace(/^(\d\d)(\d{5})(\d{4}).*/, "($1) $2-$3");
  } else if (r.length > 5) {
    r = r.replace(/^(\d\d)(\d{4})(\d{0,4}).*/, "($1) $2-$3");
  } else if (r.length > 2) {
    r = r.replace(/^(\d\d)(\d{0,5})/, "($1) $2");
  } else {
    r = r.replace(/^(\d*)/, "($1");
  }
  return r;
}
</script>

</script>
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</body>
</html>
<?php 
  include "alertas.php";
?>