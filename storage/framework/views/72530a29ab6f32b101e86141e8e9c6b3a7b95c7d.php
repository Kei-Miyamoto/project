<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">商品編集</div>

                <div class="card-body">
                    <form method="POST" action="<?php echo e(route('product.update', $product->id)); ?>" enctype='multipart/form-data'>
                        <?php echo csrf_field(); ?>
                        <div class="text-center col-md-12 myz-1">
                            <label class="col-md-2 col-form-label" for="">商品情報ID</label>
                            <input class="col-md-8" value="<?php echo e($product->id); ?>" type="text" name="productId" disabled>
                        </div>
                        <div class="text-center col-md-12 my-1">
                            <label class="col-md-2 col-form-label" for="">商品画像</label>
                            <input id="" class="col-md-8" value="" type="file" name="img">
                        </div>
                        <div class="text-center col-md-12 myz-1">
                            <label class="col-md-2 col-form-label" for="">商品名</label>
                            <input id="" class="col-md-8" value="<?php echo e($product->product_name); ?>" type="text" name="productName">
                        </div>
                        <div class="text-center col-md-12 my-1">
                            <label class="col-md-2 col-form-label" for="">メーカー名</label>
                            <select name="" id="" class="col-md-8" name="companyName">
                                <?php $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($product->company_id === $company->id): ?>
                                        <option value="<?php echo e($company->company_name); ?>" selected><?php echo e($company->company_name); ?></option>
                                    <?php else: ?>
                                        <option value="<?php echo e($company->company_name); ?>"><?php echo e($company->company_name); ?></option>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="text-center col-md-12 my-1">
                            <label class="col-md-2 col-form-label" for="">価格</label>
                            <input id="" class="col-md-8" value="<?php echo e($product->price); ?>" type="text" name="price">
                        </div>
                        <div class="text-center col-md-12 my-1">
                            <label class="col-md-2 col-form-label" for="">在庫</label>
                            <input id="" class="col-md-8" value="<?php echo e($product->stock); ?>" type="text" name="stock">
                        </div>
                        <div class="text-center col-md-12 my-1">
                            <label class="col-md-2 col-form-label" for="">コメント</label>
                            <textarea id="" class="col-md-8" value="<?php echo e($product->comment); ?>" type="text" name="comment"><?php echo e($product->comment); ?></textarea>
                        </div>
                        <div class="text-center my-2">
                            <button type="submit" class="btn btn-primary">更新</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="text-left my-2">
                <button type="button" onclick="location.href='/product/show/detail/<?php echo e($product->id); ?>'" class="btn btn-secondary">戻る</button>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/project/resources/views/product/edit.blade.php ENDPATH**/ ?>