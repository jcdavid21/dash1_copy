<style>
    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    /* Spinner is hidden initially */
    #loadingSpinner {
        display: none;
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .spinner {
		display: none;
        width: 40px;
        height: 40px;
        border: 4px solid rgba(0, 0, 0, 0.2);
        border-top: 4px solid #333;
        border-radius: 50%;
        animation: spin 1s linear infinite;
    }
</style>


<div class="container-fluid" style="margin-top:98px">
	
	<div class="col-lg-12">
		<div class="row">
			<!-- FORM Panel -->
			<div class="col-md-4">
			<div>
				<form action="partials/_menuManage.php" method="post" enctype="multipart/form-data">
					<div class="card mb-3">
						<div class="card-header" style="background-color: rgb(111 202 203);">
							Create New Item
						</div>
						<div class="card-body">
								<div class="form-group">
									<label class="control-label">Name: </label>
									<input type="text" class="form-control" name="name" required>
								</div>
								<div class="form-group">
									<label class="control-label">Price</label>
									<input type="number" class="form-control" name="price" required min="1">
								</div>	
								<div class="form-group">
									<label class="control-label">Category: </label>
									<select name="categoryId" id="categoryId" class="custom-select browser-default" required>
									<option hidden disabled selected value>None</option>
									<?php
										$catsql = "SELECT * FROM `categories`"; 
										$catresult = mysqli_query($conn, $catsql);
										while($row = mysqli_fetch_assoc($catresult)){
											$catId = $row['categorieId'];
											$catName = $row['categorieName'];
											echo '<option value="' .$catId. '">' .$catName. '</option>';
										}
									?>
									</select>
								</div>
								
								<div class="form-group">
									<label for="image" class="control-label">Image</label>
									<input type="file" name="image" id="image" accept=".png" class="form-control" required style="border:none;">
									<small id="Info" class="form-text text-muted mx-3">Please .png file upload.</small>
								</div>
						</div>
								
						<div class="card-footer">
							<div class="row">
								<div class="mx-auto">
									<button type="submit" name="createItem" class="btn btn-sm btn-primary"> Create </button>
								</div>
							</div>
						</div>
					</div>
				</form>
				<!-- Form for Generating Idea -->
				<form action="./partials/_generateIdea.php">
					<div class="card mb-3">
						<div class="card-header" style="background-color: rgb(111 202 203);">
							Generate Mix Ingredients Idea
						</div>
						<div class="card-body position-relative">
							<div class="form-group">
								<label class="control-label">Generated Idea:</label>
								<textarea class="form-control" name="idea" id="idea" placeholder="Generated idea will display here" cols="10" rows="5" disabled></textarea>

								<!-- Loading Spinner Overlay (initially hidden) -->
								<div id="loadingSpinner">
									<div class="spinner"></div>
								</div>
							</div>
						</div>

						<div class="card-footer">
							<div class="row">
								<div class="mx-auto">
									<button type="button" name="generateIdea" class="btn btn-sm btn-primary">Generate</button>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
			</div>
			<!-- FORM Panel -->

			<!-- Table Panel -->
			<div class="col-md-8">
				<div class="card">
					<div class="card-body">
						<table class="table table-bordered table-hover mb-0">
							<thead style="background-color: rgb(111 202 203);">
								<tr>
									<th class="text-center" style="width:7%;">Cat. Id</th>
									<th class="text-center">Img</th>
									<th class="text-center" style="width:58%;">Item Detail</th>
									<th class="text-center" style="width:18%;">Action</th>
								</tr>
							</thead>
							<tbody>
                            <?php
                                $sql = "SELECT * FROM `pizza`";
                                $result = mysqli_query($conn, $sql);
                                while($row = mysqli_fetch_assoc($result)){
                                    $pizzaId = $row['pizzaId'];
                                    $pizzaName = $row['pizzaName'];
                                    $pizzaPrice = $row['pizzaPrice'];
                                    $pizzaCategorieId = $row['pizzaCategorieId'];

                                    echo '<tr>
                                            <td class="text-center">' .$pizzaCategorieId. '</td>
                                            <td>
                                                <img src="../img/prod-'.$pizzaId. '.jpg" alt="image for this item" width="150px" height="150px">
                                            </td>
                                            <td>
                                                <p>Name : <b>' .$pizzaName. '</b></p>
                                                <p>Price : <b>' .$pizzaPrice. '</b></p>
                                            </td>
                                            <td class="text-center">
												<div class="row mx-auto" style="width:112px">
													<button class="btn btn-sm btn-primary" type="button" data-toggle="modal" data-target="#updateItem' .$pizzaId. '">Edit</button>
													<form action="partials/_menuManage.php" method="POST">
														<button name="removeItem" class="btn btn-sm btn-danger" style="margin-left:9px;">Delete</button>
														<input type="hidden" name="pizzaId" value="'.$pizzaId. '">
													</form>
												</div>
                                            </td>
                                        </tr>';
                                }
                            ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!-- Table Panel -->
		</div>
	</div>	
