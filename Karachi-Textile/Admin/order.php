<?php
include('includes/header.php');
?>

	
	
	<!--form start-->

	
	<div class="container-fluid">
		<div class="row mt-5 mb-5">

		<h2 style="text-align:center;">Orders Page</h2>
		<!--<a class="btn btn-primary" href="add-product.php" style="margin-left:150px;">Add Product</a>-->
			<div class="col-md-3"></div>
				<div class="col-md-6" style="margin-top:80px;margin-left:30px;">
				
					
					
					<table class="table">
				  
				  <thead>
					<tr>
					  <th scope="col">Order ID</th>
					  <th scope="col">Customer Name</th>
					  <th scope="col">Customer Phone No</th>
					  <th scope="col">Order Product</th>
					  <th scope="col">Order Status</th>
					   <th scope="col">Delete Order</th>
					  <th scope="col">Edit Order</th>
					</tr>
				  </thead>
				  <tbody>
					<tr>
					  <th scope="row">1</th>
					  <td>Mark</td>
					  <td>Otto</td>
					  <td>@mdo</td>
					  <td>mdokmcmsdplmplcmpldmslmmdmsmmsdm
					  mdokmcmsdplmplcmpldmslmmdmsmmsdm
					  mdokmcmsdplmplcmpldmslmmdmsmmsdm</td>
					  <td><a class="btn btn-warning">Delete</a></td>
					  <td><a class="btn btn-primary">Edit</a></td>
					</tr>
					

				  </tbody>
				</table>
					
				
				</div>
				<div class="col-md-3">
					
					
					
				</div>
		</div>
	</div>
	
	

	<!--finish form-->

<?php
include('includes/footer.php');
?>