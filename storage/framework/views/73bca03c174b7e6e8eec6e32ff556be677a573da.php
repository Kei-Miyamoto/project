<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">検索</div>

                <div class="card-body">
                    <form method="GET" action="<?php echo e(route('product.search')); ?>">
                        <div class="text-center col-md-12 my-1">
                            <label class="col-md-2 col-form-label" for="">商品名</label>
                            <input id="" name="searchWord" class="col-md-8" value="" type="text">
                        </div>
                        <div class="text-center col-md-12 my-1">
                            <label class="col-md-2 col-form-label" for="">メーカー名</label>
                            <select name="searchCompany" id="" class="col-md-8">
                                <option value="">未選択</option>
                                <?php $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($company->id); ?>"><?php echo e($company->company_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="text-center my-2">
                            <button type="submit" class="btn btn-primary">検索</button>
                        </div>
                    </form>
                </div>

            </div>

            <div class="col-md-12 col-xs-12 my-2 text-right">
                <button  type="button" onclick="location.href='<?php echo e(route('product.show.create')); ?>'" class="btn btn-primary col-xs-12">新規登録</button>
            </div>

            <table class="table table-hover">
                <thead class="thead-dark">
                    <tr class="">
                        <th class="text-center">ID</th>
                        <th class="text-center">商品画像</th>
                        <th class="text-center">商品名</th>
                        <th class="text-center">価格</th>
                        <th class="text-center">在庫</th>
                        <th class="text-center">メーカー名</th>
                        <th class="text-center">詳細</th>
                        <th class="text-center">削除</th>
                    </tr>
                </thead>
                <tbody id="" class="table-striped">
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="text-center"><?php echo e($product->id); ?></td>
                            <td class="text-center"><img src="<?php echo e('/storage/product/' .  $product->img_path); ?>" alt="non-image" width="100" height="auto"></td>
                            <td class="text-center"><?php echo e($product->product_name); ?></td>
                            <td class="text-center"><?php echo e($product->price); ?></td>
                            <td class="text-center"><?php echo e($product->stock); ?></td>
                                    <td class="text-center"><?php echo e($product->company_name); ?></td>
                            <td class="text-center">
                                <button type="button" onclick="location.href='/product/show/detail/<?php echo e($product->id); ?>'" class="btn btn-success">詳細</button> 
                            </td>
                            <td class="text-center">
                                <button type="" class="btn btn-danger">削除</button>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/project/resources/views/home.blade.php ENDPATH**/ ?>