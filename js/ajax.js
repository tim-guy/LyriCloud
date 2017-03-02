$(function(){
  $('#submitButton').on('click', function(e){
    $.ajax({
      url: "php/getWordCloud.php",
      type: 'post',
      data: {
        'action': 'search',
        'artistName': $('#inputBox').val()
      },
      success: function(data, status){ 
        $('#shareToFacebookButton').attr("disabled", false);
        $('#addMoreButton').attr("disabled", false);
        $('#cloudPane').show();
      }
    });
  });

  $('#shareToFacebookButton').on('click', function(e){
  });

  $('#addMoreButton').on('click', function(e){
  });


  $("#cloudPane").click(function(){
    $.ajax({
      type: "post",
      url: "getCloud.php",
      data: {
        prev: $('#prevText').text(),
        name: $('#inputBox').val()
      },
      success: function(msg){
        $('#cloudBox').html(msg);
      }
    });
  });
});