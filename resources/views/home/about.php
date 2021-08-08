<h1><?php echo $title ?></h1>
<img width='600' src='<?php echo $image ?>' />
<p><?php echo $details ?></p>
<?php if(count($contacts)){ ?>
    <h4> Contact info</h4>
    <ul>
        <?php foreach($contacts as $key=>$value){ ?>
            <li><?php echo $key ?>: <?php echo $value ?></li>
        <?php } ?>
    </ul>
<?php } ?>