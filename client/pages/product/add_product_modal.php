<div class="modal fade" id="addproduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">เพิ่มสินค้า</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="add_product.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="prd_name" class="col-form-label">ชื่อสินค้า:</label>
                        <input type="text" required class="form-control" name="prd_name">
                    </div>
                    <div class="mb-3">
                        <label for="type_prd" class="col-form-label">ประเภทสินค้า:</label>
                        <select class="form-select" name="type_prd" aria-label="Default select example">
                            <option selected>เลือกประเภทสินค้า</option>
                            <?php
                            $stmt = $conn->prepare("SELECT * FROM type");
                            $stmt->execute();
                            $result = $stmt->fetchAll();
                            foreach ($result as $row) {
                            ?>
                                <option value="<?= $row['type_id']; ?>"><?= $row['type_name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="prd_price" class="col-form-label">ราคาสินค้า:</label>
                        <input type="number" required class="form-control" name="prd_price">
                    </div>
                    <div class="mb-3">
                        <label for="prd_image" class="col-form-label">รูปภาพ:</label>
                        <input type="file" required class="form-control" id="imgInput" name="prd_image">
                        <img loading="lazy" width="100%" id="previewImg" alt="">
                    </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="submit" class="btn btn-success">บันทึก</button>
            </div>
            </form>
        </div>

    </div>
</div>
</div>