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
      <div class="col-lg-1"></div>

      <div class="col-lg-3">
          <label>Data inicial</label>
          <input type="date" name='data_inicial' id='data_inicial' class="form-control" required="">
      </div>   

      <div class="col-3">
        <label>Data inicial</label>
        <input type="date" name='data_final' id='data_final' class="form-control" required="">
      </div>

      <div class="col-lg-3">
        <label></label>
        <a class="btn btn-block bg-gradient-info btn-lg" onclick="relatorio_entrada_almoco();" >BUSCAR</a>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-7"></div>
      <div class="col-lg-3" id="relatorio_entrada_botao"></div>
      <!-- <div class="col-lg-3"></div> -->
    </div>
    <br>
    <br>
    <div class="row">
      <div class="col-lg-1"></div>
        <div class="col-lg-10">
          <button type="button" class="btn btn-block bg-gradient-info btn-lg">Atendimentos no périodo</button>
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                      <tr>
                        <th>Qtd</th>
                        <th>Nome</th>
                        <th>Matrícula</th>
                        <th>Data/hora</th>
                      </tr>
                    </thead>
                    <tbody id="relatorio_entrada">
                    </tbody>
                    </table>
                  </div>
                  <!-- /.table-responsive -->
                </div>
              </div>
            </div>
          </div>
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