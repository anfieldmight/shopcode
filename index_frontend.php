<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Начална страница</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="css/lightbox.css">
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
</head>
<body>
    <nav  class="navbar navbar-expand-md navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">ЗакупиТук</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample04">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Категории</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown04">
                        <a class="dropdown-item" href="categories/personal_computers/personal_computer.php">Настолни Компютри</a>
                        <a class="dropdown-item" href="categories/monitors/monitor.php">Монитори</a>
                        <a class="dropdown-item" href="categories/phones/phone.php">Телефони</a>
                        <a class="dropdown-item" href="categories/laptops/laptop.php">Лаптопи</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="navbarItems/bucket/bucket.php">Кошница</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="navbarItems/profile/profileUnsign/profileHome.php">Моят профил</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="navbarItems/aboutUs/aboutUs.php">За нас</a>
                </li>

            </ul>

        </div>
    </nav>


    <div id="wrapper">

        <div class="productHeading">
            Последни продукти
        </div>

        <?php foreach ($lastOffers as $oneOfFour) : ?>
            <?php foreach ($oneOfFour as $oneOfTwo) : ?>
            <?php  $category = $oneOfTwo['category'];
                $class_image_name = '';
                switch ($category){
                    case 1 :
                        $category = 'personal_computers';
                        $class_image_name = 'personal_computersImages';
                        break;
                    case 2 :
                        $category = 'monitors';
                        $class_image_name = 'monitorsImages';
                        break;
                    case 3:
                        $category = "phones";
                        $class_image_name = 'phonesImages';
                        break;
                    case 4:
                        $category = 'laptops';
                        $class_image_name = 'laptopsImages';
                        break;
                }
            ?>
                <div class="shortView">
                    <div class="picSpan">
<!--                        <img src="--><?//= "categories/".$category."/images/".$oneOfTwo['id'].".jpg"?><!--" alt="PCpic" class="shortImg">-->
                        <a href="<?= "categories/".$category."/images/".$oneOfTwo['id']. "/1.jpg"?>" alt="laptop" class="shortImg laptopsImages" data-lightbox="<?=$category . $oneOfTwo['id'] ?>">
                            <img src="<?= "categories/".$category."/images/".$oneOfTwo['id']. "/1.jpg"?>" alt="laptop" class="<?=$class_image_name?>">
                        </a>
                        <a href="<?= "categories/".$category."/images/".$oneOfTwo['id']. "/2.jpg"?>" alt="laptop" class="shortImg laptopsImages" data-lightbox="<?=$category . $oneOfTwo['id'] ?>">
                            <img src="<?= "categories/".$category."/images/".$oneOfTwo['id']. "/2.jpg"?>" alt="laptop" class="shortImg hiddenImage">
                        </a>
                    </div>
                    <div class="descSpan">
                        <div><?= $oneOfTwo ['price']?>лв - <span><a class="addToCartLink" href="navbarItems/bucket/bucket.php?<?php echo $oneOfTwo['category']."=".$oneOfTwo['id']?>">Добави в кошницата</a></span></div>
                        <span ><?= $oneOfTwo['header']; ?></span>
                        <div class="comment more"><?= nl2br($oneOfTwo['description'])?></div>

                    </div>
                </div>
                <br><br><br><br><br><hr>
            <?php endforeach;?>
        <?php endforeach;?>
    </div>












    <script src="js/showMore.js"></script>
    <script src="js/lightbox-plus-jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>


