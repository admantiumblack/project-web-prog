

<?php $__env->startSection('title', 'Form Result'); ?>

<?php $__env->startSection('content'); ?>

    <div class="row row-cols-1 row-cols-lg-2 p-3 m-2">
        <div class="col-lg-9">
            
            <div class="px-2 mb-3"><h1>All Forms - Microsystems</h1></div>
            <div class="card">
                <div class="card-body">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th class="col-5">Mata kuliah</th>
                                <th class="col-2">Period</th>
                                <th class="col-3">Deadline</th>
                                <th class="col-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $forms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $form): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e($form->subject); ?></td>
                                    <td><?php echo e($form->period); ?></td>
                                    <td><?php echo e($form->deadline); ?></td>
                                    <td>
                                        <a class="btn btn-primary" href="#">View</a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <?php endif; ?>
                        </tbody>
                        
                    </table>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\user\OneDrive\Documents\Web-Prog-LEC\project-web-prog\project-web-prog\resources\views/view/formresult.blade.php ENDPATH**/ ?>