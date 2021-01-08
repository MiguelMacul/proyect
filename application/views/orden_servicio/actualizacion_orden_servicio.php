
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
                        <?=form_open('orden_servicio/orden_servicio_actualizacion/'.$codigo)?>

                      <div class="row">
                    <div class="col-12 col-md-6">
                      <div class="form-group">
                        <label>
                          Orden de servicio compra
                        </label>
                        <select class="form-control" name="ordenes_servicio_compras">
                                  <option>...</option>
                                 <?php
                                       foreach($ordenes_compra as $key => $datos){
                                            echo "<option value=".$datos->Id_compras.">".$datos->Id_compras."</option>";
                                           
                                        }
                                 ?>
						  </select>
                            <?=form_error('input_clave')?> 
                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="form-group">
                        <label>
                          Status
                        </label>
                        <input type="text" class="form-control" name="ordenes_servicio_status" value="<?php echo $cotizacion->Estatus; ?>">
                            <?=form_error('input_cliente')?>
                      </div>
                    </div>
                  </div>
                        

                        <div class="row">
                    <div class="col-12 col-md-6">
                      <div class="form-group">
                        <label>
                          Inventario
                        </label>
                        <select class="form-control" name="ordenes_servicio_inventario">
                                  <option>...</option>
                                 <?php
                                       foreach($inventario as $key => $datos){
                                            echo "<option value=".$datos->id_inventario.">".$datos->Marca	."</option>";
                                           
                                        }
                                 ?>
						  </select>
                            <?=form_error('input_clave')?> 
                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="form-group">
                        <label>
                          Fecha servicio
                        </label>
                        <input type="date" class="form-control" name="ordenes_servicio_fecha" value="<?php echo $cotizacion->Fecha_servicio; ?>">
                            <?=form_error('input_cliente')?>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 col-md-6">
                      <div class="form-group">
                       <label>
                          Usuario
                        </label>
                        <select class="form-control" name="ordenes_servicio_usuario">
                                  <option>...</option>
                                 <?php
                                       foreach($usuarios as $key => $datos){
                                            echo "<option value=".$datos->usuario_id.">".$datos->email."</option>";
                                           
                                        }
                                 ?>
						  </select>
                            <?=form_error('input_clave')?> 
                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="form-group">
                        <label>
                          Empresa
                        </label>
                            <input type="text" class="form-control" name="ordenes_servicio_empresa" value="<?php echo $cotizacion->Empresa; ?>">
                            <?=form_error('input_subtotal')?>
                      </div>
                    </div>
                  </div>
                   
                        
                        <!-- Divider -->
                        <hr class="">

                        <!-- Buttons -->
                        <button type="submit" class="btn btn-primary">
                            Guardar
                        </button>
                        <a href="<?=base_url('orden_servicio/orden_servicio')?>" class="btn btn-outline-secondary">
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