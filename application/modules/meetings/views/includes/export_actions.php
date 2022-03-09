
<?php  if($actions): 
       $a=0;  
       foreach($actions as $row):
       $a++; 
?>
     <div class="col-md-12 col-lg-12">
            <?php echo  nl2br($row->action_point); ?>
            <br>
        </div>
    <hr>
<?php endforeach; endif; ?>