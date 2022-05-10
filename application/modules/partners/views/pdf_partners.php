<h1><?=$title?></h1>

<table border="1">
    <thead>
        <tr>
            <th style="width: 10px">#</th>
            <th>Donor</th>
            <th>Description</th>
            <th>Address</th>
            <th>Phone Number</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
        <?php  
           if($partners): 
            $i = $page;  
            foreach($partners as $partner):
                 $i++;
         ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $partner->partner_name; ?></td>
                <td><?php echo truncate($partner->partner_description,200); ?></td>
                <td><?php echo $partner->address; ?></td>
                <td><?php echo $partner->phone_no; ?></td>
                <td><?php echo $partner->email; ?></td>
            </tr>
        <?php endforeach; endif; ?>

    </tbody>
</table>
