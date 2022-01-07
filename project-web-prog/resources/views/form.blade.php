@extends('layout.master')

@section('title', 'Review Form')

@section('content')

    <div class="container border bg-primary" style="Margin-top: 80px">
        <br>
        <h4>(Query class)'s Peer Review</h4>
        <br>
    </div>
    <div class="container border p-1 d-flex justify-content-center">
        <form>
            <input type="hidden" name="lecturer_name">
            <input type="hidden" name="lecturer_id">
            <input type="hidden" name="subject_id">
            <input type="hidden" name="period">
            <div class="mb-3">
                <br>
                <p>1. Apakah Bpk/Ibu Dosen sudah memiliki Minimal 1 Paper Scopus di Tahun ini?</p>
                <input type="radio" name="Ans_1" id="Belum" value="Belum">
                <label for="Belum">Belum</label><br>
                <input type="radio" name="Ans_1" id="Sudah" value="Sudah">
                <label for="Sudah">Sudah</label><br>
                <input type="radio" name="Ans_1" value=""><input type="text" name="other_reason" placeholder="Other" /><br>
            </div>
            <br>
            <div class="mb-3">
                <p>2. Apakah Bpk/Ibu sudah melakukan Pengabdian Pada Masyarakat Minimal 1 kali di Semester ini?</p>
                <input type="radio" name="Ans_2" id="Belum" value="Belum">
                <label for="Belum">Belum</label><br>
                <input type="radio" name="Ans_2" id="Sudah" value="Sudah">
                <label for="Sudah">Sudah</label><br>
                <input type="radio" name="Ans_2" value=""><input type="text" name="other_reason" placeholder="Other" /><br>
            </div>
            <br>
            <div class="mb-3">
                <p>3. Apakah Bpk/Ibu sudah mengikuti Pengembangan Diri Minimal 1 kali di Semester ini?</p>
                <input type="radio" name="Ans_3" id="Belum" value="Belum">
                <label for="Belum">Belum</label><br>
                <input type="radio" name="Ans_3" id="Sudah" value="Sudah">
                <label for="Sudah">Sudah</label><br>
                <input type="radio" name="Ans_3" value=""><input type="text" name="other_reason" placeholder="Other" /><br>
            </div>
            <br>
            <div class="mb-3">
                <p>4.Bagaimana Content pembelajaran secara general?</p>
                <input type="radio" name="Ans_4" id="Good" value="Good">
                <label for="Good">Good</label><br>
                <input type="radio" name="Ans_4" id="Needs Improvement" value="Needs Improvement">
                <label for="Needs Improvement">Needs Improvement</label><br>
            </div>
            <br>
            <div class="mb-3">
                <p>5. Masukan terhadap Content secara general</p>
                <textarea name="Ans_5" id="message" style="height: 150px; width: 500px; resize:none"
                    onclick="this.value=''">Enter text here...</textarea>
            </div>
            <br>
            <div class="mb-3">
                <p>6.Bagaimana materi dalam Textbook pembelajaran?</p>
                <input type="radio" name="Ans_6" id="Good" value="Good">
                <label for="Good">Good</label><br>
                <input type="radio" name="Ans_6" id="Needs Improvement" value="Needs Improvement">
                <label for="Needs Improvement">Needs Improvement</label><br>
            </div>
            <br>
            <div class="mb-3">
                <p>7. Masukan terhadap materi dalam Textbook</p>
                <textarea name="Ans_7" id="message" style="height: 150px; width: 500px; resize:none"
                    onclick="this.value=''">Enter text here...</textarea>
            </div>
            <br>
            <div class="mb-3">
                <p>8.Bagaimana isi dari presentasi dan supporting material?</p>
                <input type="radio" name="Ans_8" id="Good" value="Good">
                <label for="Good">Good</label><br>
                <input type="radio" name="Ans_8" id="Needs Improvement" value="Needs Improvement">
                <label for="Needs Improvement">Needs Improvement</label><br>
            </div>
            <br>
            <div class="mb-3">
                <p>9.Masukan terhadap presentasi dan supporting material?</p>
                <textarea name="Ans_9" id="message" style="height: 150px; width: 500px; resize:none"
                    onclick="this.value=''">Enter text here...</textarea>
            </div>
            <br>
            <div class="mb-3">
                <p>10.Bagaimana isi dari Multimedia/Digital content?</p>
                <input type="radio" name="Ans_10" id="Good" value="Good">
                <label for="Good">Good</label><br>
                <input type="radio" name="Ans_10" id="Needs Improvement" value="Needs Improvement">
                <label for="Needs Improvement">Needs Improvement</label><br>
            </div>
            <br>
            <div class="mb-3">
                <p>11.Masukan terhadap presentasi dan supporting material?</p>
                <textarea name="Ans_11" id="message" style="height: 150px; width: 500px; resize:none"
                    onclick="this.value=''">Enter text here...</textarea>
            </div>
            <br>
            <div class="mb-3">
                <p>12.Bagaimana Classroom Management di kelas?</p>
                <input type="radio" name="Ans_12" id="Good" value="Good">
                <label for="Good">Good</label><br>
                <input type="radio" name="Ans_12" id="Needs Improvement" value="Needs Improvement">
                <label for="Needs Improvement">Needs Improvement</label><br>
            </div>
            <br>
            <div class="mb-3">
                <p>13.Masukan terhadap Classroom management di kelas?</p>
                <textarea name="Ans_13" id="message" style="height: 150px; width: 500px; resize:none"
                    onclick="this.value=''">Enter text here...</textarea>
            </div>
            <br>
            <div class="mb-3">
                <p>14.Bagaimana dengan Learning Methodology sekarang</p>
                <input type="radio" name="Ans_14" id="Good" value="Good">
                <label for="Good">Good</label><br>
                <input type="radio" name="Ans_14" id="Needs Improvement" value="Needs Improvement">
                <label for="Needs Improvement">Needs Improvement</label><br>
            </div>
            <br>
            <div class="mb-3">
                <p>15.Masukan terhadap Learning Methodology sekarang?</p>
                <textarea name="Ans_15" id="message" style="height: 150px; width: 500px; resize:none"
                    onclick="this.value=''">Enter text here...</textarea>
            </div>
            <br>
            <div class="mb-3">
                <p>16.Bagaimana dengan Other Language?(Ex. English)</p>
                <input type="radio" name="Ans_16" id="Good" value="Good">
                <label for="Good">Good</label><br>
                <input type="radio" name="Ans_16" id="Needs Improvement" value="Needs Improvement">
                <label for="Needs Improvement">Needs Improvement</label><br>
            </div>
            <br>
            <div class="mb-3">
                <p>17.Masukan terhadap Other Language?(Ex. English)</p>
                <textarea name="Ans_17" id="message" style="height: 150px; width: 500px; resize:none"
                    onclick="this.value=''">Enter text here...</textarea>
            </div>
            <br>
            <div class="mb-3">
                <p>18.Bagaimana dengan Individual Assignment/Project/Quiz/Presentation?</p>
                <input type="radio" name="Ans_18" id="Good" value="Good">
                <label for="Good">Good</label><br>
                <input type="radio" name="Ans_18" id="Needs Improvement" value="Needs Improvement">
                <label for="Needs Improvement">Needs Improvement</label><br>
            </div>
            <br>
            <div class="mb-3">
                <p>19.Masukan terhadap Individual Assignment/Project/Quiz/Presentation</p>
                <textarea name="Ans_19" id="message" style="height: 150px; width: 500px; resize:none"
                    onclick="this.value=''">Enter text here...</textarea>
            </div>
            <br>
            <div class="mb-3">
                <p>20.Bagaimana menurut Bpk/Ibu dengan Midterm Exams?</p>
                <input type="radio" name="Ans_20" id="Good" value="Good">
                <label for="Good">Good</label><br>
                <input type="radio" name="Ans_20" id="Needs Improvement" value="Needs Improvement">
                <label for="Needs Improvement">Needs Improvement</label><br>
            </div>
            <br>
            <div class="mb-3">
                <p>21.Masukan terhadap Midterm Exams</p>
                <textarea name="Ans_21" id="message" style="height: 150px; width: 500px; resize:none"
                    onclick="this.value=''">Enter text here...</textarea>
            </div>
            <br>
            <div class="mb-3">
                <p>22.Bagaimana menurut Bpk/Ibu dengan Final Exams?</p>
                <input type="radio" name="Ans_22" id="Good" value="Good">
                <label for="Good">Good</label><br>
                <input type="radio" name="Ans_22" id="Needs Improvement" value="Needs Improvement">
                <label for="Needs Improvement">Needs Improvement</label><br>
            </div>
            <br>
            <div class="mb-3">
                <p>23.Masukan terhadap Final Exams</p>
                <textarea name="Ans_23" id="message" style="height: 150px; width: 500px; resize:none"
                    onclick="this.value=''">Enter text here...</textarea>
            </div>
            <br>
            <div class="mb-3">
                <p>24.Bagaimana menurut Bpk/Ibu dengan Overall Evaluation, Feedback, Dll?</p>
                <input type="radio" name="Ans_24" id="Good" value="Good">
                <label for="Good">Good</label><br>
                <input type="radio" name="Ans_24" id="Needs Improvement" value="Needs Improvement">
                <label for="Needs Improvement">Needs Improvement</label><br>
            </div>
            <br>
            <div class="mb-3">
                <p>25.Masukan terhadap Final Exams</p>
                <textarea name="Ans_25" id="message" style="height: 150px; width: 500px; resize:none"
                    onclick="this.value=''">Enter text here...</textarea>
            </div>
            <br>
            <div class="d-grid gap-2 col-6 mx-auto">
                <button type="button" class="btn btn-info">Submit</button>
            </div>
        </form>
    </div>
@endsection
