<?php  require_once('add_member_modal.php'); ?>

<div class="row">

<div class="col-lg-4 flexed">
     <div class="btn-group">
    <a class="btn btn-default" data-toggle="modal" data-target="#add_member">Add a Member  <i class="fas fa-plus"></i></a>
    <a href="<?=base_url()?>board-list?pdf=1"  class="btn btn-warning btn-sm pull-right">Export Pdf <i class="fas fa-download"></i></a>
   </div>
</div>
<div class="col-lg-6">
    <form class="mt-2" method="POST" action="<?=site_url('board-list')?>">
    
    <label for="hint">Search <small>(e.g seach by name,role,phone)</small></label>
    <div class="input-group">
            <input value="<?=$search?>" id="hint" type="text" placeholder="Search here..." class="form-control" name="search">
        <button  class="input-group-addon btn bg-primary flat"  type="submit" class="btn btn-primary">Search</button>
    </div>
    
    </form>
</div>
</div>

<hr>

<table class="table table-bordered table-responsive-lg" >
    <thead>
        <tr>
            <th width="2%">#</th>
            <th>Member Name</th>
            <th>Designation</th>
            <th>Phone Number</th>
            <th>Email</th>
            <th>Tenure</th>
            <th>Status</th>
            <th>Organization</th>
            <th width="15%">Action</th>
        </tr>
    </thead>
    <tbody>

        <?php if($members): ?>
        <?php
            $i=0; 
            foreach($members as $member): 
                $i++;
                require('edit_member_modal.php');
         ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $member->title ." ".$member->firstname ." ".$member->lastname; ?></td>
            <td><?php echo $member->role; ?></td>
            <td><?php echo $member->phone_no; ?></td>
            <td><?php echo $member->email_address; ?></td>
            <td><?php echo $member->from_year." to ". $member->to_year; ?></td>
            <td><small class="badge badge-success"><?php echo ($member->is_current)?'Current':'Former'; ?></small></td>
            <td><?php echo get_subscriber_name($member->subscriber_id); ?></td>
            <td>
                 &nbsp;&nbsp;
                <a href="#edit_member<?=$member->id?>" data-toggle="modal" class="text-primary" >Edit</a>
                 &nbsp;&nbsp;&nbsp;
                <a href="#delete_member<?=$member->id?>" data-toggle="modal" class="text-danger">Delete</a>
            </td>

        </tr>

       
    <?php 

   // require('member_delete_modal.php');
   // require('member_edit_modal.php');

    endforeach; 
    endif; 

    ?>

    </tbody>
</table>

<?php echo $links; ?>
