<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $titles = [
            'Cara Belajar Pemrograman Web untuk Pemula',
            'Tips Menjadi Fullstack Developer di Tahun 2025',
            'Mengenal Laravel Framework PHP yang Populer',
            'Panduan Lengkap Belajar Tailwind CSS',
            'Membuat Website Responsif dengan Mudah',
            'Sejarah Perkembangan Teknologi Internet',
            'Pentingnya Keamanan Siber di Era Digital',
            'Mengenal Apa itu Artificial Intelligence',
            'Tutorial Membuat API dengan Laravel',
            'Tips Produktifitas untuk Programmer',
            'Belajar Database MySQL dari Nol',
            'Pengenalan React JS untuk Frontend',
            'Memahami Konsep MVC pada Framework',
            'Cara Deploy Website ke Hosting',
            'Belajar Git dan GitHub untuk Kolaborasi',
            'Tren Desain Web di Tahun Ini',
            'Mengenal Bahasa Pemrograman Python',
            'Tips Wawancara Kerja sebagai Programmer',
            'Membangun Portofolio yang Menarik',
            'Peluang Karir di Bidang IT'
        ];

        $paragraphs = [
            "Pemrograman web adalah salah satu keterampilan yang paling banyak dicari saat ini. Dengan menguasai HTML, CSS, dan JavaScript, Anda sudah bisa membangun website sederhana. Namun, perjalanan tidak berhenti di situ. Ada banyak framework dan tools modern yang perlu dipelajari untuk menjadi developer yang handal.",
            "Dalam dunia pengembangan perangkat lunak, menjadi fullstack developer berarti Anda harus menguasai sisi frontend dan backend. Ini bukanlah hal yang mudah, tetapi sangat bermanfaat. Anda bisa memahami bagaimana data mengalir dari database hingga ditampilkan ke pengguna.",
            "Laravel adalah framework PHP yang sangat populer karena sintaksnya yang ekspresif dan elegan. Laravel memudahkan tugas-tugas umum seperti autentikasi, routing, session, dan caching. Komunitasnya yang besar juga membuat belajar Laravel menjadi lebih mudah.",
            "Tailwind CSS menawarkan pendekatan yang berbeda dalam styling website. Alih-alih menulis CSS kustom, Anda menggunakan utility classes langsung di HTML. Ini mempercepat proses development dan membuat desain lebih konsisten.",
            "Keamanan siber menjadi isu yang sangat penting di era digital ini. Serangan siber semakin canggih, dan data pengguna harus dilindungi dengan baik. Sebagai developer, kita harus memahami dasar-dasar keamanan aplikasi web.",
            "Kecerdasan buatan atau AI sedang mengubah banyak industri. Dari chatbot hingga mobil otonom, AI ada di mana-mana. Memahami dasar-dasar AI dan machine learning bisa menjadi nilai tambah yang besar bagi karir Anda.",
            "Database adalah jantung dari sebagian besar aplikasi. MySQL adalah salah satu sistem manajemen database relasional yang paling banyak digunakan. Memahami cara merancang skema database yang efisien sangatlah penting.",
            "React JS adalah library JavaScript untuk membangun antarmuka pengguna. Dibuat oleh Facebook, React memungkinkan kita membuat komponen UI yang reusable. Ini sangat populer di kalangan frontend developer.",
            "Git adalah sistem kontrol versi yang wajib dikuasai. GitHub adalah platform untuk menyimpan dan berkolaborasi dalam proyek kode. Tanpa Git, bekerja dalam tim akan sangat sulit dan berisiko.",
            "Desain web terus berkembang. Tren terbaru mencakup penggunaan mode gelap, tipografi yang berani, dan animasi mikro. Penting untuk terus mengikuti tren agar website yang kita buat tetap terlihat modern.",
            "Python dikenal sebagai bahasa pemrograman yang mudah dipelajari namun sangat powerful. Python banyak digunakan dalam data science, web development, dan otomatisasi. Ini adalah bahasa yang bagus untuk pemula.",
            "Membangun portofolio adalah cara terbaik untuk menunjukkan kemampuan Anda kepada calon pemberi kerja. Jangan hanya mencantumkan proyek, tetapi jelaskan juga tantangan yang Anda hadapi dan bagaimana Anda menyelesaikannya.",
            "Hosting adalah tempat di mana file website Anda disimpan agar bisa diakses orang lain di internet. Ada banyak jenis hosting, mulai dari shared hosting hingga VPS dan cloud hosting. Memilih yang tepat tergantung pada kebutuhan proyek Anda."
        ];

        $title = fake()->randomElement($titles);
        
        // Mengambil 3-6 paragraf acak dan menggabungkannya
        $body = collect(fake()->randomElements($paragraphs, mt_rand(3, 6)))
                    ->map(fn($p) => "<p>$p</p>")
                    ->implode('');

        return [
            'title' => $title,
            'author_id' => User::factory(),
            'category_id' => Category::factory(),
            'slug' => Str::slug($title) . '-' . Str::random(5),
            'body' => $body,
        ];
    }
}
