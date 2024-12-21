<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1>Chi tiết Task</h1>
        <p><strong>Tiêu đề:</strong> <?php echo e($task->title); ?></p>
        <p><strong>Mô tả:</strong> <?php echo e($task->description); ?></p>
        <p><strong>Mô tả chi tiết:</strong> <?php echo e($task->long_description); ?></p>
        <p><strong>Trạng thái:</strong> <?php echo e($task->completed ? 'Hoàn thành' : 'Chưa hoàn thành'); ?></p>
        <a href="<?php echo e(route('tasks.index')); ?>" class="btn btn-secondary">Quay lại</a>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('tasks.App', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\mytask\resources\views/tasks/show.blade.php ENDPATH**/ ?>