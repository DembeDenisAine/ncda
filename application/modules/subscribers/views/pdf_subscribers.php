
<h1><?=@$title?></h1>

<table border="1">
    <thead>
        <tr>
            <th style="width: 10px">#</th>
            <th>Member</th>
            <th>Description</th>
            <th>Address</th>
            <th>Phone Number</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
        <?php  
           if($subscribers): 
            $i = $page;  
            foreach($subscribers as $subscriber):
                 $i++;
         ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $subscriber->subscriber_name; ?></td>
                <td><?php echo truncate($subscriber->subscriber_description,200); ?></td>
                <td><?php echo $subscriber->address; ?></td>
                <td><?php echo $subscriber->phone_no; ?></td>
                <td><?php echo $subscriber->email; ?></td>
            </tr>
        <?php endforeach; endif; ?>

    </tbody>
</table>