<h3>
<?php if(!empty($district)) { ?>
    <a href="<?php echo base_url('create-facility/'.$district);?>" 
    class="btn btn-success btn-sm pull-right">Create <i class="fas fa-plus"></i></a>
<?php } ?> 
<hr>

<table class="table table-bordered">
<thead>
    <tr>
        <th style="width: 10px">#</th>
        <th>Facility</th>
        <?php if(empty($district)) { ?>
            <th>Branch</th>
        <?php } ?> 
        <th>Teams</th>
        <th style="width: 150px">Action</th>
    </tr>
</thead>
<tbody>
    <?php  if($facilities): $i=0;  foreach($facilities as $fty): $i++; ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $fty['facility_name']; ?></td>

            <?php if(empty($district)) { ?>
                <td><?php echo $fty['district_name']; ?></td>
            <?php } ?> 
            <td>
                <a href="<?php echo base_url('facility-teams/'.$fty['id']);?>" 
                class="btn btn-success btn-sm">Teams</a>
            </td>
            <td>
                <a href="<?php echo base_url('edit-facility/'.$fty['id']);?>" 
                class="btn btn-primary btn-sm">Edit</a> <a href="<?php echo base_url('delete-facility/'.$fty['id']);?>" 
                class="btn btn-danger btn-sm">Delete</a>
            </td>
        </tr>
    <?php endforeach; endif; ?>

</tbody>
</table>