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
                <?=form_open('sistema/modulos_editar/'.$modulo->modulo_id,'',array('id_token' => $modulo->modulo_id))?>
                  <div class="form-group">
                    <label>
                      Descripción del modulo
                    </label>
                    <input type="text" class="form-control" name="input_descripcion" value="<?=$modulo->descripcion?>">
                    <?=form_error('input_descripcion')?>
                  </div>

                  <div class="row">
                    <div class="col-12 col-md-6">
                      <div class="form-group">
                        <label>
                          Controlador
                        </label>
                        <input type="text" class="form-control form-control-lg text-muted" name="input_controlador" value="<?=$modulo->controlador?>" readonly>
                        <?=form_error('input_controlador')?>
                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="form-group">
                        <label>
                          Items en menu (separados por comas)
                        </label>
                        <input type="text" class="form-control form-control-lg" name="input_funciones" value="<?=$modulo->funciones?>">
                        <?=form_error('input_funciones')?>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>
                      Titulo en menu
                    </label>
                    <input type="text" class="form-control" name="input_titulo" value="<?=$modulo->titulo_menu?>">
                    <?=form_error('input_titulo')?>
                  </div>

                  <div class="row">
                    <div class="col-12 col-md-6">
                      
                      <div class="form-group">
                        <label class="mb-1">
                          Visible en menu
                        </label>
                        <small class="form-text text-muted">
                          Modulo visible en menu principal.
                        </small>
                        <div class="custom-control custom-switch">
                          <input type="checkbox" class="custom-control-input" id="switchOne" name="input_visible" <?=( $modulo->visible == 1 ) ? 'checked' : '' ?> >
                          <label class="custom-control-label" for="switchOne"></label>
                        </div>
                      </div>
            
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="form-group">
                        <label>
                          Icono en menu
                        </label>
                        <input type="text" class="form-control" name="input_icono" value="<?=$modulo->icono?>">
                        <?=form_error('input_icono')?>
                      </div>
                    </div>
                  </div> <!-- / .row -->
                  <!-- Divider -->
                  <hr class="">
                  <!-- Buttons -->
                  <button type="submit" class="btn btn-primary">
                    Guardar
                  </button>
                  <a href="<?=base_url('sistema/modulos')?>" class="btn btn-outline-secondary">
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