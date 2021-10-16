<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <img src="#" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Nano</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-header">FUNCIONÁRIOS</li>
          <li class="nav-item">
            <a href="<?php $BASE_URL ?>cadastro_funcionarios.php" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Cadastrar
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php $BASE_URL ?>funcionarios.php" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Listagem
              </p>
            </a>
          </li>
          <li class="nav-header">MOVIMENTAÇÕES</li>
          <li class="nav-item">
            <a href="<?php $BASE_URL ?>cadastro_movimentacoes.php" class="nav-link">
              <i class="fas fa-hand-holding-usd"></i>
              <p>
                Cadastrar
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php $BASE_URL ?>movimentacoes.php" class="nav-link">
              <i class="fas fa-hand-holding-usd"></i>
              <p>
                Listagem
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>