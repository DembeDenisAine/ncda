<?php include('add_partner_modal.php'); ?>

<div class="row mb-4">
 <div class="btn-group">
<a href="#add_partner"  data-toggle="modal"
class="btn btn-success btn-sm pull-right">Add Donor <i class="fas fa-plus"></i></a>
<a href="<?=base_url()?>partners?pdf=1"  class="btn btn-warning btn-sm pull-right">Export Pdf <i class="fas fa-download"></i></a>
</div>
</div>

<form class="mt-2" method="POST" action="<?=site_url('partners')?>">
    
    <label for="hint">Search <small>(e.g seach by name,phone)</small></label>
    <div class="input-group">
            <input value="<?=$search?>" id="hint" type="text" placeholder="Search here..." class="form-control" name="search">
        <button  class="input-group-addon btn bg-primary flat"  type="submit" class="btn btn-primary">Search</button>
    </div>
    
</form>

<hr>
<table class="table table-bordered table-responsive-lg">
    <thead>
        <tr>
            <th style="width: 10px">#</th>
            <th>Donor</th>
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
                