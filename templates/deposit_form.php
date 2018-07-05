<div class="container">
<?php
    require("../templates/menu.php");
?>

<form action="deposit.php" method="post">
    <fieldset>
        <div class="form-group">
            <input autofocus class="form-control" name="cash" placeholder="Cash deposited" type="text"/>
            <br/>
        </div>
        <p class="text-danger">
            Available funds = <?= htmlspecialchars($form_funds) ?>
        </p>
        <div class="form-group">
            <button type="submit" class="btn btn-default">Deposit</button>
        </div>
    </fieldset>
</form>
<p class="text-danger">
    <?= htmlspecialchars($form_msg) ?>
</p>
</div>

