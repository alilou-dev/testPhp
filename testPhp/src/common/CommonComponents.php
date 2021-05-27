<?php
class CommonComponents
{
  public static function render(string $component, $withNavbar = true) {
    $head = self::htmlHeadComponent();
    $navbar = $withNavbar ? self::navbar() : '';
    $scripts = self::scripts();

    echo <<<HTML
      <!doctype html>
      <html lang="fr">
      <head>
        $head
      </head>
      
      <body style="background: #AAB6B6">
      
      $navbar
      
      <main role="main" class="container py-4 mt-5">
        $component
      </main>
      
      $scripts
      </body>
      </html>
HTML;
  }

  private static function htmlHeadComponent(): string
  {
    return <<<HTML
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      
      <title>SystèmeDeGestionDenotes </title>
      
      <link rel="stylesheet"
            href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
            crossorigin="anonymous">
HTML;
  }
  //<nav class="navbar navbar-expand-lg navbar-dark bg-success">
  private static function navbar(): string
  {
    return <<<HTML
     <nav class="navbar navbar-expand-md fixed-top navbar-dark bg-dark">
      <a class="navbar-brand" href="../film/index.php"> Accueil </a> 
      <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="/testPhp/src/index.php">Liste Étudiants <span class="sr-only">(current)</span></a>
          </li>
      </div>   
    </nav>
     
HTML;
  }

  private static function scripts(): string
  {
    return <<<HTML
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"
              integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
              integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>       
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
              integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

HTML;
  }
}
