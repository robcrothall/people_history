<?php
    // configuration
    require("../includes/config.php");
    
    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate submission
        if (empty($_POST["username"]))
        {
            apologize("You must provide your Username.");
        }
   /*     else if (empty($_POST["password"]))
        {
            apologize("You must provide your password.");
        }
        else if (empty($_POST["confirmation"]))
        {
            apologize("You must provide your confirmation password.");
        }
        else if ($_POST["password"] !== $_POST["confirmation"])
        {
            apologize("Your password and confirmation password are not identical.");
        }
        else if (empty($_POST["surname"]))
        {
            apologize("You must provide your Surname.");
        }
        else if (empty($_POST["first_name"]))
        {
            apologize("You must provide your first name.");
        }
        else if (empty($_POST["phone"])) and (empty($_POST["mobile"]))
        {
            apologize("You must provide at least one phone number.");
        }
        else if (empty($_POST["email"]))
        {
            apologize("You must provide your email address.");
        }
*/
        // query database for user
        $rows = query("SELECT * FROM users WHERE username = ?", $_POST["username"]);

        // if we found user, tell him he is already registered
        if (count($rows) == 1)
        {
            apologize("Your username has already been registered - please choose another.");
        }
        // insert the new user into the users table
        $rows = query("INSERT INTO users (username, hash, surname, first_name, phone, mobile, email) VALUES(?, ?, ?, ?, ?, ?, ?)", 
            $_POST["username"], crypt($_POST["password"],$_POST["username"])), $_POST["surname"], $_POST["first_name"], 
            $_POST["phone"], $_POST["mobile"], $_POST["email"];
        if ($rows === false)
        {
            apologize("Unable to register your user name - please contact support");
        }
        $rows = query("SELECT LAST_INSERT_ID() AS id");
        $id = $rows[0]["id"];

        // remember that user's now logged in by storing user's ID in session
        $_SESSION["id"] = $id;

        // redirect to portfolio
        redirect("search");
    }
    else
    {
      render("../templates/register_form.php", ["title" => "Register"]);
    } 
?>
