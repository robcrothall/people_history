<img src="img/logo.gif" alt="" /><?php

    // configuration
    require("../includes/config.php"); 

    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate submission
        if (empty($_POST["symbol"]))
        {
            apologize("You must provide the symbol of the stock.");
        }
        $msg = "uninitialized";
        $req_symbol = strtoupper($_POST["symbol"]);
        if (empty($_POST["shares"]))
        {
            apologize("You must provide the number of shares to buy.");
        }
        $req_shares = $_POST["shares"];
        if (is_numeric($req_shares))
        {
            if (floor($req_shares) != $req_shares)
            {
            apologize("Number of shares to buy must be an integer.");
            }
        }
        else
        {
            apologize("You must provide a numeric number of shares to buy.");
        }
        $stock = lookup($req_symbol);
        if (empty($stock["symbol"]))
        {
            apologize("Stock symbol '" . $req_symbol . "' was not found.  Please try again.");
        }
        $name = $stock["name"];
        $price = number_format($stock["price"],4);
        $symbol = $stock["symbol"];
        $rows = query("SELECT * FROM users WHERE id = ?", $_SESSION["id"]);
        if (count($rows) == 1)
        {
            $available_funds = $rows[0]["cash"];
        }
        if ($req_shares * $price > $available_funds)
        {
            $shortfall = number_format($req_shares * $price - $available_funds,2);
            apologize("Insufficient funds - please deposit at least $shortfall.");
        }
        $spend = $req_shares * $price;
        $spend_fmt = number_format($req_shares * $price,2);
        $funds = number_format($available_funds - $req_shares * $price,2);
        $rows = query("UPDATE users set cash = cash - ? WHERE id = ?", $spend, $_SESSION["id"]);
        if ($rows === false)
        {
            apologize("Unable to update user cash value!");
        }
        $rows = query("SELECT * FROM holding WHERE id = ? and symbol = '" . $symbol . "'", $_SESSION["id"]);
        if (count($rows) > 0)
        {
            $cmd = "UPDATE holding set shares = shares + " . $req_shares . 
                " where symbol = '" . $symbol . "' and id = " . $_SESSION["id"];
        }
        else
        {
            $cmd = "INSERT into holding (shares, symbol, id, stock_name) values (" .  
                $req_shares . ", '" . $symbol . "', " . $_SESSION["id"] . ", '" . $name . "')";
        }
        $values["symbol"] = $symbol;
        $values["action"] = "BUY";
        $values["shares"] = $req_shares;
        $values["price"] = $price;
        $values["msg"] = "Success";
        write_history($values);
        $rows = query("$cmd");
        $msg = "Purchase of $req_shares $name share(s) for $spend was successful.";
        render("buy_form.php", ["title" => "Buy Response",
            "form_symbol" => "$symbol",
            "form_name" => "$name",
            "form_price" => "$price",
            "form_funds" => "$funds",
            "form_msg" => $msg]);
    }
    else
    {
        $rows = query("SELECT * FROM users WHERE id = ?", $_SESSION["id"]);
        $available_funds = 0.00;
        if (count($rows) == 1)
        {
            $available_funds = $rows[0]["cash"];
        }
        $funds = number_format($available_funds,2);
        
        render("buy_form.php", ["title" => "Buy Request",
            "form_symbol" => "",
            "form_name" => "",
            "form_price" => "",
            "form_funds" => "$funds",
            "form_msg" => ""]);
    }

?>
