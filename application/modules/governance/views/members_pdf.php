<h1><?=$title?></h1>

<table border="1" >
    <thead>
        <tr>
            <th width="2%">#</th>
            <th>Member Name</th>
            <th>Designation</th>
            <th>Phone Number</th>
            <th>Email</th>
            <th>Tenure</th>
            <th>Status</th>
            <th>Organization</th>
        </tr>
    </thead>
    <tbody>

        <?php if($members): ?>
        <?php
            $i=0; 
            foreach($members as $member): 
                $i++;
         ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $member->title ." ".$member->firstname ." ".$member->lastname; ?></td>
            <td><?php echo $member->role; ?></td>
            <td><?php echo $member->phone_no; ?></td>
            <td><?php echo $member->email_address; ?></td>
            <td><?php echo $member->from_year." to ". $member->to_year; ?></td>
            <td><small class="badge badge-success"><?php echo ($member->is_current)?'Current':'Former'; ?></small></td>
            <td><?php echo get_subscriber_name($member->subscriber_id); ?></td>

        </tr>

       
    <?php 


    endforeach; 
    endif; 

    ?>

    </tbody>
</table>
