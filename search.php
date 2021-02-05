<?php 
    include "db.inc.php";
    if(isset($_POST['search']));
        $search =$_POST['search'];
        $query ="SELECT * FROM orders WHERE name  LIKE '%$search%'";
        $result =mysqli_query($conn,$query);
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
        .search{
            margin:5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="order">
           <!-- <img src="img/logo.jpg" alt=""> -->
           <h1><b>iNnoSys</b></h1>
            <h1><a href="index.php">လက်ပ်တော့အပိုပစ္စည်း အမှာစနစ်</a></h1>
            <h3>အမှာစာ အသစ်</h3>
            
        </div>
        <div class="col-lg-4 search">
            <form action="search.php" method="post">
                    <input class="form-control" type="text" name="search" placeholder="search">

                    </input>
            </form>
        </div>
        <div class="table-responsive col-lg-12">
            <table class="table table-bordred table-striped table-hover table-dark">
                <thead>
                    <th>စဉ်</th>
                    <th>မှာယူသူ အမည်</th>
                    <th>ဖုန်းနံပါတ်</th>
                    <th>Laptop အမျိုးအစား/ပစ္စည်း</th>
                    <th>တန်ဖိုး</th>
                    <th>စရံ</th>
                    <th>မှာယူသည့်နေ့</th>
                    <th>ပြင်ရန်</th>
                    <th>ယူသွားပီ</th>
                </thead>
                <tbody>
                    <?php 
                         if(mysqli_num_rows($result)===0){
                            echo "<tr>";
                            echo "<td></td>";
                            echo "<td></td>";
                            echo "<td></td>";
                            echo "<td>Result not found</td>";
                            echo "<td></td>";
                            echo "<td></td>";
                            echo "<td></td>";
                            echo "</tr>";
                        }else{
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
                        <td><?php echo $id; ?></td>
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
                            }}
                    ?>
                   
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>