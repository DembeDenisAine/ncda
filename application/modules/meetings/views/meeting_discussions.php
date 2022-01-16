<?php require_once('add_discussion_modal.php'); ?>

<a href="#add-discussion" data-toggle="modal"
class="btn btn-success btn-sm pull-right">Add Discussion <i class="fas fa-plus"></i></a>
<hr>

<?php  if($discussions): $i=0;  foreach($discussions as $row): $i++; ?>
    <div class="row">
        <div class="col-md-3">
            <?php echo $row->item_name; ?>
        </div>
        <div class="col-md-7">
            <?php echo nl2br(truncate($row->item_details,300)); ?>
        </div>
        <div class="col-md-2">
            <div class="dropdown">
                <button class="btn bg-primary btn-sm dropdown-toggle btn-select-option"
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
        </div>
    </div>
    <hr>
<?php endforeach; endif; ?>