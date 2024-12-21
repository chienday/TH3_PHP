<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1>Thêm mới Task</h1>
        <form action="<?php echo e(route('tasks.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <label for="title">Tiêu đề:</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="description">Mô tả:</label>
                <textarea class="form-control" id="description" name="description" required></textarea>
            </div>
            <div class="form-group">
                <label for="long_description">Mô tả chi tiết:</label>
                <textarea class="form-control" id="long_description" name="long_description"></textarea>
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="completed" name="completed">
                <label class="form-check-label" for="completed">Hoàn thành</label>
            </div>
            <button type="submit" class="btn btn-primary">Lưu</button>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('tasks.App', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\mytask\resources\views/tasks/create.blade.php ENDPATH**/ ?>