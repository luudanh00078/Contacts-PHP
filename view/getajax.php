<?php
if(isset($_GET['data'])){
$data = $_GET['data'];
$con = mysqli_connect('localhost', 'user_hoang', '12345', 'danhbalienlac');
// Kiểm tra kết nối
if (mysqli_connect_errno()){
echo "Lỗi kết nối: " . mysqli_connect_error();
}
 
$sql = "SELECT * FROM danhba WHERE name LIKE '$data%' OR phone LIKE '$data%' OR email LIKE '$data%' ";
$result = mysqli_query($con, $sql);
while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
 //echo $row['name']."</br>"; 
?>
<div class="container-fluid">
<div class="table-responsive">
		<table class="table table-hover table-bordered">
		
			<thead class="table-danger">
				<tr>
					<th scope="col"></th>
					<th scope="col">Name</th>
					<th scope="col">Phone</th>
					<th scope="col">Email</th>
					<th scope="col">Thao tác</th>
				</tr>
			</thead>
			<tbody>
               
                            <tr>
                                <th scope="row"><?php echo  $row['firstchar']; ?></th>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['phone']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td>
                                    <a href="contacts.php?id=<?php echo $row['id']; ?>" class="btn btn-outline-success mr-3">
                                        <i class="fas fa-edit"></i> Sửa
                                    </a>
                                    <button onclick='remove(<?php echo $row["id"]; ?>)' class='btn btn-outline-danger'><i class="fas fa-trash"></i> Xóa</button>

                                </td>
                        </tr>
                    
                      
                    </tbody>
        </table>
	   </div>

</div>
<?php

 }
}
?>