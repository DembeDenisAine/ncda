
<div class="container">
<div class="btn-group">
    <a href="#add_tran"  data-toggle="modal" class="btn btn-success btn-sm pull-right"> 
        <i class="fas fa-plus"></i> Add Transaction
    </a>
</div>
<br>
<?php require_once('add_transaction_modal.php'); ?>
<br>
<h4 class="text-muted">Transactions</h4>
<hr>


<table class="table table-bordered">
<thead>
    <tr>
        <th style="width: 10px">#</th>
        <th>Description</th>
        <th>Facility</th>
        <th>Value</th>
        <th style="width: 150px">Action</th>
    </tr>
</thead>
<tbody>
    <?php  
           if($transactions): $i=0;  
           foreach($transactions as $row): 
           $i++; 

           require('update_transaction_modal.php');
    ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $row->description; ?></td>
            <td><?php echo $row->facility_name; ?></td>
            <td><?php echo $row->item_value; ?></td>
            <td>
                <a href="#edit_tran<?=$row->id?>" data-toggle="modal" class="btn btn-primary btn-sm">Edit Transaction</a> 
                <!-- <a href="<?php echo base_url('delete-activity/'.$row->id);?>"  class="btn btn-danger btn-sm">Delete</a>-->
            </td> 
        </tr>
    <?php endforeach; endif; ?>

</tbody>
</table>
</div>