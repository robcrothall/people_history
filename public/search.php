<?php

    // configuration
    require("../includes/config.php"); 

    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate submission
        if (empty($_POST["surname"]))
        {
            $surname = "%";
        }
        else {$surname = $_POST["surname"];}
        
        
        
        
        if (empty($_POST["password"]))
        {
            apologize("You must provide your password.");
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
        render("../templates/search_form.php", ["title" => "Search for People"]);
    }

?>
