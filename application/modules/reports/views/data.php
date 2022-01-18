
<div class="container">
<form action="<?php echo base_url(); ?>project_report" method="post" id="report_form">
    <h6 class="text-muted">Choose Project</h6>

    <select id="example" class="select2">
        <label> Choose Projects</label>
    <?php foreach($projects as $project): ?>

        <option value="<?=$project->id?>"  
            data-description="<?=truncate($project->project_description,100)?>">
            <?=$project->project_name?>
        </option>

        <?php endforeach; ?>
    </select>

</form>

<div>

<hr>


<table border="1">
       <?php 
         foreach($objectives as $objective):
          $activities = activities($objective->id);
        ?>

        <tr>
            <td rowspan="<?=($activities)?count($activities):2;?>">
                <?=$objective->objective_name?>
            </td> 
        </tr>
       
        <?php if(count($activities)>0){ ?>

            <?php 
                  foreach($activities as $activty):
                    $paramData = param_data($activty->id);
                 ?>
                 
                <tr>

                 <td rowspan="<?=($paramData)?count($paramData):2;?>"> 
                    <?=$activty->activity_name?>
                 </td>
                 
                </tr>

                <?php if(count($paramData)>0){ ?>

                    <?php foreach($paramData as $param): ?>
                        <tr> <td> <?=$param->parameter_name?></td> </tr>
                    <?php endforeach; ?>

            <?php } endforeach; ?>
            
      
    <?php  }?>

    <?php  endforeach; ?>
</table>
</div>

<table border="1">
    <tr>
        <td rowspan="2">
            <td>1213</td>
        </td>
        <td >
            <td>1213</td>
        </td>
        <td >
            <td>1213</td>
        </td>
    </tr>

    <tr>
        <td>
            1213
        </td>
        <td >
            1213
        </td>
        <td >
            1213
        </td>
    </tr>
</table>

<!-- data-imagesrc="<?php echo base_url();?>assets/images/project.png" -->

<script>
    $("#example").ddslick({
    selectText: "Select Project",
    width: '100%',
    background:'#ffffff',
    imagePosition: "right",
    height:200,
    onSelected: function(selectedData){
       $('#report_form').submit()
    }
    } );
</script>

