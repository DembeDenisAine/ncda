<?php  
    $d=0;
    foreach($discussions as $row): 
        $d++;
 ?>
    <div class="row">
        <h4><?php echo $d.". ".$row->item_name; ?></h4>
         <?php echo nl2br($row->item_details); ?>
    </div>

<?php endforeach; ?>