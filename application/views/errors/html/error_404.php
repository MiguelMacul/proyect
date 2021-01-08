<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <!-- Theme CSS -->
    <link rel="stylesheet" href="<?=$url?>assets/css/theme.css" id="stylesheetLight">
    <style>body { display: none; }</style>
    <title>Error</title>
  </head>
  <body class="d-flex align-items-center bg-auth border-top border-top-2 border-primary">
    <!-- CONTENT
    ================================================== -->
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-md-5 col-xl-4 my-5">
          <div class="text-center">
            <!-- Heading -->
            <h1 class="display-4 mb-3">
              <?php echo $heading; ?>
            </h1>

            <!-- Subheading -->
            <p class="text-muted mb-4">
              <?php echo $message; ?>
            </p>

            <!-- Button -->
            <a href="<?=$url?>" class="btn btn-lg btn-primary">
              Regresar al sitio
            </a>
          
          </div>

        </div>
      </div> <!-- / .row -->
    </div> <!-- / .container -->
  </body>
</html>