<div class="container">
<?php
    require("../templates/menu.php");
?>

<form action="buy.php" method="post">
    <fieldset>
        <div class="form-group">
            <input autofocus class="form-control" name="symbol" placeholder="Stock Symbol" type="text"/>
            <br/>
            <input class="form-control" name="shares" placeholder="No of shares" type="text"/>
            <br/>
        </div>
        <p class="text-danger">
            Available funds = <?= htmlspecialchars($form_funds) ?>
        </p>
        <div class="form-group">
            <button type="submit" class="btn btn-default">Buy</button>
        </div>
    </fieldset>
</form>
<p class="text-danger">
    <?= htmlspecialchars($form_msg) ?>
</p>
</div>

