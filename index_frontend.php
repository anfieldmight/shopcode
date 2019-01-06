<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/custom.css">
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
</head>
<body>
    <nav  class="navbar navbar-expand-md navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">HereBuy</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample04">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown04">
                        <a class="dropdown-item" href="categories/personal_computers/personal_computer.php">Personal computers</a>
                        <a class="dropdown-item" href="categories/monitors/monitor.php">Monitors</a>
                        <a class="dropdown-item" href="categories/phones/phone.php">Phones</a>
                        <a class="dropdown-item" href="categories/laptops/laptop.php">Laptops</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="navbarItems/bucket/bucket.php">Bucket</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="navbarItems/profile/profileUnsign/profileHome.php">My profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="navbarItems/aboutUs/aboutUs.php">About us</a>
                </li>

            </ul>

        </div>
    </nav>


    <div id="wrapper">

        <div>
            Latest offers of each category
        </div>

        <?php foreach ($lastOffers as $oneOfFour) : ?>
            <?php foreach ($oneOfFour as $oneOfTwo) : ?>
            <?php  $category = $oneOfTwo['category'];
                switch ($category){
                    case 1 :
                        $category = 'personal_computers';
                        break;
                    case 2 :
                        $category = 'monitors';
                        break;
                    case 3:
                        $category = "phones";
                        break;
                    case 4:
                        $category = 'laptops';
                        break;
                }
            ?>
                <div class="shortView">
                    <div class="picSpan">
                        <img src="<?= "categories/".$category."/images/".$oneOfTwo['id'].".jpg"?>" alt="PCpic" class="shortImg">
                    </div>
                    <div class="descSpan">
                        <div><?= $oneOfTwo ['price']?>$ - <span><a href="navbarItems/bucket/bucket.php?<?php echo $oneOfTwo['category']."=".$oneOfTwo['id']?>">Add to Cart</a></span></div>
                        <span ><?= $oneOfTwo['header']; ?></span>
                        <div class="comment more"><?= $oneOfTwo['description']?></div>

                    </div>

                </div>
                <br><br><br><br><br><hr>
            <?php endforeach;?>
        <?php endforeach;?>
    </div>












    <script src="js/showMore.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>


