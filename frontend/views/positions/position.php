<h1>Таблица</h1> 
<ul>    
<?php    foreach ($model as $data) {?>
    <li><b><?=$data->name?>:</b><?=$data->price?></li>
 <?php } ?>
</ul>