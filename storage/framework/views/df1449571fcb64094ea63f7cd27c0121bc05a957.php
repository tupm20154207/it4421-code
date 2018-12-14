<div class="container">
  <div class="row justify-content-lg-around justify-content-md-center">
    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="card col-lg-5 col-md-10 my-3">
      <div class="card-body px-0">
        <div class="media">
          <img class="d-flex mr-3 item-image" src="<?php echo e(asset($product->url)); ?>"
               alt="Generic placeholder image">
          <div class="media-body">
            <h5 class="item-heading"><?php echo e($product->name); ?></h5>
            <div class="item-description mb-1">
              <?php echo e($product->description); ?>

            </div>
            <div class="item-price mb-1"><?php echo e($product->price); ?></div>
            <div class="row" id="<?php echo e($product->id); ?>">
              <?php if(Auth::check()): ?>
                <button class="btn btn-primary btn-md mr-3 btn-details">Thêm vào giỏ hàng</button>

                <?php if(Auth::user()->likes()->where('product_id', $product->id)->first() != null): ?>
                  <a class="btn btn-outline-danger btn-md text-rose btn-like item-like clicked">
                    <i class="material-icons">favorite</i> &times; <?php echo e($product->likes()->count()); ?>

                  </a>
                <?php else: ?>
                  <a class="btn btn-outline-danger btn-md text-rose btn-like item-like">
                    <i class="material-icons">favorite_border</i> &times; <?php echo e($product->likes()->count()); ?>

                  </a>
                <?php endif; ?>

              <?php else: ?>
                <a href="<?php echo e(route('login')); ?>" class="btn btn-primary btn-md mr-3" onclick="login_required()">Thêm vào giỏ hàng</a>
                <a href="<?php echo e(route('login')); ?>" class="btn btn-outline-danger btn-md text-rose btn-like" onclick="login_required()"><i class="material-icons">favorite_border</i> &times; <?php echo e($product->likes()->count()); ?></a>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>
  <div class="row justify-content-center">
    <div class="mt-3">
      <?php echo $products->links(); ?>

    </div>
  </div>
</div>

