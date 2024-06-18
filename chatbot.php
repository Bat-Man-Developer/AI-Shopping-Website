<?php
include('layouts/header.php');
?>
  </div>
</div>
<!------------- Website Messages----------->
<p style="color: red; font-weight: bold; text-align: center" class="text-center"><?php if(isset($_GET['error'])){ echo $_GET['error']; }?></p>
<p style="color: green" class="text-center"><?php if(isset($_GET['message'])){ echo $_GET['message']; }?></p>

<!---------Contact-Page--------->
<section>
  <h1>Chatbot</h1>
  <div id="chat-container">
      <div id="chat-log"></div>
      <input type="text" id="user-input" placeholder="Type hello for menu..." autofocus />
      <button id="send-btn">Send</button>
  </div>

  <script>
      // JavaScript code to handle the chat functionality
      document.addEventListener("DOMContentLoaded", function() {
          var chatLog = document.getElementById("chat-log");
          var userInput = document.getElementById("user-input");
          var sendBtn = document.getElementById("send-btn");

          // Function to add a message to the chat log
          function addMessageToChatLog(message, sender) {
              var messageElement = document.createElement("div");
              messageElement.classList.add("message");
              messageElement.classList.add(sender);
              messageElement.innerText = message;
              chatLog.appendChild(messageElement);
              chatLog.scrollTop = chatLog.scrollHeight;
          }

          // Function to send user input to the PHP script and receive bot response
          function sendMessage() {
              var input = userInput.value.trim();

              if (input !== "") {
                  addMessageToChatLog(input, "user");
                  userInput.value = "";

                  // Send user input to PHP script using AJAX
                  var xhr = new XMLHttpRequest();
                  xhr.open("POST", "server/getchatbot.php", true);
                  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                  xhr.onreadystatechange = function() {
                      if (xhr.readyState === 4 && xhr.status === 200) {
                          var botResponse = xhr.responseText;
                          addMessageToChatLog(botResponse, "bot");
                      }
                  };
                  xhr.send("userInput=" + encodeURIComponent(input));
              }
          }

          // Event listener for send button click
          sendBtn.addEventListener("click", function() {
              sendMessage();
          });

          // Event listener for Enter key press
          userInput.addEventListener("keydown", function(event) {
              if (event.keyCode === 13) {
                  sendMessage();
              }
          });
      });
  </script>
</section>
<?php
include('layouts/footer.php');
?>