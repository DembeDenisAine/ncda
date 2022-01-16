<?php require_once('add_action_point_modal.php'); ?>

<a href="#add-action" data-toggle="modal"
class="btn btn-success btn-sm pull-right">Add Action Point <i class="fas fa-plus"></i></a>
<hr>

<?php  if($actions): $i=0;  foreach($actions as $row): $i++; ?>
    <div class="row">
        <div class="col-md-11 col-lg-11">
            <?php echo nl2br(truncate($row->action_point,400)); ?>
        </div>
        <div class="col-md-1 col-lg-1">
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
