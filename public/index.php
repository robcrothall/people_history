<?php

    // configuration
    require("../includes/config.php"); 

    // get User details
    $user_rows = query("SELECT * FROM users WHERE id = ?", $_SESSION["id"]);

    // get portfolio details
    $total_value = $user_rows[0]["cash"];
    $rows = query("Select * FROM holding WHERE id = ? ORDER BY symbol", $_SESSION["id"]);
    $positions = [];
    foreach ($rows as $row)
    {
        $stock = lookup($row["symbol"]);
        if ($stock !== false)
        {
            $positions[] = [
                "form_name" => $stock["name"],
                "form_price" => number_format($stock["price"],4),
                "form_symbol" => $row["symbol"],
                "form_shares" => $row["shares"],
                "form_value" => number_format($row["shares"] * $stock["price"],2)
                ];
            $total_value += $row["shares"] * $stock["price"];
        }
    }
    // render portfolio
    render("portfolio.php", [
        "form_user" => $user_rows[0]["username"],
        "cash_value" => number_format($user_rows[0]["cash"],2),
        "positions" => $positions, 
        "form_total" => number_format($total_value,2),
        "title" => "Portfolio"
        ]); 
    
?>
