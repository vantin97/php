<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
</head>

<body>
    <?php
        include '../connect/conn.php';

        $name = '';
        $decs = '';
        $status = '';
        if($_SERVER["REQUEST_METHOD"] == "POST"){

            $errors = array();

            if (!empty($_POST['name'])) {
                $name = $_POST['name'];
            } else {
                $errors[] = $_POST['name'];
            }

            if (!empty($_POST['decs'])) {
                $decs = $_POST['decs'];
            } else {
                $errors[] = $_POST['decs'];                
            }
            
            if (!empty($_POST['hien'])) {
                $status = $_POST['hien'];
            } elseif(!empty($_POST['an'])) {
                $status = $_POST['an'];
            }else{
                $errors[] = 'khong duoc trong';
            }


            if(!empty($errors)){
                echo 'loi';
            }else { 
                $sql = "INSERT INTO `post`(`name`, `decs`, `status`) VALUES ('$name','$decs','$status')";

                $query = mysqli_query($connect, $sql);
            
                if($query){
                    echo "Thêm dữ liệu thành công";
                }else{
                    echo 'thai bai';
                }
            }
        }
    ?>




    <div class="container mt-5">
        <form method="post">
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="name" placeholder="Enter name">
            </div>
            <div class="form-group">
                <label>decs</label>
                <input type="text" class="form-control" name="decs" placeholder="decs">
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="hien" id="exampleRadios1" value="1">
                <label class="form-check-label" for="exampleRadios1">
                    Hiện
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="an" id="exampleRadios2" value="2">
                <label class="form-check-label" for="exampleRadios2">
                    Ẩn
                </label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>




    <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>

</html>