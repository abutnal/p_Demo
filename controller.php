<?php
require_once('model.php');

if (isset($_POST['selectCategory'])) {
	$data = $objCrud->select_all('category');
	$html="";
	$html .='<option>Select Category</option>';
	foreach ($data as $row) {
	$html .='<option value="'.$row['category_id'].','.$row['category_name'].'">'.$row['category_name'].'</option>';
	}
	echo $html;
}


if (isset($_POST['selectProduct'])) {
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

if (isset($_POST['saveOrder'])) {
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
	if($objCrud->insert('order_tbl', $data)){
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


if (isset($_POST['selectOrder'])) {
	$data = $objCrud->select_all('order_tbl');
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
		$html .= '<td><a href="" id="edit" order-id="'.$row['order_id'].'" class="btn btn-primary btn-xs">Edit</a> &nbsp;<a href="" id="delete" order-id="'.$row['order_id'].'" class="btn btn-danger btn-xs">Delete</a></td>';
		$html .= '</tr>';
	}
	echo json_encode($html);
}


if (isset($_POST['OrderSelectOne'])) {
	$order_id = $_POST['order_id'];
	$where = ["order_id"=>$order_id];
	$data = $objCrud->select_one('order_tbl', $where);
	foreach ($data as $row) {
	  $data =[ 'order_id'=>$row['order_id'],'category'=>$row['category_name'], 'product'=>$row['product_name'], 'price'=>$row['price'], 'photo'=>$row['photo']] ;
	  // print_r($data);
	  echo json_encode($data);
	}
	
}


if (isset($_POST['updateOrder'])) {
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
	$where = ['order_id'=>$_POST['order_id']];
	$data = [
		'product_name'=>$_POST['product'],
		'category_name'=>$cat_name,
		'price'=>$_POST['price'],
		'photo'=>$path
		];
   if($objCrud->update('order_tbl', $data, $where)){
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


if (isset($_POST['orderDelete'])) {			
	$where = ['order_id'=>$_POST['order_id']];
	if($objCrud->delete('order_tbl', $where)){
		 $message = '<div class="alert alert-dismissible alert-success">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Record Deleted Successfuly</strong> </div>';
     echo $message;
	}
}
