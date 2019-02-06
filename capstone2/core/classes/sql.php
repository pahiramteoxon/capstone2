<?php 
  include_once 'core/init.php';

class DataOperation extends Database {

//for login process

  public function check_login($email,$password){

  // $password = md5($password);
    $sql = "SELECT id from user_info where username='$email' and password='$password'";
    $result = mysqli_query($this->con,$sql);
    $userdata = mysqli_fetch_array($result);
    $count_row = $result->num_rows;
    
    if ($count_row == 1) {  
      $_SESSION['login'] = true;
      $_SESSION['id'] = $userdata['id'];
      $_SESSION['password'] = $userdata['password'];
      return true;
    }
    else {
      return false;
    }
  }

//end

//session start

  public function get_session(){
    return $_SESSION['login'];
  }

//end session


// add data

    public function add_data($table,$fields){
     $sql ="";
     $sql .=" INSERT INTO " .$table;
     $sql .=" (".implode(",",array_keys($fields)).") VALUES ";
     $sql .="('".implode("','",array_values($fields))."')";
     $query = mysqli_query($this->con,$sql);
     if($query){
       return true;
     }
  }

//end

// fetch data
   public function fetch_data($table){
   $sql = "SELECT * FROM ".$table;
   $array = array();
   $query = mysqli_query($this->con,$sql);
   while($row = mysqli_fetch_assoc($query)){
    $array[] = $row;
   }
   return $array;
  }

// add 1 to id 
   public function fetch_prod($status){
   $sql = "SELECT *, p.id as ids FROM products p LEFT JOIN product_category c on c.id = p.product_category WHERE p.status = '".$status."'";
   $array = array();
   $query = mysqli_query($this->con,$sql);
   while($row = mysqli_fetch_assoc($query)){
    $array[] = $row;
   }
   return $array;
  }

// add 1 to id 
   public function fetch_code($table){
   $sql = "SELECT max(id)+ 1 as item_code FROM ".$table;
   $array = array();
   $query = mysqli_query($this->con,$sql);
   while($row = mysqli_fetch_assoc($query)){
    $array[] = $row;
   }
   return $array;
  }

   public function fetch_sales(){
   $sql = "SELECT DATE_FORMAT(s.date_ordered, '%M') as dates,
           SUM(s.product_total_amount) as sumtol, s.product_price FROM product_supplier s
           GROUP BY DATE_FORMAT(s.date_ordered, '%M') 
           ORDER BY s.date_ordered ASC";
   $array = array();
   $query = mysqli_query($this->con,$sql);
   while($row = mysqli_fetch_assoc($query)){
    $array[] = $row;
   }
   return $array;
  }

//end

// update data

  public function update_data($table,$where,$fields){
    $sql = "";
    $condition = "";
    foreach ($where as $key => $value){
      $condition .= $key . "='" . $value ."' AND";
    }

    $condition = substr($condition,0,-5);
    foreach ($fields as $key => $value) {
      $sql .= $key . "='".$value."',";
    }

    $sql = substr($sql, 0, -2);value. "' AND";
    $sql = "UPDATE ".$table." SET ".$sql."' WHERE ".$condition ."'";

    if(mysqli_query($this->con,$sql)){
      return true;
    }

  }

// check password

    public function check_password($id,$password){  
      $sql = "SELECT * from user_info where id='$id' and password='$password'";
      $result = mysqli_query($this->con,$sql);
      $userdata = mysqli_fetch_array($result);
      $count_row = $result->num_rows;
      
      if ($count_row == 1) {  
        return true;
      }
      else {
        return false;
      }
    }



// end

// ---------------------------- //


} // class

$obj = new DataOperation;

//products
 
if(isset($_POST["btn_archive_product"])) {
    $pass = $_POST['pass'];
    $userid = $_POST['userid'];
    $id = $_POST['id'];


    $where = array("id"=>$id);
    $myarray = array(
      "status"=> 'Archive');  

    $check1 = $obj->check_password($userid,$pass);

    $check = $obj->update_data("products",$where,$myarray);   

    if($check1) {

     if($check) {
      header("location:products.php?msg=success");
      } else{
      header("location:products.php?msg=failed");
    }  
  }
    else {
      header("location:products.php?msg=faileds");
    }
  }


if(isset($_POST["btn_retrieve_product"])){
    $pass = $_POST['pass'];
    $userid = $_POST['userid'];
    $id = $_POST['ids'];


    $where = array("id"=>$id);
    $myarray = array(
      "status"=> 'Available');  

    $check1 = $obj->check_password($userid,$pass);

    $check = $obj->update_data("products",$where,$myarray);   

    if($check1) {
     if($check) {
      header("location:products.php?msg=success");
    }else{
      header("location:products.php?msg=failed");
    }  
  }
    else {
      header("location:products.php?msg=faileds");
    }
  }
 
