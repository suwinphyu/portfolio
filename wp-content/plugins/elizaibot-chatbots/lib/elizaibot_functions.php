<?php
/*queue the js scripts needed*/
function elizaibot_loadScripts() {
  wp_register_script('elizaibotscript', ELIZAIBOT_PLUGIN_JS_DIR . 'elizaibot.js', array('jquery')); //put any dependencies (including jQuery) into the array
  wp_enqueue_script('elizaibotscript');
  wp_register_style('elizaibotstyle', ELIZAIBOT_PLUGIN_CSS_DIR . 'elizaibot.css', array(), '1.0.0', "all");
  wp_enqueue_style('elizaibotstyle');

}

function elizaibot_get_bot_id($chatbot){
  $chatbot=trim(strtolower($chatbot));

  switch($chatbot){
    case 'shakespearebot':
      $bot_id=10;
      break;
    case 'programo':
      $bot_id=6;
      break;
    default:
      $bot_id=13;
      break;
  }

  return $bot_id;

}
function elizaibot_chatform($chatbot, $width, $height, $elizaibot_link=0){
  $formwidth= $width - 50;

  if (isset($_COOKIE[ELIZAIBOT_CONVERSATION])) {
    $storedConversation = $_COOKIE[ELIZAIBOT_CONVERSATION];
  } else {
    $storedConversation = "";
  }
  $storedConversation = urldecode(stripslashes($storedConversation));
  $bot_id = elizaibot_get_bot_id($chatbot);

  $html ="<div class='elizaibot-post'>
    <div id='conversation' style='height:" . $height . "px;width:" . $width . "px;'>".$storedConversation."</div>
    <form id='elizaibotform'>
      <input type='text' id='elizaibotsay' name='elizaibotsay' placeholder='why not say hello?' required tabindex='1' style='width:".$formwidth."px;' />
      <input type='hidden' id='convo_id' name='convo_id' value='". ELIZAIBOTID ."' />
      <input type='hidden' id='bot_id' name='bot_id' value='" . $bot_id . "' />
      <input type='hidden' id='pluginbase' name='pluginbase' value='" . ELIZAIBOT_PLUGIN_URL . "' />

      <input name='submit' type='submit' id='submit' tabindex='2' value='Say' />
    </form>
    <a class='clearconversation elizaibotlinks' href=''>clear conversation</a>";
  if($elizaibot_link==1){
    $html .= ":: <a class='elizaibotlinks' href='http://www.program-o.com'>Get your own chatbot</a>";
  }
  $html .= "</div>";

  return $html;
}




function elizaibot_create_convo_id() {
  $cid= $_SERVER['SERVER_NAME'] . date("ymdhis") . rand();
  $cid = preg_replace('/[^\da-z]/i', '', $cid);
  return $cid;
}

function elizaibot_get_convo_id() {
  return $_COOKIE['ELIZAIBOT_ID'];
}

function register_elizaibot_shortcodes() {
  add_shortcode('elizaibot-chat', 'elizaibot_showhtml');
}

function elizaibot_showhtml($atts) {
  extract(shortcode_atts(array(
    'width' => 600,
    'height' => 150,
    'chatbot'=>'carlos',
    'showlink'=>0,
  ), $atts, 'elizaibot-chat'));
  return elizaibot_chatform($chatbot,$width, $height, $showlink);
}

function elizaibot_admin_menu() {
  add_options_page('Elizaibots', 'Elizaibots', 'manage_options', 'elizaibot_info', 'elizaibot_info');
}

function elizaibot_chatbot_function($chatbot=13, $width=600, $height=300, $showlink=0){
  echo elizaibot_chatform($chatbot, $width, $height, $showlink);
}




function elizaibot_info(){
  ?>
        <div class="wrap">
          <div id="icon-options-general" class="icon32"><br></div>
<h2>Elizaibot Info</h2>
<p>Thank you for using the Elizaibot Chatbot WordPress Plugin.</p>
<p>This is a very small and simple plugin which has one shortcode and one widget.</p>
<p>The shortcode is [elizaibot-chat] and you can specify the following parameters:
<ul>
<li>width - the width of the chat window (numbers only please)</li>
<li>height - the height of the chat window (numbers only please)</li>
<li>chatbot - the name of the bot to talk to</li>
<li>showlink - adds a link to the bottom of the talk form to display a link to Program O (1=show 2=don't show)</li>
</ul>
</p>
<p>Here is a list of chatbots to choose from;
<ul>
    <li>Shakespearebot - Talk to William Shakespeare </li>
    <li>Carlos - Talk to a comedybot</li>
    <li>Elizaibeth - Talk to the creator of this plugin</li>
    <li>ProgramO - Talk to the original chatbot</li>
</ul></p>
  <p>So if you wanted to embed a chatwindow to talk to ProgramO just add this shortcode
          <pre><code>[elizaibot-chat chatbot=programo]</code></pre></p>
  <p>And if you wanted to embed a chatwindow to talk to Carlos with a width of 600px and height of 300px and including the link just add this shortcode
    <pre><code>[elizaibot-chat chatbot=carlos width=600 height=300 showlink=1]</code></pre></p>
          <p>If you would like the function call to use inside your theme directly just use this piece of code:
          <pre><code>
              if (function_exists('elizaibot_chatbot_function')) {
              elizaibot_chatbot_function($chatbot, $width, $height, $showlink);
              })</code></pre> </p>
  <p>Without any parameters the default bot is Carlos Chow as I am currently trying to expand his knowledge base for the Funniest Computer Ever compeition.</p>
  <p>Anyways...... thanks everyone, have fun and be nice.</p>
  <p>Links:
  <a href="http://www.program-o.com" target="_blank">Get your own chatbot</a> ::
  <a href="http://www.carloschow.com" target="_blank">Carlos Chow website</a> ::
  <a href="http://www.shakespearebot.com" target="_blank">Shakespearebot Website</a></p>
          </div>
<?php
}
?>
