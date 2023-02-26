<div class="modal fade" id="addTypeProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">เพิ่มประเภทสินค้า</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="add_typeProduct.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="type_name" class="col-form-label">ประเภทสินค้า:</label>
                        <input type="text" required class="form-control" name="type_name">
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