<?php include('add_subscriber_modal.php'); ?>

<div class="row mb-4">
<a href="#add_subscriber"  data-toggle="modal"
class="btn btn-success btn-sm pull-right">Add Subscriber <i class="fas fa-plus"></i></a>
</div>

<hr>
<table class="table table-bordered">
    <thead>
        <tr>
            <th style="width: 10px">#</th>
            <th>Subscriber</th>
            <th>Description</th>
            <th>Address</th>
            <th>Phone Number</th>
            <th>Email</th>
            <th style="width: 150px">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php  
           if($subscribers): 
            $i = $page;  
            foreach($subscribers as $subscriber):
                 $i++;
                require('edit_subscriber_modal.php');
         ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $subscriber->subscriber_name; ?></td>
                <td><?php echo truncate($subscriber->subscriber_description,200); ?></td>
                <td><?php echo $subscriber->address; ?></td>
                <td><?php echo $subscriber->phone_no; ?></td>
                <td><?php echo $subscriber->email; ?></td>
                <td>
                    <div class="btn-group">
                    <a href="#edit_subscriber<?=$subscriber->id?>" data-toggle="modal" 
                    class="btn btn-primary btn-sm">Edit</a> 
                    <a href="#delete<?php echo $subscriber->id;?>"  class="btn btn-danger btn-sm">Delete</a>
                    </div>
                </td>
            </tr>
        <?php endforeach; endif; ?>

    </tbody>
</table>

<?php echo $links; ?>
                