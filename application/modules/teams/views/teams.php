
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
                <div class="dropdown">
                    <button class="btn bg-primary btn-sm dropdown-toggle btn-select-option"
                            type="button"
                            data-toggle="dropdown">Options
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu options-dropdown" style="padding: 10px;">
                        <li>
                            <a href="<?php echo base_url('edit-branch-team/'.$tm['id'].'/'.$tm['district_id']);?>" 
                        class="btn btn-primary btn-xs">Edit</a>
                        </li>
                        <li>
                            <a href="#del<?php echo $tm['id']; ?>" class="btn btn-danger btn-xs" data-toggle="modal"> Delete</a>
                        </li>
                    </ul>
                </div>
            </td>
        </tr>

        <!-- Delete Modeal ------------>
        <div class="modal fade" id="del<?php echo $tm['id']; ?>">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <form method="post" action="<?= site_url('delete-branch-staff') ?>/<?php echo $tm['id']; ?>/<?php echo $tm['district_id']; ?>">
                        <div class="modal-body">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                        This action is irreversible! Are you sure you want to delete <br> <u><?php echo $tm['first_name']." ".$tm['last_name']; ?></u>?
                                        <input type="hidden" name="id" value="<?php echo $tm['id']; ?>">
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-danger">Yes, Delete <i class="fas fa-minus"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        <?php endif; ?>

    </tbody>
</table>

<?php echo $links ?>