
<?php 

        require_once('add_contact_modal.php');
        require_once('import_contacts_modal.php');

 ?>

<div class="btn-group">
<a href="#create-contact" data-toggle="modal"
class="btn btn-success btn-sm"><i class="fas fa-plus"></i> New Contact</a>
<a href="<?=base_url()?>uploads/contacts_template.xlsx" data-toggle="modal"
class="btn btn-primary btn-sm"><i class="fas fa-download"></i> Download Template</a>
<a href="#import-contacts" data-toggle="modal"
class="btn btn-info btn-sm"><i class="fas fa-upload"></i> Import Contacts</a>

<a href="<?=base_url()?>contacts?pdf=1" 
class="btn btn-warning btn-sm"><i class="fas fa-file"></i> Export to PDF</a>
</div>
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
        <?php  if($contacts): $i=0;  foreach($contacts as $row): $page++; ?>
            <tr>
                <td><?php echo $page; ?></td>
                <td><?php echo $row->first_name." ".$row->last_name; ?></td>
                <td><?php echo $row->represents; ?></td>
                <td><?php echo $row->phone; ?></td>
                <td><?php echo $row->email; ?></td>
                <td> 

                <div class="dropdown">
                    <button class="btn bg-primary btn-xs dropdown-toggle btn-select-option"
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

<?php echo $links; ?>

                