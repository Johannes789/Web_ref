<!DOCTYPE html>
<html>
<head>
<title>Form</title>
</head>
<body>
    <form action="Form.php" method="post"  >
        <input type="text" name="name" id="name" placeholder="Name" style="margin-top: 10px;" />
        <br />
        <input type="text" name="email" id="email" placeholder="Email" style="margin-top: 10px;" />
        <br />
        <textarea name="message" id="message" cols="30" rows="10" placeholder="Text" style="margin-top: 10px;" ></textarea>
        <br />
        <input type="submit" value="Submit" style="margin-top: 10px;" />
    </form>
<?php
    if (isset($_POST['name'], $_POST['email'], $_POST['message'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Create an XML document
    $xml = new DOMDocument('1.0', 'UTF-8');
    $xml->formatOutput = true;

    // Create the root element
    $root = $xml->createElement('form_data');
    $xml->appendChild($root);

    // Create child elements for name, email, and message
    $nameElement = $xml->createElement('name', $name);
    $root->appendChild($nameElement);

    $emailElement = $xml->createElement('email', $email);
    $root->appendChild($emailElement);

    $messageElement = $xml->createElement('message', $message);
    $root->appendChild($messageElement);

    // Save the XML file
    $xml->save('form_data.xml');

    echo 'Form data saved successfully';
    } else {
    echo 'Form data not submitted yet';
    }
?> 
</body>
</html>
