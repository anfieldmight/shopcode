<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bucket</title>
    <link rel="stylesheet" href="../../../css/bootstrap.css">
    <link rel="stylesheet" href="../../../css/custom.css">
</head>
<body>
<nav  class="navbar navbar-expand-md navbar-dark bg-dark">
    <a class="navbar-brand" href="../../../index.php">HereBuy</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExample04">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories</a>
                <div class="dropdown-menu" aria-labelledby="dropdown04">
                    <a class="dropdown-item" href="../../../categories/personal_computers/personal_computer.php">Personal computers</a>
                    <a class="dropdown-item" href="../../../categories/monitors/monitor.php">Monitors</a>
                    <a class="dropdown-item" href="../../../categories/phones/phone.php">Phones</a>
                    <a class="dropdown-item" href="../../../categories/laptops/laptop.php">Laptops</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../../bucket/bucket.php">Bucket</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../profileUnsign/profileHome.php">My profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../../aboutUs/aboutUs.php">About us</a>
            </li>

        </ul>

    </div>
</nav>


<div id="wrapper">
    <a href="../../../index.php?resetid=true" onclick="resetID()">Log out</a>
    <form method="post">
        <fieldset>
            <legend>My delivery info</legend>
            <div id="message"><?= $_SESSION['saveChanges']?></div>
            <?php $_SESSION['saveChanges'] = '' ?>
            <div>
                Name: <?= $value['first_name']?>
            </div>

            <div>
                Last name: <?= $value['last_name']?>
            </div>

            <div>
                Email: <?= $value['email']?>
            </div>

            <div>
                <label for="phone">Phone: </label>
                <input  type="text" name="phone" placeholder="Phone number" id="phone" value="<?= $value['phone']?>" required >
            </div>
            <div >
                <label for="address">Address: </label>
                <textarea name="address" placeholder="Enter your current address" id="address" required ><?= $value['address']?></textarea>
            </div>


            <div>
                <button type="submit" name="submit">Update info</button>
            </div>
        </fieldset>
    </form>

    <?php


        foreach ($orderIds as $oneId){
            $idData = $db->query("SELECT * FROM orders WHERE id = $oneId;", PDO::FETCH_ASSOC);
            $orderInformation = $idData->fetchAll(PDO::FETCH_ASSOC)[0];
            echo "<div><b>". "Order N:" . $oneId . "</b></div>";
            echo " <div>Order date : ". $orderInformation['create_date']."</div>";
            //print_r($orderInformation);
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