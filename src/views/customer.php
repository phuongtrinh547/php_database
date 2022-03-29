<table>
   <tr>
      <th>ID</th>
      <th>FIRST-NAME</th>
      <th>LAST-NAME</th>
      <th>PHONE</th>
      <th>ADDRESS</th>
      <th>ID-CARD</th>
      <th>DESCRIPTION</th>
   </tr>
   <?php foreach ($passedData['customers'] as $elem) { ?>
      <tr>
         <?php foreach ($elem as $key => $val) { ?>
            <td><?= $val ?></td>
         <?php } ?>
      </tr>
   <?php } ?>
</table>