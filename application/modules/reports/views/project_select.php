
<form action="<?=base_url()?>project_report">

    <select id="selector" name="project" class="select2">
    
       <?php foreach($projects as $row): ?>

        <option value="<?=$row->id?>"  <?=($project && ($row->id == $project->id))?'selected':''?>
            data-imagesrc="<?php echo base_url();?>assets/images/project.png" 
            data-description="<?=truncate($row->project_description,100)?>">
            <?=$row->project_name?>
        </option>

        <?php endforeach; ?>
    </select>
</form>

<?php

print_r($project);


?>