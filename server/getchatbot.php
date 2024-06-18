<?php
// Function to process user input and generate bot response
function getBotResponse($input) {
    // Bot's responses based on user input
    $responses = array(
        "hello" => "1.Product enquiries
        2.Order enquiries
        3.Returns
        4.Delivery Delays
        5.Contact Customer Support",
        "help"=> "What would you like me to help you with?🙂 1. Product enquiries  2.Order enquiries 3.Customer support",
        "1"=> "We offer a range of products from baby products to clothing and tech gadgets. These can be explored in our departments.🙂",
        "2"=> "For Order enquiries, contact our store, our phone details are +27622646159 😉",
        "3"=> "We offer returns for products that are logged for returns within 7 days of receiving your delivery. Product(s) must be in good condition and sealed in the appropriate packaging.🙂",
        "4"=> "It takes us approximately 5 business days to deliver your order to your doorstep.🙂",
        "5"=> "Sorry for the inconvience. To contact our store, our phone details are +27622646159 😉",
        "bye" => "Goodbye! Have a nice day!🙂",
        "default" => "I'm sorry, I didn't understand that. Can you please rephrase?🙂"
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