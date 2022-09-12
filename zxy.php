<?php
require_once 'logic/controller.php';
echo date();
$data = query('SELECT * FROM feedback');
?>

<?php foreach($data as $d): ?>
<?=$d['feedback']?><br>

<?php endforeach;?>