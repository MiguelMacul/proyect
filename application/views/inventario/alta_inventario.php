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
                        <?=form_open('Inventario/inventario_alta')?>                      

                        <div class="row">
                    <div class="col-12 col-md-6">
                      <div class="form-group">
                        <label>
                          Nombre
                        </label>
                        <input type="text" class="form-control" name="inventario_nombre" value="<?=set_value('input_clave')?>">
                            <?=form_error('input_clave')?>
                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="form-group">
                        <label>
                          Marca
                        </label>
                        <input type="text" class="form-control" name="inventario_marca" value="<?=set_value('input_clave')?>">
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
                        <input type="text" class="form-control" name="inventario_modelo" value="<?=set_value('input_clave')?>">
                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="form-group">
                        <label>
                          Numero de serie
                        </label>
                            <input type="text" class="form-control" name="inventario_serie" value="<?=set_value('input_subtotal')?>">
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
                            <input type="text" class="form-control" name="inventario_descripcion" value="<?=set_value('input_entrega')?>">
                            <?=form_error('input_entrega')?>
                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="form-group">
                        <div class="form-group">
                       
                        <small class="form-text text-muted">
                         Estado
                        </small>
                        <div class="custom-control custom-switch">
                          <input type="checkbox" class="custom-control-input" id="switchOne"  value="activo" name="inventario_estado">
                          <label class="custom-control-label" for="switchOne"></label>
                        </div>
                      </div>
                      </div>
                    </div>
                    <div class="row">
                    <div class="col-12 col-md-6">
                      <div class="form-group">
                        <label>
                          Fecha de ingreso
                        </label>
                        <input type="date" class="form-control" name="inventario_fecha" value="<?=set_value('input_clave')?>">
                            <?=form_error('input_clave')?>
                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="form-group">
                        <label>
                          Hora de ingreso
                        </label>
                        <input type="time" class="form-control" name="inventario_hora" value="<?=set_value('input_clave')?>">
                            <?=form_error('input_cliente')?>
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
                        <a href="<?=base_url('cotizacion/cotizacion')?>" class="btn btn-outline-secondary">
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