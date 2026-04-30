<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Sativa Membuat Web Server menggunakan AWS dengan Ubuntu dan GitHub</title>

  <!-- Tailwind -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Syne:wght@700;800&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">

  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            display: ['Syne', 'sans-serif'],
            body: ['Space Grotesk', 'sans-serif'],
          },
          colors: {
            primary: '#00E5FF',
            secondary: '#7C3AED',
            darkbg: '#050816',
            card: '#0d1117',
          },
          animation: {
            float: 'float 4s ease-in-out infinite',
            fadeup: 'fadeup .8s ease forwards'
          },
          keyframes: {
            float: {
              '0%,100%': { transform: 'translateY(0px)' },
              '50%': { transform: 'translateY(-12px)' },
            },
            fadeup: {
              '0%': { opacity: '0', transform: 'translateY(30px)' },
              '100%': { opacity: '1', transform: 'translateY(0)' }
            }
          }
        }
      }
    }
  </script>
</head>

<body class="bg-darkbg text-white font-body overflow-x-hidden">

<!-- Background -->
<div class="fixed inset-0 -z-10 bg-[radial-gradient(circle_at_top_left,_rgba(0,229,255,0.08),transparent_35%),radial-gradient(circle_at_bottom_right,_rgba(124,58,237,0.10),transparent_35%)]"></div>

<!-- Navbar -->
<nav class="fixed top-0 left-0 right-0 z-50 border-b border-white/10 bg-[#050816]/80 backdrop-blur-xl">
  <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

    <div class="flex items-center gap-3">
      <div class="w-10 h-10 rounded-xl bg-primary text-black font-bold flex items-center justify-center">
        S
      </div>
      <h1 class="font-display text-xl">Sativa Server</h1>
    </div>

    <div class="hidden md:flex gap-8 text-sm text-slate-300">
      <a href="#home" class="hover:text-primary transition">Home</a>
      <a href="#fitur" class="hover:text-primary transition">Fitur</a>
      <a href="#langkah" class="hover:text-primary transition">Langkah</a>
      <a href="#kontak" class="hover:text-primary transition">Kontak</a>
    </div>

  </div>
</nav>

<!-- Hero -->
<section id="home" class="min-h-screen flex items-center pt-24 px-6">
  <div class="max-w-7xl mx-auto grid md:grid-cols-2 gap-12 items-center">

    <!-- Text -->
    <div class="animate-fadeup">
      <span class="inline-block px-4 py-2 rounded-full border border-primary/30 bg-primary/10 text-primary text-xs tracking-widest uppercase">
        ⚡ AWS Project
      </span>

      <h1 class="font-display text-5xl md:text-7xl mt-6 leading-tight">
        Sativa Membuat <br>
        <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-secondary">
          Web Server
        </span>
      </h1>

      <p class="text-slate-400 mt-6 text-lg leading-relaxed max-w-xl">
        Membangun web server profesional menggunakan AWS EC2, Ubuntu Server, dan GitHub untuk deployment project modern.
      </p>

      <div class="flex flex-wrap gap-4 mt-8">
        <a href="#langkah" class="px-6 py-3 rounded-xl bg-primary text-black font-semibold hover:scale-105 transition">
          Mulai Belajar
        </a>

        <a href="#fitur" class="px-6 py-3 rounded-xl border border-white/15 hover:border-primary transition">
          Lihat Fitur
        </a>
      </div>
    </div>

    <!-- Card -->
    <div class="animate-float">
      <div class="bg-card border border-white/10 rounded-3xl p-8 shadow-2xl">

        <div class="flex justify-between items-center mb-6">
          <h3 class="font-semibold text-lg">Server Status</h3>
          <span class="text-green-400 text-sm">● Online</span>
        </div>

        <div class="space-y-4 text-sm text-slate-300">
          <div class="flex justify-between border-b border-white/5 pb-2">
            <span>Cloud Provider</span>
            <span>AWS EC2</span>
          </div>

          <div class="flex justify-between border-b border-white/5 pb-2">
            <span>Operating System</span>
            <span>Ubuntu</span>
          </div>

          <div class="flex justify-between border-b border-white/5 pb-2">
            <span>Repository</span>
            <span>GitHub</span>
          </div>

          <div class="flex justify-between">
            <span>Status</span>
            <span class="text-primary">Running</span>
          </div>
        </div>

      </div>
    </div>

  </div>
