

<?php $__env->startSection('title', 'Manage Courses'); ?>

<?php $__env->startSection('content'); ?>
    <div class="row row-cols-1 row-cols-lg-2 p-3 m-2">
        <div class="col-lg-9">
            <div class="px-2 mb-3"><h1>Manage Subjects</h1></div>
            <div class="card">
                <div class="card-body">
                    <form action="<?php echo e(route('manage')); ?>" method="GET" id="searchLecture">
                        <?php echo csrf_field(); ?>
                        <div class="row m-0 gy-2">
                            <div class="col">
                            <label for="selectRumpunan">Select Rumpunan:</label>
                                <select class="form-select" onchange="this.form.submit()" name="cluster_id">
                                    <option <?php echo e($cluster_choice == -1? 'selected':''); ?> value="-1">All</option>
                                    <?php $__empty_1 = true; $__currentLoopData = $clusters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cluster): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <option <?php echo e($cluster_choice == $cluster->id? 'selected':''); ?> value="<?php echo e($cluster->id); ?>"><?php echo e($cluster->id); ?> - <?php echo e($cluster->cluster); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <option selected>No Cluster Available
                                    </option>
                                    <?php endif; ?>
                                </select>
                            </div>
                            <div class="col">
                                <label for="selectPeriod">Select Period:</label>
                                <select class="form-select" onchange="this.form.submit()" name="period">
                                    <option <?php echo e($period_choice == -1? 'selected':''); ?> value="-1">All</option>
                                    <?php $__empty_1 = true; $__currentLoopData = $periods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $period): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <option <?php echo e($period_choice == $period->period? 'selected':''); ?> value="<?php echo e($period->period); ?>"><?php echo e($period->period); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <option selected>No Period Available
                                    </option>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="row row-cols-1 p-0">
                <div class="col m-0 mb-2">
                    <div class="mb-1">Upload Data</div>
                    <div class="card p-0">
                        <button type="button" class="card-body btn btn-danger text-white" id="upload-btn"
                            data-bs-toggle="modal" data-bs-target="#ticketModal">
                            Manage Subjects
                        </button>
                        <div class="modal fade" id="ticketModal" tabindex="-1">
                            <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Assign Subject</h5>
                                    </div>
                                    
                                    <form action="<?php echo e(route('api.complaint.insert')); ?>" method="POST" id="uploadForm">
                                        <?php echo csrf_field(); ?>
                                        <div class="modal-body row m-0 gy-2">
                                            <label for="selectCourses">Periode:</label>
                                            <div>
                                                <textarea class="form-control" name="period" id="" style="resize:none" rows="1" placeholder="example: 221" required></textarea>
                                                
                                            </div>
                                            <div class="form-control">
                                                <label for="username">Upload files</label>
                                                <input type="file" name="csv" id="insert_data" placeholder="must be csv">
                                            </div>
                                        </div>
                                    </form>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" form="uploadForm">Upload</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th class="col-3">Nama Dosen</th>
                    <th class="col-2">Kode Dosen</th>
                    <th class="col-3">Subjects</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $lecturers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lecturer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($lecturer->name); ?></td>
                        <td><?php echo e($lecturer->id); ?></td>
                        <td>
                            <?php $__currentLoopData = $lecturer->subjectLecturers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subjectLecturer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                (<?php echo e($subjectLecturer->subject->cluster->cluster); ?>) <?php echo e($subjectLecturer->subject->id); ?> - <?php echo e($subjectLecturer->subject->subject); ?> (<?php echo e($subjectLecturer->period); ?>) <br>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td>No Dosens Available</td>
                </tr>
                <?php endif; ?>

            </tbody>
        </table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\user\OneDrive\Documents\Web-Prog-LEC\project-web-prog\project-web-prog\resources\views/manage/subjects.blade.php ENDPATH**/ ?>