  
<?php 
require_once("control-danhba.php");
//add qua trinh hoc tap

if ($_SERVER['REQUEST_METHOD']=='POST') {
    
    //lay data
    $data['fistchar'] = isset($_POST["txtFirstchar"]) ? $_POST["txtFirstchar"] :"";
    $data['name'] = isset($_POST["txtName"]) ? $_POST["txtName"] :"";
    $data['phone'] = isset($_POST["txtPhone"]) ? $_POST["txtPhone"] :"";
    $data['email'] = isset($_POST["txtEmail"]) ? $_POST["txtEmail"] :"";

    //validate thong tin
    //insert
    add_danhba($data['fistchar'], $data['name'], $data['phone'], $data['email']);
    header("Location: ../view/contacts.php?rs=success");
}
disconnect_db();

?>
