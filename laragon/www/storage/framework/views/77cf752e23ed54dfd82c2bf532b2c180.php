
<?php $__env->startSection('title', 'Danh sách sinh viên (Mảng)'); ?>
<?php $__env->startSection('content'); ?>
    <h2>Danh sách sinh viên – Nguồn: Mảng tĩnh</h2>
    <table>
        <thead>
            <tr>
                <th>STT</th>
                <th>Họ tên</th>
                <th>Tuổi</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($loop->iteration); ?></td>
                    <td><?php echo e($s['name']); ?></td>
                    <td><?php echo e($s['age']); ?></td>
                    <td><?php echo e($s['email']); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\buoi6\resources\views/students/index.blade.php ENDPATH**/ ?>