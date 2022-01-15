
<a href="<?=site_url('create-district')?>" class="btn btn-info pull-right">Add a District <i class="fas fa-plus"></i></a>
<hr>

<table class="table table-bordered">
    <thead>
        <tr>
            <th width="5%">#</th>
            <th>Branch Name</th>
            <th>Region</th>
            <th>Ficilities</th>
            <th>Teams</th>
            <th width="15%">Action</th>
        </tr>
    </thead>
    <tbody>

        <?php if($districts): ?>
        <?php $i=0; foreach($districts as $proj): $i++; ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $proj['district_name']; ?></td>
            <td><?php echo $proj['region']; ?></td>
            
            <td>
                <a href="<?php echo base_url('facility-list/'.$proj['id']);?>" 
                class="btn btn-primary btn-sm">Ficilities</a> 
            </td>
            <td>
                <a href="<?php echo base_url('teams-district/'.$proj['id']);?>" 
                class="btn btn-primary btn-sm">Teams</a> 
            </td>
            <td>
                <a href="<?php echo base_url('edit-district/'.$proj['id']);?>" 
                class="btn btn-primary btn-sm">Edit</a> 
                <a href="<?php echo base_url('delete-district/'.$proj['id']);?>" 
                class="btn btn-danger btn-sm">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
        <?php endif; ?>

    </tbody>
</table>
