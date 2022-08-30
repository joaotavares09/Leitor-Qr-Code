
<script type="text/javascript">
const inputEle = document.getElementById('pesquisa');
inputEle.addEventListener('keyup', function(e){
  var key = e.which || e.keyCode;
  if (key == 13) { // codigo da tecla enter
    pesquisa_benefeciado();
  }
});
</script>

<br>
<br>
<br>



<div class="modal fade" id="modal-encaminha-triagem">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Opções de encaminhamento</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
          <div class="modal-body">
         <form method="POST" action="../Controller/Cadastrar_senha_triagem.php" >
             <input type="hidden" value="<?php echo $idpaciente; ?>" name="idpaciente">
             <input type="hidden" value="<?php echo $idsenha; ?>"name="idsenha">

             <div class="row">
                 <div class='col-md-12'>
                     <label for='rua'><b>Prioridade:</b></label>
                     <div class='form-group'>
                         <select name='prioridade'  class='form-control' required="">
                             
                             <?php
                             if ($_SESSION['unidade_id']==2) {//SE A SESSION FOR DA UPA, NÃO TEM PRIORIDADE NA RECEPÇÃO
                                 echo "<option value='10' >NENHUMA</option>";
                             }else {
                                 echo"<option></option>";
                                     
                                     $res_pri = $pa->listar_prioridades($conexao);
                                     $cont=0;
                                     foreach ($res_pri as $key => $value) {
                                         $idprioridade = $value['id'];
                                         $nome_prioridade = $value['nome'];
                                         echo" <option value='$idprioridade' >" . utf8_encode($nome_prioridade) . "</option>";
                                         if($cont==4){
                                             break;
                                         }
                                         $cont++;
                                     }
                                 }
                             ?>

                         </select>
                     </div> 
                 </div>
             </div>
             <div class="row">
                 <div class="col-md-12">
                     <label for="status"><b>Encaminhar para:</b></label>
                     <div class="form-group">
                         <select name="status" class=" form-control" required="">
                             <option value="tri">TRIAGEM</option>
                         </select>
                     </div> 
                     <!-- <div class="form-group">
                         <label for=""><b>Observação:</b></label>
                         <input name="observacao" type="text" value=" " class=" form-control" >
                     </div> -->
                 </div>


             </div>
           
       
   
              <!-- /corpo -->
        </div>
        <div class="modal-footer justify-content-between">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                      <button type="submit" class="btn btn-primary">Confirmar</button>
        </div>
    </form>

      </div>


      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>




 <footer class="main-footer">
    <strong>&copy; 2019 - 2021 <a href="https://www.instagram.com.br/joaotavares070/"></a>.</strong>
    Direitos Reservados.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0
    </div>
  </footer>

  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>

<!-- InstaScam Scanner Camera WebCam QRCode -->

<!-- <script>
  document.addEventListener("DOMContentLoaded", event => {
    let scanner = new Instascan.Scanner({ video: document.getElementById('webcam') });
      Instascan.Camera.getCameras().then(cameras => {
        scanner.camera = cameras[cameras.length - 1];
        scanner.start();
      }).catch(e => console.error(e));

      scanner.addListener('scan', content => {
        console.log(content);
      });
    });

    // scanner.addListener('scan', function(c)){
    //   document.getElementById('inputCodigo').value=c;
    // }
</script> -->



<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
</body>
</html>