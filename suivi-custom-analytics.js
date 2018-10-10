
window._strk = window._strk || [];
_strk.push(function(){
  $('.s-image, .s-media').click(function(){
    var href = $(this).attr('href');
    console.log('Tracking ' + href);
    if (window._gaq) {
      window._gaq.push('_trackEvent', 'Image', 'Click', href);
    }
    if (window.ga) {
      window.ga('send', 'event', 'Image', 'Click', href);
    }
  });
});

