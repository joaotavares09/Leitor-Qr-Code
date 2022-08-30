<?php
  session_start();
  if (!isset($_SESSION['nivel_acesso'])) {
    header("location:index.php?status=0");
  }else{
    if ($_SESSION['nivel_acesso']!=1) {
      header("location:index.php?status=0");
    }
      $id=$_SESSION['id'];
  }
  include "cabecalho.php";
  include "alertas.php";
  include "barra_horizontal.php";
  include 'menu.php';
  include '../Controller/Conversao.php';
  include '../Model/Conexao.php';
  $nome_orgao="ADMINISTRAÇÃO - ";
?>
<script src="ajax.js?<?php echo rand(); ?>"></script>

<div class="content-wrapper" style="min-height: 629px;">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-10 alert alert-<?php echo $tema;?>">
          <h1 class="m-0"><b>
          <?php 
            echo $nome_orgao;
            if (isset($_SESSION['nome'])) {
              echo $_SESSION['nome'];
            } 
          ?></b></h1>
      </div><!-- /.col -->
      <div class="col-sm-2">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Início</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <h1>Upload Excel</h1>
    </div>
    <div>  
      <form method="POST" action="../upload_xml/processa.php" enctype="multipart/form-data">
        <label>Arquivo</label>
        <input type="file" name="arquivo"><br><br>
        <input type="submit" value="Enviar">
      </form>
    </div>
    <br>
    <br>
    </div>
  </section>
</div>
<script>
  setInterval('buscar_senha_a_ser_chamada_recepcao();', 3000);
  setInterval('buscar_senha_ja_chamada_recepcao();', 1500);
</script>
<?php 
  include 'rodape.php';
?>