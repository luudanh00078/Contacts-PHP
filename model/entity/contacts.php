<?php
class Contacts 
{
    var $id;
    var $firstchar;
    var $name;
    var $phone;
    var $email;
    function __construct(
        $id,
        $firstchar,
        $name,
        $phone,
        $email
    ){
        $this->id = $id;
        $this->firstchar = $firstchar;
        $this->name = $name;
        $this->phone = $phone;
        $this->email = $email;
    }
    static function getListFromDB(){
        //b1: mo ket noi voi DB
        $conn = new mysqli('localhost', 'user_hoang', '12345', 'danhbalienlac');
        $conn->set_charset("utf8");
        if($conn->connect_error){
            die('kết nối thất bại' . $conn->connect_error);
        }else{
            //echo 'kết nối thành công';
            }
        //b2:thao tac voi DB
          $query = "SELECT * FROM danhba ";
          $result = $conn->query($query);
          $rs = array();
          if($result->num_rows>0){
              while($row = $result->fetch_assoc()){
                array_push($rs, new Contacts(
                    $row["id"],
                    $row["firstchar"],
                    $row["name"],
                    $row["phone"],
                    $row["email"]
                    
                ));
              }
          }
        //b3:Dong ket noi voi DB
         $conn->close();
         return $rs;
    }
    static function getListFromDBId($id){
        //b1: mo ket noi voi DB
        $conn = new mysqli('localhost', 'user_hoang', '12345', 'danhbalienlac');
        $conn->set_charset("utf8");
        if($conn->connect_error){
            die('kết nối thất bại' . $conn->connect_error);
        }else{
            //echo 'kết nối thành công';
            }
        //b2:thao tac voi DB
          $query = "SELECT * FROM danhba WHERE id = '$id' ";
          $result = $conn->query($query);
          $rs = array();
          if($result->num_rows>0){
              while($row = $result->fetch_assoc()){
                array_push($rs, new Contacts(
                    $row["id"],
                    $row["firstchar"],
                    $row["name"],
                    $row["phone"],
                    $row["email"]
                    
                ));
              }
          }
        //b3:Dong ket noi voi DB
         $conn->close();
         return $rs;
    }
}
?>