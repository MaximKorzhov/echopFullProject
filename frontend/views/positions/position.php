<h1>Таблица</h1> 
<ul>    
<?php    foreach ($model as $data) {?>
    <li><b><a href="<?=Yii::$app->urlManager->createURL(["/positions/view?id="."$data->id"])?>"><?=$data->name?>:</b><?=$data->price?></li>
 <?php } ?>
</ul>