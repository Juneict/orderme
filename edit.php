<?php 
    include "db.inc.php";
   if(isset($_GET['edit-todo'])){
        $e_id =$_GET['edit-todo'];
   }
   if(isset($_POST['edit_todo'])){
       $edit_name =$_POST['name'];
       $edit_phone =$_POST['phone'];
       $edit_model =$_POST['model'];
       $edit_price =$_POST['price'];
       $edit_due =$_POST['due'];
      $query ="UPDATE `orders` SET `name`='$edit_name',`phone`='$edit_phone',`model`='$edit_model',`price`='$edit_price',`due`='$edit_due',`order_date`=now() WHERE id=$e_id";
      $update  =mysqli_query($conn,$query);
        if(!$update){
        die("Failed");
        }else{
       header("location:index.php?todo-updated");
        }
   }
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>iNnoSys</title>
    <style>
        .order{
            display:flex;
            flex-direction:column;
            justify-content:center;
            align-items:center;
            border_radius:3px;
            border:1px solid #cccccc;
            margin-top:5px;
            padding:5px;
        }
        h1{
            color:#286090;
            font-size:30px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="order">
        <nav class="navbar navbar-expand-sm navbar-dark bg-primary">
<div class="container-fluid">
<a href="#" class="navbar-brand">iNnoSYS</a>
<ul class="navbar-nav">
<li class="nav-item">
<a href="#" class="nav-link active">Home</a>
</li>
<li class="nav-item">
<a href="#" class="nav-link">Orders</a>
</li>
</ul>
</div>
</nav>
           <!-- <img src="img/logo.jpg" alt=""> -->
           <h1><b>Innosys IT Solution</b></h1>
            <h1>လက်ပ်တော့အပိုပစ္စည်း အမှာစနစ်</h1>
            <h3>အမှာစာ ပြင်ရန်</h3>
            <form action="" method="POST">

                <?php 
                    $sql ="SELECT * FROM orders WHERE id=$e_id";
                    $result = mysqli_query($conn,$sql);
                    $data =mysqli_fetch_array($result);

                ?>
                <div class="form-group">
                    <input class="form-control" type="text" name="name" placeholder="မှာယူသူ အမည်" value="<?php echo $data['name'];?>">                   
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" name="phone" placeholder="ဖုန်းနံပါတ်" value="<?php echo $data['phone'];?>"> 
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" name="model" placeholder="Laptop အမျိုးအစား/ပစ္စည်း" value="<?php echo $data['model'];?>">
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" name="price" placeholder="တန်ဖိုး" value="<?php echo $data['price'];?>">
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" name="due" placeholder="စရံ" value="<?php echo $data['due'];?>">
                </div>
                <div class="from-group">
                    <input class="btn btn-primary" type="submit" value="ပြင်ရန်" name="edit_todo">
                </div>
            </form>
        </div>
        
</body>
</html>