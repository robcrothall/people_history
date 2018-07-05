<?php

    // configuration
    require("../includes/config.php"); 

    // get User details
    $user_rows = query("SELECT * FROM users WHERE id = ?", $_SESSION["id"]);

    // get portfolio details
    $total_value = $user_rows[0]["cash"];
    /*if (empty($_POST["search"]))
    {*/
    $rows = query("Select * FROM history WHERE user_id = ? ORDER BY time_stamp desc", $_SESSION["id"]);
    /*}
    else
    {
        $search_term = str_replace("'", "*", $_POST["search"]);
        dump($search_term);
        $rows = query("Select * FROM history WHERE user_id = ? AND symbol like '?' ORDER BY time_stamp desc", $_SESSION["id"], $search_term);
    }*/
    $positions = [];
    foreach ($rows as $row)
    {
        if ($row["action"] == "BUY" || $row["action"] == "SELL")
        {
            $fmt_value = number_format($row["shares"] * $row["price"],2);
            $fmt_price = number_format($row["price"],4);
        }
        else
        {
            $fmt_value = number_format($row["value"], 2);
            $fmt_price = "";
        }
            $positions[] = [
                "form_date" => $row["time_stamp"],
                "form_action" => $row["action"],
                "form_value" => $fmt_value,
                "form_price" => $fmt_price,
                "form_symbol" => $row["symbol"],
                "form_shares" => $row["shares"]
                ];
            $total_value += $row["shares"] * $row["price"];
    }
    // render portfolio
    render("history_form.php", [
        "form_user" => $user_rows[0]["username"],
        "cash_value" => number_format($user_rows[0]["cash"],2),
        "positions" => $positions, 
        "title" => "Transaction history"
        ]); 
    
?>
