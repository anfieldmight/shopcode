<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Довърши доставка</title>
    <link rel="stylesheet" href="../../css/bootstrap.css">
    <link rel="stylesheet" href="../../css/custom.css">
</head>
<body>



<div id="wrapper">

    <div class="orderComplete">Поръчката записана</div>
    <br>
    <div>Вашата поръчка беше обработена. Ще се свържем с вас по телефон или имейл за повече информация.</div>

    <table border="1px">
        <tr><th>Лична информация</th></tr>
        <tr>
            <td>Име: </td>
            <td><?= htmlspecialchars($value['first_name'])?></td>
        </tr>
        <tr>
            <td>Фамилия: </td>
            <td><?= htmlspecialchars($value['last_name'])?></td>
        </tr>
        <tr>
            <td>Имейл:  </td>
            <td><?= htmlspecialchars($value['email'])?></td>
        </tr>
        <tr>
            <td>Телефон:  </td>
            <td><?= htmlspecialchars($value['phone'])?></td>
        </tr>
        <tr>
            <td>Адрес: </td>
            <td><?= htmlspecialchars($value['address'])?></td>
        </tr>
    </table>
    <br>
    <table border="1px">
        <tr><th>Поръчка</th></tr>
        <tr>
            <td>Номер на поръчката</td>
            <td><?= $value['id']?></td>
        </tr>
        <?php foreach ($orderedProductsForPrint as $product) :?>
            <tr>
                <td>Продукт</td>
                <td><?= $product['header']?></td>
            </tr>

        <?php endforeach;?>
        <tr>
            <td>Крайна цена: </td>
            <td> <?= $value['total_price'] . ' лв'?></td>
        </tr>

    </table>

    <a href="../../index.php">Върни се на Начална страница</a>

</div>













<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>