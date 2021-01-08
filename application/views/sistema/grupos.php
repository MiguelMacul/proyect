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
          <div class="col-12">
            
            <!-- ========== CONTENIDO ========== -->
            <div id="test-list" class="card" data-toggle="lists" data-options='{"valueNames": ["grupo-nombre","grupo-descripcion","grupo-modulos"],"page":10,"pagination":"true"}'>
              <div class="card-header">
                <div class="row align-items-center">
                  <div class="col">
                    <!-- Title -->
                    <h4 class="card-header-title">
                      Lista de Grupos
                    </h4>
                  </div>
                  <div class="col-auto">
                    <!-- Dropdown -->
                    <div class="dropdown">
                      <!-- Toggle -->
                      <a href="#" class="small text-muted dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        Ordenar información
                      </a>
                      <!-- Menu -->
                      <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 20px, 0px);">
                        <a class="dropdown-item sort" data-sort="grupo-nombre" href="#!">
                          Asc
                        </a>
                        <a class="dropdown-item sort" data-sort="grupo-nombre" href="#!">
                          Desc
                        </a>
                      </div>
                    </div>
                  </div>
                  <div class="col-auto">
                    <!-- Button -->
                    <a href="<?=base_url('sistema/grupos_agregar')?>"class="btn btn-primary btn-sm">
                      Agregar grupo
                    </a>
                  </div>
                </div> <!-- / .row -->
              </div>
              <div class="card-header">
                <div class="row align-items-center">
                  <div class="col">
                    <!-- Search -->
                    <form class="row align-items-center">
                      <div class="col-auto pr-0">
                        <span class="fe fe-search text-muted"></span>
                      </div>
                      <div class="col">
                          <input type="search" class="form-control form-control-flush search" placeholder="Buscar...">
                      </div>
                    </form>
                  </div>
                </div> <!-- / .row -->
              </div>
              <div class="table-responsive">
                <table class="table table-sm table-nowrap card-table">
                  <thead>
                    <tr>
                      <th>
                        <div class="custom-control custom-checkbox table-checkbox">
                          <input type="checkbox" class="custom-control-input" name="ordersSelect" id="ordersSelectAll">
                          <label class="custom-control-label" for="ordersSelectAll">
                            &nbsp;
                          </label>
                        </div>
                      </th>
                      <th>
                        <a href="#" class="text-muted sort" data-sort="grupo-nombre">
                          Nombre del grupo
                        </a>
                      </th>
                      <th>
                        <a href="#" class="text-muted sort" data-sort="grupo-descripcion">
                          Descripción
                        </a>
                      </th>
                      <th>
                        <a href="#" class="text-muted sort" data-sort="grupo-modulos">
                          Modulos pemitidos
                        </a>
                      </th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody class="list">
                    <?php foreach ($grupos as $key => $grupo) { ?>
                      <tr>
                        <td>
                          <div class="custom-control custom-checkbox table-checkbox">
                            <input type="checkbox" class="custom-control-input" name="ordersSelect" id="ordersSelectOne">
                            <label class="custom-control-label" for="ordersSelectOne">
                              &nbsp;
                            </label>
                          </div>
                        </td>
                        <td class="grupo-nombre">
                          <?=$grupo->titulo?>
                        </td>
                        <td class="grupo-descripcion">
                          <?=$grupo->descripcion?>
                        </td>
                        <td class="grupo-modulos">
                          <?php foreach ($grupo->modulos as $keyy => $modulo) {
                            echo '<span class="badge badge-soft-secondary">'.$modulo->titulo_menu.'</span> ';
                          }?>
                        </td>
                        <td class="text-right">
                          <div class="dropdown">
                            <a href="#" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="fe fe-more-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                              <a href="<?=base_url('sistema/grupos_editar/'.$grupo->grupo_id)?>" class="dropdown-item">
                                Editar
                              </a>
                              <a href="<?=base_url('sistema/grupo_eliminar/'.$grupo->grupo_id)?>" class="dropdown-item">
                                Eliminar
                              </a>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <?php } ?>
                  </tbody>
                    <tfoot>
                      <tr>
                        <td colspan="5">
                          <ul class="pagination"></ul>
                        </td>
                      </tr>
                    </tfoot>
                </table>
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