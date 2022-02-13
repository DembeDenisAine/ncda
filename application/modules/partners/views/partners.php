<?php include('add_partner_modal.php'); ?>

<div class="row mb-4">
<a href="#add_partner"  data-toggle="modal"
class="btn btn-success btn-sm pull-right">Add Partner <i class="fas fa-plus"></i></a>
</div>

<hr>
<table class="table table-bordered table-responsive-lg">
    <thead>
        <tr>
            <th style="width: 10px">#</th>
            <th>Partner</th>
            <th>Description</th>
            <th>Address</th>
            <th>Phone Number</th>
            <th>Email</th>
            <th style="width: 150px">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php  
           if($partners): 
            $i = $page;  
            foreach($partners as $partner):
                 $i++;
                require('edit_partner_modal.php');
         ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $partner->partner_name; ?></td>
                <td><?php echo truncate($partner->partner_description,200); ?></td>
                <td><?php echo $partner->address; ?></td>
                <td><?php echo $partner->phone_no; ?></td>
                <td><?php echo $partner->email; ?></td>
                <td>
                    &nbsp;&nbsp;
                    <a href="#edit_partner<?=$partner->id?>" data-toggle="modal" class="text-primary" >Edit</a>
                    &nbsp;&nbsp;&nbsp;
                    <a href="#delete<?php echo $partner->id;?>" class="text-danger">Delete</a>
                </td>
            </tr>
        <?php endforeach; endif; ?>

    </tbody>
</table>

<?php echo $links; ?>
                