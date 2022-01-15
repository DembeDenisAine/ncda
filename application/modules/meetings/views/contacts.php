
<?php require_once('create_contact.php'); ?>

<a href="#create-contact" data-toggle="modal"
class="btn btn-success btn-sm pull-right"><i class="fas fa-plus"></i> New Contact</a>
<hr>

<table class="table table-bordered">
    <thead>
        <tr>
            <th style="width: 10px">#</th>
            <th>Name</th>
            <th>Organization</th>
            <th>Phone Number</th>
            <th>Email</th>
            <th style="width: 150px">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php  if($contacts): $i=0;  foreach($contacts as $row): $i++; ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $row->first_name." ".$row->last_name; ?></td>
                <td><?php echo $row->represents; ?></td>
                <td><?php echo $row->phone; ?></td>
                <td><?php echo $row->email; ?></td>
                <td> 

                <div class="dropdown">
                    <button class="btn bg-primary btn-sm dropdown-toggle btn-select-option"
                            type="button"
                            data-toggle="dropdown">Options
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu options-dropdown" style="padding: 10px;">
                        <li>
                            <a href="#contact<?=$row->id?>"><i class="fa fa-expand option-icon"></i> Details</a>
                        </li>
                    </ul>
                </div>
                </td>
            </tr>
        <?php endforeach; endif; ?>

    </tbody>
</table>
                