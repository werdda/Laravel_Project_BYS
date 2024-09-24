<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AnalisisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('analises')->insert([
            [
                'title' => 'Tidak depresi',
                'desc' => 'Hasil tes Anda menunjukkan bahwa Anda tidak memiliki masalah depresi. Kami sarankan beberapa hal yang bisa Anda lakukan untuk menjaga kesehatan mental Anda agar tetap baik: menjaga pola hidup yang sehat seperti makan teratur, tidur teratur, dan berolahraga yang cukup, serta terbuka pada orang-orang terdekat dan membicarakan masalah Anda dengan mereka.',
                'min-score' => '0',
                'max-score' => '4',
                'category_id' => 1, //phq-9
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Depresi Ringan',
                'desc' => 'Hasil tes Anda menunjukkan bahwa Anda mungkin mengalami depresi ringan. Kami sarankan beberapa hal yang bisa Anda lakukan untuk membantu kondisi Anda: meditasi, istirahat yang cukup, makan teratur, dan olahraga setiap hari. Bicarakan masalah yang mengganggu Anda dengan anggota keluarga atau orang-orang terdekat. Jika perlu, cari bantuan profesional (nomor ahli seperti di atas).',
                'min-score' => '5',
                'max-score' => '9',
                'category_id' => 1, //phq-9
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Depresi Sedang',
                'desc' => ' Hasil tes Anda menunjukkan Anda mungkin mengalami Depresi sedang
                Kami sarankan Anda untuk melatih pola hidup sehat dan mencari hobi untuk diminati. Mengambil kelas konseling ataupun berbicara dengan ahli mengenai gejala dan masalah yang Anda alami,Coginitive-behavioural Therapy (CBT) dan terapi-terapi lainnya juga kami sarankan.',
                'min-score' => '10',
                'max-score' => '14',
                'category_id' => 1, //phq-9
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            
            [
                'title' => 'Depresi yang cukup berat',
                'desc' => ' Hasil tes Anda menunjukkan Anda mengalami masalah depresi yang cukup berat, kami sarankan Anda untuk membuat janji temu dan berkonsultasi lebih lanjut dengan ahli mengenai gejala dan masalah yang Anda alami. Terapi dan medikasi disarankan.',
                'min-score' => '15',
                'max-score' => '19',
                'category_id' => 1, //phq-9
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Depresi yang cukup berat',
                'desc' => ' Hasil tes Anda menunjukkan Anda mengalami depresi berat. Kami anjurkan segera mencari bantuan ahli dan berkonsultasi lebih lanjut mengenai gejala dan masalah yang Anda hadapi, kami juga menyarankan Anda untuk segera mencari bantuan ke anggota keluarga atau teman atau ke rumah sakit terdekat agar tidak melukai diri Anda sendiri. Medikasi dan terapi sangat disarankan untuk dilakukan.',
                'min-score' => '20',
                'max-score' => '27',
                'category_id' => 1, //phq-9
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],


            [
                'title' => 'Tidak mengalami kecemasan',
                'desc' => ' Hasil tes Anda tidak memiliki gangguan kecemasan. Beberapa hal yang kami sarankan untuk menjaga kesehatan mental Anda: menjaga pola hidup yang sehat seperti olahraga yang cukup, makan teratur, dan istirahat yang cukup, serta melatih relaksasi untuk menjaga tingkat kecemasan Anda.',
                'min-score' => '0',
                'max-score' => '4',
                'category_id' => 2, //gad-7
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Kecemasan ringan',
                'desc' => ' Hasil tes Anda menunjukkan bahwa Anda mungkin memiliki gangguan kecemasan ringan. Kami sarankan Anda melatih teknik relaksasi seperti pernapasan dalam, yoga, dan meditasi. Kami juga sarankan Anda untuk menjaga gaya hidup yang sehat, serta membicarakan masalah kecemasan Anda dengan orang-orang terdekat Anda. Jika mengalami gejala lebih lanjut kami sarankan untuk mencari bantuan professional',
                'min-score' => '5',
                'max-score' => '9',
                'category_id' => 2, //gad-7
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Kecemasan sedang',
                'desc' => ' Hasil tes Anda menunjukkan Anda mungkin mengalami gangguan kecemasan sedang. Kami sarankan Anda untuk mencari bantuan ahli dan mengikuti terapi seperti Cognitive-behavioural Teraphy (CBT). Atur level stress Anda dengan olahraga yang cukup.',
                'min-score' => '10',
                'max-score' => '14',
                'category_id' => 2, //gad-7
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Kecemasan berat',
                'desc' => ' Hasil tes Anda menunjukkan Anda mengalami gangguan kecemasan berat. Kami sarankan Anda segera mencari bantuan professional untuk mendiskusikan gejala serta masalah yang Anda alami, dan perawatan lebih lanjut seperti terapi dan medikasi (obat-obat-an) Kami juga sarankan Anda untuk terbuka dan mencari bantuan keluarga serta teman-teman dekat Anda.',
                'min-score' => '10',
                'max-score' => '14',
                'category_id' => 2, //gad-7
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],


            
            [
                'title' => 'Stress rendah',
                'desc' => ' Hasil tes Anda menunjukkan bahwa Anda mengalami stres tingkat rendah. Kami sarankan Anda untuk tetap menjaga pola hidup yang sehat dengan cara berolahraga secara teratur, makan teratur, dan istirahat yang cukup. Jika stres tidak kunjung mereda, kami sarankan untuk mencari bantuan lebih lanjut.',
                'min-score' => '0',
                'max-score' => '13',
                'category_id' => 3, //PSS
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Stress sedang',
                'desc' => ' Hasil tes Anda menunjukkan Anda mengalami stress tingkat sedang. Kami sarankan Anda untuk berolahraga teratur, makan yang teratur, istirahat yang cukup dan mengurangi aktivitas yang dapat menimbulkan stress berlebih. Berbicara dengan terapis atau ahli juga disarankan apabila stress Anda tidak kunjung menurun.',
                'min-score' => '14',
                'max-score' => '26',
                'category_id' => 3, //PSS
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Stress Berat',
                'desc' => ' Hasil tes Anda menunjukkan Anda mengalami stress tingkat berat. Kami sarankan Anda untuk segera mencari bantuan ahli untuk perawatan stress lebih lanjut dan mengikuti terapi serta medikasi (obat – obat an) yang dianjurkan oleh dokter atau ahli kesehatan. Bersosialisasi dengan anggota keluarga dan sesama juga kami anjurkan serta berolahraga untuk mengurangi level stress Anda',
                'min-score' => '27',
                'max-score' => '40',
                'category_id' => 3, //PSS
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],


        ]);
    }
}
