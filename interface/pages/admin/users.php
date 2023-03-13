<a href="/admin/"><button>Retour</button></a>
<table>
<?php foreach ( $users as $row ) { ?>
    <tr>
        <?php foreach ($row as $key => $cell) { ?>
            <td>[<?= $key ?>] <?= $cell ?></td>
        <?php } ?>
    </tr>
<?php } ?>
</table>