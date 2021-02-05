<?php 
    include "db.inc.php";
    $query ="SELECT * FROM orders ORDER BY order_date DESC";
    $result =mysqli_query($conn,$query);

    if($_SERVER['REQUEST_METHOD'] =='POST'){
        $name =$_POST['name'];
        $phone =$_POST['phone'];
        $model =$_POST['model'];
        $price =$_POST['price'];
        $due =$_POST['due'];
        //$order_date =now();
        echo $order_date;
        $sql = "INSERT INTO `orders`(`name`, `phone`, `model`, `price`, `due`, `order_date`) VALUES ('$name','$phone','$model','$price','$due',now())";
        $results = mysqli_query($conn,$sql);

        if(!$results){
            die("Failed");
       }else{
           header("location:index.php?todo-added");
       }
    }
    if(isset($_GET['delete_todo'])){
        $delete =$_GET['delete_todo'];
        $sqli ="DELETE FROM orders WHERE id=$delete";
        $res =mysqli_query($conn,$sqli);
        if(!$res){
            die("Failed");
       }else{
           header("location:index.php?todo-deleted");
       }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
        .search{
            margin:5px;
        }
        .orderlist{
            margin:5px;
            color:red;
        }
       
    </style>
</head>
<body>
    <div class="container">
        <div class="order">
           <!-- <img src="img/logo.jpg" alt=""> -->
           <h1><b>iNnoSys</b></h1>
            <h2>လက်ပ်တော့အပိုပစ္စည်း အမှာစနစ်</h2>
            <h3>အမှာစာ အသစ်</h3>
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
                <div class="form-group">
                    <input class="form-control" type="text" name="name" placeholder="မှာယူသူ အမည်">                   
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" name="phone" placeholder="ဖုန်းနံပါတ်"> 
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" name="model" placeholder="Laptop အမျိုးအစား/ပစ္စည်း">
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" name="price" placeholder="တန်ဖိုး">
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" name="due" placeholder="စရံ">
                </div>
                <div class="from-group">
                    <input class="btn btn-primary" type="submit" value="မှာရန်">
                </div>
            </form>
        </div>
        <div class="col-lg-4 search">
            <form action="search.php" method="post">
                    <input class="form-control" type="text" name="search" placeholder="search">

                    </input>
            </form>
        </div>
        <div class="col-lg-4 orderlist">
            <a class="btn btn-primary" href="orderlist.php" role="button">စာရင်းအားလုံးကြည့်ရန်</a>
        </div>
        <div class="table-responsive col-lg-12">
            <table class="table table-bordred table-striped table-hover">
                <thead>
                    <!-- <th>စဉ်</th> -->
                    <th><i class="fa fa-user"></i>မှာယူသူ အမည်</th>
                    <th><i class="fa fa-mobile"></i>ဖုန်းနံပါတ်</th>
                    <th><i class="fa fa-laptop"></i>Laptop အမျိုးအစား/ပစ္စည်း</th>
                    <th><i class="fa fa-dollar"></i>တန်ဖိုး</th>
                    <th>စရံ</th>
                    <th><i class="fa fa-calendar"></i>မှာယူသည့်နေ့</th>
                    <th>ပြင်ရန်</th>
                    <th>ယူသွားပီ</th>
                </thead>
                <tbody>
                    <?php 
                        while($row=mysqli_fetch_assoc($result)){
                            $id =$row['id'];
                            $name = $row['name'];
                            $phone =$row['phone'];
                            $model =$row['model'];
                            $price =$row['price'];
                            $due =$row['due'];
                            $order_date=$row['order_date'];
                            ?>
                     <tr>
                        
                        <td><?php echo $name; ?></td>
                        <td><?php echo $phone; ?></td>
                        <td><?php echo $model; ?></td>
                        <td><?php echo $price; ?></td>
                        <td><?php echo $due; ?></td>
                        <td><?php echo $order_date; ?></td>
                        <td><a href="edit.php?edit-todo=<?php echo $id; ?>" class="btn btn-primary">ပြင်မည်</a></td>
                        <td><a href="index.php?delete_todo=<?php echo $id; ?>" class="btn btn-danger">ယူပီး</a></td>
                    </tr>
                    <?php   
                            }
                    ?>
                   
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>