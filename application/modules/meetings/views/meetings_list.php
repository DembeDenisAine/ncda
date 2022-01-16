
<?php require_once('add_meeting_modal.php'); ?>

<a href="#create-meeting" data-toggle="modal"
class="btn btn-success btn-sm pull-right"><i class="fas fa-plus"></i> Create  Meeting</a>
<hr>

<table class="table table-bordered">
    <thead>
        <tr>
            <th style="width: 10px">#</th>
            <th>Meeting Title</th>
            <th>Meeting Date</th>
            <th>Start Time</th>
            <th>End Time</th>
            <th style="width: 150px">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php  if($meetings): $i=0;  foreach($meetings as $row): $i++; ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $row->meeting_name; ?></td>
                <td><?php echo $row->meeting_date; ?></td>
                <td><?php echo $row->start_at; ?></td>
                <td><?php echo $row->end_at; ?></td>
                <td> 

                <div class="dropdown">
                    <button class="btn bg-primary btn-xs dropdown-toggle btn-select-option"
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

<?php echo $links; ?>
                