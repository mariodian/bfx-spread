<?php

$config = array();

$config['bfx_api_key'] = '<api key>';
$config['bfx_api_secret'] = '<api secret>';

$config['bithumb_api_key'] = '<api key>';
$config['bithumb_api_secret'] = '<api secret>';

$config['kraken_api_key'] = '<api key>';
$config['kraken_api_secret'] = '<api secret>';

$markets = array(
  0 => array(
    'name' => 'Bitfinex',
    'symbol' => 'bfx'
  ),
  array(
    'name' => 'Kraken',
    'symbol' => 'kraken'
  ),
  array(
    'name' => 'Bithumb',
    'symbol' => 'bithumb'
  )
);

$currencies = array(
  'btc' => array(
    'bfx' => array(
      'pair' => 'btcusd'
    ),
    'kraken' => array(
      'pair' => 'XXBTZUSD'
    ),
    'bithumb' => array(
      'pair' => 'btc'
    ),
  ),
  'ltc' => array(
    'bfx' => array(
      'pair' => 'ltcusd'
    ),
    'kraken' => array(
      'price' => 0,
      'pair' => 'XLTCZUSD'
    ),
    'bithumb' => array(
      'pair' => 'ltc'
    ),
  ),
  'eth' => array(
    'bfx' => array(
      'pair' => 'ethusd'
    ),
    'kraken' => array(
      'pair' => 'XETHZUSD'
    ),
    'bithumb' => array(
      'pair' => 'eth'
    ),
  ),
  'etc' => array(
    'bfx' => array(
      'pair' => 'etcusd'
    ),
    'kraken' => array(
      'pair' => 'XETCZUSD'
    ),
    'bithumb' => array(
      'pair' => 'etc'
    ),
  ),
  'dash' => array(
    'bfx' => array(
      'pair' => 'dshusd'
    ),
    'kraken' => array(
      'pair' => 'DASHUSD'
    ),
    'bithumb' => array(
      'pair' => 'dash'
    ),
  ),
  'xmr' => array(
    'bfx' => array(
      'pair' => 'xmrusd'
    ),
    'kraken' => array(
      'pair' => 'XXMRZUSD'
    ),
    'bithumb' => array(
      'pair' => 'xmr'
    ),
  ),
  'zec' => array(
    'bfx' => array(
      'pair' => 'zecusd'
    ),
    'kraken' => array(
      'pair' => 'XZECZUSD'
    ),
    'bithumb' => array(
      'pair' => 'zec'
    ),
  ),
);
