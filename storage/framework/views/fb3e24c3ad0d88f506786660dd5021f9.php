<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1>Sửa Task</h1>
        <form action="<?php echo e(route('tasks.update', $task->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <div class="form-group">
                <label for="title">Tiêu đề:</label>
                <input type="text" class="form-control" id="title" name="title" value="<?php echo e($task->title); ?>" required>
            </div>
            <div class="form-group">
                <label for="description">Mô tả:</label>
                <textarea class="form-control" id="description" name="description" required><?php echo e($task->description); ?></textarea>
            </div>
            <div class="form-group">
                <label for="long_description">Mô tả chi tiết:</label>
                <textarea class="form-control" id="long_description" name="long_description"><?php echo e($task->long_description); ?></textarea>
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="completed" name="completed" <?php echo e($task->completed ? 'checked' : ''); ?>>
                <label class="form-check-label" for="completed">Hoàn thành</label>
            </div>
            <button type="submit" class="btn btn-primary">Lưu</button>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('tasks.App', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\mytask\resources\views/tasks/edit.blade.php ENDPATH**/ ?>