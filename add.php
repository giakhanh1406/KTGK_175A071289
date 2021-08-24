<?php
    $sql_person = "SELECT * FROM person JOIN unit";
    $query = mysqli_query($connect, $sql_person);
    
    if(isset($_POST['sbm'])){
        $fullName = $_POST['fullName'];
        $position = $_POST['position'];
        $address = $_POST['address'];
        $phonePerson = $_POST['phonePerson'];
        $email = $_POST['email'];

        $sql = "INSERT INTO products(fullName, position, address, phonePerson, email) VALUES ('$fullName','$position','$address','$phonePerson' $position, $address, $phonePerson, $email)";
        $query = mysqli_query($connect, $sql);
        header('location:admin.php?page=admin_layout=index');
    }
        

?>
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h2>Thêm Giảng Viên</h2>
        </div>
        <div class="card-body">
            <form meth="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="Họ và Tên"></label>
                    <input type="text" name="fullName" class="form-control" Required>
                </div>
                <div class="form-group">
                    <label for="Chức Vụ"></label>
                    <input type="text" name="position" class="form-control" Required>
                </div>
                <div class="form-group">
                    <label for="Phòng Ban"></label>
                    <input type="text" name="address" class="form-control" Required>
                </div>
                <div class="form-group">
                    <label for="Số Điện Thoại"></label>
                    <input type="text" name="phonePerson" class="form-control" Required>
                </div>
                <div class="form-group">
                    <label for="Email"></label>
                    <input type="text" name="email" class="form-control" Required>
                </div>
                    <select class="form-control" name="idPerson">
                    <?php
                         while($row_person = mysql_fetch_assoc($query_person))
                         ?>
                            <option value="<?php echo $row_person['idPerson'];?>"<?php echo $row_person['idPerson'];?>"></option>
                            <?php
                            ?>
                    
                    </select>
                <button name="sbm" class="btn btn-success" type="submit">Thêm</button>
            </form>

        </div>
    </div>
</div>