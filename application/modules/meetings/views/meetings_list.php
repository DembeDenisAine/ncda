
<?php require_once('add_meeting_modal.php'); ?>

<div class="btn-group">
<a href="#create-meeting" data-toggle="modal"
class="btn btn-success btn-sm pull-right"><i class="fas fa-plus"></i> Create  Meeting</a>

<a href="#import-meetings" data-toggle="modal"
class="btn btn-info btn-sm pull-right"><i class="fas fa-file-excel"></i> Import Meetings from Excel</a>

</div>
<hr>

<?php   require('import_meetings_modal.php'); ?>

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
        <?php  if($meetings): 
               foreach($meetings as $row):
               $page++;

               require('edit_meeting_modal.php');
               
               ?>
            <tr>
                <td><?php echo $page; ?></td>
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

                        <li>
                            <a href="#edit_meeting<?=$row->id?>" data-toggle="modal"><i class="fa fa-edit"></i> Edit Meeting</a>
                        </li>

                        <li>
                            <a href="<?=base_url()?>meeting/<?=$row->id?>?pdf=1"><i class="fa fa-file"></i> Export PDF</a>
                        </li>

                    </ul>
                </div>
                </td>
            </tr>
        <?php endforeach; endif; ?>

    </tbody>
</table>

<?php echo $links; ?>
                