
    <select id="example" name="project" class="select2">
        <label> Choose Projects</label>
    <?php foreach($projects as $project): ?>

        <option value="<?=$project->id?>" 
            data-imagesrc="<?php echo base_url();?>assets/images/project.png" 
            data-description="<?=truncate($project->project_description,100)?>">
            <?=$project->project_name?>
        </option>

        <?php endforeach; ?>
    </select>