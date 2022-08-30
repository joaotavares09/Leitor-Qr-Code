<?php
  session_start();
  include_once("../Model/Conexao.php");
  include_once("cabecalho.php");
  include_once("barra_horizontal.php");
  include_once("menu.php");
  include_once("alertas.php");
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

<div class="row">
  <div class="col-1"></div>
    <div class="col-5">
      <button type="button" class="btn btn-block bg-gradient-warning btn-lg">LER QRCODE</button>
        <div class="card-tools">
          <div class="card-header"></div>
          <video id="webcam" width="100%"></video>
        </div>
        </div>

        <div class="col-lg-5">
          <button type="button" class="btn btn-block bg-gradient-danger btn-lg">ÚLTIMOS ACESSOS</button>
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                      <tr>
                        <th>NOME</th>
                        <th>DATA E HORA</th>
                      </tr>
                    </thead>
                    <tbody id="ultimas_entradas"></tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
            </div>
          </div>
        </div>

        <script type="text/javascript">
          setInterval('ultimas_entradas()',4000);
        </script>
    <div>
</div>

</div>
<script src="plugins/instascan/instascan.min.js"></script>
<script src="plugins/instascan/adapter.min.js"></script>

<script type="text/javascript">
  let scanner=new Instascan.Scanner({video: document.getElementById('webcam') });
  Instascan.Camera.getCameras().then(function(cameras){
    if(cameras.length>0){
      scanner.start(cameras[0]);
    }
    else{
      alert("Nenhuma Camera Encantrada");
    }
  }).catch(function(e){
    console.error(e);
  });
  
  scanner.addListener('scan', function(c){
      var result= document.getElementById('confirmacao_leitura');
    if (c !="") {
      registrar_entrada(c);
    }else{
      result.innerHTML="<img src='dist/img/negado.png' class='img-fluid' width='200' height='200'>";
    }
    // document.forms[0].submit();
  });
</script>
<?php 
  include"rodape.php";
?>