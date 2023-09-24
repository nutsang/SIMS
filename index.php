<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student System</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-light">
    <?php require_once('./connection.php'); ?>
    <div class="container d-flex flex-column justify-content-center">
        <table class="table table-responsive table-striped table-hover text-center">
            <thead class="table-dark">
                <th>#</th>
                <th>รหัสนักศึกษา</th>
                <th>อีเมล</th>
                <th>ชื่อ (Eng.)</th>
                <th>นามสกุล (Eng.)</th>
                <th>ชื่อ</th>
                <th>นามสกุล</th>
                <th>รหัสสาขาเอก</th>
                <th>จัดการ</th>
            </thead>
            <tbody class="table-group-divider align-middle">
                <?php
                    if($_SERVER["REQUEST_METHOD"] === "GET"){
                        if(isset($_GET["status"])){
                            $status = $_GET["status"];
                            if($status === '1'){
                                echo "<script> Swal.fire('ลบข้อมูลสำเร็จ', '', 'success') </script>";
                            }else if($status === '2'){
                                echo "<script> Swal.fire('เพิ่มข้อมูลสำเร็จ', '', 'success') </script>";
                            }else if($status === '3'){
                                echo "<script> Swal.fire('อัพเดตข้อมูลสำเร็จ', '', 'success') </script>";
                            }
                        }
                    }
                    $sql = "SELECT `id`, `en_name`, `en_surname`, `th_name`, `th_surname`, `major_code`, `email` FROM `std_info`";
                    $query = mysqli_query($connection, $sql);
                    if(!$query){
                        die('<script> Swal.fire("การแสดงข้อมูลล้มเหลว", "", "error") </script>');
                    }else{
                        $index = 1;
                        while($result = mysqli_fetch_object($query)){
                ?>
                        <tr>
                            <th><?php echo $index ?></th>
                            <td><?php echo $result->id ?></td>
                            <td><?php echo $result->email ?></td>
                            <td><?php echo $result->en_name ?></td>
                            <td><?php echo $result->en_surname ?></td>
                            <td><?php echo $result->th_name ?></td>
                            <td><?php echo $result->th_surname ?></td>
                            <td><?php echo $result->major_code ?></td>
                            <td>
                                <div class="btn-group">
                                    <a href="./update_form.php?id=<?php echo $result->id ?>" class="btn btn-warning">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                        แก้ไข
                                    </a>
                                    <a href="./delete_process.php?id=<?php echo $result->id ?>" class="btn btn-danger">
                                        <i class="fa-solid fa-trash"></i>
                                        ลบ
                                    </a>
                                </div>
                            </td>
                        </tr>
                <?php ++$index; } } ?>
            </tbody>
        </table>
        <div class="mb-2">
            <a href="create_form.php" class="btn btn-success">เพิ่มสมาชิกใหม่</a>
        </div>
    </div>
    <?php mysqli_close($connection); ?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>