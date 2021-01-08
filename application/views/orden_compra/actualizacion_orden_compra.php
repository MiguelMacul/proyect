
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
                        <?=form_open('orden_compra/orden_compra_actualizacion/'.$codigo)?>

                      <div class="row">
                    <div class="col-12 col-md-6">
                      <div class="form-group">
                        <label>
                          Usuario
                        </label>
                        <select  class="form-control" name="usuario"> 
							<option>...</option>
						  	 <?php
                                       foreach($usuarios as $key => $datos){
                                            echo "<option value=".$datos->usuario_id.">".$datos->email."</option>";
                                           
                                        }
                                 ?>
						  
						  </select>
                            <?=form_error('input_cliente')?>
                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="form-group">
                        <label>
                          Compra
                        </label>
                        <select class="form-control" name="compras"> 
							<option>...</option>
						  	 <?php
                                       foreach($compras as $key => $datos){
                                            echo "<option value=".$datos->Id_compras.">".$datos->RFC."</option>";
                                           
                                        }
                                 ?>
						  </select>
                            <?=form_error('input_clave')?>
                      </div>
                    </div>
                  </div>
                        

                        <div class="row">
                    <div class="col-12 col-md-6">
                     <div class="form-group">
                        <label>
                          Referencia
                        </label>
                        <input type="text" class="form-control" name="orden_compra_referencia" value="<?php echo $cotizacion->Referencia; ?>">
                            <?=form_error('input_cliente')?>
                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="form-group">
                       <label>
                          Total
                        </label>
                        <input type="number" class="form-control" name="orden_compra_Total" value="<?php echo $cotizacion->Total; ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 col-md-6">
                      <div class="form-group">
                       <label>
                          Fecha de orden de compra
                        </label>
                        <input type="date" class="form-control" name="orden_compra_fecha" value="<?php echo $cotizacion->Fecha_orden; ?>">
                      </div>
						
                    </div>
					  <div class="col-12 col-md-6">
					  <div class="form-group">
                       <label>
                          Status
                        </label>
                            <input type="text" class="form-control" name="orden_compra_estatus"  value="<?php echo $cotizacion->Estatus; ?>">
                            <?=form_error('input_status')?>
                      </div>
                    </div>
						</div>
                        
                        <!-- Divider -->
                        <hr class="">

                        <!-- Buttons -->
                        <button type="submit" class="btn btn-primary">
                            Guardar
                        </button>
                        <a href="<?=base_url('orden_compra/orden_compra')?>" class="btn btn-outline-secondary">
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