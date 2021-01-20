
<?php
//changing the DOM without a full request responce cycle

//our model code , still in the server
//we will take some of the controller to the view in the browser to make some things dynamically
session_start();
if(isset($_POST['reset'])){
  $_SESSION['chats'] = Array();
  header("Location: index.php");
  return;
}

if(isset($_POST['message'])){
  if(!isset($_SESSION['chats']))
     $_SESSION['chats'] = Array();
  $_SESSION['chats'] [] = array($_POST['message'],date(DATE_RFC2822));
  header("Location: index.php");
  return;
}

 ?>
<html>
<head>
<script type="text/javascript" src="jquery.min.js">

</script>
</head>
<body>
<h1>Chat</h1>
<form method="post" action="index.php">
<p>
  <input type="text" name="message" size="60"/>
  <input type="submit" value="chat"/>
  <input type="submit" name="reset" value="Reset"/>
</p>
</form>
<div id = "chatcontent">
  <img src="spinner.gif" alt="Loading..."/>
</div>

<script type="text/javascript">
function updateMsg(){
  //this run , then get request, then to php, then JSON, parse it, this called success code
  window.console && console.log('Requesting JSON');
  //rows is the deserialezed array, it is array of two valuess ( the message and the date)
  $.getJSON('chatlist.php', function(rowz){
    window.console && console.log('JSON recieved');
    window.console && console.log(rowz);
    $('#chatcontent').empty();

    for(var i = 0; i < rowz.length; i++){
      entry = rowz[i];
      $('#chatcontent').append('<p>'+ entry[0] + '<br/> &nbsp;&nbsp;'+entry[1]+ "</p>\n");
    }
    //run this code every 4 seconds, at the end of success code
    setTimeout('updateMsg()',4000); //asunc calling , Js call

  });
}

//make sure JSON requests are not cached (browser may give me the old JSON and doesn't go
// to the server every time as he knows that i called it 3 s ago)
$(document).ready(function(){
  $.ajaxSetup({cache : false});
  updateMsg(); //call it first time
});
</script>
</body>
