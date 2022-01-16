

<?php require_once('add_participant.php'); ?>

<a href="#create-participant" data-toggle="modal"
class="btn btn-success btn-sm pull-right">Add Participant <i class="fas fa-plus"></i></a>
<hr>

<table class="table table-bordered">
    <thead>
        <tr>
            <th style="width: 10px">#</th>
            <th>Name</th>
            <th>Organization</th>
            <th>Address</th>
            <th>Telephone</th>
            <th>Mobile</th>
            <th style="width: 150px">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php  if($participants): $i=0;  foreach($participants as $row): $i++; ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $row->title." ".$row->first_name." ".$row->last_name; ?></td>
                <td><?php echo $row->represents; ?></td>
                <td><?php echo $row->address; ?></td>
                <td><?php echo $row->phone; ?></td>
                <td><?php echo $row->mobile; ?></td>
                <td> 

                <div class="dropdown">
                    <button class="btn bg-primary dropdown-toggle btn-select-option"
                            type="button"
                            data-toggle="dropdown">Options
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu options-dropdown" style="padding: 10px;">
                        <li>
                            <a href="<?php echo base_url();?>meeting/<?=$row->id?>"><i class="fa fa-expand option-icon"></i> Details</a>
                        </li>
                    </ul>
                 </div>
                </td>
            </tr>
        <?php endforeach; endif; ?>

    </tbody>
</table>
                