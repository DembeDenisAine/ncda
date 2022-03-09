<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php if (get_flash('danger')): ?>
    <div class="alert alert-danger alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <i class="fa fa-exclamation-triangle"></i> <?php echo get_flash('danger'); ?>
    </div>
<?php endif; if (get_flash('success')): ?>
    <div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <i class="fa fa-check-circle"></i> <?php echo get_flash('success'); ?>
    </div>
<?php endif; ?>