<?php 
    // Fetch delivery details for modals
    $itemModalSql = "SELECT DISTINCT tc.*, ti.*, ts.*, tp.*, tz.pizzaPrice FROM `viewcart` tc 
                     INNER JOIN orderitems ti ON tc.cartitemId = ti.cartitemId 
                     INNER JOIN order_status ts ON tc.status_id = ts.status_id 
                     INNER JOIN payment_mode tp ON ti.payment_id = tp.payment_id 
                     INNER JOIN pizza tz ON tc.pizzaId = tz.pizzaId 
                     WHERE ti.status_id IN(2, 3, 4, 5, 6) ORDER BY ti.order_id DESC";
    $itemModalResult = mysqli_query($conn, $itemModalSql);

    // Check for query errors
    if (!$itemModalResult) {
        die("Query failed: " . mysqli_error($conn));
    }

    while($itemModalRow = mysqli_fetch_assoc($itemModalResult)){
        $orderid = htmlspecialchars($itemModalRow['order_id']);
        $userid = htmlspecialchars($itemModalRow['userId']);
        $orderStatus = htmlspecialchars($itemModalRow['status_id']);
?>

<!-- Modal for Order Status -->
<div class="modal fade" id="orderStatus<?php echo $orderid; ?>" tabindex="-1" role="dialog" aria-labelledby="orderStatus<?php echo $orderid; ?>" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: rgb(111 202 203);">
                <h5 class="modal-title" id="orderStatus<?php echo $orderid; ?>">Order Status and Delivery Details </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="partials/_orderManage.php" method="post" style="border-bottom: 2px solid #dee2e6;">
                    <div class="text-left my-2">    
                        <b><label for="status">Order Status</label></b>
                        <div class="row mx-2">
                            <select name="status" id="status">
                                <option value="<?php echo $itemModalRow["status_id"] ?>" disabled selected>
                                    <?php echo htmlspecialchars($itemModalRow["status_name"]); ?>
                                </option>
                                <?php 
                                    $statusSql = "SELECT * FROM `order_status` WHERE status_id > ? AND status_id != 1";
                                    $statusStmt = mysqli_prepare($conn, $statusSql);
                                    mysqli_stmt_bind_param($statusStmt, "i", $orderStatus);
                                    mysqli_stmt_execute($statusStmt);
                                    $statusResult = mysqli_stmt_get_result($statusStmt);
                                    
                                    while($statusRow = mysqli_fetch_assoc($statusResult)){
                                        $statusId = htmlspecialchars($statusRow['status_id']);
                                        $statusName = htmlspecialchars($statusRow['status_name']);
                                        echo '<option value="' . $statusId . '">' . $statusName . '</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <input type="hidden" id="orderId" name="orderId" value="<?php echo $orderid; ?>">
                    <button type="submit" class="btn btn-success mb-2" name="updateStatus">Update</button>
                </form>

                <?php 
                    // Fetch delivery details for this order
                    $deliveryDetailSql = "SELECT * FROM `deliverydetails` WHERE `orderId` = ?";
                    $deliveryDetailStmt = mysqli_prepare($conn, $deliveryDetailSql);
                    mysqli_stmt_bind_param($deliveryDetailStmt, "i", $orderid);
                    mysqli_stmt_execute($deliveryDetailStmt);
                    $deliveryDetailResult = mysqli_stmt_get_result($deliveryDetailStmt);
                    $deliveryDetailRow = mysqli_fetch_assoc($deliveryDetailResult);

                    if ($deliveryDetailRow) {
                        // If delivery details already exist, display the existing details
                        $trackId = htmlspecialchars($deliveryDetailRow['id']);
                        $deliveryBoyName = htmlspecialchars($deliveryDetailRow['deliveryBoyName']);
                        $deliveryBoyPhoneNo = htmlspecialchars($deliveryDetailRow['deliveryBoyPhoneNo']);
                        $deliveryTime = htmlspecialchars($deliveryDetailRow['deliveryTime']);
                        
                        echo "<p><b>Delivery Details:</b></p>";
                        echo "<p>Name: $deliveryBoyName</p>";
                        echo "<p>Phone: $deliveryBoyPhoneNo</p>";
                        echo "<p>Delivery Time: $deliveryTime</p>";
                    } else {
                        // If delivery details do not exist, show the form to add them
                        echo "<div class='alert alert-warning'>No delivery details available for this order. Please assign a delivery rider.</div>";
                        ?>
                        <form action="partials/_orderManage.php" method="post">
                            <div class="text-left my-2">
                                <b><label for="trackId">Track ID: <?php echo $itemModalRow["track_id"] ?> </label></b>
                                <input type="hidden" id="trackId" name="trackId" value="<?php echo $itemModalRow["track_id"] ?>">
                            </div>
                            <div class="text-left my-2">
                                <b><label for="name">Delivery Boy Name</label></b>
                                <input class="form-control" id="name" name="name" type="text" required>
                            </div>
                            <div class="text-left my-2 row">
                                <div class="col-md-6">
                                    <b><label for="phoneNo">Delivery Boy Phone No.</label></b>
                                    <input class="form-control" id="phoneNo" name="phoneNo" type="text" required>
                                </div>
                                <div class="col-md-6">
                                    <b><label for="deliveryTime">Delivery Time</label></b>
                                    <input class="form-control" id="deliveryTime" name="deliveryTime" type="time" required>
                                </div>
                            </div>
                            <input type="hidden" name="orderId" value="<?php echo $orderid; ?>">
                            <button type="submit" class="btn btn-success mb-2" name="assignDelivery">Assign Delivery</button>
                        </form>
                        <?php
                    }
                ?>
            </div>
        </div>
    </div>
</div>
<?php } ?>