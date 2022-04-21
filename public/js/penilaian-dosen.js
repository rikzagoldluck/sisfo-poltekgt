let pertanyaanA = {
    "a" : [
        "Dosen mengajar sesuai dengan jadwal kuliah yang telah ditentukan", "Penyajian materi kuliah sistematis dan mudah dipahami", "Tujuan mata kuliah diberikan dengan jelas", "Materi perkuliahan yang disampaikan sesuai SAP", "Dosen memberikan contoh yang jelas dan relevan dengan materi perkuliahan" ,"Dosen memberikan kesempatan dan memotivasi mahasiswa untuk bertanya", "Dosen memberikan jawaban dengan jelas pada pertanyaan mahasiwa", "Dosen memberitahukan buku-buku referensi yang digunakan", "Dosen memberikan motivasi kepada mahasiswa untuk membaca buku referensi", "Dosen berusaha memacu prestasi mahasiswa", "Alat bantu yang digunakan relevan dengan kebutuhan"  
    ],
    "b" : ["Dosen berbicara dengan jelas", "Dosen selalu hadir tepat waktu", "Dosen selalu mengikuti perkembangan baru dalam bidangnya", "Dosen menjelaskan materi perkuliahan secara rinci/detail", "Penjelasan materi perkuliahan mudah dipahami", "Dosen terbuka terhadap masukan yang bersifat membangun", "Dosen berpakaian rapih dan sopan", "Dosen bersedia membimbing mahasiswa di dalam maupun di luar kelas", "Dosen tidak sering menggantikan dan merubah jadwal kuliahnya"],
    "c" : ["Dosen memberikan tugas", "Hasil tugas dibnahas kembali/diberi umpan balik", "Tugas bermanfaat guna memperdalam materi kuliah", "Soal ujian sesuai dengan materi kuliah"],
    "d" : ["Buku-buku di perpustakaan menunjang proses belajar", "Sarana yang tersedia di dalam ruang kelas cukup memadai", "Laboratorium atau sarana lain menunjang mata kuliah terkait", "Suasana belajar cukup menunjang dan kondusif", "Fasilitas akses ke internet sangat membantu proses belajar mengajar", "Hasil ujian segera diumumkan"],
}

let topik = {
    "a" : "PENYAJIAN KULIAH",
    "b" : "PRIBADI DOSEN",
    "c" : "PROSES EVALUASI",
    "d" : "FASILITAS DAN ATMOSFIR BELAJAR",
}

function buatContainerForm(pertanyaan, topik){
    for (let i in topik) {
        $('#penilaian-container').append(`
        <div class="col-12">
            <div class="card shadow mb-4">

        <a href="#card-topik${i}" class="d-block card-header py-3" data-toggle="collapse"
            role="button" aria-expanded="false" aria-controls="card-topik${i}">
            <h6 class="m-0 font-weight-bold text-primary">${topik[i]}</h6>
        </a>

        <div class="collapse" id="card-topik${i}">
            <div class="card-body" id="${topik[i]}">
                ` +
                buatForm(pertanyaan, i)
                + `
            </div>
        </div>
    </div>
    </div>
    `)
        
    }
}


function buatForm(pertanyaan, huruf) {
        let str = '';
            let no = 1;
            pertanyaan[huruf].forEach(pertanyaan => {
                str += `
               <h6 class="mt-3 text-sm-sm">${no++}. ${pertanyaan}</h6>`;
   
               for(let i = 1; i < 6; i++){
                   str += `
                   <div class="form-check-inline ml-4">
                   <input class="form-check-input" type="radio" name="${huruf + (no - 1)}" id="opt${ huruf  + i }" value="${i}" required>
                   <label class="form-check-label" for="opt${huruf + i}">
                       ${i}
                   </label>
               </div>`;
               }
                
            });
      return str;
}

buatContainerForm(pertanyaanA, topik)

let _counter = 0;
window.onclick = function () {
        _counter++;
        setTimeout(()=>{
            _counter = 0 ;
        }, 5000)
        if (_counter == 10)
        {
            var btns = document.querySelectorAll('input[type="radio"]')

            console.log(btns)
                for(var i=0;i<btns.length;i++){
                if(btns[i].value=="5")
                    btns[i].checked=true;
                }
            _counter = 0;
        }
}

