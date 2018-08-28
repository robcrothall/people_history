<?php
    require("../templates/menu.php");
?>

<form action="quote.php" method="post">
    <fieldset>
        <div class="form-group">
            <input autofocus class="form-control" name="symbol" placeholder="Stock Symbol" type="text"/>
        </div>
        <p class="text-danger">
            <?= htmlspecialchars($form_symbol) ?> -
            <?= htmlspecialchars($form_name) ?> -
            <?= htmlspecialchars($form_price) ?>
        </p>
        <div class="form-group">
            <button type="submit" class="btn btn-default">Submit</button>
        </div>
    </fieldset>
</form>

