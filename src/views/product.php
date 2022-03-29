<table>
   <tr>
      <th>ID</th>
      <th>NAME</th>
      <th>PRICE</th>
      <th>CATEGORY NAME</th>
   </tr>
   <?php foreach ($passedData['products'] as $elem) { ?>
      <tr>
         <?php foreach ($elem as $key => $val) { ?>
            <td><?= $val ?></td>
         <?php } ?>
      </tr>
   <?php } ?>
</table>