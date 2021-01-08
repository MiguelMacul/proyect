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
                <?=form_open('sistema/usuarios_agregar')?>
                  <div class="form-group">
                    <label>
                      Correo electrónico
                    </label>
                    <input type="email" class="form-control" name="input_correo" value="<?=set_value('input_correo')?>">
                    <?=form_error('input_correo')?>
                  </div>

                  <div class="row">
                    <div class="col-12 col-md-6">
                      <div class="form-group">
                        <label>
                          Nombre
                        </label>
                        <input type="text" class="form-control form-control-lg" name="input_nombre" value="<?=set_value('input_nombre')?>">
                        <?=form_error('input_nombre')?>
                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="form-group">
                        <label>
                          Apellidos
                        </label>
                        <input type="text" class="form-control form-control-lg" name="input_apellidos" value="<?=set_value('input_apellidos')?>">
                        <?=form_error('input_apellidos')?>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label>
                      Grupos de trabajo
                    </label>
                    <select class="form-control" data-toggle="select" multiple name="input_grupos[]">
                      <?php foreach ($grupos as $key => $grupo) { ?>
                        <option value="<?=$grupo->grupo_id?>"><?=$grupo->titulo?></option>
                      <?php } ?>
                    </select>
                    <?=form_error('input_grupos[]')?>
                  </div>

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
                          <input type="checkbox" class="custom-control-input" id="switchOne" name="input_admin">
                          <label class="custom-control-label" for="switchOne"></label>
                        </div>
                      </div>
                      
                    </div>
                    <div class="col-12 col-md-6">

                      <!-- Warning -->
                      <div class="card bg-light border">
                        <div class="card-body">
                          
                          <h4 class="mb-2">
                            <i class="fe fe-alert-triangle"></i> Warning
                          </h4>

                          <p class="small text-muted mb-0">
                            Once a project is made private, you cannot revert it to a public project.
                          </p>

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
        </div> <!-- / .row -->
      </div>
    </div> <!-- / .main-content -->

    <!-- ========== Base JS ========== -->
    <?=$this->load->view('includes/base_js','',TRUE)?>
    <!-- ========== /Base JS ========== -->

  </body>
</html>