<div class="container">
<?php
    require("../templates/menu.php");
?>
<h2>Stock portfolio for User <?= $form_user ?></h2>
<table class="table table-striped">
    <THEAD>
        <tr>
            <th>Symbol</th>
            <th>Share name</th>
            <th>Price</th>
            <th>No of shares</th>
            <th>Current Value</th>
        </tr>
    </THEAD>
    <tbody>
    <?php foreach ($positions as $position): ?>
        
        <tr>
            <td><?= $position["form_symbol"] ?></td>
            <td><?= $position["form_name"] ?></td>
            <td><?= $position["form_price"] ?></td>
            <td><?= $position["form_shares"] ?></td>
            <td><?= $position["form_value"] ?></td>
        </tr>
        
    <?php endforeach ?>
    <tr>
        <td>Cash</td>
        <td colspan="3"></td>
        <td><?= $cash_value ?></td>
    </tr>
    </tbody>
</table>
<br/>
<p>
    Total value of portfolio is $<?= $form_total ?>
</p>
</div>
