@extends('layout.master')

@section('title', 'Review Form')

@section('content')
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Review Form</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body>
        <div class="container border bg-primary" style="Margin-top: 80px" >
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
                    <input type="radio" name="Scopus" id="Belum" value="Belum">
                    <label for="Belum">Belum</label><br>
                    <input type="radio" name="Scopus" id="Sudah" value="Sudah">
                    <label for="Sudah">Sudah</label><br>
                    <input type="radio" name="Scopus" value=""><input type="text" name="other_reason" placeholder="Other"/><br>
                </div>
                <br>
                <div class="mb-3">
                    <p>2. Apakah Bpk/Ibu sudah melakukan Pengabdian Pada Masyarakat Minimal 1 kali di Semester ini?</p>
                    <input type="radio" name="Pengabdian" id="Belum" value="Belum">
                    <label for="Belum">Belum</label><br>
                    <input type="radio" name="Pengabdian" id="Sudah" value="Sudah">
                    <label for="Sudah">Sudah</label><br>
                    <input type="radio" name="Pengabdian" value=""><input type="text" name="other_reason" placeholder="Other"/><br>
                </div>
                <br>
                <div class="mb-3">
                    <p>3. Apakah Bpk/Ibu sudah mengikuti Pengembangan Diri Minimal 1 kali di Semester ini?</p>
                    <input type="radio" name="Pengembagan" id="Belum" value="Belum">
                    <label for="Belum">Belum</label><br>
                    <input type="radio" name="Pengembagan" id="Sudah" value="Sudah">
                    <label for="Sudah">Sudah</label><br>
                    <input type="radio" name="Pengembagan" value=""><input type="text" name="other_reason" placeholder="Other"/><br>
                </div>
                <br>
                <div class="mb-3">
                    <p>4.Bagaimana Content pembelajaran secara general?</p>
                    <input type="radio" name="Content" id="Good" value="Good">
                    <label for="Good">Good</label><br>
                    <input type="radio" name="Content" id="Needs Improvement" value="Needs Improvement">
                    <label for="Needs Improvement">Needs Improvement</label><br>
                </div>
                <br>
                <div class="mb-3">
                    <p>5. Masukan terhadap Content secara general</p>
                    <textarea name="Content" id="message" style="height: 150px; width: 500px" onclick="this.value=''">Enter text here...</textarea>
                </div>
                <br>
                <div class="mb-3">
                    <p>6.Bagaimana materi dalam Textbook pembelajaran?</p>
                    <input type="radio" name="Textbook" id="Good" value="Good">
                    <label for="Good">Good</label><br>
                    <input type="radio" name="Textbook" id="Needs Improvement" value="Needs Improvement">
                    <label for="Needs Improvement">Needs Improvement</label><br>
                </div>
                <br>
                <div class="mb-3">
                    <p>7. Masukan terhadap materi dalam Textbook</p>
                    <textarea name="Textbook" id="message" style="height: 150px; width: 500px" onclick="this.value=''">Enter text here...</textarea>
                </div>
                <br>
                <div class="mb-3">
                    <p>8.Bagaimana isi dari presentasi dan supporting material?</p>
                    <input type="radio" name="Materi" id="Good" value="Good">
                    <label for="Good">Good</label><br>
                    <input type="radio" name="Materi" id="Needs Improvement" value="Needs Improvement">
                    <label for="Needs Improvement">Needs Improvement</label><br>
                </div>
                <br>
                <div class="mb-3">
                    <p>9.Masukan terhadap presentasi dan supporting material?</p>
                    <textarea name="Materi" id="message" style="height: 150px; width: 500px" onclick="this.value=''">Enter text here...</textarea>
                </div>
                <br>
                <div class="mb-3">
                    <p>10.Bagaimana isi dari Multimedia/Digital content?</p>
                    <input type="radio" name="Mulmed" id="Good" value="Good">
                    <label for="Good">Good</label><br>
                    <input type="radio" name="Mulmed" id="Needs Improvement" value="Needs Improvement">
                    <label for="Needs Improvement">Needs Improvement</label><br>
                </div>
                <br>
                <div class="mb-3">
                    <p>11.Masukan terhadap presentasi dan supporting material?</p>
                    <textarea name="Mulmed" id="message" style="height: 150px; width: 500px" onclick="this.value=''">Enter text here...</textarea>
                </div>
                <br>
                <div class="mb-3">
                    <p>12.Bagaimana Classroom Management di kelas?</p>
                    <input type="radio" name="Classroom" id="Good" value="Good">
                    <label for="Good">Good</label><br>
                    <input type="radio" name="Classroom" id="Needs Improvement" value="Needs Improvement">
                    <label for="Needs Improvement">Needs Improvement</label><br>
                </div>
                <br>
                <div class="mb-3">
                    <p>13.Masukan terhadap Classroom management di kelas?</p>
                    <textarea name="Classroom" id="message" style="height: 150px; width: 500px" onclick="this.value=''">Enter text here...</textarea>
                </div>
                <br>
                <div class="mb-3">
                    <p>14.Bagaimana dengan Learning Methodology sekarang</p>
                    <input type="radio" name="Learning" id="Good" value="Good">
                    <label for="Good">Good</label><br>
                    <input type="radio" name="Learning" id="Needs Improvement" value="Needs Improvement">
                    <label for="Needs Improvement">Needs Improvement</label><br>
                </div>
                <br>
                <div class="mb-3">
                    <p>15.Masukan terhadap Learning Methodology sekarang?</p>
                    <textarea name="Learning" id="message" style="height: 150px; width: 500px" onclick="this.value=''">Enter text here...</textarea>
                </div>
                <br>
                <div class="mb-3">
                    <p>16.Bagaimana dengan Other Language?(Ex. English)</p>
                    <input type="radio" name="Language" id="Good" value="Good">
                    <label for="Good">Good</label><br>
                    <input type="radio" name="Language" id="Needs Improvement" value="Needs Improvement">
                    <label for="Needs Improvement">Needs Improvement</label><br>
                </div>
                <br>
                <div class="mb-3">
                    <p>17.Masukan terhadap Other Language?(Ex. English)</p>
                    <textarea name="Language" id="message" style="height: 150px; width: 500px" onclick="this.value=''">Enter text here...</textarea>
                </div>
                <br>
                <div class="mb-3">
                    <p>18.Bagaimana dengan Individual Assignment/Project/Quiz/Presentation?</p>
                    <input type="radio" name="Assest" id="Good" value="Good">
                    <label for="Good">Good</label><br>
                    <input type="radio" name="Assest" id="Needs Improvement" value="Needs Improvement">
                    <label for="Needs Improvement">Needs Improvement</label><br>
                </div>
                <br>
                <div class="mb-3">
                    <p>19.Masukan terhadap Individual Assignment/Project/Quiz/Presentation</p>
                    <textarea name="Assest" id="message" style="height: 150px; width: 500px" onclick="this.value=''">Enter text here...</textarea>
                </div>
                <br>
                <div class="mb-3">
                    <p>20.Bagaimana menurut Bpk/Ibu dengan Midterm Exams?</p>
                    <input type="radio" name="Midterm" id="Good" value="Good">
                    <label for="Good">Good</label><br>
                    <input type="radio" name="Midterm" id="Needs Improvement" value="Needs Improvement">
                    <label for="Needs Improvement">Needs Improvement</label><br>
                </div>
                <br>
                <div class="mb-3">
                    <p>21.Masukan terhadap Midterm Exams</p>
                    <textarea name="Midterm" id="message" style="height: 150px; width: 500px" onclick="this.value=''">Enter text here...</textarea>
                </div>
                <br>
                <div class="mb-3">
                    <p>22.Bagaimana menurut Bpk/Ibu dengan Final Exams?</p>
                    <input type="radio" name="Final" id="Good" value="Good">
                    <label for="Good">Good</label><br>
                    <input type="radio" name="Final" id="Needs Improvement" value="Needs Improvement">
                    <label for="Needs Improvement">Needs Improvement</label><br>
                </div>
                <br>
                <div class="mb-3">
                    <p>23.Masukan terhadap Final Exams</p>
                    <textarea name="Final" id="message" style="height: 150px; width: 500px" onclick="this.value=''">Enter text here...</textarea>
                </div>
                <br>
                <div class="mb-3">
                    <p>24.Bagaimana menurut Bpk/Ibu dengan Overall Evaluation, Feedback, Dll?</p>
                    <input type="radio" name="Overall" id="Good" value="Good">
                    <label for="Good">Good</label><br>
                    <input type="radio" name="Overall" id="Needs Improvement" value="Needs Improvement">
                    <label for="Needs Improvement">Needs Improvement</label><br>
                </div>
                <br>
                <div class="mb-3">
                    <p>25.Masukan terhadap Final Exams</p>
                    <textarea name="Overall" id="message" style="height: 150px; width: 500px" onclick="this.value=''">Enter text here...</textarea>
                </div>
                <br>
                <div class="d-grid gap-2 col-6 mx-auto">
                    <button type="button" class="btn btn-info">Submit</button>
                </div>
            </form>
        </div>
    </body>
    </html>
@endsection
