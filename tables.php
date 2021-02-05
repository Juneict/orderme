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
           header("location:dashboard.php?order-added");
       }
    }
    if(isset($_GET['delete_todo'])){
        $delete =$_GET['delete_todo'];
        $sqli ="DELETE FROM orders WHERE id=$delete";
        $res =mysqli_query($conn,$sqli);
        if(!$res){
            die("Failed");
       }else{
           header("location:dashboard.php?order-deleted");
       }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Tables</title>
        <link rel="shortcut icon" type="image/icon" href="img/favicon.ico">
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="dashboard.php">iNnoSYS Order</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="ရှာရန်" aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">ဆက်တင်</a>
                        <a class="dropdown-item" href="#">လုပ်ဆောင်ချက်များ</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="login.html">ထွက်ရန်</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading"></div>
                            <a class="nav-link" href="dashboard.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                                ပင်မစာမျက်နာ
                            </a>
                            <div class="sb-sidenav-menu-heading">Controller</div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                အသုံးပြုသူများ
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="register.php">Register လုပ်ရန်</a>
                                    <a class="nav-link" href="layout-sidenav-light.html">Password ပြင်ရန်</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="product.php" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                ပစ္စည်း ထည့်ရန်
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <a class="nav-link collapsed" href="order.php" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                အမှာစာများ
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav" id="sidenavAccordionPages">
                                    <a class="nav-link" href="order.php">အမှာစာ အသစ်</a>
                                    <a class="nav-link" href="order.php">အမှာစာ ပြင်ရန်</a>
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Reports များ</div>
                            <a class="nav-link" href="productlist.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                ပစ္စည်းရှိစာရင်း
                            </a>
                            <a class="nav-link" href="tables.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                အမှာစာစာရင်း
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        iNnoSYS Admin
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">OrderLists</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Laptop အပိုပစ္စည်းအမှာစာ စနစ်</li>
                        </ol>
                         <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                အမှာစာစာရင်း
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>မှာယူသူအမည်</th>
                                                <th>ဖုန်းနံပါတ်</th>
                                                <th>Laptop အမျိုးအစား</th>
                                                <th>တန်ဖိုး</th>
                                                <th>စရံ</th>
                                                <th>မှာယူသည့်နေ့</th>
                                                <th>ပြင်ရန်</th>
                                                <th>ယူပီး</th>
                                            </tr>
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
                        <td><a href="edit_order.php?edit-todo=<?php echo $id; ?>" class="btn btn-primary">ပြင်မည်</a></td>
                        <td><a href="dashboard.php?delete_todo=<?php echo $id; ?>" class="btn btn-danger">ယူပီး</a></td>
                    </tr>
                    <?php   
                            }
                    ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; iNnoSYS 2020</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script> -->
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="asset/datatables-demo.js"></script>
    </body>
</html>
