// JavaScript code to handle voice recognition
$(document).ready(function() {
  let recognition;
  if('webkitSpeechRecognition' in window){
      recognition = new webkitSpeechRecognition();
  }
  else if('SpeechRecognition' in window){
      recognition = new SpeechRecognition();
  }
  else{
    console.log('Speech recognition is not supported by this browser.');
    return;
  }
  recognition.continuous = true;
  recognition.interimResults = true;
  recognition.lang = 'en-US';
  recognition.onresult = function(event){
    let result = event.results[event.results.length - 1][0].transcript.toLowerCase().replace(".", "");
    $('#result').text(result);

    //Voice Recognition AI Commands
    if(result == "open home"){
      window.location.href="../index.php";
    }
    else if(result == "open about"){
      window.location.href="../about.php";
    }
    else if(result == "open contact" || result == "open contacts"){
      window.location.href="../contact.php";
    }
    else if(result == "open products" || result == "open products page" || result == "open product page"){
      window.location.href="../products.php";
    }
    else if(result == "open departments page" || result == "open department page" || result == "open departments" || result == "open department"){
      window.location.href="../products.php";
    }
    else if(result == "open shopping cart"){
      window.location.href="../cart.php";
    }
    else if(result == "open accounts" || result == "open account" || result == "open accounts page" || result == "open account page" || result == "open login" || result == "open login page"){
      window.location.href="../account.php";
    }
    else if(result == "open registration" || result == "open registration page"){
      window.location.href="../registration.php";
    }
    else if(result == "search phones"){
      window.location.href="../products.php?fldproductdepartments=phone&fldproductcategory=phone&fldproducttype=phone";
    }
    
  }
  $('#voicerecognitionbtn').on('click', function() {
      recognition.start();
  });
});