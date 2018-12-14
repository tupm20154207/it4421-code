<input type="hidden" name="id" value="<?php echo e($product->id); ?>">
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
            <textarea id="item_requirement" class="form-control" rows="2">Không có</textarea>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>