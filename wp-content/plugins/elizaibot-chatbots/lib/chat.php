<?php
define("ELIZAIBOT_CONVERSATION", "ELIZAIBOT_CONVERSATION");
error_reporting(0);
$convo_id = $_REQUEST['convo_id'];
$bot_id = $_REQUEST['bot_id'];
if ((isset($_REQUEST['elizaibotsay'])) && ($_REQUEST['elizaibotsay'] != '')) {
  $say = strip_tags($_REQUEST['elizaibotsay']);
}else{
  $say = "...";
  $botsay = "...";
}



if ($say != "...") {
  $say = urlencode($say);
  $botsay = "error";
  //make an xml request...
  $request_url = "http://api.program-o.com/v2.3.1/chatbot/conversation_start.php?say=$say&convo_id=$convo_id&bot_id=$bot_id&format=xml";
  if(function_exists(simplexml_load_file)){
    $conversation = simplexml_load_file($request_url, "SimpleXmlElement",LIBXML_NOERROR+LIBXML_ERR_FATAL+LIBXML_ERR_NONE);
    if (($conversation) && (count($conversation) > 0)) {
      $botname = (string) $conversation->bot_name;
      $username = (string) $conversation->user_name;
      $botsay = (string) $conversation->chat->line[0]->response;
      $usersay = (string) $conversation->chat->line[0]->input;
    }
  } else {
    $botsay = "I am sorry my server is not advanced enough to process this request. I need to be able to use simplexml_load_file";
  }

}






elizaibot_set_conversation($say, $botsay);
echo $botsay;


function elizaibot_set_conversation($say,$botsay) {

  if (isset($_COOKIE[ELIZAIBOT_CONVERSATION])) {
    $storedConversation = $_COOKIE[ELIZAIBOT_CONVERSATION];
  } else {
    $storedConversation = "";
  }

  $storedConversation .= "<div class='response'><div class='usersay'><span class='whosay'>You:</span><span class='yourresponse'> $say </span></div></div>";
  $storedConversation .= "<div class='response'><div class='botsay'><span class='whosay'>Bot:</span><span class='sayit'> $botsay </span></div></div>";

  setcookie(ELIZAIBOT_CONVERSATION, $storedConversation, time() + 36000, "/");
}




?>

