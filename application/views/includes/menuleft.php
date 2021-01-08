<!-- ========== Left Sidebar Start ========== -->
        <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light" id="sidebar">
          <div class="container-fluid">
            <!-- Toggler -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Brand -->
            <a class="navbar-brand" href="<?=base_url()?>">
              <img src="<?=base_url('upload/img/logo_tlaxcalacorto.png')?>" class="navbar-brand-img mx-auto" alt="...">
            </a>
            <!-- User (xs) -->
            <div class="navbar-user d-md-none">
              <!-- Dropdown -->
              <div class="dropdown">
                <!-- Toggle -->
                <a href="#" id="sidebarIcon" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <div class="avatar avatar-sm avatar-online">
                    <img src="<?=base_url('upload/img/icon_persona.png')?>" class="avatar-img rounded-circle" alt="...">
                  </div>
                </a>
                <!-- Menu -->
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="sidebarIcon">
                  <a href="profile-posts.html" class="dropdown-item">Profile</a>
                  <a href="settings.html" class="dropdown-item">Settings</a>
                  <hr class="dropdown-divider">
                  <a href="<?=base_url('log/out')?>" class="dropdown-item">Cerrar sesión</a>
                </div>
              </div>
            </div>
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidebarCollapse">
              <!-- Navigation -->
              <ul class="navbar-nav">
                <?php 
                  foreach ($this->auth->get_modulos() as $key => $modulo){

                    if($modulo->visible==1){

                      if($modulo->funciones=='' || $modulo->funciones==NULL){

                        echo '
                          <li class="nav-item">
                            <a class="nav-link " href="'.base_url($modulo->controlador).'">
                              <i class="fe '.$modulo->icono.'"></i>'.$modulo->titulo_menu.'
                            </a>
                          </li>
                        ';
                      }else{

                        $modulo->funciones = explode(',',$modulo->funciones);
                        
                        echo '
                          <li class="nav-item">
                            <a class="nav-link" href="#'.$modulo->controlador.'" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="'.$modulo->controlador.'">
                              <i class="fe '.$modulo->icono.'"></i>'.$modulo->titulo_menu.'
                            </a>
                            <div class="collapse '.menu($modulo->controlador).'" id="'.$modulo->controlador.'">
                              <ul class="nav nav-sm flex-column">
                        ';
                        foreach ($modulo->funciones as $keyy => $funcion) {

                          echo '<li class="nav-item '.submenu($funcion).'">
                                  <a href="'.base_url($modulo->controlador.'/'.$funcion).'" class="nav-link">
                                    '.ucwords($funcion).'
                                  </a>
                                </li>';
                        }
                        echo '</ul>
                            </div>
                          </li>
                        ';
                      }
                    }
                  }
                ?>
              </ul>
              <!-- Divider -->
              <hr class="navbar-divider my-3">
              <!-- Heading -->
              <h6 class="navbar-heading">
                Sistema
              </h6>
              <!-- Navigation -->
              <ul class="navbar-nav mb-md-4">
                <li class="nav-item">
                    <a class="nav-link" href="#menu-sistema" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="menu-sistema">
                      <i class="fe fe-home"></i> Sistema
                    </a>
                    <div class="collapse <?=menu('sistema')?>" id="menu-sistema">
                      <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                          <a href="<?=base_url('sistema/usuarios')?>" class="nav-link <?=submenu('usuarios')?>">
                            Usuarios
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="<?=base_url('sistema/grupos')?>" class="nav-link <?=submenu('grupos')?>">
                            Grupos
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="<?=base_url('sistema/modulos')?>" class="nav-link <?=submenu('modulos')?>">
                            Modulos
                          </a>
                        </li>
                      </ul>
                    </div>
                  </li>
                <li class="nav-item">
                  <a class="nav-link " href="changelog.html">
                    <i class="fe fe-git-branch"></i> Manual <span class="badge badge-primary ml-auto">v1.1</span>
                  </a>
                </li>
              </ul>
              <!-- Push content down -->
              <div class="mt-auto"></div>
              <!-- Customize 
              <a href="#modalDemo" class="btn btn-block btn-secondary mb-4" data-toggle="modal">
                <i class="fe fe-sliders mr-2"></i> Configuración
              </a> -->
              <!-- User (md) -->
              <div class="navbar-user d-none d-md-flex" id="sidebarUser">
                <!-- Icon -->
                <a href="#sidebarModalActivity" class="navbar-user-link" data-toggle="modal">
                  <span class="icon">
                    <i class="fe fe-bell"></i>
                  </span>
                </a>
                <!-- Dropup -->
                <div class="dropup">
                  <!-- Toggle -->
                  <a href="#" id="sidebarIconCopy" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="avatar avatar-sm avatar-online">
                      <img src="<?=base_url('upload/img/icon_persona.png')?>" class="avatar-img rounded-circle" alt="...">
                    </div>
                  </a>
                  <!-- Menu -->
                  <div class="dropdown-menu" aria-labelledby="sidebarIconCopy">
                    <a href="profile-posts.html" class="dropdown-item">Profile</a>
                    <a href="settings.html" class="dropdown-item">Settings</a>
                    <hr class="dropdown-divider">
                    <a href="<?=base_url('log/out')?>" class="dropdown-item">Cerrar sesión</a>
                  </div>
                </div>
                <!-- Icon -->
                <a href="#sidebarModalSearch" class="navbar-user-link" data-toggle="modal">
                  <span class="icon">
                    <i class="fe fe-search"></i>
                  </span>
                </a>
              </div>
            </div> <!-- / .navbar-collapse -->
          </div>
        </nav>
<!-- Left Sidebar End -->