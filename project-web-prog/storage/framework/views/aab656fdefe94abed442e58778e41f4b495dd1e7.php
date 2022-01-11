

<?php $__env->startSection('title', 'App Peer Review'); ?>

<?php $__env->startSection('content'); ?>
    <div class="position-absolute card top-50 start-50 translate-middle c-card-350">
        <div class="card-body p-4">
            <img src="https://bm5cdn.azureedge.net/asset/images/logo.png" alt="Binus University">
            <div class="mt-3">
                <h3>App Peer Review Login</h3>
            </div>
            
            <form class="mt-4" action="<?php echo e(route('api.login')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="input-group">
                    <span class="input-group-text c-addon-42"><i class="far fa-envelope"></i></span>
                    <input type="text" class="form-control <?php echo e($errors->has('email') ? 'is-invalid' : ''); ?>" name="email"
                        placeholder="Email" value="<?php echo e(old('email')); ?>" aria-label="Email" required autofocus
                        autocomplete="email">
                </div>
                <div class="input-group mt-3">
                    <span class="input-group-text c-addon-42"><i class="fas fa-lock"></i></span>
                    <input type="password" class="form-control <?php echo e($errors->has('password') ? 'is-invalid' : ''); ?>"
                        name="password" placeholder="Password" value="<?php echo e(old('password')); ?>" aria-label="Password"
                        required autocomplete="password">
                </div>
                <?php $__empty_1 = true; $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="text-danger mt-2"><i class="fas fa-times"></i> <?php echo e(ucfirst($error)); ?></div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <?php endif; ?>
                <button type="submit" class="btn btn-primary mt-3 w-100"><i class="fas fa-sign-in-alt"></i>
                    Login</button>
            </form>


        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\user\OneDrive\Documents\Web-Prog-LEC\project-web-prog\project-web-prog\resources\views/login.blade.php ENDPATH**/ ?>