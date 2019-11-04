<?php
//bien ket noi toan cuc
global $conn ;
//ham ket noi DB
function connect_db (){
   global $conn;
   //neu chua ket noi thi ket noi
   if(!$conn){
    $conn = mysqli_connect('localhost', 'user_hoang', '12345', 'danhbalienlac') or die ('Cant not connect to database');
    //thiết lập font chữ kết nối 
    mysqli_set_charset($conn, 'utf8');
   } 
}
//ham ngat ket noi DB
function disconnect_db(){
	//goi toi bien toan cuc $conn 
	global $conn;
	//neu da ket noi thi ngat ket noi 
	if($conn){
		mysqli_close($conn);
	}
}
//ham them quatrinhhoctap
function add_danhba( $fistchar, $name, $phone, $email){
	//gọi tới biến toàn cục 
	global $conn;
	//hàm kết nối 
	connect_db();
	//chống SQL ịjnection 
	
	$fistchar = addslashes($fistchar);
    $name= addslashes( $name);
    $phone = addslashes($phone);
	$email = addslashes( $email);


	//câu truy vấn sql 
	$sql = " INSERT INTO danhba(firstchar, name, phone, email) VALUES 
	        ('$fistchar ', '$name', '$phone', '$email') ";
	//Thực hiện câu truy vấn 
	$query = mysqli_query($conn, $sql);
	return $query;
   }
//ham sua quatrinhhoctap
function edit_danhba($id, $fistchar, $name, $phone, $email){
	 //hoi toi bien toan cuc
	 global $conn;
	 //ham ket noi
	 connect_db();
	 //chong sql injection
	 $id = addslashes($id);
	 $fistchar = addslashes($fistchar);
	 $name= addslashes( $name);
	 $phone = addslashes($phone);
	 $email = addslashes( $email);
	//câu truy vấn 
	$sql = " UPDATE danhba SET 
	 firstchar = '$fistchar',
	 name = '$name',
	 phone  = '$phone',
	 email = ' $email'
	 WHERE id = '$id'
	";
	//thực hiện câu truy vấn 
	$query = mysqli_query($conn, $sql);
	return $query;
 }
 //ham xoa qua trinh hoc tap theo ma
 function delete_danhba($id){
	//gọi tơi biến toàn cục $conn
	global $conn;
	//hàm kết nối 
	connect_db();
	//câu truy vấn 
	$sql = " DELETE FROM danhba
	         WHERE id = $id ";
	//thực hiện câu truy vấn
	$query = mysqli_query($conn, $sql);
	return $query ;
}
//ham tim kiem





?>