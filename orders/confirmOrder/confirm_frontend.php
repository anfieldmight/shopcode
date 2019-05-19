<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Потвърди</title>
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
                <a class="nav-link" href="../../navbarItems/bucket/bucket.php">Кошница</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../../navbarItems/profile/profileUnsign/profileHome.php">Моят профил</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../../navbarItems/aboutUs/aboutUs.php">За нас</a>
            </li>

        </ul>

    </div>
</nav>


<div id="wrapper">

    <?php if(empty($_SESSION['userId'])):?>
    <div class="enterProfileDiv"><a class="enterProfile" href="../../navbarItems/profile/profileUnsign/profileHome.php">Влезте в съществуващ профил</a></div>
    <?php endif?>
    <form method="post" id="orderForm">
        <fieldset>
            <legend>Завърши доставка</legend>
            <div id="message"><?= $_SESSION['messageFormError']?></div>
            <?php if(isset($_SESSION['userId']) && $_SESSION['userId']!=''): ?>
                <div>
                    <label for="firstName">Име: </label>
                    <input type="text" name="firstName" placeholder="Име" id="firstName" value="<?= $value['first_name'] ?>" required >
                </div>
                <div>
                    <label for="lastName">Фамилия: </label>
                    <input type="text" name="lastName" placeholder="Фамилия" id="lastName" value="<?= $value['last_name'] ?>" required >
                </div>
                <div>
                    <label for="email">Имейл: </label>
                    <input type="email" name="email" placeholder="Имейл" id="email" value="<?= $value['email'] ?>" required >
                </div>
                <div >
                    <label for="phone">Телефон: </label>
                    <input  type="text" name="phone" placeholder="Телефон" id="phone" value="<?= $value['phone'] ?>" required >
                </div>
                <div >
                    <label for="address">Адрес: </label>
                    <textarea name="address" placeholder="Настоящ адрес" id="address" required ><?= $value['address']; ?></textarea>
                </div>
            <?php else: ?>
                <div>
                    <label for="firstName">Име: </label>
                    <input type="text" name="firstName" placeholder="Име" id="firstName" required >
                </div>
                <div>
                    <label for="lastName">Фамилия: </label>
                    <input type="text" name="lastName" placeholder="Фамилия" id="lastName" required >
                </div>
                <div>
                    <label for="email">Имейл: </label>
                    <input type="email" name="email" placeholder="Имейл" id="email" required >
                </div>
                <div >
                    <label for="phone">Телефон: </label>
                    <input  type="text" name="phone" placeholder="Телефон" id="phone" required >
                </div>
                <div >
                    <label for="address">Адрес: </label>
                    <textarea name="address" placeholder="Адрес" id="address" required ></textarea>
                </div>
            <?php endif; ?>
            <div>
                Крайна цена:<?php if (!is_array($totalPrice)) echo $totalPrice ?> лв
            </div>

            <div>
                <button type="submit" name="submit">Довърши доставка</button>
                <button type="reset" name="reset">Изчисти!</button>
            </div>
        </fieldset>
    </form>

</div>













<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>
