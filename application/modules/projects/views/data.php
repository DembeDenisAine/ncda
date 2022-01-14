
<table class="table table-bordered">
    <thead>
        <tr>
            <th style="width: 10px">#</th>
            <th>Project Title</th>
            <th style="width: 100px">Starts on</th>
            <th style="width: 100px">Ends on</th>
            <th>Duration</th>
            <th>Details</th>
            <th>Objectives</th>
            <th style="width: 150px">Action</th>
        </tr>
    </thead>
    <tbody>

        <?php if($projects): ?>
        <?php foreach($projects as $proj): ?>
        <tr>
            <td><?php echo $proj->id; ?></td>
            <td><?php echo $proj->project_name; ?></td>
            <td><?php echo $proj->start_date; ?></td>
            <td><?php echo $proj->end_date; ?></td>
            <td><?php echo $proj->duration; ?></td>
            <td><?php echo $proj->project_description; ?></td>
            <td>
                <a href="<?php echo base_url('objective-list/'.$proj->id);?>" 
                class="btn btn-success btn-sm">Objectives</a>
            </td>
            <td>
                <a href="<?php echo base_url('edit-project/'.$proj->id);?>" 
                class="btn btn-primary btn-sm">Edit</a> <a href="<?php echo base_url('delete-project/'.$proj->id);?>" 
                class="btn btn-danger btn-sm">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
        <?php endif; ?>

    </tbody>
</table>