</div>

<?php 
    $pizzasql = "SELECT * FROM `pizza`";
    $pizzaResult = mysqli_query($conn, $pizzasql);
    while($pizzaRow = mysqli_fetch_assoc($pizzaResult)){
        $pizzaId = $pizzaRow['pizzaId'];
        $pizzaName = $pizzaRow['pizzaName'];
        $pizzaPrice = $pizzaRow['pizzaPrice'];
        $pizzaCategorieId = $pizzaRow['pizzaCategorieId'];
?>

<!-- Modal -->
<div class="modal fade" id="updateItem<?php echo $pizzaId; ?>" tabindex="-1" role="dialog" aria-labelledby="updateItem<?php echo $pizzaId; ?>" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: rgb(111 202 203);">
        <h5 class="modal-title" id="updateItem<?php echo $pizzaId; ?>">Item Id: <?php echo $pizzaId; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  	<form action="partials/_menuManage.php" method="post" enctype="multipart/form-data">
		    <div class="text-left my-2 row" style="border-bottom: 2px solid #dee2e6;">
		   		<div class="form-group col-md-8">
					<b><label for="image">Image</label></b>
					<input type="file" name="itemimage" id="itemimage" accept=".png" class="form-control" required style="border:none;" onchange="document.getElementById('itemPhoto').src = window.URL.createObjectURL(this.files[0])">
					<small id="Info" class="form-text text-muted mx-3">Please .png file upload.</small>
					<input type="hidden" id="pizzaId" name="pizzaId" value="<?php echo $pizzaId; ?>">
					<button type="submit" class="btn btn-success my-1" name="updateItemPhoto">Update Img</button>
				</div>
				<div class="form-group col-md-4">
					<img src="../img/prod-<?php echo $pizzaId; ?>.png" id="itemPhoto" name="itemPhoto" alt="item image" width="100" height="100">
				</div>
			</div>
		</form>
		<form action="partials/_menuManage.php" method="post">
            <div class="text-left my-2">
                <b><label for="name">Name</label></b>
                <input class="form-control" id="name" name="name" value="<?php echo $pizzaName; ?>" type="text" required>
            </div>
			<div class="text-left my-2 row">
				<div class="form-group col-md-6">
                	<b><label for="price">Price</label></b>
                	<input class="form-control" id="price" name="price" value="<?php echo $pizzaPrice; ?>" type="number" min="1" required>
				</div>
				<div class="form-group col-md-6">
					<b><label for="catId">Category Id</label></b>
                	<input class="form-control" id="catId" name="catId" value="<?php echo $pizzaCategorieId; ?>" type="number" min="1" required>
				</div>
            </div>
            <input type="hidden" id="pizzaId" name="pizzaId" value="<?php echo $pizzaId; ?>">
            <button type="submit" class="btn btn-success" name="updateItem">Update</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php
	}
?>
<script>
    document.querySelector('button[name="generateIdea"]').addEventListener('click', function(event) {
    event.preventDefault();

    // Show the spinner when the button is clicked
    document.querySelector('.spinner').style.display = 'flex';
	document.getElementById('loadingSpinner').style.background = 'rgba(255, 255, 255, 0.8)';

    setTimeout(() => {
        fetch('./partials/_generateIdea.php')
            .then(response => response.text())
            .then(data => {
                // Display the generated idea in the textarea
                document.getElementById('idea').value = data;
				document.getElementById('loadingSpinner').style.background = '';
                // Hide the spinner after the response is received
                document.querySelector('.spinner').style.display = 'none';
            })
            .catch(error => {
                console.error('Error:', error);

                // Hide the spinner in case of an error
                document.querySelector('.spinner').style.display = 'none';
            });
    }, 2000); // Simulate delay for testing purposes (remove in production)
});

</script>