



<?php $__env->startSection('title', 'Review Form'); ?>

<?php $__env->startSection('content'); ?>
<div class="card bg-light">

    <div class="card-header bg-primary">
        <br>
        <h4><?php echo e($datalec->subject_id); ?> - <?php echo e($datalec->subject); ?>'s Peer Review</h4>
        <br>
    </div>
    <div class="card-body bg-white d-flex justify-content-center">
        <?php if($errors->any()): ?>
        <?php $__currentLoopData = $errors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div><?php echo e($error); ?></div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
        <form class="border border-dark px-5" method="POST" action="<?php echo e(route('api.form.insert')); ?>">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="subject_id" value="<?php echo e($datalec->subject_id); ?>">
                <input type="hidden" name="period" value="<?php echo e($datalec->period); ?>">
                <div class="mb-3">
                    <br>
                    <p>1. Apakah Bpk/Ibu Dosen sudah memiliki Minimal 1 Paper Scopus di Tahun ini?</p>
                    <input type="radio" class="form-check-input" name="Ans_1" id="Belum1" value="Belum" required>
                    <label for="Belum1" class="form-check-label">Belum</label><br>
                    <input type="radio" class="form-check-input" name="Ans_1" id="Sudah1" value="Sudah">
                    <label for="Sudah1" class="form-check-label">Sudah</label><br>
                    <input type="radio" class="form-check-input" name="Ans_1" id="radiobutton1">
                    <textarea style="resize:none;" rows="1" id="textbox1" type="text" placeholder="Other" oninput="changeHandler()"></textarea><br>
                    <script>
                        
                        function changeHandler(){
                            document.getElementById("radiobutton1").value = document.getElementById("textbox1").value;
                            document.getElementById("radiobutton1").checked = true;
                        }
                    </script>
                </div>
                <br>
                <div class="mb-3">
                    <p>2. Apakah Bpk/Ibu sudah melakukan Pengabdian Pada Masyarakat Minimal 1 kali di Semester ini?</p>
                    <input type="radio" class="form-check-input" name="Ans_2" id="Belum2" value="Belum" required>
                    <label for="Belum2" class="form-check-label">Belum</label><br>
                    <input type="radio" class="form-check-input" name="Ans_2" id="Sudah2" value="Sudah">
                    <label for="Sudah2" class="form-check-label">Sudah</label><br>
                    <input type="radio" class="form-check-input" name="Ans_2" id="radiobutton2" onclick="getElements2()">
                    <textarea style="resize:none;" rows="1" id="textbox2" type="text" placeholder="Other" onclick="this.value=''"></textarea><br>
                </div>
                <br>
                <div class="mb-3">
                    <p>3. Apakah Bpk/Ibu sudah mengikuti Pengembangan Diri Minimal 1 kali di Semester ini?</p>
                    <input type="radio" class="form-check-input" name="Ans_3" id="Belum3" value="Belum" required>
                    <label for="Belum3" class="form-check-label">Belum</label><br>
                    <input type="radio" class="form-check-input" name="Ans_3" id="Sudah3" value="Sudah">
                    <label for="Sudah3" class="form-check-label">Sudah</label><br>
                    <input type="radio" class="form-check-input" name="Ans_3" id="radiobutton3" onclick="getElements3()">
                    <textarea style="resize:none;" rows="1" id="textbox3" type="text" placeholder="Other" onclick="this.value=''"></textarea><br>
                </div>
                <br>
                <div class="mb-3">
                    <p>4. Bagaimana Content pembelajaran secara general?</p>
                    <input type="radio" class="form-check-input" name="Ans_4" id="Good4" value="Good" required>
                    <label for="Good4" class="form-check-label">Good</label><br>
                    <input type="radio"class="form-check-input" name="Ans_4" id="NeedsImprovement4" value="Needs Improvement">
                    <label for="NeedsImprovement4" class="form-check-label">Needs Improvement</label><br>
                </div>
                <br>
                <div class="mb-3">
                    <p>5. Masukan terhadap Content secara general</p>
                    <textarea class="form-control" name="Ans_5" id="message" style="resize:none" rows="5" placeholder="Enter text here..." required></textarea>
                </div>
                <br>
                <div class="mb-3">
                    <p>6. Bagaimana materi dalam Textbook pembelajaran?</p>
                    <input type="radio" class="form-check-input" name="Ans_6" id="Good6" value="Good" required>
                    <label for="Good6" class="form-check-label">Good</label><br>
                    <input type="radio"class="form-check-input" name="Ans_6" id="NeedsImprovement6" value="Needs Improvement">
                    <label for="NeedsImprovement6" class="form-check-label">Needs Improvement</label><br>
                </div>
                <br>
                <div class="mb-3">
                    <p>7. Masukan terhadap materi dalam Textbook</p>
                    <textarea name="Ans_7" id="message" style="height: 150px; width: 500px; resize:none"
                        onclick="this.value=''" required>Enter text here...</textarea>
                </div>
                <br>
                <div class="mb-3">
                    <p>8. Bagaimana isi dari presentasi dan supporting material?</p>
                    <input type="radio" class="form-check-input" name="Ans_8" id="Good8" value="Good" required>
                    <label for="Good8" class="form-check-label">Good</label><br>
                    <input type="radio"class="form-check-input" name="Ans_8" id="NeedsImprovement8" value="Needs Improvement">
                    <label for="NeedsImprovement8" class="form-check-label">Needs Improvement</label><br>
                </div>
                <br>
                <div class="mb-3">
                    <p>9. Masukan terhadap presentasi dan supporting material?</p>
                    <textarea name="Ans_9" id="message" style="height: 150px; width: 500px; resize:none"
                        onclick="this.value=''" required>Enter text here...</textarea>
                </div>
                <br>
                <div class="mb-3">
                    <p>10. Bagaimana isi dari Multimedia/Digital content?</p>
                    <input type="radio" class="form-check-input" name="Ans_10" id="Good10" value="Good" required>
                    <label for="Good10" class="form-check-label">Good</label><br>
                    <input type="radio"class="form-check-input" name="Ans_10" id="NeedsImprovement10" value="Needs Improvement">
                    <label for="NeedsImprovement10" class="form-check-label">Needs Improvement</label><br>
                </div>
                <br>
                <div class="mb-3">
                    <p>11. Masukan terhadap Multimedia/Digital content?</p>
                    <textarea name="Ans_11" id="message" style="height: 150px; width: 500px; resize:none"
                        onclick="this.value=''" required>Enter text here...</textarea>
                </div>
                <br>
                <div class="mb-3">
                    <p>12. Bagaimana Classroom Management di kelas?</p>
                    <input type="radio" class="form-check-input" name="Ans_12" id="Good12" value="Good" required>
                    <label for="Good12" class="form-check-label">Good</label><br>
                    <input type="radio"class="form-check-input" name="Ans_12" id="NeedsImprovement12" value="Needs Improvement">
                    <label for="NeedsImprovement12" class="form-check-label">Needs Improvement</label><br>
                </div>
                <br>
                <div class="mb-3">
                    <p>13. Masukan terhadap Classroom management di kelas?</p>
                    <textarea name="Ans_13" id="message" style="height: 150px; width: 500px; resize:none"
                        onclick="this.value=''" required>Enter text here...</textarea>
                </div>
                <br>
                <div class="mb-3">
                    <p>14. Bagaimana dengan Learning Methodology sekarang</p>
                    <input type="radio" class="form-check-input" name="Ans_14" id="Good14" value="Good" required>
                    <label for="Good14" class="form-check-label">Good</label><br>
                    <input type="radio"class="form-check-input" name="Ans_14" id="NeedsImprovement14" value="Needs Improvement">
                    <label for="NeedsImprovement14" class="form-check-label">Needs Improvement</label><br>
                </div>
                <br>
                <div class="mb-3">
                    <p>15. Masukan terhadap Learning Methodology sekarang?</p>
                    <textarea name="Ans_15" id="message" style="height: 150px; width: 500px; resize:none"
                        onclick="this.value=''" required>Enter text here...</textarea>
                </div>
                <br>
                <div class="mb-3">
                    <p>16. Bagaimana dengan Other Language?(Ex. English)</p>
                    <input type="radio" class="form-check-input" name="Ans_16" id="Good16" value="Good" required>
                    <label for="Good16" class="form-check-label">Good</label><br>
                    <input type="radio"class="form-check-input" name="Ans_16" id="NeedsImprovement16" value="Needs Improvement">
                    <label for="NeedsImprovement16" class="form-check-label">Needs Improvement</label><br>
                </div>
                <br>
                <div class="mb-3">
                    <p>17. Masukan terhadap Other Language?(Ex. English)</p>
                    <textarea name="Ans_17" id="message" style="height: 150px; width: 500px; resize:none"
                        onclick="this.value=''" required>Enter text here...</textarea>
                </div>
                <br>
                <div class="mb-3">
                    <p>18. Bagaimana dengan Individual Assignment/Project/Quiz/Presentation?</p>
                    <input type="radio" class="form-check-input" name="Ans_18" id="Good18" value="Good" required>
                    <label for="Good18" class="form-check-label">Good</label><br>
                    <input type="radio"class="form-check-input" name="Ans_18" id="NeedsImprovement18" value="Needs Improvement">
                    <label for="NeedsImprovement18" class="form-check-label">Needs Improvement</label><br>
                </div>
                <br>
                <div class="mb-3">
                    <p>19. Masukan terhadap Individual Assignment/Project/Quiz/Presentation</p>
                    <textarea name="Ans_19" id="message" style="height: 150px; width: 500px; resize:none"
                        onclick="this.value=''" required>Enter text here...</textarea>
                </div>
                <br>
                <div class="mb-3">
                    <p>20. Bagaimana menurut Bpk/Ibu dengan Midterm Exams?</p>
                    <input type="radio" class="form-check-input" name="Ans_20" id="Good20" value="Good" required>
                    <label for="Good20" class="form-check-label">Good</label><br>
                    <input type="radio"class="form-check-input" name="Ans_20" id="NeedsImprovement20" value="Needs Improvement">
                    <label for="NeedsImprovement20" class="form-check-label">Needs Improvement</label><br>
                </div>
                <br>
                <div class="mb-3">
                    <p>21. Masukan terhadap Midterm Exams</p>
                    <textarea name="Ans_21" id="message" style="height: 150px; width: 500px; resize:none"
                        onclick="this.value=''" required>Enter text here...</textarea>
                </div>
                <br>
                <div class="mb-3">
                    <p>22. Bagaimana menurut Bpk/Ibu dengan Final Exams?</p>
                    <input type="radio" class="form-check-input" name="Ans_22" id="Good22" value="Good" required>
                    <label for="Good22" class="form-check-label">Good</label><br>
                    <input type="radio"class="form-check-input" name="Ans_22" id="NeedsImprovement22" value="Needs Improvement">
                    <label for="NeedsImprovement22" class="form-check-label">Needs Improvement</label><br>
                </div>
                <br>
                <div class="mb-3">
                    <p>23. Masukan terhadap Final Exams</p>
                    <textarea name="Ans_23" id="message" style="height: 150px; width: 500px; resize:none"
                        onclick="this.value=''" required>Enter text here...</textarea>
                </div>
                <br>
                <div class="mb-3">
                    <p>24. Bagaimana menurut Bpk/Ibu dengan Overall Evaluation, Feedback, Dll?</p>
                    <input type="radio" class="form-check-input" name="Ans_24" id="Good24" value="Good" required>
                    <label for="Good24" class="form-check-label">Good</label><br>
                    <input type="radio"class="form-check-input" name="Ans_24" id="NeedsImprovement24" value="Needs Improvement">
                    <label for="NeedsImprovement24" class="form-check-label">Needs Improvement</label><br>
                </div>
                <br>
                <div class="mb-3">
                    <p>25. Masukan terhadap Final Exams</p>
                    <textarea name="Ans_25" id="message" style="height: 150px; width: 500px; resize:none"
                        onclick="this.value=''" required>Enter text here...</textarea>
                </div>
                <br>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary p-2" style="width:100%">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        // function getElements1(){
        //     document.getElementById("textbox1").value = document.getElementById("radiobutton1").value;
        // }
        function getElements2(){
            document.getElementById("textbox2").value = document.getElementById("radiobutton2").value;
        }
        function getElements3{
            document.getElementById("textbox3").value = document.getElementById("radiobutton3").value;
        }
        // $(document).ready(function() {
        //     $('#Other1').click(function() {
        //         $('#UnitPrice2').trigger('click');
        //     });
        // });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\user\OneDrive\Documents\Web-Prog-LEC\project-web-prog\project-web-prog\resources\views/form.blade.php ENDPATH**/ ?>