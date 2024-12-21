<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1>Danh sách Task</h1>
        <a href="<?php echo e(route('tasks.create')); ?>" class="btn btn-primary">Thêm mới</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tiêu đề</th>
                    <th>Mô tả</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php $id = 1; ?>   
                <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($id); ?></td>
                        <td><?php echo e($task->title); ?></td>
                        <td><?php echo e($task->description); ?></td>
                        <td><?php echo e($task->completed ? 'Hoàn thành' : 'Chưa hoàn thành'); ?></td>
                        <td>
                            <div class = "d-flex gap-2">
                            <a href="<?php echo e(route('tasks.show', $task->id)); ?>" class="btn btn-info">Xem</a>
                            <a href="<?php echo e(route('tasks.edit', $task->id)); ?>" class="btn btn-warning">Sửa</a>
                            <form action="<?php echo e(route('tasks.destroy', $task->id)); ?>" method="POST" style="display: inline-block;">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
                            </form>
                        </td>
                    </tr>
                    <?php $id++; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
         <div class="d-flex justify-content-center mt-3"> <?php echo e($tasks->links('pagination::bootstrap-5')); ?> </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('tasks.App', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\mytask\resources\views/tasks/index.blade.php ENDPATH**/ ?>