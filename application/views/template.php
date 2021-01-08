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
            <div class="card">
              <div class="card-header">
                <div class="row align-items-center">
                  <div class="col">
                    <!-- Title -->
                    <h4 class="card-header-title">
                      Header de box
                    </h4>
                  </div>
                  <div class="col-auto">
                    <!-- Button -->
                    <a href="#!" class="btn btn-sm btn-white">
                      Boton de ejemplo
                    </a>
                  </div>
                </div> <!-- / .row -->
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-12 col-xl-10">
                    <!-- Title -->
                    <h2 class="mb-2">
                      Esto es un ejemplo de sección
                    </h2>
                    <!-- Content -->
                    <p class="text-muted">
                      Es importante utilizar esta estructura para las diferentes secciones a integrar.
                    </p>
                    <!-- Button -->
                    <a href="#!" class="btn btn-primary">
                      Boton
                    </a>
                  </div>
                </div>
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