
<a href="<?=site_url('create-branch-team')?>/<?php echo $district_id; ?>" class="btn btn-info pull-right">Adda Member <i class="fas fa-plus"></i></a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th width="5%">#</th>
            <th>Name</th>
            <th>Gender</th>
            <th>Title</th>
            <th>Contact</th>
            <th>Facility</th>
            <th width="15%">Action</th>
        </tr>
    </thead>
    <tbody>

        <?php if($teams): ?>
        <?php $i=0; foreach($teams as $tm): $i++; ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $tm['first_name']." ".$tm['last_name']; ?></td>
            <td><?php echo $tm['gender']; ?></td>
            <td><?php echo $tm['title']; ?></td>
            <td><?php echo $tm['contact']; ?></td>
            <td><?php echo $tm['facility_name']; ?></td>
            
            <td>
                <a href="<?php echo base_url('edit-district/'.$tm['id']);?>" 
                class="btn btn-primary btn-sm">Edit</a> 
                <a href="<?php echo base_url('delete-district/'.$tm['id']);?>" 
                class="btn btn-danger btn-sm">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
        <?php endif; ?>

    </tbody>
</table>