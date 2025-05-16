<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Undangan Pernikahan Kami</title>

    <!-- Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700&family=Playfair+Display:wght@400;700&family=Poppins:wght@300;400;500&display=swap"
        rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- AOS Animation -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">

    <!-- LightGallery -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.1/css/lightgallery.min.css">

    <!-- Alpine.js -->
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.12.0/cdn.min.js"></script>

    <style>
        :root {
            --gold: #FFD700;
            --black: #000000;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--black);
            color: var(--gold);
            scroll-behavior: smooth;
            overflow-x: hidden;
        }

        h1,
        h2,
        h3,
        h4 {
            font-family: 'Cinzel', serif;
        }

        .playfair {
            font-family: 'Playfair Display', serif;
        }

        .cinzel {
            font-family: 'Cinzel', serif;
        }

        .gold-text {
            color: var(--gold);
        }

        .gold-border {
            border-color: var(--gold);
        }

        .gold-bg {
            background-color: var(--gold);
        }

        .black-bg {
            background-color: var(--black);
        }

        .section {
            padding: 5rem 1rem;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
        }

        .ornament {
            opacity: 0.1;
            position: absolute;
            pointer-events: none;
        }

        .btn-gold {
            background-color: var(--gold);
            color: var(--black);
            transition: all 0.3s ease;
        }

        .btn-gold:hover {
            background-color: transparent;
            color: var(--gold);
            border: 1px solid var(--gold);
        }

        .btn-outline-gold {
            background-color: transparent;
            color: var(--gold);
            border: 1px solid var(--gold);
            transition: all 0.3s ease;
        }

        .btn-outline-gold:hover {
            background-color: var(--gold);
            color: var(--black);
        }

        /* Timeline style */
        .timeline {
            position: relative;
            max-width: 1200px;
            margin: 0 auto;
        }

        .timeline::after {
            content: '';
            position: absolute;
            width: 2px;
            background-color: var(--gold);
            top: 0;
            bottom: 0;
            left: 50%;
            margin-left: -1px;
        }

        .timeline-content {
            position: relative;
            background-color: rgba(0, 0, 0, 0.7);
            border: 1px solid var(--gold);
            border-radius: 10px;
            padding: 20px;
            width: calc(50% - 40px);
            margin-bottom: 20px;
        }

        .timeline-left {
            left: 0;
        }

        .timeline-right {
            left: 50%;
        }

        .timeline-content::after {
            content: '';
            position: absolute;
            width: 20px;
            height: 20px;
            background-color: var(--gold);
            border-radius: 50%;
            top: 25px;
            right: -50px;
            z-index: 1;
        }

        .timeline-right::after {
            left: -50px;
        }

        @media screen and (max-width: 768px) {
            .timeline::after {
                left: 31px;
            }

            .timeline-content {
                width: 100%;
                padding-left: 70px;
                padding-right: 25px;
            }

            .timeline-left,
            .timeline-right {
                left: 0;
            }

            .timeline-content::after {
                left: 12px;
                top: 25px;
            }
        }

        /* Mobile navbar */
        .mobile-navbar {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: rgba(0, 0, 0, 0.9);
            border-top: 1px solid var(--gold);
            z-index: 1000;
            display: flex;
            justify-content: space-around;
            padding: 10px 0;
        }

        /* Lightbox customization */
        .lg-backdrop {
            background-color: rgba(0, 0, 0, 0.9);
        }

        /* Countdown styling */
        .countdown-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 0 10px;
        }

        .countdown-value {
            font-size: 2.5rem;
            font-weight: bold;
            font-family: 'Cinzel', serif;
        }

        .countdown-label {
            font-size: 0.9rem;
            text-transform: uppercase;
        }

        /* Card hover effect */
        .gift-card {
            transition: all 0.3s ease;
        }

        .gift-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(255, 215, 0, 0.2);
        }

        .button-grup {
            margin: 1rem auto 0;
            border: 1px solid #000;
            border-radius: 4px;
            background-color: #fff;
            width: fit-content;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .bxs-left-arrow-circle:before {
            content: "\eafa";
        }

        .bxs-right-arrow-circle:before {
            content: "\eb85";
        }
    </style>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'gold': '#FFD700',
                    }
                }
            }
        }
    </script>
