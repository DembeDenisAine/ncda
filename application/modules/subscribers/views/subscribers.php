<?php include('add_subscriber_modal.php'); ?>

<div class="row mb-4">
<a href="#add_subscriber"  data-toggle="modal"
class="btn btn-success btn-sm pull-right">Add Member <i class="fas fa-plus"></i></a>
</div>

<hr>
<table class="table table-bordered table-responsive-lg">
    <thead>
        <tr>
            <th style="width: 10px">#</th>
            <th>Member</th>
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
                       <a class="btn float-end"    data-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-ellipsis-v"></i>
                       </a>
                       <ul  class="dropdown-menu">
                          <span class="dropdown-menu-arrow"></span>
                          <li><a class="dropdown-item"  href="<?=base_url()?>subscriber/<?=$subscriber->id?>" class="text-primary" >View Profile</a></li>
                          <li><a class="dropdown-item"  href="#edit_subscriber<?=$subscriber->id?>" data-toggle="modal" class="text-primary" >Edit</a></li>
                          <li><a class="dropdown-item text-danger" href="#delete<?php echo $subscriber->id;?>" data-toggle="modal">Delete</a></li>
                       </ul>

                </td>
            </tr>
        <?php endforeach; endif; ?>

    </tbody>
</table>

<?php echo $links; ?>
                