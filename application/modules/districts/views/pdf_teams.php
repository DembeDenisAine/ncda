
<h1><?=@$title?></h1>

<table border="1">
   <thead>
        <tr>
            <th width="5%">#</th>
            <th>Name</th>
            <th>Gender</th>
            <th>Designation</th>
            <th>Contact</th>
            <th>Facility</th>
        </tr>
    </thead>
    <tbody>

        <?php if($teams): ?>
        <?php $i=0; foreach($teams as $tm): $i++; ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $tm['first_name']." ".$tm['last_name']; ?></td>
                <td><?php echo $tm['gender']; ?></td>
                <td><?php echo $tm['title']; ?></td>
                <td><?php echo $tm['contact']; ?></td>
                <td><?php echo $tm['facility_name']; ?></td>
            </tr>
        <?php 
            endforeach;
            endif;
         ?>
    </tbody>
</table>