</head>

<body x-data="{
    audio: null,
    isPlaying: false,
    guestName: 'Tamu Terhormat',
    openInvitation: false,
    copyToClipboard(text) {
        navigator.clipboard.writeText(text)
            .then(() => {
                alert('Berhasil disalin: ' + text);
            })
            .catch(err => {
                console.error('Error copying text: ', err);
            });
    },
    initAudio() {
        this.audio = new Audio('/music/BeeGees-HowDeepIsYourLove.mp3');
        this.audio.loop = true;
    },
    toggleAudio() {
        if (this.isPlaying) {
            this.audio.pause();
        } else {
            this.audio.play();
        }
        this.isPlaying = !this.isPlaying;
    },
    countdownDate: new Date('July 15, 2025 10:00:00').getTime(),
    days: 0,
    hours: 0,
    minutes: 0,
    seconds: 0,
    updateCountdown() {
        const now = new Date().getTime();
        const distance = this.countdownDate - now;

        this.days = Math.floor(distance / (1000 * 60 * 60 * 24));
        this.hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        this.minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        this.seconds = Math.floor((distance % (1000 * 60)) / 1000);
    },
    startCountdown() {
        this.updateCountdown();
        setInterval(() => {
            this.updateCountdown();
        }, 1000);
    }
}" x-init="initAudio();
startCountdown()">

    <!-- Audio control button (fixed) -->
    <button x-bind:class="openInvitation ? 'block' : 'hidden'" @click="toggleAudio()"
        class="fixed top-4 right-4 z-50 w-12 h-12 flex items-center justify-center rounded-full bg-black bg-opacity-70 border border-gold text-gold hover:bg-gold hover:text-black transition-all duration-300">
        <i x-bind:class="isPlaying ? 'fa-solid fa-pause' : 'fa-solid fa-music'"></i>
    </button>

    <!-- Cover Section -->
    <section id="cover" class="section relative flex items-center justify-center text-center"
        x-show="!openInvitation">
        <div class="absolute inset-0 bg-black bg-opacity-90"></div>

        <div class="relative z-10 px-4" data-aos="fade-up">
            <div class="mb-6 mx-auto w-40 h-40 rounded-full overflow-hidden border-4 border-gold">
                <img src="/api/placeholder/400/400" alt="Couple" class="w-full h-full object-cover">
            </div>
            <p class="text-gold mb-4 text-lg">The Wedding Of</p>
            <h1 class="cinzel text-5xl md:text-7xl mb-6 text-gold">Ahmad & Fatimah</h1>
            <p class="mb-8 text-xl">Kepada Yth Bapak/Ibu/Saudara/i,</p>
            <h2 class="text-2xl md:text-3xl mb-10 playfair" x-text="guestName"></h2>

            <button
                @click="openInvitation = true;   $nextTick(() => {
                document.getElementById('intro').scrollIntoView({ behavior: 'smooth' });
                audio.play();
                isPlaying = true;
                })"
                class="btn-gold text-lg py-3 px-8 rounded-full font-medium">
                Buka Undangan
            </button>
        </div>
    </section>

    <div x-bind:class="openInvitation ? 'block' : 'hidden'">

        <!-- Introduction Section -->
        <section id="intro" class="section">
            <div class="container mx-auto max-w-4xl text-center px-4">
                <p class="text-gold mb-4 text-lg">The Wedding Of</p>
                <h1 class="cinzel text-5xl md:text-7xl mb-6 text-gold">Ahmad & Fatimah</h1>
                <p>"A journey of love guided by faith."</p>

            </div>
        </section>

        <!-- Introduction Section -->
        <section id="intro" class="section">
            <div class="container mx-auto max-w-4xl text-center px-4">
                <h2 class="text-3xl md:text-4xl mb-6" data-aos="fade-up">Bismillahirrahmanirrahim</h2>

                <div class="mb-12 text-lg leading-relaxed" data-aos="fade-up" data-aos-delay="100">
                    <p class="italic mb-6">
                        "Dan di antara tanda-tanda (kebesaran)-Nya ialah Dia menciptakan pasangan-pasangan untukmu dari
                        jenismu sendiri, agar kamu cenderung dan merasa tenteram kepadanya, dan Dia menjadikan di
                        antaramu rasa kasih dan sayang. Sungguh, pada yang demikian itu benar-benar terdapat tanda-tanda
                        (kebesaran Allah) bagi kaum yang berpikir."
                    </p>
                    <p class="text-right">— QS. Ar-Rum: 21</p>
                </div>

                <div data-aos="fade-up" data-aos-delay="200">
                    <p class="mb-8 text-lg">
                        Dengan memohon rahmat dan ridho Allah SWT, kami bermaksud menyelenggarakan pernikahan
                        putra-putri kami:
                    </p>
                </div>
            </div>
        </section>



        <!-- Bride & Groom Section -->
        <section id="couple" class="section py-10">
            <div class="container mx-auto max-w-5xl px-4">
                <h2 class="text-3xl md:text-4xl text-center mb-16" data-aos="fade-up">Mempelai</h2>

                <div class="flex flex-col md:flex-row justify-center items-center md:space-x-12">
                    <!-- Groom -->
                    <div class="w-full md:w-1/2 text-center mb-12 md:mb-0" data-aos="fade-right">
                        <div class="mb-6 mx-auto w-40 h-40 rounded-full overflow-hidden border-4 border-gold">
                            <img src="/api/placeholder/400/400" alt="Ahmad" class="w-full h-full object-cover">
                        </div>
                        <h3 class="text-2xl md:text-3xl mb-2">Ahmad Firdaus</h3>
                        <p class="text-lg mb-4">Putra dari</p>
                        <p class="italic">Bapak H. Rahmat & Ibu Hj. Siti Aminah</p>
                    </div>

                    <div class="text-5xl mb-8 md:mb-0" data-aos="zoom-in">&</div>

                    <!-- Bride -->
                    <div class="w-full md:w-1/2 text-center" data-aos="fade-left">
                        <div class="mb-6 mx-auto w-40 h-40 rounded-full overflow-hidden border-4 border-gold">
                            <img src="/api/placeholder/400/400" alt="Fatimah" class="w-full h-full object-cover">
                        </div>
                        <h3 class="text-2xl md:text-3xl mb-2">Fatimah Az-Zahra</h3>
                        <p class="text-lg mb-4">Putri dari</p>
                        <p class="italic">Bapak H. Abdullah & Ibu Hj. Khadijah</p>
                    </div>
                </div>
            </div>
            <!-- Countdown Timer Section -->
            <section id="countdown" class="py-16 px-4">
                <div class="container mx-auto max-w-4xl text-center">
                    <h2 class="text-3xl mb-12" data-aos="fade-up">Menuju Hari Bahagia</h2>

                    <div class="flex justify-center" data-aos="fade-up" data-aos-delay="100">
                        <div class="countdown-container flex">
                            <div class="countdown-item">
                                <div class="countdown-value" x-text="days"></div>
                                <div class="countdown-label">Hari</div>
                            </div>
                            <div class="countdown-item">
                                <div class="countdown-value" x-text="hours"></div>
                                <div class="countdown-label">Jam</div>
                            </div>
                            <div class="countdown-item">
                                <div class="countdown-value" x-text="minutes"></div>
                                <div class="countdown-label">Menit</div>
                            </div>
                            <div class="countdown-item">
                                <div class="countdown-value" x-text="seconds"></div>
                                <div class="countdown-label">Detik</div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </section>

        <!-- Event Schedule Section -->
        <section id="schedule" class="py-10 px-4">
            <div class="container mx-auto max-w-4xl">
                <h2 class="text-3xl md:text-4xl text-center mb-16" data-aos="fade-up">Jadwal Acara</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                    <!-- Akad -->
                    <div class="border border-gold rounded-lg p-8 text-center" data-aos="fade-up">
                        <h3 class="text-2xl mb-4">Akad Nikah</h3>
                        <div class="mb-4">
                            <i class="fas fa-calendar-alt text-2xl mb-3"></i>
                            <p>Sabtu, 15 Juli 2025</p>
                        </div>
                        <div class="mb-4">
                            <i class="fas fa-clock text-2xl mb-3"></i>
                            <p>08:00 - 10:00 WIB</p>
                        </div>
                        <div>
                            <i class="fas fa-map-marker-alt text-2xl mb-3"></i>
                            <p>Masjid Agung Al-Azhar</p>
                            <p>Jl. Sisingamangaraja No.1, Jakarta Selatan</p>
                        </div>
                    </div>

                    <!-- Resepsi -->
                    <div class="border border-gold rounded-lg p-8 text-center" data-aos="fade-up"
                        data-aos-delay="100">
                        <h3 class="text-2xl mb-4">Resepsi</h3>
                        <div class="mb-4">
                            <i class="fas fa-calendar-alt text-2xl mb-3"></i>
                            <p>Sabtu, 15 Juli 2025</p>
                        </div>
                        <div class="mb-4">
                            <i class="fas fa-clock text-2xl mb-3"></i>
                            <p>11:00 - 15:00 WIB</p>
                        </div>
                        <div>
                            <i class="fas fa-map-marker-alt text-2xl mb-3"></i>
                            <p>Balai Kartini</p>
                            <p>Jl. Gatot Subroto Kav. 37, Jakarta Selatan</p>
                        </div>
                    </div>

                </div>
            </div>
            <div class="text-center my-10" data-aos="fade-up">
                <a href="https://goo.gl/maps/m1w8Jt6QJ1H3KFX69" target="_blank"
                    class="btn-outline-gold inline-block py-3 px-8 rounded-full">
                    <i class="fas fa-calendar-alt mr-2"></i> Tambahkan ke Google Calendar
                </a>
            </div>
        </section>

        <!-- Location Section -->
        <section id="location" class="py-20 px-4">
            <div class="container mx-auto max-w-4xl">
                <h2 class="text-3xl md:text-4xl text-center mb-12" data-aos="fade-up">Lokasi</h2>

                <div class="aspect-w-16 aspect-h-9 rounded-lg overflow-hidden border-4 border-gold mb-8"
                    data-aos="zoom-in">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.2650196108193!2d106.80388431476908!3d-6.2295304954867975!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f15e5554dc77%3A0x547889d8175acd!2sBalai%20Kartini%20Convention%20Center!5e0!3m2!1sen!2sid!4v1672735591264!5m2!1sen!2sid"
                        width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>

                <div class="text-center" data-aos="fade-up">
                    <a href="https://goo.gl/maps/m1w8Jt6QJ1H3KFX69" target="_blank"
                        class="btn-outline-gold inline-block py-3 px-8 rounded-full">
                        <i class="fas fa-map-marker-alt mr-2"></i> Buka di Google Maps
                    </a>
                </div>
            </div>
        </section>

        <!-- Gallery Section -->
        <section id="gallery" class="py-20 px-4">
            <div class="container mx-auto max-w-6xl">
                <h2 class="text-3xl md:text-4xl text-center mb-16" data-aos="fade-up">Galeri</h2>

                <div id="lightgallery" class="grid grid-cols-2 md:grid-cols-3 gap-4">
                    <a href="/api/placeholder/800/800" class="gallery-item" data-aos="fade-up">
                        <img src="/api/placeholder/400/400" alt="Prewedding 1"
                            class="w-full h-64 object-cover rounded-lg border border-gold">
                    </a>
                    <a href="/api/placeholder/800/800" class="gallery-item" data-aos="fade-up" data-aos-delay="100">
                        <img src="/api/placeholder/400/400" alt="Prewedding 2"
                            class="w-full h-64 object-cover rounded-lg border border-gold">
                    </a>
                    <a href="/api/placeholder/800/800" class="gallery-item" data-aos="fade-up" data-aos-delay="200">
                        <img src="/api/placeholder/400/400" alt="Prewedding 3"
                            class="w-full h-64 object-cover rounded-lg border border-gold">
                    </a>
                    <a href="/api/placeholder/800/800" class="gallery-item" data-aos="fade-up" data-aos-delay="300">
                        <img src="/api/placeholder/400/400" alt="Prewedding 4"
                            class="w-full h-64 object-cover rounded-lg border border-gold">
                    </a>
                    <a href="/api/placeholder/800/800" class="gallery-item" data-aos="fade-up" data-aos-delay="400">
                        <img src="/api/placeholder/400/400" alt="Prewedding 5"
                            class="w-full h-64 object-cover rounded-lg border border-gold">
                    </a>
                    <a href="/api/placeholder/800/800" class="gallery-item" data-aos="fade-up" data-aos-delay="500">
                        <img src="/api/placeholder/400/400" alt="Prewedding 6"
                            class="w-full h-64 object-cover rounded-lg border border-gold">
                    </a>
                </div>
            </div>
        </section>

        <!-- Love Story Section -->
        <section id="story" class="py-20 px-4">
            <div class="container mx-auto max-w-5xl">
                <h2 class="text-3xl md:text-4xl text-center mb-16" data-aos="fade-up">Cerita Cinta Kami</h2>

                <div class="timeline">
                    <!-- Story 1 -->
                    <div class="timeline-content timeline-left" data-aos="fade-right">
                        <h3 class="text-xl mb-2">Pertama Kali Bertemu</h3>
                        <p class="text-sm mb-2">Oktober 2020</p>
                        <p>Kami pertama kali bertemu di sebuah seminar kampus. Pertemuan yang tidak disengaja namun
                            penuh makna. Saat itu Ahmad tengah menjadi pembicara, dan Fatimah adalah salah satu peserta.
                        </p>
                    </div>

                    <!-- Story 2 -->
                    <div class="timeline-content timeline-right" data-aos="fade-left">
                        <h3 class="text-xl mb-2">Mulai Dekat</h3>
                        <p class="text-sm mb-2">Januari 2021</p>
                        <p>Setelah beberapa kali bertemu dalam kegiatan kampus, kami mulai saling mengenal lebih dekat.
                            Kesamaan hobi dan pemikiran membuat kami semakin akrab dan sering menghabiskan waktu
                            bersama.</p>
                    </div>

                    <!-- Story 3 -->
                    <div class="timeline-content timeline-left" data-aos="fade-right">
                        <h3 class="text-xl mb-2">Menjalin Hubungan</h3>
                        <p class="text-sm mb-2">Mei 2022</p>
                        <p>Setelah mengenal lebih dalam, kami memutuskan untuk menjalin hubungan dengan niat yang serius
                            dan mengarah ke pernikahan, sesuai dengan tuntunan agama.</p>
                    </div>

                    <!-- Story 4 -->
                    <div class="timeline-content timeline-right" data-aos="fade-left">
                        <h3 class="text-xl mb-2">Lamaran</h3>
                        <p class="text-sm mb-2">Desember 2024</p>
                        <p>Ahmad bersama keluarga datang ke rumah Fatimah untuk melamar secara resmi. Moment bahagia
                            yang menjadi awal dari persiapan menuju pernikahan kami.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Wishes Section -->
        <section id="wishes" class="py-20 px-4">
            <div class="container mx-auto max-w-4xl">
                <h2 class="text-3xl md:text-4xl text-center mb-12" data-aos="fade-up">Ucapan & Doa</h2>

                <div class="mb-12 bg-black bg-opacity-50 p-6 rounded-lg border border-gold" data-aos="fade-up">
                    <form class="space-y-4">
                        <div>
                            <label for="name" class="block mb-2">Nama</label>
                            <input type="text" id="name"
                                class="w-full px-4 py-3 rounded-lg bg-black bg-opacity-70 border border-gold focus:outline-none focus:ring-2 focus:ring-gold">
                        </div>
                        <div>
                            <label>RSVP
                                <select name="reservasi" id="rsvp"
                                    class="bg-black text-yellow-400 border border-yellow-400 px-2 py-2 mx-1 rounded">
                                    <option class="bg-black text-yellow-400" value="hadir">Hadir</option>
                                    <option class="bg-black text-yellow-400" value="tidak_hadir">Tidak Hadir</option>
                                </select>

                            </label>
                        </div>
                        <div>
                            <label for="message" class="block mb-2">Ucapan & Doa</label>
                            <textarea id="message" rows="4"
                                class="w-full px-4 py-3 rounded-lg bg-black bg-opacity-70 border border-gold focus:outline-none focus:ring-2 focus:ring-gold"></textarea>
                        </div>
                        <div>
                            <button type="button" class="btn-gold py-3 px-8 rounded-lg">Kirim</button>
                        </div>
                    </form>

                </div>



                <div class="space-y-6" data-aos="fade-up" data-aos-delay="100">
                    <!-- Sample wishes -->
                    <div class="bg-black bg-opacity-50 p-6 rounded-lg border border-gold">
                       
                            <div data-aos="zoom-in" data-aos-duration="1000">
                                <hr class="border-t border-gold mb-4">

                                <div id="comment-wrapper">
                                    @include('components.comment-list', ['page' => request('page', 1)])
                                </div>
                            </div>
                        </div>

                        <script>
                            function loadPage(page = 1) {
                                fetch(`?page=${page}`)
                                    .then(res => res.text())
                                    .then(html => {
                                        const parser = new DOMParser();
                                        const doc = parser.parseFromString(html, 'text/html');
                                        const newContent = doc.querySelector('#comment-wrapper').innerHTML;
                                        document.querySelector('#comment-wrapper').innerHTML = newContent;
                                        window.history.pushState({}, '', `?page=${page}`);
                                    });
                            }

                            // Optional: support browser back/forward
                            window.onpopstate = () => {
                                const urlParams = new URLSearchParams(window.location.search);
                                const page = urlParams.get('page') || 1;
                                loadPage(page);
                            };
                        </script>

                   
                </div>
        </section>

        <!-- Gift Section -->
        <section id="gift" class="py-20 px-4">
            <div class="container mx-auto max-w-4xl">
                <h2 class="text-3xl md:text-4xl text-center mb-6" data-aos="fade-up">Kado Digital</h2>
                <p class="text-center mb-12" data-aos="fade-up" data-aos-delay="100">
                    Kehadiran dan doa Anda adalah hadiah terbaik bagi kami. Namun, jika Anda ingin memberikan kado
                    pernikahan, Anda dapat mengirimkannya melalui:
                </p>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Bank Card 1 -->
                    <div class="gift-card bg-black bg-opacity-50 p-6 rounded-lg border border-gold"
                        data-aos="fade-up">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-xl">Bank BCA</h3>
                            <img src="/api/placeholder/100/50" alt="BCA Logo" class="h-8">
                        </div>
                        <p class="mb-1">No. Rekening:</p>
                        <p class="text-xl mb-4">1234567890</p>
                        <p class="mb-1">Atas Nama:</p>
                        <p class="text-lg mb-4">Ahmad Firdaus</p>
                        <button @click="copyToClipboard('1234567890')"
                            class="btn-outline-gold w-full py-2 rounded-lg">
                            <i class="fas fa-copy mr-2"></i> Salin Nomor Rekening
                        </button>
                    </div>

                    <!-- Bank Card 2 -->
                    <div class="gift-card bg-black bg-opacity-50 p-6 rounded-lg border border-gold" data-aos="fade-up"
                        data-aos-delay="100">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-xl">Bank Mandiri</h3>
                            <img src="/api/placeholder/100/50" alt="Mandiri Logo" class="h-8">
                        </div>
                        <p class="mb-1">No. Rekening:</p>
                        <p class="text-xl mb-4">9876543210</p>
                        <p class="mb-1">Atas Nama:</p>
                        <p class="text-lg mb-4">Fatimah Az-Zahra</p>
                        <button @click="copyToClipboard('9876543210')"
                            class="btn-outline-gold w-full py-2 rounded-lg">
                            <i class="fas fa-copy mr-2"></i> Salin Nomor Rekening
                        </button>
                    </div>

                    <!-- Bank Card 3 -->
                    {{-- <div class="gift-card bg-black bg-opacity-50 p-6 rounded-lg border border-gold" data-aos="fade-up" data-aos-delay="200">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-xl">Bank BNI</h3>
                            <img src="/api/placeholder/100/50" alt="BNI Logo" class="h-8">
                        </div>
                        <p class="mb-1">No. Rekening:</p>
                        <p class="text-xl mb-4">0123456789</p>
                        <p class="mb-1">Atas Nama:</p>
                        <p class="text-lg mb-4">Ahmad Firdaus</p>
                        <button 
                            @click="copyToClipboard('0123456789')" 
                            class="btn-outline-gold w-full py-2 rounded-lg">
                            <i class="fas fa-copy mr-2"></i> Salin Nomor Rekening
                        </button>
                    </div> --}}

                    <!-- Bank Card 4 -->
                    {{-- <div class="gift-card bg-black bg-opacity-50 p-6 rounded-lg border border-gold" data-aos="fade-up" data-aos-delay="300">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-xl">Bank BSI</h3>
                            <img src="/api/placeholder/100/50" alt="BSI Logo" class="h-8">
                        </div>
                        <p class="mb-1">No. Rekening:</p>
                        <p class="text-xl mb-4">5432109876</p>
                        <p class="mb-1">Atas Nama:</p>
                        <p class="text-lg mb-4">Fatimah Az-Zahra</p>
                        <button 
                            @click="copyToClipboard('5432109876')" 
                            class="btn-outline-gold w-full py-2 rounded-lg">
                            <i class="fas fa-copy mr-2"></i> Salin Nomor Rekening
                        </button>
                    </div> --}}
                </div>
            </div>
        </section>

        <!-- Thank You Section -->
        <section id="thank-you" class="py-20 px-4">
            <div class="container mx-auto max-w-4xl text-center">
                <h2 class="text-3xl md:text-4xl mb-8" data-aos="fade-up">Terima Kasih</h2>

                <div data-aos="fade-up" data-aos-delay="100">
                    <p class="text-lg mb-8">
                        Merupakan suatu kehormatan dan kebahagiaan bagi kami apabila Bapak/Ibu/Saudara/i berkenan hadir
                        untuk memberikan doa restu kepada kami.
                    </p>

                    <h3 class="text-2xl mb-8 playfair">Wassalamualaikum Warahmatullahi Wabarakatuh</h3>

                    <div class="mb-12">
                        <h3 class="cinzel text-4xl mb-4">Ahmad & Fatimah</h3>
                        <p>15 Juli 2025</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="py-10 px-4 border-t border-gold">
            <div class="container mx-auto max-w-4xl text-center">
                <p>© 2025 Rizkillah, Ridwan, Jofanny Company. All rights reserved.</p>
            </div>
        </footer>

        <!-- Mobile Navigation -->
        <div class="mobile-navbar md:hidden">
            <a href="#intro" class="flex flex-col items-center text-gold">
                <i class="fas fa-home text-lg"></i>
                <span class="text-xs mt-1">Home</span>
            </a>
            <a href="#couple" class="flex flex-col items-center text-gold">
                <i class="fas fa-heart text-lg"></i>
                <span class="text-xs mt-1">Mempelai</span>
            </a>
            <a href="#gallery" class="flex flex-col items-center text-gold">
                <i class="fas fa-images text-lg"></i>
                <span class="text-xs mt-1">Galeri</span>
            </a>
            <a href="#location" class="flex flex-col items-center text-gold">
                <i class="fas fa-map-marker-alt text-lg"></i>
                <span class="text-xs mt-1">Lokasi</span>
            </a>
            <button @click="toggleAudio()" class="flex flex-col items-center text-gold">
                <i x-bind:class="isPlaying ? 'fas fa-pause' : 'fas fa-music'" class="text-lg"></i>
                <span class="text-xs mt-1">Musik</span>
            </button>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.1/lightgallery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.1/plugins/thumbnail/lg-thumbnail.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.1/plugins/zoom/lg-zoom.min.js"></script>

    <script>
        // Initialize AOS
        document.addEventListener('DOMContentLoaded', function() {
            AOS.init({
                duration: 800,
                easing: 'ease-in-out',
                once: true
            });

            // Initialize lightGallery
            lightGallery(document.getElementById('lightgallery'), {
                selector: '.gallery-item',
                plugins: [lgZoom, lgThumbnail],
                speed: 500,
                download: false,
                thumbnail: true,
                animateThumb: true,
                zoomFromOrigin: true,
                allowMediaOverlap: true
            });

            // Smooth scroll for all hash links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();

                    document.querySelector(this.getAttribute('href')).scrollIntoView({
                        behavior: 'smooth'
                    });
                });
            });
        });
    </script>
</body>

</html>
