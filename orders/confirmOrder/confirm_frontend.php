<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="../../css/bootstrap.css">
    <link rel="stylesheet" href="../../css/custom.css">
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
                    <a class="dropdown-item" href="../../categories/personal_computers/personal_computer.php">Personal computers</a>
                    <a class="dropdown-item" href="../../categories/monitors/monitor.php">Monitors</a>
                    <a class="dropdown-item" href="../../categories/phones/phone.php">Phones</a>
                    <a class="dropdown-item" href="../../categories/laptops/laptop.php">Laptops</a>
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


<div id="wrapper">


        Complete order
    <?php if(empty($_SESSION['userId'])):?>
    <a href="../../navbarItems/profile/profileUnsign/profileHome.php">Sign in to automatically fill out information</a>
    <?php endif?>
    <form method="post" id="orderForm">
        <fieldset>
            <legend>Complete purchase</legend>
            <div id="message"><?= $_SESSION['messageFormError']?></div>
            <?php if($_SESSION['userId']!=''): ?>
                <div>
                    <label for="firstName">First name: </label>
                    <input type="text" name="firstName" placeholder="FirstName" id="firstName" value="<?= $value['first_name'] ?>" required >
                </div>
                <div>
                    <label for="lastName">Last name: </label>
                    <input type="text" name="lastName" placeholder="LastName" id="lastName" value="<?= $value['last_name'] ?>" required >
                </div>
                <div>
                    <label for="email">Email: </label>
                    <input type="email" name="email" placeholder="Email" id="email" value="<?= $value['email'] ?>" required >
                </div>
                <div >
                    <label for="phone">Phone: </label>
                    <input  type="text" name="phone" placeholder="Phone number" id="phone" value="<?= $value['phone'] ?>" required >
                </div>
                <div >
                    <label for="address">Address: </label>
                    <textarea name="address" placeholder="Enter your current address" id="address" required ><?= $value['address']; ?></textarea>
                </div>
            <?php else: ?>
                <div>
                    <label for="firstName">First name: </label>
                    <input type="text" name="firstName" placeholder="FirstName" id="firstName" required >
                </div>
                <div>
                    <label for="lastName">Last name: </label>
                    <input type="text" name="lastName" placeholder="LastName" id="lastName" required >
                </div>
                <div>
                    <label for="email">Email: </label>
                    <input type="email" name="email" placeholder="Email" id="email" required >
                </div>
                <div >
                    <label for="phone">Phone: </label>
                    <input  type="text" name="phone" placeholder="Phone number" id="phone" required >
                </div>
                <div >
                    <label for="address">Address: </label>
                    <textarea name="address" placeholder="Enter your current address" id="address" required ></textarea>
                </div>
            <?php endif; ?>
            <div>
                Total price:<?= $totalPrice?> $
            </div>

            <div>
                <button type="submit" name="submit">Complete order</button>
                <button type="reset" name="reset">Clear!</button>
            </div>
        </fieldset>
    </form>

</div>













<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>