if(isset($_POST['add_products'])) {
    $myarray = array(
    "product_name"=>$_POST['product-title'],
    "product_quantity"=>$_POST['product-quantity'],
    "product_desc"=>$_POST['product-description'],
    "product_srp"=>$_POST['product-srp'],
    "product_price"=>$_POST['product-price'], 
    "product_category"=>$_POST['product_sub'],
    "product_supplier"=>$_POST['product_supplier'],
    "product_number"=>$_POST['cat_code'].$_POST['sub_code']."-".$_POST['prod_name'],
    
    );

    if($obj->add_data("products" , $myarray)){
      header("location:products.php?msg=success"); 
    }
    else{
      header("location:products.php?msg=failed");
    }
}

if(isset($_POST["edit_products"])){
    $name = $_POST['product-title'];
    $desc = $_POST['product-description'];
    $price = $_POST['product-price'];
    $srp = $_POST['product-srp'];

    $id = $_POST['prodid'];

    $where = array("id"=>$id);
    $myarray = array(
      "product_name"=> $name,
      "product_desc"=> $desc,
      "product_price"=> $price,
      "product_srp"=> $srp
    );  

    $update = $obj->update_data("products",$where,$myarray);   

     if($update) {
      header("location:products.php?msg=success");
     }
     else {
      header("location:products.php?msg=failed");
     } 

}

// end

// -------------------------------------------- //

//supplier

if(isset($_POST["btn_archive_supplier"])) {
    $pass = $_POST['pass'];
    $userid = $_POST['userid'];
    $id = $_POST['id'];


    $where = array("id"=>$id);
    $myarray = array(
      "status"=> 'Archive');  

    $check1 = $obj->check_password($userid,$pass);

    $check = $obj->update_data("product_supplier",$where,$myarray);   

    if($check1) {
     if($check) {
      header("location:supplier.php?msg=success");
    }else{
      header("location:supplier.php?msg=failed");
    }  
  }
    else {
      header("location:supplier.php?msg=faileds");
    }
  }


if(isset($_POST["btn_retrieve_supplier"])){
    $pass = $_POST['pass'];
    $userid = $_POST['userid'];
    $id = $_POST['ids'];


    $where = array("id"=>$id);
    $myarray = array(
      "status"=> 'Available');  

    $check1 = $obj->check_password($userid,$pass);

    $check = $obj->update_data("product_supplier",$where,$myarray);   

    if($check1) {
     if($check) {
      header("location:supplier.php?msg=success");
    }else{
      header("location:supplier.php?msg=failed");
    }  
  }
    else {
      header("location:supplier.php?msg=faileds");
    }
  }

if(isset($_POST['add_supplier'])) {
    $myarray = array(
    "supplier_comp_name"=>$_POST['supplier_company'],
    "supplier_name"=>$_POST['supplier_name'],
    "supplier_address"=>$_POST['supplier_address'],
    "supplier_phone"=>$_POST['supplier_phone'],
    "supplier_tel"=>$_POST['supplier_tel'], 
    );

    if($obj->add_data("product_supplier" , $myarray)){
      header("location:supplier.php?msg=success"); 
    }
    else{
      header("location:supplier.php?msg=failed");
    }
}

if(isset($_POST["edit_supplier"])){

    $id = $_POST['supid'];

    $where = array("id"=>$id);
    $myarray = array(

    "supplier_comp_name"=>$_POST['supplier_company'],
    "supplier_name"=>$_POST['supplier_name'],
    "supplier_address"=>$_POST['supplier_address'],
    "supplier_phone"=>$_POST['supplier_phone'],
    "supplier_tel"=>$_POST['supplier_tel'], 

    );  

    $update = $obj->update_data("product_supplier",$where,$myarray);   

     if($update) {
      header("location:supplier.php?msg=success");
     }
     else {
      header("location:supplier.php?msg=failed");
     } 

}

// end 

// -------------------------------------------- //

// category

if(isset($_POST["add_category"])){

    $cat_name = $_POST['categorie_name'];
    $number = count($_POST["subcat_name"]);
    $sub = $_POST["subcat_name"];

      if($number > 1) {
      for($i=0; $i<$number; $i++){        
      if(trim($sub[$i] != '')){   

          $myarray = array(
          "subcategory_name"=> $sub[$i],
          "category_name"=>$cat_name,
          );
          
           if($obj->add_data("product_category" , $myarray)) {
               header("location:category.php?msg=success");      
           }

           else {
                header("location:category.php?msg=failed");    
           }

      } 
      } 
      } 

}

// end 

// -------------------------------------------- //

// sales

 ?> 