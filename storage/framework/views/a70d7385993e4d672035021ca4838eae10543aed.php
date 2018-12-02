<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title">Lựa chọn yêu cầu</h4>
      <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>
    <div class="modal-body">
      <div class="container">
        <div class="row">
          <div class="card">
            <div class="card-body">
              <div class="item-heading"><?php echo e($product->name); ?></div>
              <div class="item-description"><?php echo e($product->description); ?></div>
              <div>
                <img src="<?php echo e($product->url); ?>" class="mw-100" alt="<?php echo e($product->name); ?>">
              </div>
              <div class="text-center item-price"><?php echo e($product->price); ?></div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="card">
            <div class="card-body row">
              <div class="col-sm-4">
                <div class="input-group">
                  <div class="form-group w-75">
                    <label for="item_quantity" class="control-label">Số lượng: </label>
                    <input id="item_quantity" class="form-control text-right" type="number" min="1" max="99" step="1"
                           value="1" onkeydown="return false;">
                  </div>
                </div>
              </div>
              <div class="col-sm-8">
                <div class="input-group">
                  <div class="form-group w-100">
                    <label for="item_requirement" class="control-label">Yêu cầu bổ sung: </label>
                    <textarea id="item_requirement" class="form-control" rows="2"></textarea>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-primary mr-2" name="btn_confirm">Xác nhận</button>
      <button type="button" class="btn btn-danger" data-dismiss="modal">Hủy</button>
    </div>
  </div>
</div>