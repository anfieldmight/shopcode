<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Профилна страница</title>
    <link rel="stylesheet" href="../../../css/bootstrap.css">
    <link rel="stylesheet" href="../../../css/custom.css">
</head>
<body>
<nav  class="navbar navbar-expand-md navbar-dark bg-dark">
    <a class="navbar-brand" href="../../../index.php">ЗакупиТук</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExample04">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Категории</a>
                <div class="dropdown-menu" aria-labelledby="dropdown04">
                    <a class="dropdown-item" href="../../../categories/personal_computers/personal_computer.php">Настолни Компютри</a>
                    <a class="dropdown-item" href="../../../categories/monitors/monitor.php">Монитори</a>
                    <a class="dropdown-item" href="../../../categories/phones/phone.php">Телефони</a>
                    <a class="dropdown-item" href="../../../categories/laptops/laptop.php">Лаптопи</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../../bucket/bucket.php">Кошница</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../profileUnsign/profileHome.php">Моят профил</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../../aboutUs/aboutUs.php">За нас</a>
            </li>

        </ul>

    </div>
</nav>


<div id="wrapper">
    <div class="enterProfileDiv"><a class="enterProfile" href="../../../index.php?resetid=true" onclick="resetID()">Излез от профила</a></div>
    <form method="post">
        <fieldset>
            <legend>Информация за доставка</legend>
            <div id="message"><?= isset($_SESSION['saveChanges']) ? $_SESSION['saveChanges'] : '' ?></div>
            <?php $_SESSION['saveChanges'] = '' ?>
            <div>
                Име: <?= $value['first_name']?>
            </div>

            <div>
                Фамилия: <?= $value['last_name']?>
            </div>

            <div>
                Имейл: <?= $value['email']?>
            </div>

            <div>
                <label for="phone">Телефон: </label>
                <input  type="text" name="phone" placeholder="Телефонен номер" id="phone" value="<?= $value['phone']?>" required >
            </div>
            <div >
                <label for="address">Адрес: </label>
                <textarea name="address" placeholder="Настоящ адрес" id="address" required ><?= $value['address']?></textarea>
            </div>


            <div>
                <button type="submit" name="submit">Обнови</button>
            </div>
        </fieldset>
    </form>

    <?php
        foreach ($orderIds as $oneId){
            $idData = $db->query("SELECT * FROM orders WHERE id = $oneId;", PDO::FETCH_ASSOC);
            $orderInformation = $idData->fetchAll(PDO::FETCH_ASSOC)[0];
            echo "<div><b>". "Поръчка N:" . $oneId . "</b></div>";
            echo " <div><b>Дата на поръчка :</b> ". $orderInformation['create_date']."</div>";
            $productIds = $orderInformation['product_ids'];
            $productIds = explode(", ", $productIds);
            array_pop($productIds);
            foreach ($productIds as $value1){
                $data = explode("-", $value1);
                $category = $data[0];
                $id = $data[1];
                $data = $db->query("SELECT type FROM categories WHERE id = $category", PDO::FETCH_ASSOC);
                $categoryProduct = $data->fetchAll(PDO::FETCH_ASSOC)[0]['type'];
                $data = $db->query("SELECT * FROM $categoryProduct WHERE id = $id", PDO::FETCH_ASSOC);
                $theProductData = $data->fetchAll(PDO::FETCH_ASSOC)[0];
                echo "<div>". "Header:" . $theProductData['header'] . "</div>";
                echo "<div>". "Price:" . $theProductData['price'] . "</div><hr>";
            }
        }
    ?>

</div>




<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>