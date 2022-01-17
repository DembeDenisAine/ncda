

<?php if($projects): 
     foreach($projects as $proj): 
     $isInPast = is_past($proj->end_date);
     $color = ($isInPast)?'green':'orange';
?>
        <div class="card list-card" style="border-left: 10px solid <?=$color?>;">
            <div class="card-body">
            <div class="row " >
                <div class="col-md-10">
                    <h4><?php echo $proj->project_name; ?></h4>
                    <label>Description: </label>
                    <p><?php echo truncate($proj->project_description,500); ?></p>
                    <div class="grid">
                        <div><strong><?=($isInPast)?'Started':'Starts'?>:</strong> <?php echo $proj->start_date; ?></div>
                        <div><strong><?=($isInPast)?'Ended':'Ends'?>:</strong> <?php echo $proj->end_date; ?></div>
                        <div><strong>Duration:</strong> <?php echo $proj->duration; ?></div>
                        <div><strong>Last Updated:</strong> <?php echo time_ago($proj->updated_at); ?></div>
                    </div>
                </div>
                <div class="col-md-1 flexed">
                         <div class="dropdown">
                                   <a class="text-muted"  type="button"data-toggle="dropdown">
                                       <h5><i class="fa fa-ellipsis-v"></i></h5>
                                    </a>
                                    <ul class="dropdown-menu options-dropdown" style="padding: 10px;">
                                    
                                        <li>
                                            <a href="<?php echo base_url('entry/'.$proj->id);?>">Field Data Entry</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url('objective-list/'.$proj->id);?>">View Objectives</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url('edit-project/'.$proj->id);?>"> Edit Project</a>
                                        </li>
                                    </ul>
                            </div>
                </div>
            </div>
           
         </div>
        </div>
        <?php endforeach; ?>
        <?php endif; ?>

        <?php echo $links; ?>