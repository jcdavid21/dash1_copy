<!-- Checkout Modal -->
<div class="modal fade" id="checkoutModal" tabindex="-1" role="dialog" aria-labelledby="checkoutModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="checkoutModalLabel">Enter Your Details:</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="partials/_manageCart.php" method="post">
                    <div class="form-group">
                        <b><label for="deliveryOption">Delivery Option:</label></b><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="deliveryOption" id="deliverNow" value="now" checked>
                            <label class="form-check-label" for="deliverNow">Deliver Now</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="deliveryOption" id="scheduleLater" value="later">
                            <label class="form-check-label" for="scheduleLater">Schedule for Later</label>
                        </div>
                    </div>

                    <div id="scheduleFields" style="display: none;">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <b><label for="appointmentDate">Date</label></b>
                                <input type="date" class="form-control" id="appointmentDate" name="appointmentDate">
                            </div>
                            <div class="form-group col-md-6">
                                <b><label for="appointmentTime">Time</label></b>
                                <input type="time" class="form-control" id="appointmentTime" name="appointmentTime">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <b><label for="address">Address:</label></b>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" required>
                    </div>

                    <div class="form-group">
                        <b><label for="zipcode">ZIP Code:</label></b>
                        <input type="text" class="form-control" id="zipcode" name="zipcode" placeholder="Enter ZIP Code" required pattern="[0-9]{5}" maxlength="5">
                    </div>

                    <div class="form-group">
                        <b><label for="contactNumber">Contact Number:</label></b>
                        <input type="text" class="form-control" id="contactNumber" name="contactNumber" 
                            placeholder="Enter Contact Number" required maxlength="11" 
                            pattern="[0-9]{11}" inputmode="numeric" 
                            title="Please enter an 11-digit contact number." 
                            oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                    </div>


                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <input type="hidden" name="amount" value="<?php echo $totalPrice ?>">
                        <button type="submit" name="checkout" class="btn btn-success">Order</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // Toggle visibility of date and time fields based on delivery option
    document.getElementById('scheduleLater').addEventListener('change', function() {
        document.getElementById('scheduleFields').style.display = 'block';
    });
    document.getElementById('deliverNow').addEventListener('change', function() {
        document.getElementById('scheduleFields').style.display = 'none';
        document.getElementById('appointmentDate').value = '';
        document.getElementById('appointmentTime').value = '';
    });
</script>
