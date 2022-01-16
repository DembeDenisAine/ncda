<?php require_once('add_action_point_modal.php'); ?>

<a href="#add-action" data-toggle="modal"
class="btn btn-primary btn-sm pull-right">Add Action Point <i class="fas fa-plus"></i></a>
<hr>

<?php  if($actions): $i=0;  
       foreach($actions as $row): 
        $i++;
        require('action_details_modal.php');
?>
     <div class="col-md-12 col-lg-12">
            <?php echo nl2br(truncate($row->action_point,300)); ?>
            <br><br>
            <a class="btn btn-info btn-xs" href="#action<?=$row->id?>" data-toggle="modal"><i class="fa fa-eye"></i> View </a>
        </div>
    <hr>
<?php endforeach; endif; ?>
