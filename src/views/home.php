<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Home</title>
</head>

<body>
   <?php foreach ($passedData['data'] as $key => $val) { ?>
      <p>

         <!-- "<br> id: " . $val['id_prd'] . " - name: " . $val['name'] . " - price: " . $val['price'] . "<br>" -->

         <?= "<br> id: " . $val['id'] . " - first-name: " . $val['first_name'] . " - last-name: " . $val['last_name'] . " - phone: " . $val['phone'] . " - address: " . $val['address'] . " - id_card: " . $val['id_card'] . " - description: " . $val['des'] . "<br>" ?>
      </p>
   <?php } ?>

</body>

</html>