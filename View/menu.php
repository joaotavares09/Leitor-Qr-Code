  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="dist/img/user.png" alt="logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light"><?php echo $titulo_orgao ?></span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <!-- <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> -->
        </div>
        <div class="info">
          <a href="#" class="d-block">
            <?php
              if (isset($_SESSION['nome'])){
                echo $_SESSION['nome'];
              } 
            ?>
          </a>
          <?php 
            if (isset($_SESSION['nivel'])) {
              echo "<b class='text-danger'>".$_SESSION['nivel']."</b>";
            }
          ?>
        </div>
      </div>
      <!-- SidebarSearch Form -->
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Principal <i class="right fas fa-angle-left"></i></p>
            </a>
          <?php
            echo "<ul class='nav nav-treeview'>
                    <li class='nav-item'>
                      <a  href='#' class='nav-link'>
                        <i class='far fa-circle nav-icon text-primary'></i>
                        <p>Início</p>
                      </a> 
                    </li>
                  </ul>";
                  // echo "<ul class='nav nav-treeview'>
                  // <li class='nav-item'>
                  //     <a href='alterar-meus-dados.php' class='nav-link'>
                  //    <i class='far fa-circle nav-icon text-primary'></i>
                  //     <p>Alterar meus dados</p>
                  //   </a>
                  // </li>
                  // </ul>";
            if ($_SESSION['nivel_acesso']==1){
              echo "<ul class='nav nav-treeview'>
                      <li class='nav-item'>
                        <a  href='scanner.php' class='nav-link'>
                          <i class='far fa-circle nav-icon text-primary'></i>
                          <p>Atendimentos</p>
                        </a>
                      </li>
                    </ul>";
            }
            if ($_SESSION['nivel_acesso']==1){
              echo "<ul class='nav nav-treeview'>
                      <li class='nav-item'>
                        <a  href='cafe.php' class='nav-link'>
                          <i class='far fa-circle nav-icon text-primary'></i>
                          <p>Relatório Café</p>
                        </a>
                      </li>
                    </ul>";
            }
            if ($_SESSION['nivel_acesso']==1){
              echo "<ul class='nav nav-treeview'>
                      <li class='nav-item'>
                        <a  href='almoco.php' class='nav-link'>
                          <i class='far fa-circle nav-icon text-primary'></i>
                          <p>Relatório Almoço</p>
                        </a>
                      </li>
                    </ul>";
            }
            if ($_SESSION['nivel_acesso']==1){
              echo "<ul class='nav nav-treeview'>
                      <li class='nav-item'>
                        <a  href='pesq_codigo.php' class='nav-link'>
                          <i class='far fa-circle nav-icon text-primary'></i>
                          <p>Pesquisar por Código</p>
                        </a>
                      </li>
                    </ul>";
            }
            if ($_SESSION['nivel_acesso']==1){
              echo "<ul class='nav nav-treeview'>
                      <li class='nav-item'>
                        <a  href='../upload_xml/processa.php' class='nav-link'>
                          <i class='far fa-circle nav-icon text-primary'></i>
                          <p>Add Planilha</p>
                        </a>
                      </li>
                    </ul>";
            }

// **********************************************************************************
          if (isset($_SESSION['nivel_acesso'])) {
            
             echo" <li class='nav-item'>
                <a href='./logout.php' class='nav-link'>
                  <i class='far fa-circle nav-icon text-danger'></i>
                <p>SAIR</p>
                </a>
              </li>";
          } else{
              echo "
              <li class='nav-item' id='entrar'>
              <a href='./index.php' class='nav-link' data-toggle='modal' data-target='#modal-default'>
                <i class='far fa-circle nav-icon text-success'></i>
              <p>Entrar</p>
              </a>
            </li>";
          }
          

          ?>
<!-- ********************************************* -->
            </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>