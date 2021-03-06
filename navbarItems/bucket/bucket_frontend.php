<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Кошница</title>
    <link rel="stylesheet" href="../../css/bootstrap.css">
    <link rel="stylesheet" href="../../css/custom.css">
</head>
<body>
<nav  class="navbar navbar-expand-md navbar-dark bg-dark">
    <a class="navbar-brand" href="../../index.php">ЗакупиТук</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExample04">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Категории</a>
                <div class="dropdown-menu" aria-labelledby="dropdown04">
                    <a class="dropdown-item" href="../../categories/personal_computers/personal_computer.php">Настолни Компютри</a>
                    <a class="dropdown-item" href="../../categories/monitors/monitor.php">Монитори</a>
                    <a class="dropdown-item" href="../../categories/phones/phone.php">Телефони</a>
                    <a class="dropdown-item" href="../../categories/laptops/laptop.php">Лаптопи</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="bucket.php">Кошница</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../profile/profileUnsign/profileHome.php">Моят профил</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../aboutUs/aboutUs.php">За нас</a>
            </li>

        </ul>

    </div>
</nav>


<div id="wrapper">




    <?php if (!empty($data)): ?>
        <?php foreach($data as $item): ?>

            <?php foreach($item as $value): ?>
                <?php $totalPrice += $value['price'];
                    $orderIds .= $value['category']."-".$value['id']. ", ";
                ?>
                <div>
                    <span>Продукт : </span><span class="biggetText"><?= $value['header']?></span>
                    <br>
                    <span class="priceCart">Цена : <span> <?= $value['price']?> лв</span></span>
                    <br>
                    <span><a class="removeCartItem" href="../../navbarItems/bucket/bucket.php?remove=true&type=<?= $value['category']?>&number=<?= $value['id']?>">Премахни продукт</a></span>
                </div>

                <hr>

            <?php endforeach; ?>

        <?php endforeach; ?>
    <?php endif; ?>

    <?php if(!empty($_SESSION['orderIds']) || !empty($_GET)) : ?>
        <div>
            <span class="priceCart">Крайна Цена: <?= $totalPrice?> лв</span>
        </div>
        <br>
        <div>
            <span class="priceCart biggerLinkButton"><a class="testit generalLink" href="../../orders/confirmOrder/confirm.php">Потвърди поръчка</a></span>
        </div>
    <?php else :?>

        <div class="centerItems orderComplete">Кошницата е празна.</div>
        <div class="addlinkButton"><a class="addProductLink" href="../../index.php" >Добави продукти</a></div>
    <?php endif;?>

</div>













<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>