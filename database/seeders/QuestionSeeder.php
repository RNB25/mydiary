<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        // Ambil id mood berdasarkan nama
        $moods = DB::table('moods')->pluck('id', 'name');

        $questions = [

            // ==================== DAY 1 ====================
            [
                'day_id' => 1,
                'mood_id' => $moods['cerah'],
                'question_1' => 'Hal kecil apa yang bikin kamu senyum hari ini?',
                'question_2' => 'Apa pencapaian paling simpel tapi bikin kamu bangga?',
                'question_3' => 'Siapa yang bikin harimu lebih hangat hari ini?',
            ],
            [
                'day_id' => 1,
                'mood_id' => $moods['mendung'],
                'question_1' => 'Pikiran apa yang muter-muter di kepala kamu sekarang?',
                'question_2' => 'Kalau bisa pencet tombol ‘pause’, hal apa yang pengen kamu jedain dulu?',
                'question_3' => 'Hal simpel apa yang bisa bantu kamu rileks sekarang?',
            ],
            [
                'day_id' => 1,
                'mood_id' => $moods['badai'],
                'question_1' => 'Perasaan apa yang paling dominan hari ini?',
                'question_2' => 'Kalau hatimu bisa ngomong, dia lagi bilang apa?',
                'question_3' => 'Ada hal kecil yang bisa kamu lakuin buat nenangin diri gak?',
            ],

            // ==================== DAY 2 ====================
            [
                'day_id' => 2,
                'mood_id' => $moods['cerah'],
                'question_1' => 'Apa yang bikin kamu ngerasa ‘hidup’ hari ini?',
                'question_2' => 'Aktivitas apa yang ngisi ulang energi kamu?',
                'question_3' => 'Kapan terakhir kali kamu bilang ‘nggak’ untuk jaga diri?',
            ],
            [
                'day_id' => 2,
                'mood_id' => $moods['mendung'],
                'question_1' => 'Apa yang bikin kamu ngerasa drained lately?',
                'question_2' => 'Kapan kamu terakhir kali istirahat beneran?',
                'question_3' => 'Ada batas yang perlu kamu kuatkan hari ini?',
            ],
            [
                'day_id' => 2,
                'mood_id' => $moods['badai'],
                'question_1' => 'Kamu ngerasa terlalu banyak ngasih ke orang lain nggak?',
                'question_2' => 'Bagian mana dari dirimu yang lagi ‘habis’?',
                'question_3' => 'Siapa atau apa yang bisa bantu kamu recover?',
            ],

            // ==================== DAY 3 ====================
            [
                'day_id' => 3,
                'mood_id' => $moods['cerah'],
                'question_1' => 'Hal apa yang bikin hidupmu terasa meaningful lately?',
                'question_2' => 'Apa hal yang pengen kamu kejar tanpa ragu?',
                'question_3' => 'Siapa yang kamu kagumi dan kenapa?',
            ],
            [
                'day_id' => 3,
                'mood_id' => $moods['mendung'],
                'question_1' => 'Kamu pernah ngerasa stuck? Ceritain.',
                'question_2' => 'Hal apa yang pengen kamu temuin kembali dalam dirimu?',
                'question_3' => 'Apa tujuan kecil yang bisa bikin kamu excited lagi?',
            ],
            [
                'day_id' => 3,
                'mood_id' => $moods['badai'],
                'question_1' => 'Apa rasanya kehilangan arah buat kamu?',
                'question_2' => 'Kalau hidupmu kayak labirin, bagian mana yang paling gelap sekarang?',
                'question_3' => 'Ada harapan kecil yang masih kamu simpan diam-diam?',
            ],

            // ==================== DAY 4 ====================
            [
                'day_id' => 4,
                'mood_id' => $moods['cerah'],
                'question_1' => 'Hal apa dari masa lalu yang sekarang kamu lihat dengan rasa syukur?',
                'question_2' => 'Siapa yang pernah bantu kamu sembuh tanpa sadar?',
                'question_3' => 'Apa tanda bahwa kamu sudah lebih kuat sekarang?',
            ],
            [
                'day_id' => 4,
                'mood_id' => $moods['mendung'],
                'question_1' => 'Luka mana yang kadang muncul tanpa diundang?',
                'question_2' => 'Apa yang pengen kamu dengar waktu kamu sedang hancur dulu?',
                'question_3' => 'Kalau tubuhmu bisa ngomong, bagian mana yang bilang, ‘aku capek’?',
            ],
            [
                'day_id' => 4,
                'mood_id' => $moods['badai'],
                'question_1' => 'Hal apa yang masih bikin dada kamu berat tiap diingat?',
                'question_2' => 'Apa bagian dari dirimu yang paling butuh pelukan hari ini?',
                'question_3' => 'Kamu pengen siapa bilang ‘aku ngerti’ ke kamu sekarang?',
            ],

            // ==================== DAY 5 ====================
            [
                'day_id' => 5,
                'mood_id' => $moods['cerah'],
                'question_1' => 'Siapa yang bikin kamu merasa dilihat tanpa harus ngomong banyak?',
                'question_2' => 'Apa arti ‘hubungan sehat’ buat kamu?',
                'question_3' => 'Hal baik apa yang ingin kamu beri ke orang lain?',
            ],
            [
                'day_id' => 5,
                'mood_id' => $moods['mendung'],
                'question_1' => 'Kamu pernah ngerasa invisible di hubungan mana?',
                'question_2' => 'Apa yang sering kamu tahan karena takut ganggu orang lain?',
                'question_3' => 'Siapa yang kamu rindukan tapi kamu jaga jarak?',
            ],
            [
                'day_id' => 5,
                'mood_id' => $moods['badai'],
                'question_1' => 'Hubungan mana yang meninggalkan bekas paling dalam?',
                'question_2' => 'Apa luka yang kamu bawa dari cara orang lain memperlakukanmu?',
                'question_3' => 'Apa yang kamu butuh dari orang tapi nggak pernah kamu dapat?',
            ],

            // ==================== DAY 6 ====================
            [
                'day_id' => 6,
                'mood_id' => $moods['cerah'],
                'question_1' => 'Kapan terakhir kamu ngikutin kata hati dan hasilnya bikin kamu bahagia?',
                'question_2' => 'Hal kecil apa yang ‘ngingetin’ kamu siapa diri kamu?',
                'question_3' => 'Apa yang bikin kamu merasa “gue banget”?',
            ],
            [
                'day_id' => 6,
                'mood_id' => $moods['mendung'],
                'question_1' => 'Suara hati kamu lagi ngomong apa akhir-akhir ini?',
                'question_2' => 'Ada hal yang kamu tahu gak sehat, tapi masih kamu pertahankan?',
                'question_3' => 'Apa keputusan kecil yang kamu tunda karena ragu?',
            ],
            [
                'day_id' => 6,
                'mood_id' => $moods['badai'],
                'question_1' => 'Apa yang sering kamu tutup rapat karena takut kedengaran lemah?',
                'question_2' => 'Kalau hatimu bisa teriak, dia lagi bilang apa sekarang?',
                'question_3' => 'Bagian mana dari dirimu yang paling butuh didengerin?',
            ],

            // ==================== DAY 7 ====================
            [
                'day_id' => 7,
                'mood_id' => $moods['cerah'],
                'question_1' => 'Ketakutan apa yang berhasil kamu taklukkan akhir-akhir ini?',
                'question_2' => 'Gimana rasanya waktu kamu nekat dan ternyata bisa?',
                'question_3' => 'Apa hal kecil yang bikin kamu merasa berani hari ini?',
            ],
            [
                'day_id' => 7,
                'mood_id' => $moods['mendung'],
                'question_1' => 'Apa ketakutan yang diam-diam membatasi langkahmu?',
                'question_2' => 'Kalau kamu bisa ngomong jujur ke ketakutanmu, kamu mau bilang apa?',
                'question_3' => 'Hal apa yang belum kamu mulai karena overthinking?',
            ],
            [
                'day_id' => 7,
                'mood_id' => $moods['badai'],
                'question_1' => 'Apa yang bikin kamu merasa lumpuh belakangan ini?',
                'question_2' => 'Ketakutan apa yang belum pernah kamu ceritakan ke siapa-siapa?',
                'question_3' => 'Kalau kamu bisa peluk diri sendiri hari ini, kamu mau bilang apa?',
            ],

            // ==================== DAY 8 ====================
            [
                'day_id' => 8,
                'mood_id' => $moods['cerah'],
                'question_1' => 'Mimpi apa yang bikin mata kamu bersinar tiap kali kamu bahas?',
                'question_2' => 'Versi dirimu di masa depan, kayak apa sih?',
                'question_3' => 'Apa langkah kecil yang bisa kamu ambil hari ini buat makin deket ke mimpi itu?',
            ],
            [
                'day_id' => 8,
                'mood_id' => $moods['mendung'],
                'question_1' => 'Apa impian yang pernah kamu tunda karena takut gagal?',
                'question_2' => 'Apa hal yang dulu kamu pengen banget tapi sekarang berubah?',
                'question_3' => 'Harapan kecil apa yang masih kamu simpan diam-diam?',
            ],
            [
                'day_id' => 8,
                'mood_id' => $moods['badai'],
                'question_1' => 'Kapan terakhir kali kamu ngerasa udah gak punya harapan?',
                'question_2' => 'Apa impian yang kamu kubur karena ngerasa ‘gak pantas’?',
                'question_3' => 'Kalau hidup kasih kamu satu peluang baru, kamu pengen itu tentang apa?',
            ],

            // ==================== DAY 9 ====================
            [
                'day_id' => 9,
                'mood_id' => $moods['cerah'],
                'question_1' => 'Apa hal yang paling kamu syukuri dari tubuhmu hari ini?',
                'question_2' => 'Bagaimana perasaanmu terasa di tubuhmu sekarang?',
                'question_3' => 'Apa cara favoritmu menunjukkan cinta ke tubuhmu?',
            ],
            [
                'day_id' => 9,
                'mood_id' => $moods['mendung'],
                'question_1' => 'Di bagian tubuh mana kamu sering ngerasa tegang? Kenapa ya kira-kira?',
                'question_2' => 'Apa yang tubuhmu coba kasih tahu akhir-akhir ini?',
                'question_3' => 'Kalau kamu bisa istirahat total, tubuh kamu butuh apa duluan?',
            ],
            [
                'day_id' => 9,
                'mood_id' => $moods['badai'],
                'question_1' => 'Apa bentuk perasaan yang paling berat kamu rasakan di tubuhmu?',
                'question_2' => 'Gimana tubuhmu ngerespon saat kamu sedang sedih banget?',
                'question_3' => 'Kalau tubuhmu bisa nangis, dia bakal cerita tentang apa?',
            ],

            // ==================== DAY 10 ====================
            [
                'day_id' => 10,
                'mood_id' => $moods['cerah'],
                'question_1' => 'Hal apa yang dulu kamu tolak, tapi sekarang bisa kamu terima?',
                'question_2' => 'Apa bagian dari dirimu yang paling kamu syukuri hari ini?',
                'question_3' => 'Kapan terakhir kali kamu bilang “ini gak apa-apa”?',
            ],
            [
                'day_id' => 10,
                'mood_id' => $moods['mendung'],
                'question_1' => 'Apa bagian dari dirimu yang masih sulit kamu terima?',
                'question_2' => 'Kenapa menurutmu kita suka keras sama diri sendiri?',
                'question_3' => 'Apa hal yang kamu coba peluk meskipun belum sepenuhnya kamu ngerti?',
            ],
            [
                'day_id' => 10,
                'mood_id' => $moods['badai'],
                'question_1' => 'Apa realita yang paling susah kamu terima sampai sekarang?',
                'question_2' => 'Kalau kamu bisa ngobrol dengan versi diri kamu yang paling kamu benci, kamu mau bilang apa?',
                'question_3' => 'Apa kamu bisa bilang “aku tetap berharga” — bahkan di titik ini?',
            ],

            // ==================== DAY 11 ====================
            [
                'day_id' => 11,
                'mood_id' => $moods['cerah'],
                'question_1' => 'Apa sisi dari dirimu yang paling kamu banggakan?',
                'question_2' => 'Kalau hidupmu difilmkan, momen mana yang kamu mau masuk trailer?',
                'question_3' => 'Hal kecil apa yang kamu lakuin yang nunjukin kamu lagi jadi versi terbaikmu?',
            ],
            [
                'day_id' => 11,
                'mood_id' => $moods['mendung'],
                'question_1' => 'Apa yang bikin kamu ngerasa belum cukup hari ini?',
                'question_2' => 'Bagian dari dirimu mana yang pengen kamu kasih ruang lebih banyak?',
                'question_3' => 'Apa yang pengen kamu ubah, tapi susah banget?',
            ],
            [
                'day_id' => 11,
                'mood_id' => $moods['badai'],
                'question_1' => 'Apa yang paling kamu gak suka dari dirimu sekarang?',
                'question_2' => 'Versi dirimu yang sekarang, kira-kira mau dikuatin di bagian apa?',
                'question_3' => 'Kalau kamu bisa ulang satu hal tanpa ngerasa malu, itu apa?',
            ],

            // ==================== DAY 12 ====================
            [
                'day_id' => 12,
                'mood_id' => $moods['cerah'],
                'question_1' => 'Hal apa yang sudah kamu relakan dan kamu syukuri itu?',
                'question_2' => 'Apa rasanya setelah kamu ngelepas sesuatu yang berat?',
                'question_3' => 'Apa hal yang ingin kamu lepas lagi hari ini?',
            ],
            [
                'day_id' => 12,
                'mood_id' => $moods['mendung'],
                'question_1' => 'Apa yang susah kamu lepas padahal kamu tahu itu gak sehat?',
                'question_2' => 'Apa yang kamu pertahankan karena takut ‘kosong’?',
                'question_3' => 'Kalau kamu melepas satu hal hari ini, rasanya bakal gimana?',
            ],
            [
                'day_id' => 12,
                'mood_id' => $moods['badai'],
                'question_1' => 'Apa yang kamu tahan erat karena takut kehilangan diri sendiri?',
                'question_2' => 'Apa yang kamu tahu harus dilepas, tapi rasanya masih nyangkut di hati?',
                'question_3' => 'Gimana rasanya ngelepas harapan yang gak pernah kejadian?',
            ],

            // ==================== DAY 13 ====================
            [
                'day_id' => 13,
                'mood_id' => $moods['cerah'],
                'question_1' => 'Siapa yang udah kamu maafkan dan kamu ngerasa lebih lega karenanya?',
                'question_2' => 'Hal apa yang pernah kamu lakukan dan sekarang udah kamu maafin diri sendiri?',
                'question_3' => 'Apa rasanya memberi ruang untuk damai?',
            ],
            [
                'day_id' => 13,
                'mood_id' => $moods['mendung'],
                'question_1' => 'Siapa yang sulit kamu maafkan sampai sekarang?',
                'question_2' => 'Apa bagian dari masa lalu yang masih kamu sesali?',
                'question_3' => 'Apa kata-kata yang kamu butuh dengar tapi gak pernah datang?',
            ],
            [
                'day_id' => 13,
                'mood_id' => $moods['badai'],
                'question_1' => 'Apa yang pernah menyakitimu dan belum bisa kamu lepaskan?',
                'question_2' => 'Apa rasa bersalah yang kamu pendam terlalu lama?',
                'question_3' => 'Siapa orang yang kamu butuh maafkan, tapi kamu tahu gak bakal minta maaf?',
            ],

            // ==================== DAY 14 ====================
            [
                'day_id' => 14,
                'mood_id' => $moods['cerah'],
                'question_1' => 'Apa hal yang pengen kamu bawa dari proses 14 hari ini ke hidupmu ke depan?',
                'question_2' => 'Apa langkah kecil yang kamu siap mulai besok?',
                'question_3' => 'Versi kamu hari ini, mau kasih pesan apa buat versi kamu bulan depan?',
            ],
            [
                'day_id' => 14,
                'mood_id' => $moods['mendung'],
                'question_1' => 'Apa yang masih bikin kamu ragu buat mulai jalan baru?',
                'question_2' => 'Apa satu kata yang pengen kamu bawa untuk minggu depan?',
                'question_3' => 'Kamu mau mengingat apa dari 14 hari ini?',
            ],
            [
                'day_id' => 14,
                'mood_id' => $moods['badai'],
                'question_1' => 'Apa yang paling kamu takutin dari masa depan?',
                'question_2' => 'Kalau kamu cuma bisa bawa satu hal dari proses ini, itu apa?',
                'question_3' => 'Apa doa kecil yang kamu bisikin dalam hati sekarang?',
            ],
        ];

        foreach ($questions as &$q) {
            $q['created_at'] = $now;
            $q['updated_at'] = $now;
        }

        DB::table('questions')->insert($questions);
    }
}
