<?php 
include("mpdf/mpdf60/mpdf.php");
include'../Model/Conexao.php';
include'../Controller/Conversao.php';
include_once("../Model/Funcionario.class.php");


 $html = "
 <html>
 <body style='font-family:arial;'>
   <table align='center' border='0' cellpadding='0' cellspacing='0' width='100%'>
   <tr  style='text-align: center;'>

   <td colspan='3' width='500' style='padding-left:10px;padding-bottom:10px;'>
       
       <td>
         <img src='dist/img/user.png' width='150' height='150'> <div style='height: 500px;
  border-left: 2px solid;'></div>
       </td>
       <td width='800' style='font-size:14px;'>
         <h4> RELATÓRIO</h4>
       </td>
    </td>
   </tr>
 </table>
  <hr>  

  <p align='center' style='background-color: #FFA500;'><strong> RELATÓRIO DE ENTRADA REFEITÓRIO </strong></p>

  <br>
  <br>
  <br>
<table border='2' >
  <thead>
  <th>
  ID
  </th>

  <th>
  DADOS PESSOAIS
  </th>
  <th>
    CADASTRADO
  </th>
  </thead>
  <tbody>

";
  $fun = new FuncionarioModel();
  $data_inicial=$_GET['data_inicial']." 00:00:00";
  $data_final=$_GET['data_final']." 23:59:59";

  $res=$fun->relatorio_entrada($conexao,$data_inicial,$data_final);
  $conta=0;
  $html="";
  foreach ($res as $key => $value) {
    $html.="
    <tr>
      <td>".$value['nome']." ".$value['sobrenome']."</td>
      <td>".$value['matricula']."</td>
      <td>"
      . converte_data_hora($value['data_hora']).
      "</td>
    </tr>
    ";

    $conta++;
  }

$html.="
  </tbody>
</table>

<table align='center' style='color:#444;font-size:12px; padding-top:100px;position:absolute;
    bottom:0;
    width:100%;'>
          <tr>
              <td align='center' width='300' style='border-top: none;'>
          
                <h5>".date("d/m/Y H:i:s")."</h5><br>

              </td>
          </tr>
  
</table>
</body>
</html>
    


</body>
</html>";


 $mpdf=new mPDF(); 

 $mpdf->SetDisplayMode('fullpage');

 // $css = file_get_contents("css/estilo.css");

 // $mpdf->WriteHTML($css,1);

 $mpdf->WriteHTML($html);

 $mpdf->Output();
 // $mpdf->Output('teste.pdf');

 

 

 



exit;

?>