</section>

<!-- Fitur -->
<section id="fitur" class="py-24 px-6">
  <div class="max-w-7xl mx-auto">

    <div class="text-center mb-16">
      <p class="text-primary uppercase tracking-[0.3em] text-xs">Teknologi</p>
      <h2 class="font-display text-4xl md:text-5xl mt-4">Yang Digunakan</h2>
    </div>

    <div class="grid md:grid-cols-3 gap-6">

      <div class="bg-card border border-white/10 rounded-3xl p-8 hover:-translate-y-2 transition">
        <div class="text-4xl mb-4">☁️</div>
        <h3 class="text-xl font-semibold mb-3">AWS EC2</h3>
        <p class="text-slate-400 text-sm leading-relaxed">
          Menjalankan server cloud scalable dan stabil untuk website online 24 jam.
        </p>
      </div>

      <div class="bg-card border border-white/10 rounded-3xl p-8 hover:-translate-y-2 transition">
        <div class="text-4xl mb-4">🐧</div>
        <h3 class="text-xl font-semibold mb-3">Ubuntu Server</h3>
        <p class="text-slate-400 text-sm leading-relaxed">
          Sistem operasi ringan, aman, dan populer digunakan di server production.
        </p>
      </div>

      <div class="bg-card border border-white/10 rounded-3xl p-8 hover:-translate-y-2 transition">
        <div class="text-4xl mb-4">💻</div>
        <h3 class="text-xl font-semibold mb-3">GitHub</h3>
        <p class="text-slate-400 text-sm leading-relaxed">
          Menyimpan source code dan mempermudah deployment project ke server.
        </p>
      </div>

    </div>

  </div>
</section>

<!-- Langkah -->
<section id="langkah" class="py-24 px-6 bg-white/[0.02]">
  <div class="max-w-6xl mx-auto">

    <div class="text-center mb-16">
      <p class="text-primary uppercase tracking-[0.3em] text-xs">Tutorial</p>
      <h2 class="font-display text-4xl md:text-5xl mt-4">Langkah Membuat Server</h2>
    </div>

    <div class="grid md:grid-cols-2 gap-8">

      <div class="bg-card rounded-3xl border border-white/10 p-8">
        <h3 class="font-semibold text-xl mb-4">1. Buat EC2 AWS</h3>
        <p class="text-slate-400 leading-relaxed">
          Login AWS lalu buat instance EC2 menggunakan Ubuntu Server.
        </p>
      </div>

      <div class="bg-card rounded-3xl border border-white/10 p-8">
        <h3 class="font-semibold text-xl mb-4">2. Connect SSH</h3>
        <p class="text-slate-400 leading-relaxed">
          Hubungkan laptop ke server menggunakan SSH key pair.
        </p>
      </div>

      <div class="bg-card rounded-3xl border border-white/10 p-8">
        <h3 class="font-semibold text-xl mb-4">3. Install Apache / Nginx</h3>
        <p class="text-slate-400 leading-relaxed">
          Install web server untuk menampilkan website online.
        </p>
      </div>

      <div class="bg-card rounded-3xl border border-white/10 p-8">
        <h3 class="font-semibold text-xl mb-4">4. Clone GitHub</h3>
        <p class="text-slate-400 leading-relaxed">
          Ambil source code project dari GitHub lalu jalankan.
        </p>
      </div>

    </div>

  </div>
</section>

<!-- Footer -->
<footer id="kontak" class="py-10 px-6 border-t border-white/10">
  <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between gap-6 items-center">

    <div>
      <h3 class="font-display text-xl">Sativa Web Server</h3>
      <p class="text-slate-500 text-sm mt-1">
        Membuat Web Server menggunakan AWS dengan Ubuntu dan GitHub
      </p>
    </div>

    <p class="text-slate-500 text-sm">
      © 2026 Sativa Project
    </p>

  </div>
</footer>

</body>
</html>