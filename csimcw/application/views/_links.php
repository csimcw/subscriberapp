<?php foreach($menu as $link_text=>$link_url):?>

 <?php echo anchor($link_url,$link_text,''); ?>

<?php endforeach; ?>