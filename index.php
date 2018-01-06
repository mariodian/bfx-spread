<?php

require_once('config.php');

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./assets/css/style.min.css">

    <title>Crypto spreads</title>
  </head>
  <body>
    <script>

    </script>
    <div class="container-fluid mt-4">
      <h1 class="float-left mb-5">Spread between crypto exchange markets</h1>


      <span class="float-right"><a class="btn btn-primary" id="js-refresh" href="#"><i class="fas fa-sync"></i></a></span>

      <table class="table table-striped">
        <thead>
          <tr>
            <th>Symbol</th>
          <?php foreach($markets as $key => $value) { ?>
            <th><?= $value['symbol'] === 'bfx' ? strtoupper($value['symbol']) : $value['name'] ?> price</th>
          <?php } ?>
          <?php for($i = 1; $i < count($markets); $i++) { ?>
            <th><?= strtoupper($markets[0]['symbol']) ?> vs <?= $markets[$i]['name'] ?> ($)</th>
          <?php } ?>
          <?php for($i = 1; $i < count($markets); $i++) { ?>
            <th><?= strtoupper($markets[0]['symbol']) ?> vs <?= $markets[$i]['name'] ?> (%)</th>
          <?php } ?>
          </tr>
        </thead>
        <tbody class="small">
          <?php foreach($currencies as $key => $value) { ?>
            <tr class="js-<?= $key ?>">
              <td><?= $key ?></td>
            <?php foreach($markets as $mKey => $mValue) { ?>
              <td class="js-price" id="js-price-<?= $key ?>-<?= $mValue['symbol']?>">Fetching...</td>
            <?php } ?>
            <?php for($i = 1; $i < count($markets); $i++) { ?>
              <td class="js-calc" id="js-diff-<?= $key ?>-<?= $markets[$i]['symbol']?>">Calculating...</td>
            <?php } ?>
            <?php for($i = 1; $i < count($markets); $i++) { ?>
              <td class="js-calc" id="js-diff-perc-<?= $key ?>-<?= $markets[$i]['symbol']?>">Calculating...</td>
            <?php } ?>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>

    <!-- Optional JavaScript -->
    <script src="./assets/js/jquery-3.2.1.min.js"></script>
    <script src="./assets/js/bootstrap.bundle.min.js"></script>
    <script src="./assets/js/main.min.js"></script>
  </body>
</html>
