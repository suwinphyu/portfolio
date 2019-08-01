/**
 * Created with IntelliJ IDEA.
 * User: eperreau
 * Date: 13/09/13
 * Time: 14:42
 * To change this template use File | Settings | File Templates.
 */
function delete_elizaibot_cookie(name, path, domain) {
  //if (Get_Cookie(name))
    document.cookie = name + "=" + ((path) ? ";path=" + path : "") + ((domain) ? ";domain=" + domain : "") +
                      ";expires=Thu, 01 Jan 1970 00:00:01 GMT";
}

jQuery(document).ready(function($) {

  var elizaibotreload=0

  if(elizaibotreload==0){
    elizaibotreload=1;
    $('#conversation').animate({scrollTop: $('#conversation').prop("scrollHeight")},
            $('#conversation').height());
  }


  $('.clearconversation').click(function(e){
    e.preventDefault();
   // document.cookie = 'ELIZAIBOT_CONVERSATION' + '=; expires=Thu, 01-Jan-70 00:00:01 GMT;';
    delete_elizaibot_cookie('ELIZAIBOT_CONVERSATION', "/","");
    $('#conversation').html('');
  });


  $('#elizaibotform').submit(function(e) {
    e.preventDefault();
    user = $('#elizaibotsay').val();
    var baseurl = $('#pluginbase').val();
    if (user == "") {
      return;
    }
    botname = "Bot";
    $('#conversation').append("<div class='response'>"+
                              "<div class='usersay'><span class='whosay'>You:</span>"+
                              "<span class='yourresponse'>" + user + "</span>"+
                              "</div>"+
                              "</div>");

    $('#conversation').animate({scrollTop: $('#conversation').prop("scrollHeight")},
            $('#conversation').height());
    formdata = $("#elizaibotform").serialize();
    $('#elizaibotsay').val('')
    $('#elizaibotsay').focus();

    $.post(baseurl+'lib/chat.php', formdata, function(returnData) {
      var botsaid = "";
      botsaid = returnData;
      $('#conversation').append("<div class='response'>" +
                                "<div class='botsay'><span class='whosay'>Bot:</span>" +
                                "<span class='sayit'>" + botsaid + "</span></div></div>");
      $('#conversation').animate({scrollTop: $('#conversation').prop("scrollHeight")},
              $('#conversation').height());


      $('#conversation').animate({scrollTop: $('#conversation').prop("scrollHeight")},
            $('#conversation').height());

      return false;
     });
  });
});
