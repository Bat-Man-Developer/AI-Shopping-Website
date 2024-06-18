<?php
// Function to process user input and generate bot response
function getBotResponse($input) {
    // Bot's responses based on user input
    $responses = array(
        "hello" => "1. returns 2. Delivery delays",
        "how are you" => "I'm a bot. I don't have feelings, but thanks for asking!",
        "programming" => "I love programming! What language are you working with?",
        "php" => "Great choice! PHP is a versatile language for web development.",
        "bye" => "Goodbye! Have a nice day!",
        "default" => "I'm sorry, I didn't understand that. Can you please rephrase?"
    );

    // Process user input and provide bot response
    $input = strtolower($input);
    if (array_key_exists($input, $responses)) {
        return $responses[$input];
    } else {
        return $responses["default"];
    }
}

// Check if there's user input
if (isset($_POST['userInput'])) {
    $userInput = $_POST['userInput'];
    $botResponse = getBotResponse($userInput);
    echo $botResponse;
}