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
          <div class="col-12 col-lg-12 col-xl-12">
            <!-- ========== CONTENIDO ========== -->
            <div class="card">
                <div class="card-body">
                <!-- Form -->
                <?=form_open('sistema/grupos_agregar')?>
                  <div class="form-group">
                    <label>
                      Nombre del grupo
                    </label>
                    <input type="text" class="form-control" name="input_titulo" value="<?=set_value('input_titulo')?>">
                    <?=form_error('input_titulo')?>
                  </div>

                  <div class="form-group">
                    <label>
                      Descripción del grupo
                    </label>
                    <input type="text" class="form-control" name="input_descripcion" value="<?=set_value('input_descripcion')?>">
                    <?=form_error('input_descripcion')?>
                  </div>

                  <div class="form-group">
                    <label>
                      Modulos permitidos para el grupo
                    </label>
                    <select class="form-control" data-toggle="select" multiple name="input_modulos[]">
                      <?php foreach ($modulos as $key => $modulo) { ?>
                        <option value="<?=$modulo->modulo_id?>"><?=$modulo->descripcion?></option>
                      <?php } ?>
                    </select>
                    <?=form_error('input_modulos[]')?>
                  </div>

                  <!-- Divider -->
                  <hr class="">
                  <!-- Buttons -->
                  <button type="submit" class="btn btn-primary">
                    Guardar
                  </button>
                  <a href="<?=base_url('sistema/grupos')?>" class="btn btn-outline-secondary">
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