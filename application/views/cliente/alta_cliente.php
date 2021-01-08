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
                        <?=form_open('Cliente/cliente_alta')?>                      

                        <div class="row">
                    <div class="col-12 col-md-6">
                      <div class="form-group">
                        <label>
                          Nombre
                        </label>
                        <input type="text" class="form-control" name="Cliente_nombre">
                            <?=form_error('input_nomcliente')?>
                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="form-group">
                        <label>
                          Apellidos
                        </label>
                        <input type="text" class="form-control" name="Cliente_apellidos" >
                            <?=form_error('input_apellidos')?>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>
                      Direccion
                    </label>
                    <input type="text" class="form-control" name="Cliente_direccion">
                    <?=form_error('direccionempleado')?>
                  </div>
                   
                  </div>
                        
                        <!-- Divider -->
                        <hr class="">

                        <!-- Buttons -->
                        <button type="submit" class="btn btn-primary">
                            Guardar
                        </button>
                        <a href="<?=base_url('Cliente/cliente')?>" class="btn btn-outline-secondary">
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