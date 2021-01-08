
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
                        <?=form_open('inventario/inventario_actualizar/'.$cotizacion->Idcotizacion)?>

                      <div class="row">
                    <div class="col-12 col-md-6">
                      <div class="form-group">
                        <label>
                          Fecha de ingreso
                        </label>
                        <input type="date" class="form-control" name="input_clave" value="<?=set_value('input_clave')?>">
                            <?=form_error('input_clave')?>
                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="form-group">
                        <label>
                          Hora de ingreso
                        </label>
                        <input type="time" class="form-control" name="input_clave" value="<?=set_value('input_clave')?>">
                            <?=form_error('input_cliente')?>
                      </div>
                    </div>
                  </div>
                        

                        <div class="row">
                    <div class="col-12 col-md-6">
                      <div class="form-group">
                        <label>
                          Nombre
                        </label>
                        <input type="text" class="form-control" name="input_clave" value="<?=set_value('input_clave')?>">
                            <?=form_error('input_clave')?>
                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="form-group">
                        <label>
                          Marca
                        </label>
                        <input type="text" class="form-control" name="input_clave" value="<?=set_value('input_clave')?>">
                            <?=form_error('input_cliente')?>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 col-md-6">
                      <div class="form-group">
                       <label>
                          Modelo
                        </label>
                        <input type="text" class="form-control" name="input_clave" value="<?=set_value('input_clave')?>">
                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="form-group">
                        <label>
                          Numero de serie
                        </label>
                            <input type="text" class="form-control" name="input_subtotal" value="<?=set_value('input_subtotal')?>">
                            <?=form_error('input_subtotal')?>
                      </div>
                    </div>
                  </div>
                   <div class="row">
                    <div class="col-12 col-md-6">
                      <div class="form-group">
                       <label>
                          Descripción
                        </label>
                            <input type="text" class="form-control" name="input_entrega" value="<?=set_value('input_entrega')?>">
                            <?=form_error('input_entrega')?>
                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="form-group">
                        <div class="form-group">
                        <label class="mb-1">
                          Visible en menu
                        </label>
                        <small class="form-text text-muted">
                          Activo encender.
                        </small>
                        <div class="custom-control custom-switch">
                          <input type="checkbox" class="custom-control-input" id="switchOne" name="input_visible">
                          <label class="custom-control-label" for="switchOne"></label>
                        </div>
                      </div>
                      </div>
                    </div>
                  </div>
                        
                        <!-- Divider -->
                        <hr class="">

                        <!-- Buttons -->
                        <button type="submit" class="btn btn-primary">
                            Guardar
                        </button>
                        <a href="<?=base_url('inventario/inventario')?>" class="btn btn-outline-secondary">
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