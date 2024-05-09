<?php if($errors->any()): ?>
    <div class="p-3 bg-pink-500 border border-pink-700 font-semibold">
        <ul class="ml-5">
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="list-disc"><?php echo e($i); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>

<?php if(Session::get('success')): ?>
    <div class="p-3 bg-green-500 border border-green-700 font-semibold">
        <p><?php echo e(Session::get('success')); ?></p>
    </div>
<?php endif; ?><?php /**PATH C:\xampp4\htdocs\admas\resources\views/components/pesan.blade.php ENDPATH**/ ?>