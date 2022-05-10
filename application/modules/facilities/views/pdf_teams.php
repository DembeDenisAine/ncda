
    
 <h2><b>Branch: <?php echo $district;?></b>, <?php echo $facility;?> Facility Team Members </h2>  

<table border="1">
    <thead>
        <tr>
            <th width="5%">#</th>
            <th>Title</th>
            <th>Name</th>
            <th>Gender</th>
            <th>Contact</th>
        </tr>
    </thead>
    <tbody>

        <?php if($teams): ?>
        <?php $i=0; foreach($teams as $tm): $i++; ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $tm['title']; ?></td>
            <td><?php echo $tm['first_name']." ".$tm['last_name']; ?></td>
            <td><?php echo $tm['gender']; ?></td>
            <td><?php echo $tm['contact']; ?></td>
        </tr>
        <?php endforeach; ?>
        <?php endif; ?>

    </tbody>
</table>