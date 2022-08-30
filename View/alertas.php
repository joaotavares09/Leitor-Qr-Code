<?php
$mensagem="";
if (isset($_SESSION['mensagem'])) {
  $mensagem=$_SESSION['mensagem'];
}
  if (isset($_SESSION['nivel_acesso'])) {   
    if($_SESSION['nivel_acesso']==0){
        echo "<script>
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text:' $mensagem'
            
          })
      </script>"; 
     
        
    }else if($_SESSION['nivel_acesso']==1) {
      echo "<script>      
        Swal.fire({
          position: 'center',
          icon: 'success',
          title: 'Ação Concluída',
          showConfirmButton: false,
          timer: 1500
        })
      </script>"; 
      
    }

    unset($_SESSION['nivel_acesso']);
    unset($_SESSION['mensagem']);
  } 
?>