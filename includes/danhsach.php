<?php
    if(isset($_POST['sbm']) && !empty($_POST['search'])){
        $search = $_POST['search'];
        $sql = "SELECT * FROM products INNER JOIN brands ON products.brand_id = brands.brand_id WHERE prd_name LIKE '%$search%'";
        $query = mysqli_query($connect, $sql);
        $total_prd = mysqli_num_rows($query);
    }else{
        $sql = "SELECT * FROM products inner join brands on products.brand_id = brands.brand_id";
        $query = mysqli_query($connect, $sql);
    }

    if(isset($_POST['all_prd'])){
        unset($_POST['sbm']);
    }


?>
<div class="container-fluid">
    <div class="card">
    <h4 class="display-4 text-center">Các sản phẩm</h4><br>
        <div class="card-header d-flex justify-content-between align-items-center">
     
            <a href="layout.php?page_layout=them" class="btn btn-primary">
               <i class="fas fa-plus-circle"></i> Thêm mới
            </a>

            <?php
                if(isset($_POST['sbm']) && !empty($_POST['search'])){?>
                    <form method="POST" action="">
                        <button name="all_prd" class='btn btn-success text-light'>Tất cả</button>
                    </form>
                <?php } ?>
 
            <form method="POST" class="d-flex" action="">
                <input name="search" type="search" class="form-control" placeholder="Tim kiếm....">
                <button name="sbm" class="btn btn-success"><i class="fa fa-search"></i></button>
            </form>
        </div>

        <div class="card-body">
            <?php
                if(isset($total_prd)){
                    if($total_prd !==0){
                        echo "<h2 class='text-success'>Tìm thấy $total_prd sản phẩm</h2>";
                    }else{
                        echo "<h2 class='text-danger'> Not Null! </h2>";
                    }
                }
            ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Mô tả</th>
                        <th>Thương hiệu</th>
                        <th width="12%">Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                        $i = 1;
                        while ($row = mysqli_fetch_assoc($query)) {?>
                            <tr>
                                <td><?php echo $i++; ?></th>
                               

                                <td>
                                    <img src="img/<?php echo $row['image']; ?>" width="100" >
                                
                                </td>
                                <td><?php echo $row['prd_name']; ?></td>
                                <td><?php echo $row['price']; ?> VND</td>
                                <td><?php echo $row['quantity']; ?></td>
                                <td><?php echo $row['description']; ?></td>
                                <td><?php echo $row['brand_name']; ?></td>
                                <td>
                                    <a class="fas fa-edit text-muted" href="layout.php?page_layout=sua&id=<?php echo $row['prd_id']; ?>"></a>

                                    <a onclick="return Del('<?php  echo $row['prd_name'];?>')" class="fas fa-trash-alt text-danger" href="layout.php?page_layout=xoa&id=<?php echo $row['prd_id']; ?>"></a>
                                </td>
                            </tr>
                        <?php } ?>
                </tbody>
            </table>
        </div>

        
    </div>
</div>

<script>
    function Del(name){
        return confirm("Bạn có chắc chắn muốn xóa: " + name + " ?");
    }
</script>
