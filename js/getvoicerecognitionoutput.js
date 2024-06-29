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
    if(result.includes("open home")){
      window.location.href="../index.php";
    }
    else if(result.includes("open about")){
      window.location.href="../about.php";
    }
    else if(result.includes("open contact")){
      window.location.href="../contact.php";
    }
    else if(result.includes("open product")){
      window.location.href="../products.php";
    }
    else if(result.includes("open shopping cart") || result.includes("checkout")){
      window.location.href="../cart.php";
    }
    else if(result.includes("open accounts") || result.includes("open login")){
      window.location.href="../account.php";
    }
    else if(result.includes("open registration")){
      window.location.href="../registration.php";
    }
    else if(result.includes("search ")){
      let tempStr = result;
      let subStr = "search ";
      let searchproductstring = tempStr.replace(subStr, "");
      window.location.href="../products.php?searchproductstring="+searchproductstring;
    }
    
  }
  $('#voicerecognitionbtn').on('click', function() {
      recognition.start();
  });
});