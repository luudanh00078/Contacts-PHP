<?php
session_start();
include_once("../model/entity/user.php");
include_once("header.php");
include_once("nav.php");
include_once("../model/entity/contacts.php");
$rsFromDB = Contacts::getListFromDB();
//var_dump($rsFromDB);

?>
<div>
<?php
//var_dump($_GET);
    if (isset($_GET['id'])) {
        // if (filter_var($_GET['id'],FILTER_VALIDATE_INT,array('min_range' => 0)) && $_GET['id']>0) {
            $ma = $_GET['id'];
            $rsFromDBMa = Contacts::getListFromDBId("$ma");
            //foreach ($rsFromDB as $key => $value) {
            foreach ($rsFromDBMa as $value) {
                //if ($id ==$_GET['id']) {
                    ?>
                    <form method="POST" action="../controller/edit-danhba.php">
                        <div class="form-data">
                            <div class="form-group">
                                <label>Firstchar</label>
                                <input class="form-control" type="text" name="txtFirstchar" value="<?php echo$value->firstchar; ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" type="text"  name="txtName" value="<?php echo $value->name; ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input class="form-control" type="number" name="txtPhone" value="<?php echo $value->phone; ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" type="text" name="txtEmail" value="<?php echo $value->email; ?>" required>
                            </div>
                        
                            <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
                            <a class="btn btn-secondary" href="contacts.php">Hủy</a>
                            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Cập nhật</button>
                    </form>
                    <?php 
                //}
            }
            ?>
        
            <?php
   
    }
        
    ?> 

  
</div>
<div class="container-fluid">
	<div class="table-responsive">
		<table class="table table-hover table-bordered">
			<div class="btn-add d-flex justify-content-end align-items-center pb-3">
   
				<button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modalAdd"><i class="fas fa-plus-circle"></i> Thêm</button>
            </div>
            <div id="result"></div>
			<thead class="table-primary">
				<tr>
					<th scope="col"></th>
					<th scope="col">Name</th>
					<th scope="col">Phone</th>
					<th scope="col">Email</th>
					<th scope="col">Thao tác</th>
				</tr>
			</thead>
			<tbody>
                <?php
                   foreach($rsFromDB as $value){
                ?>
                            <tr>
                                <th scope="row"><?php echo  $value->firstchar; ?></th>
                                <td><?php echo $value->name; ?></td>
                                <td><?php echo $value->phone; ?></td>
                                <td><?php echo $value->email; ?></td>
                                <td>
                                    <a href="contacts.php?id=<?php echo $value->id; ?>" class="btn btn-outline-success mr-3">
                                        <i class="fas fa-edit"></i> Sửa
                                    </a>
                                    <button onclick='remove(<?php echo $value->id; ?>)' class='btn btn-outline-danger'><i class="fas fa-trash"></i> Xóa</button>

                                </td>
                        </tr>
                    
                        <?php
                        }
                        ?>
                    </tbody>
        </table>
	   </div>
	</div>
<!-- Modal Thêm danhba -->
<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="hihi" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="titleDiaLog">Thêm quá trình học tập</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
					</div>
				<div class="modal-body">
					<form method="POST" action="../controller/add-danhba.php">
						<div class="form-data">
							<div class="form-group">
								<label>Firstchar</label>
								<input class="form-control" type="text"  name="txtFirstchar" value="" required>
							</div>
							<div class="form-group">
								<label>Name</label>
								<input class="form-control" type="text"  name="txtName" value="" required>
							</div>
							<div class="form-group">
								<label>Phone</label>
								<input class="form-control" type="number"  name="txtPhone" value="" required>
							</div>
							<div class="form-group">
								<label>Email</label>
								<input class="form-control" type="text" name="txtEmail" value="" required>
                            </div>
                           
						</div>                                  
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
				<input type="submit" class="btn btn-success" value="Thêm">
				</form>
			</div>
		</div>
	</div>
	<!-- Kết thúc Modal Thêm danhba -->
    <script>
    function remove(id){
    var del=confirm("Bạn có thực sự muốn xóa không ?");
    if (del==true){
        window.location.href="../controller/delete-danhba.php?id="+id;
    }
    }

    //ajax
    function object(){
    if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
    } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    return xmlhttp;
    }
    http = object();
    function livesearch(data){
    if(data != ""){
    http.onreadystatechange = process;
    http.open('GET', 'getajax.php?data=' + data, true);
    http.send();
    }else{
    document.getElementById("result").innerHTML = "";
    }
    }
    
    function process(){
    if(http.readyState==4 && http.status==200){
    result = http.responseText;
    document.getElementById("result").innerHTML = result;
    }
    }
    </script>
<?php
include_once("footer.php"); ?>