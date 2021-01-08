<!doctype html>
<html lang="en">
    <!-- ========== HEAD ========== -->
    <?=$this->load->view('includes/head','',TRUE)?>
    <!-- ========== /HEAD ========== -->
  <body>
    <!-- ========== MENU LFT ========== -->
    <?=$this->load->view('includes/menuleft','',TRUE)?>
    <!-- ========== /MENU LFT ========== -->

    <!-- ========== CONTENIDO ========== -->
    <div class="main-content" id="app">

      <!-- ========== MENU ========== -->
      <?=$this->load->view('includes/navegacion','',TRUE)?>
      <!-- ========== /MENU ========== -->

      <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-12 col-12 col-lg-12 col-xl-12">
            <!-- ========== CONTENIDO ========== -->
            <div class="card">
              <div class="card-body">
                <!-- Form -->
                <?=form_open('sistema/usuarios_editar/'.$usuario->usuario_id,'',array('id_token' => $usuario->usuario_id))?>
                  <div class="form-group">
                    <label>
                      Correo electrónico
                    </label>
                    <input type="email" class="form-control text-muted" name="input_correo" value="<?=$usuario->email?>" readonly>
                    <?=form_error('input_correo')?>
                  </div>
                  <div class="row">
                    <div class="col-12 col-md-6">
                      <div class="form-group">
                        <label>
                          Nombre
                        </label>
                        <input type="text" class="form-control form-control-lg" name="input_nombre" value="<?=$usuario->nombre?>">
                        <?=form_error('input_nombre')?>
                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="form-group">
                        <label>
                          Apellidos
                        </label>
                        <input type="text" class="form-control form-control-lg" name="input_apellidos" value="<?=$usuario->apellidos?>">
                        <?=form_error('input_apellidos')?>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>
                      Grupos de trabajo
                    </label>
                    <select class="form-control" data-toggle="select" multiple name="input_grupos[]">
                      <?php foreach ($grupos as $key => $grupo) {
                        $selected=false;
                          foreach ($usuario->grupos as $keyy => $ugrupo) {
                            if($ugrupo->grupo_id == $grupo->grupo_id)
                              $selected=true;
                          }
                          if($selected)
                            echo '<option value="'.$grupo->grupo_id.'" selected>'.$grupo->titulo.'</option>';
                          else
                            echo '<option value="'.$grupo->grupo_id.'">'.$grupo->titulo.'</option>';
                      } 
                      ?>
                    </select>
                    <?=form_error('input_grupos[]')?>
                  </div>
                  <div class="row">
                    <div class="col-12 col-md-6">
                      <!-- Private project -->
                      <div class="form-group">
                        <label class="mb-1">
                          Super Admin
                        </label>
                        <small class="form-text text-muted">
                          El Super Admin tendra acceso a todos los modulos y configuraciones del sistema.
                        </small>
                        <div class="custom-control custom-switch">
                          <input type="checkbox" class="custom-control-input" id="switchOne" name="input_admin" <?=( $usuario->admin == 1 ) ? 'checked' : '' ?> >
                          <label class="custom-control-label" for="switchOne"></label>
                        </div>
                      </div>
                    </div>

                    <div class="col-12 col-md-6">
                      <!-- Private project -->
                      <div class="form-group">
                        <label class="mb-1">
                          Usuario activo
                        </label>
                        <small class="form-text text-muted">
                          Si el suario se encuentra activo podra entrar al sistema con sus datos de inicio de sesión
                        </small>
                        <div class="custom-control custom-switch">
                          <input type="checkbox" class="custom-control-input" id="switchActive" name="input_active" <?=( $usuario->active == 1 ) ? 'checked' : '' ?> >
                          <label class="custom-control-label" for="switchActive"></label>
                        </div>
                      </div>
                    </div>
                  </div> <!-- / .row -->
                  <!-- Divider -->
                  <hr class="">
                  <!-- Buttons -->
                  <button type="submit" class="btn btn-primary">
                    Guardar
                  </button>
                  <a href="<?=base_url('sistema/usuarios')?>" class="btn btn-outline-secondary">
                    Cancelar
                  </a>
                <?=form_close()?>
              </div>
            </div>
            <!-- ========== /CONTENIDO ========== -->
          </div>
          <div class="col-12 col-12 col-lg-12 col-xl-12">
            <!-- ========== CONTENIDO ========== -->
            <div class="card">
              <div class="card-body">
                <!-- Form -->
                <?=form_open('sistema/usuarios_cambiarpass','',array('id_token' => $usuario->usuario_id))?>
                  <div class="form-group">
                    <label>
                      Contraseña
                    </label>
                    <input type="password" class="form-control" name="input_contrasenia" value="<?=set_value('input_contrasenia')?>">
                    <?=form_error('input_contrasenia')?>
                  </div>
                  <div class="form-group">
                    <label>
                      Repetir contraseña
                    </label>
                    <input type="password" class="form-control" name="input_repitcontrasenia" value="<?=set_value('input_repitcontrasenia')?>">
                    <?=form_error('input_repitcontrasenia')?>
                  </div>
                  <!-- Divider -->
                  <hr class="">
                  <!-- Buttons -->
                  <button type="submit" class="btn btn-primary">
                    Actualizar contraseña
                  </button>
                <?=form_close()?>
              </div>
            </div>
            <!-- ========== /CONTENIDO ========== -->
          </div>
        </div> <!-- / .row -->
      </div>
    </div> <!-- / .main-content -->

    <!-- ========== Base JS ========== -->
    <?=$this->load->view('includes/base_js','',TRUE)?>
    <!-- ========== /Base JS ========== -->

  </body>
</html>