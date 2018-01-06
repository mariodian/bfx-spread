$(document).ready(function(){
  var dataLoaded = new Array();

  dataLoaded['bfx'] = false;
  dataLoaded['kraken'] = false;
  dataLoaded['bithumb'] = false;

  var setDiff = function(market, crypto) {
    if (dataLoaded['bfx']) {
      var selectedMarket = null;

      if (dataLoaded['kraken'] && market === 'kraken') {
        var selectedMarket = 'kraken';
      }
      if (dataLoaded['bithumb'] && market === 'bithumb') {
        var selectedMarket = 'bithumb';
      }

      if (selectedMarket !== 'null') {
        var priceBfx = parseFloat($('#js-price-' + crypto + '-bfx').text().substr(1)),
            priceOther = parseFloat($('#js-price-' + crypto + '-' + selectedMarket).text().substr(1)),
            diff = parseFloat(Math.abs(priceBfx - priceOther)),
            diffPerc = parseFloat((diff / (priceBfx > priceOther ? priceOther : priceBfx)) * 100);

        $('#js-diff-' + crypto + '-' + selectedMarket).text('$' + diff.toFixed(2));
        $('#js-diff-perc-' + crypto + '-' + selectedMarket).text(diffPerc.toFixed(2) + '%');
      }

      if (dataLoaded['bfx'] && dataLoaded['kraken'] && dataLoaded['bithumb']) {
        $('#js-refresh').find('.fas').removeClass('fa-spin');
      }
    }
  }

  var loadData = function() {
    dataLoaded['bfx'] = false;
    dataLoaded['kraken'] = false;
    dataLoaded['bithumb'] = false;

    $.ajax({
      url: './data.php',
      dataType: 'json',
      data: {
        market: 'bfx'
      },

      success: function(data) {
        dataLoaded['bfx'] = true;

        var results = data.result;

        if (results != 'null') {
          for (var key in results) {
            if (results.hasOwnProperty(key)) {
              $('#js-price-' + key + '-bfx').text('$' + results[key]['price'].toFixed(2));
              // console.log(key + ": " + results[key]['price']);

              setDiff('kraken', key);
              setDiff('bithumb', key);
            }
          }
        }
      }
    });

    $.ajax({
      url: './data.php',
      dataType: 'json',
      data: {
        market: 'kraken'
      },

      success: function(data) {
        dataLoaded['kraken'] = true;

        var results = data.result;

        if (results != 'null') {
          for (var key in results) {
            if (results.hasOwnProperty(key)) {
              $('#js-price-' + key + '-kraken').text('$' + results[key]['price'].toFixed(2));
              // console.log(key + ": " + results[key]['price']);

              setDiff('kraken', key);
            }
          }
        }
      }
    });

    $.ajax({
      url: './data.php',
      dataType: 'json',
      data: {
        market: 'bithumb'
      },

      success: function(data) {
        dataLoaded['bithumb'] = true;

        var results = data.result;

        if (results != 'null') {
          for (var key in results) {
            if (results.hasOwnProperty(key)) {
              $('#js-price-' + key + '-bithumb').text('$' + results[key]['price'].toFixed(2));

              setDiff('bithumb', key);
            }
          }
        }
      }
    });
  }

  loadData();

  $('#js-refresh').click(function(event){
    event.preventDefault();

    $(this).find('.fas').addClass('fa-spin');

    $('.js-price').text('Fetching...');
    $('.js-calc').text('Calculating...');

    loadData();
  });
});
