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
                        <?=form_open('compra/compra_alta')?>

                      <div class="row">
                    <div class="col-12 col-md-6">
                      <div class="form-group">
                        <label>
                          Nombre
                        </label>
                        <input type="text" class="form-control" name="Nombre" value="<?=set_value('input_clave')?>">
                            <?=form_error('input_nom')?>
                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="form-group">
                        <label>
                          RFC
                        </label>
                        <input type="text" class="form-control" name="RFC" value="<?=set_value('input_clave')?>">
                            <?=form_error('input_ap')?>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 col-md-6">
                      <div class="form-group">
                        <label>
                         Telefono
                        </label>
                        <input type="text" class="form-control" name="Telefono" value="<?=set_value('input_clave')?>">
                            <?=form_error('input_am')?>
                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="form-group">
                        <label>
                          Fax
                        </label>
                        <input type="text" class="form-control" name="Fax" value="<?=set_value('input_clave')?>">
                            <?=form_error('input_rfc')?>
                      </div>
                    </div>
                  </div>
                
                        <div class="row">
                    <div class="col-12 col-md-6">
                      <div class="form-group">
                        <label>
                          Catalogo
                        </label>
                        <input type="tel" class="form-control" name="Catalogo" value="<?=set_value('input_clave')?>">
                            <?=form_error('input_tel')?>
                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="form-group">
                        <label>
                          Direcciones
                        </label>
                        <input type="text" class="form-control" name="Direcciones" value="<?=set_value('input_clave')?>">
                            <?=form_error('input_fax')?>
                      </div>
                    </div>
                  </div>
                   <!-- Divider -->
                        <hr class="">
                        <h3>
                          Datos de contacto
                        </h3>
                   
                    <div class="row">
                    <div class="col-12 col-md-6">
                      <div class="form-group">
                        <label>
                          Nombre
                        </label>
                        <input type="text" class="form-control" name="Nombre_contacto" value="<?=set_value('input_clave')?>">
                            <?=form_error('input_nom')?>
                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="form-group">
                        <label>
                          Telefono
                        </label>
                        <input type="text" class="form-control" name="Telefono_contacto" value="<?=set_value('input_clave')?>">
                            <?=form_error('input_ap')?>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 col-md-6">
                      <div class="form-group">
                        <label>
                         Correo
                        </label>
                        <input type="text" class="form-control" name="correo_contacto" value="<?=set_value('input_clave')?>">
                            <?=form_error('input_am')?>
                      </div>
                    </div>
                  </div>    
                        <!-- Divider -->
                        <hr class="">

                        <!-- Buttons -->
                        <button type="submit" class="btn btn-primary">
                            Guardar
                        </button>
                        <a href="<?=base_url('compra/compra')?>" class="btn btn-outline-secondary">
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