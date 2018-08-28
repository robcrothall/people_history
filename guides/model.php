<?php

    // configuration
    require("../includes/config.php"); 

    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate submission
        if (empty($_POST["username"]))
        {
            apologize("You must provide your username.");
        }
        else if (empty($_POST["password"]))
        {
            apologize("You must provide your password.");
        }
        else if (empty($_POST["confirmation"]))
        {
            apologize("You must provide your confirmation password.");
        }
        if ($_POST["password"] !== $_POST["confirmation"])
        {
            apologize("Your password and confirmation password are not identical.");
        }
        if (empty($_POST["surname"]))
        {
            apologize("You must provide your Surname.");
        }
        if (empty($_POST["first_name"]))
        {
            apologize("You must provide your first name.");
        }
        if (empty($_POST["phone"])) 
        {
        		if (empty($_POST["mobile"]))
        		{
            	apologize("You must provide at least one phone number.");
        		}
        }
        if (empty($_POST["email"]))
        {
            apologize("You must provide your email address.");
        }

        // query database for user
        $rows = query("SELECT * FROM users WHERE username = ?", $_POST["username"]);

        // if we found user, check password
        if (count($rows) == 1)
        {
            // first (and only) row
            $row = $rows[0];

            // compare hash of user's input against hash that's in database
            if (crypt($_POST["password"], $row["hash"]) == $row["hash"])
            {
                // remember that user's now logged in by storing user's ID in session
                $_SESSION["id"] = $row["id"];

                // redirect to search
                redirect("search.php");
            }
        }

        // else apologize
        apologize("Invalid username and/or password.");
    }
    else
    {
        // else render form
        render("../guides/model_form.php", ["title" => "Log In"]);
    }

?>
