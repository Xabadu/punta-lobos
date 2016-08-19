$(function() {
  var authors = [];
  revapi1.bind("revolution.slide.onloaded",function (e) {
    var list = $('.tp-revslider-mainul');
    var items = list.children().children().comments();
    $.each(items, function(index, value) {
      var el = $(value);
      var img = $(el[0].lastChild);
      authors.push({ name: img.attr('title'), email: img.attr('alt') });
    });

  });

  revapi1.bind("revolution.slide.onchange",function (e,data) {
    var authorName = $('#footer-author-name');
    if(authorName.length > 0) {
      authorName.html('Foto: ' + authors[data.slideLIIndex].name);
    }
  });

});
