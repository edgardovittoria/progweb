<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="riepilogoOrdine.css">

    <title>Ordine</title>
  </head>
  <body>
    <div class="jumbotron jumbotron-fluid" id="header">
  <div class="container">
    <h1 class="display-4">TicketStore</h1>
    <!--<p class="lead">By people, for people</p>-->
  </div>
</div>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Home</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Eventi
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">Concerti</a>
              <a class="dropdown-item" href="#">Spettacoli</a>
              <a class="dropdown-item" href="#">Sport</a>
              <!--<div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>-->
          </li>
          <li class="nav-item">
              <a class="nav-link" href="../login.html">Accedi</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>

    <main>
        <div class="header-carrello">
            <h2>Carrello</h2>
        </div>
        <div class="container" id="carrello">
          <div class="container" id="box-img">
            <img src="../zoneEvento/Deep.jpg" class="img-fluid" alt="Responsive image" id="side-img">
          </div>  
            <ul id="dettagli">
                <li><h4>NomeEvento</h4></li>
                <li><h6>Data</h6></li>
                <li><h6>Città</h6></li>
                <li><h6>Struttura</h6></li>
                <li><h6>Via</h6></li>
                
            </ul>
              
            
        </div>
        {section name=nr loop=$results} 
        <div class="biglietti">
            <ul>
                    <li>Zona:{$results[nr].zona}</li>
                    <li>Posto:{$results[nr].posto}</li>
                    <li>Prezzo:{$results[nr].prezzo}</li>
                    <li><button type="button" class="btn btn-warning">X</button></li>    
            </ul>    
        </div>
        {/section}
    </main>
    <button type="button" class="btn btn-primary btn-lg" id="acquisto">Procedi all'acquisto</button>  

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  </body>
</html>