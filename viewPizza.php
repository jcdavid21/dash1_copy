<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <title id=title>Pizza</title>
    <link rel = "icon" href ="img/logo.jpg" type = "image/x-icon">
    <style>
    #cont {
        min-height : 578px;
    }
    </style>
</head>
<body>
    <?php include 'partials/_dbconnect.php';?>
    <?php require 'partials/_nav.php' ?>

    <div class="container my-4" id="cont">
        <div class="row jumbotron">
        <?php
            $pizzaId = $_GET['pizzaid'];
            $sql = "SELECT * FROM `pizza` WHERE pizzaId = $pizzaId";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $pizzaName = $row['pizzaName'];
            $pizzaPrice = $row['pizzaPrice'];
            $pizzaDesc = $row['pizzaDesc'];
            $pizzaCategorieId = $row['pizzaCategorieId'];
        ?>
        <script> document.getElementById("title").innerHTML = "<?php echo $pizzaName; ?>"; </script> 
        <?php
        echo  '<div class="col-md-4">
                <img src="img/prod-'.$pizzaId. '.jpg" width="249px" height="262px">
            </div>
            <div class="col-md-8 my-4">
                <h3>' . $pizzaName . '</h3>

           
                <p class="mb-0">' .$pizzaDesc .'</p>';

            echo'
                    <form action="partials/_manageCart.php" method="POST">
                        <select name="size">
                            <option value=""> Choose size </option>
                            <option value="18">16" (15-20pax) ₱800</option>
                            <option value="16">16" (15-20pax) ₱800</option>
                            <option value="14">14" (10-15pax) ₱700</option>
                            <option value="12">12" (12pax) ₱500</option>
                        </select>
                        <input type="hidden" name="itemId" value="'.$pizzaId. '">
                        <input type="number" name="quantity" value="1" class="text-center" onchange="updateCart(' . $pizzaId . ')" onkeyup="return false" style="width:60px" min=1 oninput="check(this)" onClick="this.select();">                   
                
                        <button type="submit" name="addToCart" class="btn btn-primary my-2">Add to Cart</button>
                    </form>
            ';
        


                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $pizzaSize = $_POST['size'];
                    $Quantity = $row['itemQuantity'];
                
                    // Initialize cart if not set
                    if (!isset($_SESSION['cart'])) {
                        $_SESSION['cart'] = [];

                        echo '
                        <form action="partials/_manageCart.php" method="POST">
                        <input type="hidden" name="itemId" value="'.$pizzaId. '">
                        <button type="submit" name="addToCart" class="btn btn-primary my-2">Add to Cart</button>';
                    
                    }
                
                    // Add product to cart
                    $_SESSION['cart'][$product_id] = $size;
                
                    echo "Added to cart: Product ID $product_id, Size $size";
                }



            /*
                if($loggedin){
                    $quaSql = "SELECT `itemQuantity` FROM `viewcart` WHERE pizzaId = '$pizzaId' AND `userId`='$userId'";
                    $quaresult = mysqli_query($conn, $quaSql);
                    $quaExistRows = mysqli_num_rows($quaresult);
                    if($quaExistRows == 0) {
                        echo '
                            <form action="partials/_manageCart.php" method="POST">
                            <input type="hidden" name="itemId" value="'.$pizzaId. '">
                            <button type="submit" name="addToCart" class="btn btn-primary my-2">Add to Cart</button>';
                    }else {
                        echo '<a href="viewCart.php"><button class="btn btn-primary my-2">Go to Cart</button></a>';
                    }
                }
                else{
                    echo '<button class="btn btn-primary my-2" data-toggle="modal" data-target="#loginModal">Add to Cart</button>';
                }
            */
                echo '</form>
            </div>'
        ?>
        </div>
    </div>

    <?php require 'partials/_footer.php' ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>         
    <script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>
</body>
</html>