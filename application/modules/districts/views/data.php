<?php  
  require_once('add_district_modal.php'); 
  require_once('upload_districts_modal.php'); 
  ?>

<div class="row">
    <div class="btn-group">
        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-default">
          <i class="fas fa-plus"></i> Add a Branch</button>
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#upload"><i class="fas fa-upload"></i> Import from Excel</button>
        <a class="btn btn-primary" href="<?=base_url()?>uploads/Districts_template.xlsx"><i class="fas fa-download"></i> Download Excel Template</a>
    </div>
</div>

<form class="mt-2" method="POST" action="<?=site_url('district-list')?>">
    
    <label for="hint">Search </label>
    <div class="input-group">
            <input value="<?=$search?>" id="hint" type="text" placeholder="Search here..." class="form-control" name="search">
        <button  class="input-group-addon btn bg-primary flat"  type="submit" class="btn btn-primary">Search</button>
    </div>
    
</form>

<hr>

<table class="table table-bordered">
    <thead>
        <tr>
            <th width="5%">#</th>
            <th>Branch Name</th>
            <th>Region</th>
            <th width="15%">Action</th>
        </tr>
    </thead>
    <tbody>

        <?php if($districts): ?>
        <?php $i=0; foreach($districts as $district): $i++; ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $district->district_name; ?></td>
            <td><?php echo $district->region; ?></td>
            <td>
                <div class="dropdown">
                    <button class="btn bg-primary btn-xs dropdown-toggle btn-select-option"
                            type="button"
                            data-toggle="dropdown">Options
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu options-dropdown" style="padding: 10px;">



                       <li>
                        <a href="<?php echo base_url('teams-district/'.$district->id);?>">
                          <i class="fas fa-users"></i> View Teams</a>
                        </li>
                        
                       <li>
                        <a href="<?php echo base_url('facility-list/'.$district->id);?>"  
                        ><i class="fas fa-hospital"></i> View Facilities</a> 
                       </li>

                        <li>
                            <a href="#edt<?php echo $district->id;?>"  data-toggle="modal">
                            <i class="fas fa-edit"></i>  Edit Branch</a>
                        </li>
                        <li>
                            <a href="#del<?php echo $district->id; ?>" data-toggle="modal">
                             <i class="fas fa-trash"></i> Delete Branch</a>
                        </li>
                    </ul>
                </div>
            </td>
        </tr>

       
    <?php 

    require('district_delete_modal.php');
    require('district_edit_modal.php');

    endforeach; 
    endif; 

    ?>

    </tbody>
</table>

<?php echo $links; ?>
