<?php
session_start();
if (isset($_SESSION['username'])) {
?>

<?php
}
?>
<?php
$servername = "mariadb";
$username = "root";
$password = "rootpwd";
$dbname = "project";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
    exit();
} else {
    $sql = "SELECT * FROM advertise";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
    } else {
        $msg = "No Record found";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DoshroDeal | Buy and Sell Online</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./login.css">
    <!-- <link rel="stylesheet" href="./login.css"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">



</head>

<body>

    <!-- Navigation Bar -->
    <header>

        <a href="#" class="logo"><img src="images/Screenshot from 2022-04-08 23-38-46.png" alt="logo " class="logo"></a>


        <!-- <div class="nav-sell">
<a href="#" class="cta"> <button><i class="fa fa-plus-circle" aria-hidden="true"></i>Add Listing</button></a>
</div> -->


        <div class="nav-profile" id="user-menu">

            <img src="images/6481225432795d8cdf48f0f85800cf66.jpg" alt="">
        </div>
    </header>

    <!-- user profile side-bar start-->
    <div class="side-bar">
        <div id="close-side-bar">
            <i class="fa fa-times"></i>
        </div>

        <div class="user">
            <img src="images/6481225432795d8cdf48f0f85800cf66.jpg" alt="">
            <h3><?php echo $_SESSION['username']; ?></h3>
            <div class="user-navbar">
                <a href="ads.php "><i class="fa fa-angle-right" aria-hidden="true"></i>Add Listing</a>
                <a href=""><i class="fa fa-angle-right" aria-hidden="true"></i>My Listing</a>
                <a href=""><i class="fa fa-angle-right" aria-hidden="true"></i>Edit Profile</a>
                <a href="logout.php"><i class="fa fa-angle-right" aria-hidden="true"></i>Log Out&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>





            </div>

        </div>
    </div>



    <!-- user profile side-bar end-->
    <!-- search bar -->
    <section class="search">
        <div class="search-bar">
            <h1 data-text="Buy Sell And Exchange!">Buy Sell And Exchange!
                <hr>
            </h1><br>




            <form action="https://www.google.com/search" class="search-input">
                <input type="text" name="" id="" placeholder="Search for an item
                " autofocus>
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
    </section>









    <!-- categories section -->
    <section class="categories">
        <h2>Our Categories</h2>
        <div class="cat-row">
            <div class="cat-col">
                <img src="images/furniture.jpeg" alt="">
                <h3>Furnitures</h3>
            </div>
            <div class="cat-col">
                <img src="images/automobile.jpeg" alt="">
                <h3>Automobiles</h3>
            </div>
            <div class="cat-col">
                <img src="images/real-estate-business-compressor.jpg" alt="">
                <h3>Real Estates</h3>
            </div>
            <div class="cat-col">
                <img src="images/gadgets.jpeg" alt="">
                <h3>Gadgets</h3>
            </div>
            <div class="cat-col">
                <img src="images/appliances.jpg" alt="">
                <h3>Home Appliances</h3>
            </div>
        </div>
    </section>


    <section class="container">
        <h2 class="title">Items On Sale</h2>
        <div class="row">


            <?php
            while ($row = mysqli_fetch_assoc($result)) { ?>
                <div class="col">

                    <div class="img-bar">
                        <a href="product-details.html">



                            <img src='<?php echo 'http://localhost:8082/'.$row['image_path']?>' alt="">
                        </a>
                    </div>
                    <div class="description-bar">

                        <div class="pet-name">
                            <?php
                            echo $row['title'];
                            ?>

                        </div>

                        <div class="about-wrapper">



                            <div class="pet-name">
                                <?php
                                echo $row['location'];
                                ?>

                            </div>
                            <div class="pet-name">
                                <?php
                                echo $row['description'];
                                ?>

                            </div>

                        </div>

                    </div>
                    <div class="bottom-bar">
                        <div class="breed-bar">


                            <div class="pet-name">
                                <?php
                                echo $row['category'];
                                ?>

                            </div>

                        </div>
                        <div class="price-bar">Price
                            <div>
                                <?php
                                echo "Rs " . $row['price'];
                                ?></div>
                        </div>
                    </div>
                    <div class="buy-bar"><a href="product-details.html" style="color: white;">Buy Now</a></div>
                </div>



            <? } ?>








    </section>





    <!-- footer -->
    <?php require 'links/footer.php'; ?>


    <script src="usermenu.js"></script>
</body>

</html>