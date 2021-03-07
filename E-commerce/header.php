<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">

  <?php
      require ('./function.php');
    ?>
  </head>
<body>
    <header id="header">
        <nav class="navbar navbar-expand-md navbar-light">
            <div class="container-fluid">
              <a class="navbar-brand text-white" href="./index.php">E-Commerce</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menuBar" aria-controls="menuBar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="menuBar">
                <ul class="navbar-nav m-auto">
                  <li class="nav-item">
                    <a class="nav-link text-white active"href="./index.php">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-white" href="#">Category</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-white" href="#">Account</a>
                  </li>
                </ul>
                <form action="#">
                    <a href="./cart.php" class="py-2 rounded-pill bg-dark">
                        <span class="px-2 text-white"><i class="fas fa-shopping-cart"></i></span>
                        <span class="px-3 py-2 text-dark bg-light rounded-pill">
                          <?php echo count($product->getData('cart')); ?>
                        </span>
                    </a>
                </form>
              </div>
            </div>
          </nav>
    </header>

    <main id="main-site">