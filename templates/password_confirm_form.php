<div class="container">
<?php
    require("../templates/menu.php");
?>
<form action="index.php" method="post">
    <fieldset>
        <div class="form-group">
            <?= htmlspecialchars($message) ?>
        </div>
    </fieldset>
</form>
</div>
