<?php

require_once('config.php');

$data = array(
  'result' => array()
);

if (isset($_GET['market'])) {

  switch ($_GET['market']) {
    case 'bfx':
      require_once('libs/Bitfinex.php');

      $bfx = new Bitfinex($config['bfx_api_key'], $config['bfx_api_secret']);

      foreach ($currencies as $cur_key => $cur_value) {
        $ticker = $bfx->get_ticker($cur_value['bfx']['pair']);
        $data['result'][$cur_key]['symbol'] = $cur_key;
        $data['result'][$cur_key]['price'] = (double) $ticker['last_price'];
      }

      break;

    case 'kraken':
      require_once('libs/Kraken.php');

      $kraken = new \Payward\KrakenAPI($config['kraken_api_key'], $config['kraken_api_secret'], 'https://api.kraken.com', 0, FALSE);

      $comma_pairs = '';
      foreach ($currencies as $currency) {
        $comma_pairs .= $currency['kraken']['pair'] . ',';
      }
      $comma_pairs = rtrim($comma_pairs, ',');

      $result = $kraken->QueryPublic('Ticker', array('pair' => $comma_pairs));

      foreach ($result as $tickers) {
        foreach ($tickers as $name => $value) {
          foreach ($currencies as $cur_key => $cur_value) {
            if ($name === $cur_value['kraken']['pair']) {
              $data['result'][$cur_key]['symbol'] = $cur_key;
              $data['result'][$cur_key]['price'] = (double) $value['c'][0];
            }
          }
        }
      }

      break;

    case 'bithumb':
      require_once('libs/Bithumb.php');

      $bithumb = new Bithumb($config['bithumb_api_key'], $config['bithumb_api_secret']);

      foreach ($currencies as $cur_key => $cur_value) {
        $ticker = $bithumb->apiCall("/public/ticker/{$cur_value['bithumb']['pair']}");

        $data['result'][$cur_key]['symbol'] = $cur_key;
        $data['result'][$cur_key]['price'] = (double) $ticker->data->buy_price / 1000;
      }

      break;

    default:
      # code...
      break;
  }
}

header('Content-Type: application/json');

echo json_encode($data);

?>
