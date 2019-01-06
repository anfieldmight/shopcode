<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="../../css/bootstrap.css">
    <link rel="stylesheet" href="../../css/custom.css">
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
</head>
<body>
<nav  class="navbar navbar-expand-md navbar-dark bg-dark">
    <a class="navbar-brand" href="../../index.php">HereBuy</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExample04">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories</a>
                <div class="dropdown-menu" aria-labelledby="dropdown04">
                    <a class="dropdown-item" href="personal_computer.php">Personal computers</a>
                    <a class="dropdown-item" href="../monitors/monitor.php">Monitors</a>
                    <a class="dropdown-item" href="../phones/phone.php">Phones</a>
                    <a class="dropdown-item" href="../laptops/laptop.php">Laptops</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../../navbarItems/bucket/bucket.php">Bucket</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../../navbarItems/profile/profileUnsign/profileHome.php">My profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../../navbarItems/aboutUs/aboutUs.php">About us</a>
            </li>

        </ul>

    </div>
</nav>


<div id="wrapper"><br>
        <form method="post" action="personal_computer.php">
            Make:
             <select name="make">
                <option value ='0'> - select an option -</option>
                <option value="HP">HP</option>
                <option value="Asus">Asus</option>
                <option value="Lenovo">Lenovo</option>
                <option value="Acer">Acer</option>
            </select>
            Processor: <select name="processor">
                <option value ='0'>- select an option -</option>
                <option value="i3">i3</option>
                <option value="i5">i5</option>
                <option value="i7">i7</option>
                <option value="AMD">AMD</option>
            </select>
            RAM: <select name="RAM">
                <option value ='0'>- select an option -</option>
                <option value="4">4</option>
                <option value="6">6</option>
                <option value="8">8</option>
            </select><br><br>
            HD size: <select name="hd">
                <option value ='0'>- select an option -</option>
                <option value="500">500 GB</option>
                <option value="1000">1 TB</option>
                <option value="2000">2 TB</option>
            </select>
            Price: <select name="price">
                <option value ='0'>- select an option -</option>
                <option value="599"> < 600$ </option>
                <option value="600-1000">600$ - 1000$</option>
                <option value="1001"> > 1000$ </option>
            </select>
            <input type="submit" name="submitFilter" value="Find now">
            <input type="reset" name="resetFilter" value="Reset">

        </form>
    <br>

        PC offers <br>
        <div> <?php echo $noMatch; ?></div>
        <?php foreach($data as $value): ?>



                <div class="shortView">
                    <div class="picSpan">
                        <img src="<?= "images/".$value['id'].".jpg"?>" alt="PCpic" class="shortImg">
                    </div>
                    <div class="descSpan">
                        <div><?= $value ['price']?>$ - <span><a href="../../navbarItems/bucket/bucket.php?<?php echo $value['category']."=".$value['id']?>">Add to Cart</a></span></div>
                        <span ><?= $value['header']; ?></span>
                        <div class="comment more"><?= $value['description']?></div>

                    </div>

                </div>
            <br><br><br><hr>

        <?php endforeach; ?>


</div>




<script src="../../js/showMore.js"></script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>