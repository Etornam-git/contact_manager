<?php
$JSONfile = "contacts.json";  // File where contacts are stored

// Initialize the contact list
$userContact = [];

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if (isset($_POST["submit"])) {
        $errors = [];
    
        // Validation checks
        if (empty($_POST['name']) || empty($_POST['contact']) || empty($_POST['email'])) {
            $errors[] = "Fill all fields.";
        }
    
        // Validation function
        function validate($data) {
            return htmlspecialchars(stripslashes(trim($data)));
        }
    
        // Getting form data
        $name = validate($_POST['name']);
        $phone = validate($_POST['contact']);
        $email = validate($_POST['email']);
    
        // Name validation regex
        $namePattern = "/^[a-zA-Z ]*$/";
        if (!preg_match($namePattern, $name)) {
            $errors[] = "Only letters for the name.";
        }
    
        // Phone number validation regex
        $contactPattern = "/^\+?[0-9]{3}?[ ]?[0-9]{6,10}$/";

        if (!preg_match($contactPattern, $phone)) {
            $errors[] = "The contact should contain only numbers and the '+' sign (optional).";
        }
    
        // Email validation
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Incorrect email format.";
        }
    
        // If no errors, save the contact
        if (empty($errors)) {
            $newUsercontact = [
                'name' => $name,
                'contact' => $phone,
                'email' => $email,
                'created_on' => date('d/m/Y'),
            ];
    
            // Read existing contacts from the file
            if (file_exists($JSONfile)) {
                $userContact = json_decode(file_get_contents($JSONfile), true) ?? [];
                $userContact[] = $newUsercontact;
            } else {
                $userContact = [];
            }
        
            // Add new contact
            
    
            // Save back to the JSON file
            file_put_contents($JSONfile, json_encode($userContact, JSON_PRETTY_PRINT));
    
            echo "Saved successfully!";
        } else {
            // Display errors
            foreach ($errors as $err) {
                echo "<p>$err</p>";
            }
        }
            // Fetch contacts from the JSON file
        
    
    }
    
}


?>
