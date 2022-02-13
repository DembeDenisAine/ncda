<?php include('add_subscriber_modal.php'); ?>

<div class="row mb-4">
<a href="#add_subscriber"  data-toggle="modal"
class="btn btn-success btn-sm pull-right">Add Subscriber <i class="fas fa-plus"></i></a>
</div>

<hr>
<table class="table table-bordered table-responsive-lg">
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
                    &nbsp;&nbsp;
                    <a href="#edit_subscriber<?=$subscriber->id?>" data-toggle="modal" class="text-primary" >Edit</a>
                    &nbsp;&nbsp;&nbsp;
                    <a href=#delete<?php echo $subscriber->id;?>" class="text-danger">Delete</a>
                </td>
            </tr>
        <?php endforeach; endif; ?>

    </tbody>
</table>

<?php echo $links; ?>
                