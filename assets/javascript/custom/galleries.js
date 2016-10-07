$(function() {
  var authors = [];
  var language = window.location.pathname.split('/')[1];
  var photoText = 'Foto';
  var photographersText = 'Fotógrafos: ';
  var allCategoryLabel = 'Todos';
  if(language === 'en') {
    photoText = 'Photo';
    photographersText = 'Photographers: ';
    allCategoryLabel = 'All';
    $('input[name="FNAME"]').attr('placeholder', 'Name');
    $('input[value="Suscribirse"]').val('Subscribe');
  }
  revapi1.bind("revolution.slide.onloaded",function (e) {
    var list = $('.tp-revslider-mainul');
    var items = list.children().children().comments();
    $.each(items, function(index, value) {
      var el = $(value);
      var img = $(el[0].lastChild);
      authors.push({ name: img.attr('title'), email: img.attr('alt') });
    });
    if(language === 'en') {
      $('.dona-hoy-img img').attr('src', '/wp-content/themes/los-lobos/assets/images/dona-en.png');
    }
  });

  revapi1.bind("revolution.slide.onchange",function (e,data) {
    var authorName = $('#slider-author-name');
    if(authorName.length > 0) {
      authorName.html(photoText + ': ' + authors[data.slideLIIndex].name);
    }
    if(language === 'en') {
      $('.dona-hoy-img img').attr('src', '/wp-content/themes/los-lobos/assets/images/dona-en.png');
    }
  });

  $('.grid-gallery-photos').ready(function() {
    $('.grid-gallery-photos').masonry({
      columnWidth: 200,
      itemSelector: '.crop'
    });
  });

  var gallery = $('.grid-gallery-nav');
  if(typeof gallery !== 'undefined') {
    gallery.prepend('<span id="photographers-label">'+photographersText+'</span>');
    $('a[data-tag="__all__"]').text(allCategoryLabel);
  }
  var pEmail = getParameterByName('w');

  if(pEmail !== null) {
    pEmail = pEmail.split('-');
    pEmail = pEmail[0] + '@' + pEmail[1] + '.' + pEmail[2];
    $('.photographer-email input[type=text]').val(pEmail);
  }

});

function getParameterByName(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}
