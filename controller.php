<?php
require_once('model.php');

if (isset($_POST['selectCategoryName'])) {
	$data = $objCrud->select_all('category');
	$html="";
	$html .='<option>Select Category</option>';
	foreach ($data as $row) {
	$html .='<option value="'.$row['category_id'].','.$row['category_name'].'">'.$row['category_name'].'</option>';
	}
	echo $html;
}


if (isset($_POST['selectProductName'])) {
	$category_id = $_POST['category_id'];
	$id = explode(",", $category_id);
	$where = ["category_id"=>$id[0]];
	$data = $objCrud->select_one('product', $where);
	$html="";
	$html .='<option>Select Product</option>';
	foreach ($data as $row) {
		$html .='<option value="'.$row['product_name'].'">'.$row['product_name'].'</option>';
	}
	echo $html;
}

if (isset($_POST['saveProduct'])) {
	//Start date
	$timezone = new DateTimeZone("Asia/Kolkata" );
	$date = new DateTime();
	$date->setTimezone($timezone );
	$created_at=$date->format('M d Y g:i:s a');
	//End Date
	$category_name = explode(",", $_POST['category']);
	$data = [
		'product_name'=>$_POST['product'],
		'category_name'=>$category_name[1],
		'price'=>$_POST['price'],
		'photo'=>$_FILES['photo']['name'],
		'created_at'=>$created_at
		];
	if($objCrud->insert('inventory', $data)){
 		$message = '<div class="alert alert-dismissible alert-success">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Well done! Order Saved Successfully</strong> </div>';
 	move_uploaded_file($_FILES['photo']['tmp_name'], 'assets/image/'.basename($_FILES['photo']['name']));
	echo $message;
	}
	else{
    $message = '<div class="alert alert-dismissible alert-success">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Oops! Failed, Please Try again.</strong> </div>';
	echo $message;
	}	
}


if (isset($_POST['selectAllProduct'])) {
	$data = $objCrud->select_all('inventory');
	$html="";
	$html .= '<thead>';
	$html .= '<th>SL</th>';
	$html .= '<th>Category</th>';
	$html .= '<th>Product</th>';
	$html .= '<th>Price</th>';
	$html .= '<th>Image</th>';
	$html .= '<th>Action</th>';
	$html .= '</thead>';
	$count = 1;
	foreach ($data as $row) {
		$html .= '<tr>';
		$html .= '<td>'.$count++.'</td>';
		$html .= '<td>'.$row['category_name'].'</td>';
		$html .= '<td>'.$row['product_name'].'</td>';
		$html .= '<td>'.$row['price'].'</td>';
		$html .= '<td><img src="assets/image/'.$row['photo'].'" height="50px;" width="70px"></td>';
		$html .= '<td><a href="" id="edit" product-id="'.$row['product_id'].'" class="btn btn-primary btn-xs">Edit</a> &nbsp;<a href="" id="delete" product-id="'.$row['product_id'].'" class="btn btn-danger btn-xs">Delete</a></td>';
		$html .= '</tr>';
	}
	echo json_encode($html);
}


if (isset($_POST['selectOneProduct'])) {
	$product_id = $_POST['product_id'];
	$where = ["product_id"=>$product_id];
	$data = $objCrud->select_one('inventory', $where);
	foreach ($data as $row) {
	  $data =[ 'product_id'=>$row['product_id'],'category'=>$row['category_name'], 'product'=>$row['product_name'], 'price'=>$row['price'], 'photo'=>$row['photo']] ;
	  // print_r($data);
	  echo json_encode($data);
	}
	
}


if (isset($_POST['admin_name'])) {
	session_start();
	$where = ["user_id"=>$_SESSION['user_id']];
	$data = $objCrud->select_one('user', $where);
	foreach ($data as $row) {
	  echo json_encode($row['fullname']);
	}
	
}


if (isset($_POST['updateProduct'])) {
	$cat_name = $_POST['category'];
	$count = substr_count($cat_name, ',');
	if ($count > 0) {
		$removeComma = explode(",", $_POST['category']);
		$cat_name = trim($removeComma[1],",");
	}
	$path = $_FILES['photo']['name'];
	if(empty($path)){
	$path = $_POST['path'];
	}
	$where = ['product_id'=>$_POST['product_id']];
	$data = [
		'product_name'=>$_POST['product'],
		'category_name'=>$cat_name,
		'price'=>$_POST['price'],
		'photo'=>$path
		];
   if($objCrud->update('inventory', $data, $where)){
   	move_uploaded_file($_FILES['photo']['tmp_name'], 'assets/image/'.basename($path));
   	 $message = '<div class="alert alert-dismissible alert-success">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Well done! Order Updated Successfully</strong> </div>';
     echo $message;
   }
   else{
    $message = '<div class="alert alert-dismissible alert-success">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Oops! Failed, Please Try again.</strong> </div>';
	echo $message;
	}	

}


if (isset($_POST['productDelete'])) {			
	$where = ['product_id'=>$_POST['product_id']];
	if($objCrud->delete('inventory', $where)){
		 $message = '<div class="alert alert-dismissible alert-success">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Record Deleted Successfuly</strong> </div>';
     echo $message;
	}
}



if (isset($_POST['login'])) {
	$where = ['username'=>$_POST['username'], 'password'=>$_POST['password']];
	if($data = $objCrud->select_one('user', $where)){
		session_start();
		$_SESSION['user_id'] = $data[0]['user_id'];
		echo "fdlsgfmnlffsofiosdfn09iwrweoriw93";
	}
	else
	{
		echo "failed";
	}
}