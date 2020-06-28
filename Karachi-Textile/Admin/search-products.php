<?php
 session_start();
 if(!isset($_SESSION['email']) )
 {
    header("Location:./login.php");
 }
?>

<?php
echo '
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
		// <!-- Optional: include a polyfill for ES6 Promises for IE11 -->
		// <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

		';

include('includes/header.php');
require_once("./PHP/DBConn.php");

echo
'
<style>
* {
	box-sizing: border-box;
  }
  
  form.example input[type=text] {
	padding: 5px;
	font-size: 17px;
	border: 1px solid grey;
	float: left;
	width: 80%;
	background: #f1f1f1;
  }
  
  form.example button {
	float: left;
	width: 20%;
	padding:8.9px;
	background: #2196F3;
	color: white;
	font-size: 17px;
	border: 1px solid grey;
	border-left: none;
	cursor: pointer;
  }
  
  form.example button:hover {
	background: #0b7dda;
  }
  
  form.example::after {
	content: "";
	clear: both;
	display: table;
  }
  </style>
  ';

$db = new dbconn();

?>

	
	
	<!--form start-->

	
	<div class="container-fluid">
	
		<div class="row mt-5 mb-5">
			
		<h2 style="text-align:center;">Search Page</h2>
	
		<form method="POST" class="example"  style="margin:auto;max-width:300px">
		<br/>	
			<input type="text" placeholder="Search.." name="search">
			<button type="submit" id="searchBtn" name="searchBtn"><i class="fa fa-search"></i></button>
		</form>
		<div class="col-md-3"></div>
				<div class="col-md-6" style="margin-top:80px;margin-left:30px;">
				
					
					
					<table class="table">
				  
				  <thead>
				
				  <tr>
					  <th scope="col">Product ID</th>
					  <th scope="col">Product Title</th>
					  <th scope="col">Product Category</th>
					  <th scope="col">Product Image</th>
					  <th scope="col">Product Detail</th>
					   <th scope="col">Delete Product</th>
					  <th scope="col">Edit Product</th>
					</tr>
				
				</thead>
				  <tbody>


				  <?php
  
 
  if(isset($_POST['searchBtn']))
  {

	  $searchData=$db->ProductSearch($_POST['search']);
	if(empty($searchData))
	  {
		  echo '
		  <tr>
			  <td colspan="4">
				  <p style ="color:red;font-weight:bold">No Record Found for '.$_POST['search'].'!!</p>
			  </td>
		  </tr>
		  ';
	  }
	 else
	 {
			$i=1;
			foreach($searchData as $d)
			{
				
			
				// $id=$d['user_id'];
					echo 
					'
					<tr>
						<th scope="row">'.$i++.'</th>
						<td>'.$d['PRODUCTTITLE'].'</td>
						<td>'.$d['PRODUCTCATEGORY'].'</td>
						<td> <img src= "./PHP/Uploads/'.$d['PRODUCTIMAGE'].'" style="width:30px;"/></td>
						<td>'.$d['PRODUCTDETAIL'].'</td>
						<td><a href="./PHP/ProductDelete.php?id='.$d['PRODUCTID'].'&title='.$d['PRODUCTTITLE'].' " class="btn btn-warning" name="p_delete">Delete</a></td>
						<td><a <a href="./Edit-product.php?id='.$d['PRODUCTID'].'&title='.$d['PRODUCTTITLE'].'&cat='.$d['PRODUCTCATEGORY'].'&img='.$d['PRODUCTIMAGE'].'&det='.$d['PRODUCTDETAIL'].' " class="btn btn-primary">Edit</a></td>
				</tr>	
				';
			}	
	 } 
	 

	
}
 
?> 
  

				  <!-- <tr>
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
					

				  </tbody> -->
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