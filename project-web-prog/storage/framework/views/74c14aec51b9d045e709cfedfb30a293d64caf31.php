

<?php $__env->startSection('title', 'Feedback Ticket'); ?>

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
            <h1 class="text-center">Feedback Ticket</h1>
        </div>
        <div class="card-body">
            <table class="table table-light align-middle">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Course Id</th>
                        <th scope="col">Course Name</th>
                        <th scope="col">Issue</th>
                        <th scope="col">Content</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $complaints; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $complaint): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <th>
                                <?php echo e($key+1); ?>

                            </th>
                            <th>
                                <?php echo e($complaint->subject_id); ?>

                            </th>
                            <th>
                                <?php echo e($complaint->subject); ?>

                            </th>
                            <th>
                                <?php echo e($complaint->title); ?>

                            </th>
                            <th>
                                <?php echo e($complaint->content); ?>

                            </th>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <h2 class="text-center">No Feedback Recently</h2>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\user\OneDrive\Documents\Web-Prog-LEC\project-web-prog\project-web-prog\resources\views/view/feedbackticket.blade.php ENDPATH**/ ?>