<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Complete Order</title>
    <link rel="stylesheet" href="../../css/bootstrap.css">
    <link rel="stylesheet" href="../../css/custom.css">
</head>
<body>



<div id="wrapper">

    <div class="orderComplete">Order Complete</div>
    <br>
    <div>Your order was successfully processed. We we connect you, via your phone number for additional information</div>

    <table border="1px">
        <tr><th>Personal Information</th></tr>
        <tr>
            <td>Name: </td>
            <td><?= htmlspecialchars($value['first_name'])?></td>
        </tr>
        <tr>
            <td>Last name: </td>
            <td><?= htmlspecialchars($value['last_name'])?></td>
        </tr>
        <tr>
            <td>Email:  </td>
            <td><?= htmlspecialchars($value['email'])?></td>
        </tr>
        <tr>
            <td>Phone:  </td>
            <td><?= htmlspecialchars($value['phone'])?></td>
        </tr>
        <tr>
            <td>Address: </td>
            <td><?= htmlspecialchars($value['address'])?></td>
        </tr>
    </table>
    <br>
    <table border="1px">
        <tr><th>Order information</th></tr>
        <tr>
            <td>Order Number</td>
            <td><?= $value['id']?></td>
        </tr>
        <?php foreach ($orderedProductsForPrint as $product) :?>
            <tr>
                <td>Product Name</td>
                <td><?= $product['header']?></td>
            </tr>

        <?php endforeach;?>
        <tr>
            <td>Total Price: </td>
            <td> <?= $value['total_price']?></td>
        </tr>

    </table>

    <a href="../../index.php">Go back to main page</a>

</div>













<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>