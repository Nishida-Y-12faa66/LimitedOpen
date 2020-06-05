$(function(){
  $('#yes').click(function() {
    $("#min_price").css({
      
      "visibility": "inherit"
      
    });
  });

  $('#no').click(function() {
    $("#min_price").css({
      "visibility": "hidden"
      
    });
  });
});

$(function(){
  $('#input-label').click(function() {
    $(this).css({
      "background": "rgb(161, 248, 190)",
      "color": "rgb(26,0,29)"
    });
  });
});