<?php 
	include_once "../init.php";

	//User login checker
	if ($getFromU->loggedIn() === false) {
        header('Location: ../index.php');
	}
	
	include_once 'skeleton.php'; 

	// Create an expense record
	if(isset($_POST['addexpense']))
	{
		$dt = date("Y-m-d H:i:s", strtotime($_POST["dateexpense"]));
		$itemname = $_POST['item'];
		$itemcost = $_POST['costitem'];
		$location_id = $_POST['location'];
		$getFromE->create("expense", array('UserId'=>$_SESSION['UserId'], 'location_id'=>$location_id, 'Item' => $itemname, 'Cost'=>$itemcost, 'Date' => $dt));
		echo '<script>
			Swal.fire({
				title: "Done!",
				text: "Records Updated Successfully",
				icon: "success",
				confirmButtonText: "Close"
			})
			</script>';
	}

	/* Get locations from DB */
	$all_locations = $getFromE->getAllLocation();
?>

<div class="wrapper">
        <div class="row">
            <div class="col-12 col-m-12 col-sm-12" >
                <div class="card">
                    <div class="counter" style="height: 60vh; display: flex; align-items: center; justify-content: center;">
                    <form action="" method="post">
								<div>
									<label style="font-family: 'Source Sans Pro'; font-size: 1.3em; ">Date of Expense:</label><br><br>
									<input class="text-input" type="datetime-local" value="" name="dateexpense" required="true" style="width: 100%; padding-top: 8px; "><br><br>
								</div>

								<div>
									<label style="font-family: 'Source Sans Pro'; font-size: 1.3em; ">Location:</label><br>
									<select class="form-control" name="location">
										<option>Choose Location</option>
										<?php 
											if(isset($all_locations)&&count($all_locations)>0){
												foreach($all_locations as $key=>$innerArr){
											?>
											<option value="<?php echo $innerArr->id; ?>"><?php echo $innerArr->location_name; ?></option>
											<?php
												}
											}
										?>
									</select>
								</div>

								<div>
									<label style="font-family: 'Source Sans Pro'; font-size: 1.3em; ">Item:</label><br>
									<input type="text" class="text-input" name="item" value="" required="true" style="width: 100%; padding-top: 10px; "><br><br>
								</div>
								
								<div>
									<label style="font-family: 'Source Sans Pro'; font-size: 1.3em; ">Cost of Item:</label><br>
									<input class="text-input" type="text" value="" required="true" name="costitem" onkeypress='validate(event)' style="width: 100%; padding-top: 10px; "><br><br>
								</div>
																
								<div><br>
									<button type="submit" class="pressbutton" name="addexpense">Add</button>
								</div>								
								
								</div>
								
							</form>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

    <script src="../static/js/4-Set-Budget.js"></script>