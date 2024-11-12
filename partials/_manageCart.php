<?php
include '_dbconnect.php';
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_SESSION['userId'];
    if(isset($_POST['addToCart'])) {
        $itemId = $_POST["itemId"];
        $size = $_POST["size"] ? $_POST["size"] : 12;
        $existSql = "SELECT * FROM `viewcart` WHERE pizzaId = '$itemId' AND `userId`='$userId' AND status_id = 1";
        $result = mysqli_query($conn, $existSql);
        $numExistRows = mysqli_num_rows($result);
        if($numExistRows > 0){
            echo "<script>alert('Item Already Added.');
                    window.history.back(1);
                    </script>";
        }
        else{
            $sql = "INSERT INTO `viewcart` (`pizzaId`, `itemQuantity`, `userId`, `addedDate`, order_size) VALUES ('$itemId', '1', '$userId', current_timestamp(), '$size')";   
            $result = mysqli_query($conn, $sql);
            if ($result){
                echo "<script>
                    window.history.back(1);
                    </script>";
            }
        }
    }
    if(isset($_POST['removeItem'])) {
        $itemId = $_POST["itemId"];
        $sql = "DELETE FROM `viewcart` WHERE `pizzaId`='$itemId' AND `userId`='$userId'";   
        $result = mysqli_query($conn, $sql);
        echo "<script>alert('Removed');
                window.history.back(1);
            </script>";
    }
    if(isset($_POST['removeAllItem'])) {
        $sql = "DELETE FROM `viewcart` WHERE `userId`='$userId'";   
        $result = mysqli_query($conn, $sql);
        echo "<script>alert('Removed All');
                window.history.back(1);
            </script>";
    }
    if(isset($_POST['checkout'])) {
        $date = $_POST["appointmentDate"] ? $_POST["appointmentDate"] : date("Y-m-d");
        $time = $_POST["appointmentTime"];

        if (empty($time)) {
            $time = date("H:i", strtotime('+1 hour'));
        }

        $address = $_POST["address"];
        $zipcode = $_POST["zipcode"];
        $phone_num = $_POST["contactNumber"];

        if($address == "" || $zipcode == "" || $phone_num == ""){
            echo "<script>alert('Please fill in all the fields');
                window.history.back(1);
                </script>";
            exit();
        }

        // Generate a random 6-digit number
        $track_id = rand(100000, 999999);

        $query = "SELECT * FROM viewcart WHERE userId= ? AND status_id = 1";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Insert each item into orderItems with delivery details
                $query = "INSERT INTO orderItems (cartItemId, delivery_date, delivery_time, address, zipcode, status_id, phone_num, track_id) VALUES (?, ?, ?, ?, ?, 2, ?, ?)";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("isssssi", $row['cartItemId'], $date, $time, $address, $zipcode, $phone_num, $track_id);
                $stmt->execute();
            }
            $stmt->close();

            // Update viewcart items to reflect status change
            $sql = "UPDATE `viewcart` SET `status_id`='2' WHERE `userId`='$userId' AND `status_id`='1'";
            $result = mysqli_query($conn, $sql);

            echo "<script>alert('Order Placed Successfully');
                window.location.href='../index.php';
                </script>";
        }

    }
    if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
    {
        $pizzaId = $_POST['pizzaId'];
        $qty = $_POST['quantity'];
        $updatesql = "UPDATE `viewcart` SET `itemQuantity`='$qty' WHERE `pizzaId`='$pizzaId' AND `userId`='$userId'";
        $updateresult = mysqli_query($conn, $updatesql);
    }
    
}
?>