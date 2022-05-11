
<h4><?=$title?></h4>
<hr>

<table border="1">
    <thead>
        <tr>
            <th style="width: 10px">#</th>
            <th>Facility</th>
            <?php if(empty($district)) { ?>
                <th>Branch</th>
            <?php } ?>
        </tr>
    </thead>
    <tbody>
        <?php  if($facilities): $i=0;  foreach($facilities as $fty): $i++; ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $fty['facility_name']; ?></td>
                <?php if(empty($district)) { ?>
                    <td><?php echo $fty['district_name']; ?></td>
                <?php } ?>
            </tr>
        <?php endforeach; endif; ?>
    </tbody>
</table>