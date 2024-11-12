<?php
    include '_dbconnect.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Update Order Status
        if (isset($_POST['updateStatus'])) {
            $orderId = $_POST['orderId'];
            $status = $_POST['status']; // Ensure the correct 'status' is passed, as it's used in the form
            
            $sql = "UPDATE `orderitems` SET `status_id` = ? WHERE `order_id` = ?";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "ii", $status, $orderId);
            $result = mysqli_stmt_execute($stmt);
            
            $sql = "UPDATE `viewcart` SET `status_id` = ? WHERE `cartItemId` = (SELECT `cartItemId` FROM `orderitems` WHERE `order_id` = ?)";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "ii", $status, $orderId);
            $result = mysqli_stmt_execute($stmt);


            if ($result) {
                echo "<script>alert('Update successful');
                      window.location=document.referrer;
                      </script>";
            } else {
                echo "<script>alert('Update failed');
                      window.location=document.referrer;
                      </script>";
            }
        }

        // Assign or Update Delivery Details
        if (isset($_POST['assignDelivery'])) {
            $orderId = $_POST['orderId'];
            $name = $_POST['name'];
            $phone = $_POST['phoneNo'];
            $deliveryTime = $_POST['deliveryTime'];

            // Check if the trackId (delivery details) is provided (to decide if it's insert or update)
            $trackId = isset($_POST['trackId']) ? $_POST['trackId'] : NULL;

            if ($trackId != NULL) {

                $sql = "INSERT INTO deliverydetails (id, orderId, deliveryBoyName, deliveryBoyPhoneNo, deliveryTime) 
                VALUES (?, ?, ?, ?, ?)";
                $stmt = mysqli_prepare($conn, $sql);

                if ($stmt === false) {
                die('mysqli_prepare() failed: ' . htmlspecialchars(mysqli_error($conn)));
                }

                mysqli_stmt_bind_param($stmt, "iisss", $trackId, $orderId, $name, $phone, $deliveryTime);

                if (mysqli_stmt_bind_param($stmt, "iisss", $trackId, $orderId, $name, $phone, $deliveryTime) === false) {
                die('mysqli_stmt_bind_param() failed: ' . htmlspecialchars(mysqli_stmt_error($stmt)));
                }

                $result = mysqli_stmt_execute($stmt);

                if ($result === false) {
                die('mysqli_stmt_execute() failed: ' . htmlspecialchars(mysqli_stmt_error($stmt)));
                }



                if ($result) {
                    echo "<script>alert('Delivery details assigned successfully');
                          window.location=document.referrer;
                          </script>";
                } else {
                    echo "<script>alert('Failed to assign delivery');
                          window.location=document.referrer;
                          </script>";
                }
            } else {
                // Update existing delivery details
                $sql = "UPDATE `deliverydetails` SET `deliveryBoyName` = ?, `deliveryBoyPhoneNo` = ?, `deliveryTime` = ?, `dateTime` = current_timestamp() 
                        WHERE `id` = ?";
                $stmt = mysqli_prepare($conn, $sql);
                mysqli_stmt_bind_param($stmt, "sssi", $name, $phone, $deliveryTime, $trackId);
                $result = mysqli_stmt_execute($stmt);

                if ($result) {
                    echo "<script>alert('Delivery details updated successfully');
                          window.location=document.referrer;
                          </script>";
                } else {
                    echo "<script>alert('Failed to update delivery');
                          window.location=document.referrer;
                          </script>";
                }
            }
        }
    }
?>
