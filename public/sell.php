<?php

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
            apologize("You must provide the number of shares to sell.");
        }
        $req_shares = $_POST["shares"];
        if (is_numeric($req_shares))
        {
            if (floor($req_shares) != $req_shares)
            {
            apologize("Number of shares to sell must be an integer.");
            }
        }
        else
        {
            apologize("You must provide a numeric number of shares to sell.");
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
        $cmd = "select shares from holding where id = " . $_SESSION["id"] . " and symbol = '" . $symbol . "'";
        logit($cmd, "sell.php");
        $rows = query($cmd);
        $available_shares = 0;
        if (count($rows) == 1)
        {
            $available_shares = $rows[0]["shares"];
        }
        if ($req_shares > $available_shares)
        {
            $shortfall = number_format($req_shares - $available_shares,0);
            apologize("Insufficient shares in current holding - please reduce by $shortfall.");
        }
        $spend = $req_shares * $price;
        $spend_fmt = number_format($req_shares * $price,2);
        $funds = number_format($available_funds + $req_shares * $price,2);
        $rows = query("UPDATE users set cash = cash + ? WHERE id = ?", $spend, $_SESSION["id"]);
        if ($rows === false)
        {
            apologize("Unable to update user cash value!");
        }
        $rows = query("SELECT * FROM holding WHERE id = ? and symbol = '" . $symbol . "'", $_SESSION["id"]);
        if (count($rows) > 0)
        {
            $cmd = "UPDATE holding set shares = shares - " . $req_shares . 
                " where symbol = '" . $symbol . "' and id = " . $_SESSION["id"];
            logit($cmd, "sell.php");
            $rows = query("$cmd");
        }
        $msg = "Sale of $req_shares $name share(s) for $spend was successful.";
        $values["symbol"] = $symbol;
        $values["action"] = "SELL";
        $values["shares"] = $req_shares;
        $values["price"] = $price;
        $values["msg"] = "Success";
        write_history($values);
        render("sell_form.php", ["title" => "Sell Response",
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
        
        render("sell_form.php", ["title" => "Sell Request",
            "form_symbol" => "",
            "form_name" => "",
            "form_price" => "",
            "form_funds" => "$funds",
            "form_msg" => ""]);
    }

?>
