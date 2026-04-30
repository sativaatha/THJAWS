<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>PHP Web Server — Kelompok Proyek</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&family=Syne:wght@700;800&display=swap" rel="stylesheet"/>
  <style>
    :root {
      --accent: #00e5ff;
      --accent2: #7c3aed;
      --bg: #050816;
      --card: #0d1117;
      --border: rgba(255,255,255,0.07);
    }
    * { box-sizing: border-box; margin: 0; padding: 0; }
    body {
      background: var(--bg);
      font-family: 'Space Grotesk', sans-serif;
      color: #e2e8f0;
      overflow-x: hidden;
    }
    .display-font { font-family: 'Syne', sans-serif; }

    /* Background mesh */
    body::before {
      content: '';
      position: fixed;
      inset: 0;
      background:
        radial-gradient(ellipse 80% 50% at 20% 10%, rgba(0,229,255,0.06) 0%, transparent 60%),
        radial-gradient(ellipse 60% 40% at 80% 80%, rgba(124,58,237,0.08) 0%, transparent 60%);
      pointer-events: none;
      z-index: 0;
    }

    /* Grid lines */
    body::after {
      content: '';
      position: fixed;
      inset: 0;
      background-image:
        linear-gradient(rgba(255,255,255,0.02) 1px, transparent 1px),
        linear-gradient(90deg, rgba(255,255,255,0.02) 1px, transparent 1px);
      background-size: 60px 60px;
      pointer-events: none;
      z-index: 0;
    }

    .glass {
      background: rgba(13,17,23,0.85);
      border: 1px solid var(--border);
      backdrop-filter: blur(12px);
    }

    .accent-text { color: var(--accent); }
    .accent2-text { color: #a78bfa; }

    /* Nav */
    nav {
      position: fixed;
      top: 0; left: 0; right: 0;
      z-index: 100;
      background: rgba(5,8,22,0.8);
      border-bottom: 1px solid var(--border);
      backdrop-filter: blur(20px);
    }

    /* Hero */
    .hero-tag {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      padding: 6px 16px;
      border-radius: 100px;
      border: 1px solid rgba(0,229,255,0.3);
      background: rgba(0,229,255,0.06);
      font-size: 0.75rem;
      letter-spacing: 0.12em;
      text-transform: uppercase;
      color: var(--accent);
    }

    .glow-btn {
      position: relative;
      display: inline-flex;
      align-items: center;
      gap: 10px;
      padding: 14px 32px;
      border-radius: 8px;
      font-weight: 600;
      font-size: 0.9rem;
      letter-spacing: 0.03em;
      transition: all 0.3s ease;
      cursor: pointer;
      text-decoration: none;
    }
    .glow-btn-primary {
      background: var(--accent);
      color: #050816;
      box-shadow: 0 0 30px rgba(0,229,255,0.3);
    }
    .glow-btn-primary:hover {
      box-shadow: 0 0 50px rgba(0,229,255,0.6);
      transform: translateY(-2px);
    }
    .glow-btn-outline {
      border: 1px solid rgba(255,255,255,0.15);
      color: #e2e8f0;
    }
    .glow-btn-outline:hover {
      border-color: rgba(0,229,255,0.4);
      background: rgba(0,229,255,0.05);
    }

    /* PHP features cards */
    .feature-card {
      background: var(--card);
      border: 1px solid var(--border);
      border-radius: 16px;
      padding: 28px;
      transition: all 0.3s ease;
      position: relative;
      overflow: hidden;
    }
    .feature-card::before {
      content: '';
      position: absolute;
      top: 0; left: 0; right: 0;
      height: 1px;
      background: linear-gradient(90deg, transparent, var(--accent), transparent);
      opacity: 0;
      transition: opacity 0.3s;
    }
    .feature-card:hover {
      border-color: rgba(0,229,255,0.2);
      transform: translateY(-4px);
      box-shadow: 0 20px 60px rgba(0,229,255,0.05);
    }
    .feature-card:hover::before { opacity: 1; }

    .feature-icon {
      width: 48px; height: 48px;
      border-radius: 12px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.4rem;
      margin-bottom: 16px;
    }

    /* Member cards */
    .member-card {
      background: var(--card);
      border: 1px solid var(--border);
      border-radius: 20px;
      overflow: hidden;
      transition: all 0.4s ease;
      position: relative;
    }
    .member-card:hover {
      transform: translateY(-8px);
      border-color: rgba(0,229,255,0.25);
      box-shadow: 0 30px 80px rgba(0,229,255,0.08);
    }

    .member-avatar {
      width: 100%;
      height: 220px;
      object-fit: cover;
      display: block;
    }
    .member-avatar-placeholder {
      width: 100%;
      height: 220px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 5rem;
      position: relative;
      overflow: hidden;
    }

    .role-badge {
      display: inline-block;
      padding: 3px 10px;
      border-radius: 100px;
      font-size: 0.68rem;
      font-weight: 600;
      letter-spacing: 0.08em;
      text-transform: uppercase;
    }

    /* Deployment steps */
    .step-num {
      width: 40px; height: 40px;
      border-radius: 50%;
      background: rgba(0,229,255,0.1);
      border: 1px solid rgba(0,229,255,0.3);
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: 700;
      color: var(--accent);
      font-size: 0.85rem;
      flex-shrink: 0;
    }
    .step-line {
      width: 1px;
      flex: 1;
      min-height: 40px;
      background: linear-gradient(to bottom, rgba(0,229,255,0.3), transparent);
      margin: 4px auto;
    }

    /* Code block */
    .code-block {
      background: #0a0f1e;
      border: 1px solid rgba(0,229,255,0.12);
      border-radius: 12px;
      padding: 20px 24px;
      font-family: 'Courier New', monospace;
      font-size: 0.8rem;
      line-height: 1.7;
      overflow-x: auto;
    }
    .code-block .kw { color: #7c3aed; }
    .code-block .fn { color: #00e5ff; }
    .code-block .str { color: #86efac; }
    .code-block .cmt { color: #475569; }
    .code-block .var { color: #fbbf24; }

    /* Stats */
    .stat-box {
      text-align: center;
      padding: 24px;
      border-right: 1px solid var(--border);
    }
    .stat-box:last-child { border-right: none; }

    /* Scrollbar */
    ::-webkit-scrollbar { width: 6px; }
    ::-webkit-scrollbar-track { background: var(--bg); }
    ::-webkit-scrollbar-thumb { background: rgba(0,229,255,0.2); border-radius: 3px; }

    /* Animations */
    @keyframes fadeUp {
      from { opacity: 0; transform: translateY(30px); }
      to { opacity: 1; transform: translateY(0); }
    }
    @keyframes pulse-dot {
      0%, 100% { opacity: 1; }
      50% { opacity: 0.3; }
    }
    .animate-fade-up { animation: fadeUp 0.7s ease forwards; }
    .delay-1 { animation-delay: 0.1s; opacity: 0; }
    .delay-2 { animation-delay: 0.2s; opacity: 0; }
    .delay-3 { animation-delay: 0.3s; opacity: 0; }
    .delay-4 { animation-delay: 0.4s; opacity: 0; }

    .live-dot {
      width: 8px; height: 8px;
      border-radius: 50%;
      background: #22c55e;
      animation: pulse-dot 1.5s ease-in-out infinite;
    }

    /* Section titles */
    .section-label {
      font-size: 0.7rem;
      letter-spacing: 0.2em;
      text-transform: uppercase;
      color: var(--accent);
      font-weight: 600;
      margin-bottom: 12px;
    }
  </style>
</head>
<body>

  <!-- NAVBAR -->
  <nav class="px-6 py-4">
    <div class="max-w-7xl mx-auto flex items-center justify-between">
      <div class="flex items-center gap-3">
        <div class="w-8 h-8 rounded-lg flex items-center justify-center text-sm font-bold" style="background: var(--accent); color: #050816;">
          PHP
        </div>
        <span class="display-font text-white font-bold text-lg">WebDeploy</span>
      </div>
      <div class="hidden md:flex items-center gap-8">
        <a href="#tentang" class="text-sm text-slate-400 hover:text-white transition-colors">Tentang</a>
        <a href="#fitur" class="text-sm text-slate-400 hover:text-white transition-colors">Fitur PHP</a>
        <a href="#deploy" class="text-sm text-slate-400 hover:text-white transition-colors">Deployment</a>
        <a href="#anggota" class="text-sm text-slate-400 hover:text-white transition-colors">Tim</a>
      </div>
      <div class="flex items-center gap-2">
        <div class="live-dot"></div>
        <span class="text-xs text-slate-400">Server Online</span>
      </div>
    </div>
  </nav>

  <!-- HERO -->
  <section class="relative min-h-screen flex items-center justify-center pt-20 pb-16 px-6 z-10">
    <div class="max-w-4xl mx-auto text-center">
      <div class="animate-fade-up">
        <span class="hero-tag">⚡ Proyek Web Server PHP</span>
      </div>
      <h1 class="display-font text-5xl md:text-7xl font-extrabold text-white mt-8 leading-tight animate-fade-up delay-1">
        Deploy PHP<br/>
        <span style="background: linear-gradient(135deg, #00e5ff, #7c3aed); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
          ke Web Server
        </span>
      </h1>
      <p class="text-slate-400 text-lg md:text-xl mt-6 max-w-2xl mx-auto leading-relaxed animate-fade-up delay-2">
        Panduan lengkap deployment aplikasi PHP ke web server. Mulai dari konfigurasi Apache/Nginx hingga manajemen database MySQL — dikerjakan oleh tim 5 orang.
      </p>
      <div class="flex flex-col sm:flex-row items-center justify-center gap-4 mt-10 animate-fade-up delay-3">
        <a href="#deploy" class="glow-btn glow-btn-primary">
          🚀 Mulai Deploy
        </a>
        <a href="#anggota" class="glow-btn glow-btn-outline">
          👥 Lihat Tim
        </a>
      </div>

      <!-- Stats bar -->
      <div class="glass rounded-2xl mt-16 flex divide-x animate-fade-up delay-4" style="border-color: var(--border);">
        <div class="stat-box flex-1">
          <div class="display-font text-3xl font-bold" style="color: var(--accent);">5</div>
          <div class="text-xs text-slate-500 mt-1 uppercase tracking-widest">Anggota</div>
        </div>
        <div class="stat-box flex-1">
          <div class="display-font text-3xl font-bold text-purple-400">PHP</div>
          <div class="text-xs text-slate-500 mt-1 uppercase tracking-widest">8.x Ready</div>
        </div>
        <div class="stat-box flex-1">
          <div class="display-font text-3xl font-bold text-emerald-400">3</div>
          <div class="text-xs text-slate-500 mt-1 uppercase tracking-widest">Server Stack</div>
        </div>
        <div class="stat-box flex-1">
          <div class="display-font text-3xl font-bold text-amber-400">100%</div>
          <div class="text-xs text-slate-500 mt-1 uppercase tracking-widest">Dokumentasi</div>
        </div>
      </div>
    </div>
  </section>

  <!-- TENTANG PROYEK -->
  <section id="tentang" class="relative z-10 py-20 px-6">
    <div class="max-w-7xl mx-auto">
      <div class="grid md:grid-cols-2 gap-16 items-center">
        <div>
          <p class="section-label">// tentang proyek</p>
          <h2 class="display-font text-4xl md:text-5xl font-bold text-white leading-tight">
            Aplikasi PHP<br/>Siap Produksi
          </h2>
          <p class="text-slate-400 mt-6 leading-relaxed">
            Proyek ini mencakup pengembangan dan deployment aplikasi web berbasis PHP ke server produksi menggunakan stack LAMP/LEMP. Kami membahas konfigurasi server, keamanan, optimasi performa, dan best practices deployment modern.
          </p>
          <div class="mt-8 space-y-4">
            <div class="flex items-start gap-4">
              <div class="w-6 h-6 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5" style="background: rgba(0,229,255,0.1); border: 1px solid rgba(0,229,255,0.3);">
                <span style="color: var(--accent); font-size: 0.6rem;">✓</span>
              </div>
              <div>
                <div class="text-white font-medium text-sm">Apache & Nginx Configuration</div>
                <div class="text-slate-500 text-sm mt-0.5">Virtual host, SSL/TLS, .htaccess, server blocks</div>
              </div>
            </div>
            <div class="flex items-start gap-4">
              <div class="w-6 h-6 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5" style="background: rgba(0,229,255,0.1); border: 1px solid rgba(0,229,255,0.3);">
                <span style="color: var(--accent); font-size: 0.6rem;">✓</span>
              </div>
              <div>
                <div class="text-white font-medium text-sm">Database MySQL / MariaDB</div>
                <div class="text-slate-500 text-sm mt-0.5">Migrasi, backup, user management</div>
              </div>
            </div>
            <div class="flex items-start gap-4">
              <div class="w-6 h-6 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5" style="background: rgba(0,229,255,0.1); border: 1px solid rgba(0,229,255,0.3);">
                <span style="color: var(--accent); font-size: 0.6rem;">✓</span>
              </div>
              <div>
                <div class="text-white font-medium text-sm">CI/CD & Automation</div>
                <div class="text-slate-500 text-sm mt-0.5">Git hooks, deployment scripts, monitoring</div>
              </div>
            </div>
          </div>
        </div>

        <!-- Code preview -->
        <div>
          <div class="code-block">
            <div class="text-slate-500 text-xs mb-4 flex items-center gap-2">
              <span class="w-3 h-3 rounded-full bg-red-500/60"></span>
              <span class="w-3 h-3 rounded-full bg-yellow-500/60"></span>
              <span class="w-3 h-3 rounded-full bg-green-500/60"></span>
              <span class="ml-2">deploy.php</span>
            </div>
<span class="cmt">// Konfigurasi koneksi database</span>
<span class="kw">$config</span> = [
  <span class="str">'host'</span>     => <span class="str">'localhost'</span>,
  <span class="str">'database'</span> => <span class="str">'app_db'</span>,
  <span class="str">'username'</span> => <span class="var">$_ENV</span>[<span class="str">'DB_USER'</span>],
  <span class="str">'password'</span> => <span class="var">$_ENV</span>[<span class="str">'DB_PASS'</span>],
];

<span class="kw">try</span> {
  <span class="kw">$pdo</span> = <span class="kw">new</span> <span class="fn">PDO</span>(
    <span class="str">"mysql:host={$config['host']};
     dbname={$config['database']}"</span>,
    <span class="kw">$config</span>[<span class="str">'username'</span>],
    <span class="kw">$config</span>[<span class="str">'password'</span>]
  );
  <span class="cmt">// ✓ Koneksi berhasil</span>
} <span class="kw">catch</span> (<span class="fn">PDOException</span> <span class="kw">$e</span>) {
  <span class="fn">error_log</span>(<span class="kw">$e</span>-><span class="fn">getMessage</span>());
}
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- FITUR PHP -->
  <section id="fitur" class="relative z-10 py-20 px-6">
    <div class="max-w-7xl mx-auto">
      <div class="text-center mb-16">
        <p class="section-label">// fitur utama</p>
        <h2 class="display-font text-4xl md:text-5xl font-bold text-white">
          Teknologi yang Digunakan
        </h2>
        <p class="text-slate-400 mt-4 max-w-xl mx-auto">Stack teknologi modern untuk membangun aplikasi PHP yang cepat, aman, dan scalable.</p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Card 1 -->
        <div class="feature-card">
          <div class="feature-icon" style="background: rgba(0,229,255,0.08);">🐘</div>
          <h3 class="text-white font-semibold text-lg mb-2">PHP 8.x</h3>
          <p class="text-slate-400 text-sm leading-relaxed">Memanfaatkan fitur terbaru PHP seperti Named Arguments, Fibers, readonly properties, dan JIT Compilation untuk performa maksimal.</p>
          <div class="mt-4 flex flex-wrap gap-2">
            <span class="text-xs px-2 py-1 rounded-md" style="background: rgba(0,229,255,0.08); color: var(--accent);">OOP</span>
            <span class="text-xs px-2 py-1 rounded-md" style="background: rgba(0,229,255,0.08); color: var(--accent);">PDO</span>
            <span class="text-xs px-2 py-1 rounded-md" style="background: rgba(0,229,255,0.08); color: var(--accent);">Composer</span>
          </div>
        </div>

        <!-- Card 2 -->
        <div class="feature-card">
          <div class="feature-icon" style="background: rgba(124,58,237,0.08);">🌐</div>
          <h3 class="text-white font-semibold text-lg mb-2">Apache / Nginx</h3>
          <p class="text-slate-400 text-sm leading-relaxed">Konfigurasi web server yang optimal dengan virtual host, URL rewriting, gzip compression, dan SSL/TLS certificate via Let's Encrypt.</p>
          <div class="mt-4 flex flex-wrap gap-2">
            <span class="text-xs px-2 py-1 rounded-md" style="background: rgba(124,58,237,0.08); color: #a78bfa;">HTTPS</span>
            <span class="text-xs px-2 py-1 rounded-md" style="background: rgba(124,58,237,0.08); color: #a78bfa;">mod_rewrite</span>
            <span class="text-xs px-2 py-1 rounded-md" style="background: rgba(124,58,237,0.08); color: #a78bfa;">Proxy</span>
          </div>
        </div>

        <!-- Card 3 -->
        <div class="feature-card">
          <div class="feature-icon" style="background: rgba(34,197,94,0.08);">🗄️</div>
          <h3 class="text-white font-semibold text-lg mb-2">MySQL / MariaDB</h3>
          <p class="text-slate-400 text-sm leading-relaxed">Manajemen database relasional dengan indexing optimal, query optimization, stored procedures, dan backup otomatis terjadwal.</p>
          <div class="mt-4 flex flex-wrap gap-2">
            <span class="text-xs px-2 py-1 rounded-md" style="background: rgba(34,197,94,0.08); color: #86efac;">InnoDB</span>
            <span class="text-xs px-2 py-1 rounded-md" style="background: rgba(34,197,94,0.08); color: #86efac;">Indexing</span>
            <span class="text-xs px-2 py-1 rounded-md" style="background: rgba(34,197,94,0.08); color: #86efac;">Backup</span>
          </div>
        </div>

        <!-- Card 4 -->
        <div class="feature-card">
          <div class="feature-icon" style="background: rgba(251,191,36,0.08);">🔐</div>
          <h3 class="text-white font-semibold text-lg mb-2">Keamanan Web</h3>
          <p class="text-slate-400 text-sm leading-relaxed">Proteksi terhadap SQL injection, XSS, CSRF, dan serangan brute-force. Implementasi prepared statements dan sanitasi input.</p>
          <div class="mt-4 flex flex-wrap gap-2">
            <span class="text-xs px-2 py-1 rounded-md" style="background: rgba(251,191,36,0.08); color: #fbbf24;">CSRF</span>
            <span class="text-xs px-2 py-1 rounded-md" style="background: rgba(251,191,36,0.08); color: #fbbf24;">XSS Filter</span>
            <span class="text-xs px-2 py-1 rounded-md" style="background: rgba(251,191,36,0.08); color: #fbbf24;">Hashing</span>
          </div>
        </div>

        <!-- Card 5 -->
        <div class="feature-card">
          <div class="feature-icon" style="background: rgba(239,68,68,0.08);">⚙️</div>
          <h3 class="text-white font-semibold text-lg mb-2">Session & Auth</h3>
          <p class="text-slate-400 text-sm leading-relaxed">Sistem autentikasi berbasis session PHP dengan JWT support, role-based access control, dan manajemen cookie yang aman.</p>
          <div class="mt-4 flex flex-wrap gap-2">
            <span class="text-xs px-2 py-1 rounded-md" style="background: rgba(239,68,68,0.08); color: #fca5a5;">JWT</span>
            <span class="text-xs px-2 py-1 rounded-md" style="background: rgba(239,68,68,0.08); color: #fca5a5;">RBAC</span>
            <span class="text-xs px-2 py-1 rounded-md" style="background: rgba(239,68,68,0.08); color: #fca5a5;">Cookie</span>
          </div>
        </div>

        <!-- Card 6 -->
        <div class="feature-card">
          <div class="feature-icon" style="background: rgba(14,165,233,0.08);">📦</div>
          <h3 class="text-white font-semibold text-lg mb-2">REST API</h3>
          <p class="text-slate-400 text-sm leading-relaxed">Membangun API endpoint RESTful dengan PHP native atau framework ringan. Support JSON response, pagination, dan rate limiting.</p>
          <div class="mt-4 flex flex-wrap gap-2">
            <span class="text-xs px-2 py-1 rounded-md" style="background: rgba(14,165,233,0.08); color: #7dd3fc;">GET/POST</span>
            <span class="text-xs px-2 py-1 rounded-md" style="background: rgba(14,165,233,0.08); color: #7dd3fc;">JSON</span>
            <span class="text-xs px-2 py-1 rounded-md" style="background: rgba(14,165,233,0.08); color: #7dd3fc;">Rate Limit</span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- DEPLOYMENT STEPS -->
  <section id="deploy" class="relative z-10 py-20 px-6">
    <div class="max-w-5xl mx-auto">
      <div class="text-center mb-16">
        <p class="section-label">// panduan deployment</p>
        <h2 class="display-font text-4xl md:text-5xl font-bold text-white">
          Langkah-langkah<br/>Deploy ke Server
        </h2>
      </div>

      <div class="grid md:grid-cols-2 gap-8">
        <!-- Steps -->
        <div class="space-y-0">
          <!-- Step 1 -->
          <div class="flex gap-4">
            <div class="flex flex-col items-center">
              <div class="step-num">1</div>
              <div class="step-line"></div>
            </div>
            <div class="pb-8">
              <h3 class="text-white font-semibold mb-1">Persiapan Server</h3>
              <p class="text-slate-400 text-sm leading-relaxed">Install LAMP stack (Linux, Apache, MySQL, PHP) atau LEMP (dengan Nginx). Update sistem dan konfigurasi firewall UFW.</p>
              <div class="mt-3 code-block text-xs">
sudo apt update && sudo apt upgrade<br/>
sudo apt install apache2 php8.2 mysql-server
              </div>
            </div>
          </div>

          <!-- Step 2 -->
          <div class="flex gap-4">
            <div class="flex flex-col items-center">
              <div class="step-num">2</div>
              <div class="step-line"></div>
            </div>
            <div class="pb-8">
              <h3 class="text-white font-semibold mb-1">Upload Kode PHP</h3>
              <p class="text-slate-400 text-sm leading-relaxed">Transfer file via SCP, SFTP, atau Git clone. Tempatkan file di direktori /var/www/html atau sesuai virtual host.</p>
              <div class="mt-3 code-block text-xs">
git clone https://github.com/user/app.git<br/>
<span class="cmt"># atau via SCP:</span><br/>
scp -r ./app user@server:/var/www/html
              </div>
            </div>
          </div>

          <!-- Step 3 -->
          <div class="flex gap-4">
            <div class="flex flex-col items-center">
              <div class="step-num">3</div>
              <div class="step-line"></div>
            </div>
            <div class="pb-8">
              <h3 class="text-white font-semibold mb-1">Konfigurasi Virtual Host</h3>
              <p class="text-slate-400 text-sm leading-relaxed">Buat konfigurasi Apache virtual host untuk domain. Enable site dan reload Apache service.</p>
              <div class="mt-3 code-block text-xs">
sudo a2ensite myapp.conf<br/>
sudo systemctl reload apache2
              </div>
            </div>
          </div>

          <!-- Step 4 -->
          <div class="flex gap-4">
            <div class="flex flex-col items-center">
              <div class="step-num">4</div>
              <div class="step-line"></div>
            </div>
            <div class="pb-8">
              <h3 class="text-white font-semibold mb-1">Setup Database</h3>
              <p class="text-slate-400 text-sm leading-relaxed">Buat database dan user MySQL. Import schema SQL dan konfigurasi file .env untuk koneksi database.</p>
              <div class="mt-3 code-block text-xs">
mysql -u root -p<br/>
<span class="kw">CREATE DATABASE</span> app_db;<br/>
<span class="kw">GRANT ALL ON</span> app_db.* <span class="kw">TO</span> <span class="str">'user'</span>@<span class="str">'localhost'</span>;
              </div>
            </div>
          </div>

          <!-- Step 5 -->
          <div class="flex gap-4">
            <div class="flex flex-col items-center">
              <div class="step-num">5</div>
            </div>
            <div class="pb-4">
              <h3 class="text-white font-semibold mb-1">SSL & Domain</h3>
              <p class="text-slate-400 text-sm leading-relaxed">Pasang SSL certificate gratis via Let's Encrypt dengan Certbot. Aktifkan HTTPS redirect otomatis.</p>
              <div class="mt-3 code-block text-xs">
sudo apt install certbot<br/>
sudo certbot --apache -d domain.com<br/>
<span class="cmt"># Auto-renewal sudah aktif ✓</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Config preview panel -->
        <div class="space-y-4">
          <div class="glass rounded-xl p-5">
            <div class="flex items-center justify-between mb-4">
              <span class="text-xs text-slate-500 uppercase tracking-widest">apache2/sites-available/app.conf</span>
              <span class="text-xs px-2 py-0.5 rounded" style="background: rgba(34,197,94,0.1); color: #86efac;">Active</span>
            </div>
            <div class="code-block text-xs">
&lt;<span class="fn">VirtualHost</span> *:80&gt;<br/>
  ServerName <span class="str">myapp.com</span><br/>
  DocumentRoot <span class="str">/var/www/html/app</span><br/>
  <br/>
  &lt;<span class="fn">Directory</span> /var/www/html/app&gt;<br/>
    Options -Indexes<br/>
    AllowOverride All<br/>
    Require all granted<br/>
  &lt;/<span class="fn">Directory</span>&gt;<br/>
  <br/>
  ErrorLog <span class="var">${APACHE_LOG_DIR}</span>/error.log<br/>
&lt;/<span class="fn">VirtualHost</span>&gt;
            </div>
          </div>

          <div class="glass rounded-xl p-5">
            <div class="text-xs text-slate-500 uppercase tracking-widest mb-4">.env — Environment Variables</div>
            <div class="code-block text-xs">
<span class="cmt"># App Config</span><br/>
<span class="kw">APP_NAME</span>=<span class="str">MyPHPApp</span><br/>
<span class="kw">APP_ENV</span>=<span class="str">production</span><br/>
<span class="kw">APP_URL</span>=<span class="str">https://myapp.com</span><br/>
<br/>
<span class="cmt"># Database</span><br/>
<span class="kw">DB_HOST</span>=<span class="str">127.0.0.1</span><br/>
<span class="kw">DB_DATABASE</span>=<span class="str">app_db</span><br/>
<span class="kw">DB_USERNAME</span>=<span class="str">dbuser</span><br/>
<span class="kw">DB_PASSWORD</span>=<span class="str">*******</span>
            </div>
          </div>

          <div class="glass rounded-xl p-5">
            <div class="text-xs text-slate-500 uppercase tracking-widest mb-3">Checklist Deployment</div>
            <div class="space-y-2 text-sm">
              <div class="flex items-center gap-2"><span class="text-emerald-400">✓</span><span class="text-slate-300">PHP extensions terinstall</span></div>
              <div class="flex items-center gap-2"><span class="text-emerald-400">✓</span><span class="text-slate-300">File permissions (755/644)</span></div>
              <div class="flex items-center gap-2"><span class="text-emerald-400">✓</span><span class="text-slate-300">mod_rewrite enabled</span></div>
              <div class="flex items-center gap-2"><span class="text-emerald-400">✓</span><span class="text-slate-300">SSL certificate aktif</span></div>
              <div class="flex items-center gap-2"><span class="text-emerald-400">✓</span><span class="text-slate-300">Error log dikonfigurasi</span></div>
              <div class="flex items-center gap-2"><span class="text-emerald-400">✓</span><span class="text-slate-300">Backup database otomatis</span></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ANGGOTA TIM -->
  <section id="anggota" class="relative z-10 py-20 px-6">
    <div class="max-w-7xl mx-auto">
      <div class="text-center mb-16">
        <p class="section-label">// tim pengembang</p>
        <h2 class="display-font text-4xl md:text-5xl font-bold text-white">
          5 Anggota Kelompok
        </h2>
        <p class="text-slate-400 mt-4">Tim solid yang mengerjakan proyek deployment PHP ini bersama-sama.</p>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-6">

        <!-- Member 1 -->
        <div class="member-card">
          <div class="member-avatar-placeholder" style="background: linear-gradient(135deg, #0d1117, #1a0533);">
            <div style="position:absolute;inset:0;background:linear-gradient(135deg,rgba(0,229,255,0.15),rgba(124,58,237,0.2));"></div>
            <span style="position:relative;z-index:1;font-size:4.5rem;filter:drop-shadow(0 0 20px rgba(0,229,255,0.5));">👨‍💻</span>
          </div>
          <div class="p-5">
            <span class="role-badge" style="background: rgba(0,229,255,0.1); color: var(--accent);">Ketua</span>
            <h3 class="text-white font-semibold mt-3 text-base">Arif Rahmat</h3>
            <p class="text-slate-500 text-xs mt-1">NIM: 2024001</p>
            <p class="text-slate-400 text-xs mt-3 leading-relaxed">Server configuration & project manager. Bertanggung jawab atas arsitektur sistem.</p>
            <div class="flex gap-2 mt-4">
              <span class="text-xs px-2 py-1 rounded" style="background:rgba(0,229,255,0.06);color:#94a3b8;">Apache</span>
              <span class="text-xs px-2 py-1 rounded" style="background:rgba(0,229,255,0.06);color:#94a3b8;">Linux</span>
            </div>
          </div>
        </div>

        <!-- Member 2 -->
        <div class="member-card">
          <div class="member-avatar-placeholder" style="background: linear-gradient(135deg, #0d1117, #0a1a0a);">
            <div style="position:absolute;inset:0;background:linear-gradient(135deg,rgba(34,197,94,0.1),rgba(16,185,129,0.15));"></div>
            <span style="position:relative;z-index:1;font-size:4.5rem;filter:drop-shadow(0 0 20px rgba(34,197,94,0.5));">👩‍💻</span>
          </div>
          <div class="p-5">
            <span class="role-badge" style="background: rgba(34,197,94,0.1); color: #86efac;">Backend Dev</span>
            <h3 class="text-white font-semibold mt-3 text-base">Siti Nurhaliza</h3>
            <p class="text-slate-500 text-xs mt-1">NIM: 2024002</p>
            <p class="text-slate-400 text-xs mt-3 leading-relaxed">Pengembangan logika backend PHP, REST API, dan integrasi database MySQL.</p>
            <div class="flex gap-2 mt-4">
              <span class="text-xs px-2 py-1 rounded" style="background:rgba(0,229,255,0.06);color:#94a3b8;">PHP 8</span>
              <span class="text-xs px-2 py-1 rounded" style="background:rgba(0,229,255,0.06);color:#94a3b8;">MySQL</span>
            </div>
          </div>
        </div>

        <!-- Member 3 -->
        <div class="member-card">
          <div class="member-avatar-placeholder" style="background: linear-gradient(135deg, #0d1117, #1a1000);">
            <div style="position:absolute;inset:0;background:linear-gradient(135deg,rgba(251,191,36,0.08),rgba(245,158,11,0.12));"></div>
            <span style="position:relative;z-index:1;font-size:4.5rem;filter:drop-shadow(0 0 20px rgba(251,191,36,0.5));">👨‍🎨</span>
          </div>
          <div class="p-5">
            <span class="role-badge" style="background: rgba(251,191,36,0.1); color: #fbbf24;">Frontend Dev</span>
            <h3 class="text-white font-semibold mt-3 text-base">Budi Santoso</h3>
            <p class="text-slate-500 text-xs mt-1">NIM: 2024003</p>
            <p class="text-slate-400 text-xs mt-3 leading-relaxed">Desain UI/UX dan implementasi tampilan frontend dengan HTML, CSS, dan JavaScript.</p>
            <div class="flex gap-2 mt-4">
              <span class="text-xs px-2 py-1 rounded" style="background:rgba(0,229,255,0.06);color:#94a3b8;">HTML/CSS</span>
              <span class="text-xs px-2 py-1 rounded" style="background:rgba(0,229,255,0.06);color:#94a3b8;">JS</span>
            </div>
          </div>
        </div>

        <!-- Member 4 -->
        <div class="member-card">
          <div class="member-avatar-placeholder" style="background: linear-gradient(135deg, #0d1117, #1a000a);">
            <div style="position:absolute;inset:0;background:linear-gradient(135deg,rgba(239,68,68,0.08),rgba(236,72,153,0.12));"></div>
            <span style="position:relative;z-index:1;font-size:4.5rem;filter:drop-shadow(0 0 20px rgba(239,68,68,0.5));">👩‍🔬</span>
          </div>
          <div class="p-5">
            <span class="role-badge" style="background: rgba(239,68,68,0.1); color: #fca5a5;">Database</span>
            <h3 class="text-white font-semibold mt-3 text-base">Dewi Rahayu</h3>
            <p class="text-slate-500 text-xs mt-1">NIM: 2024004</p>
            <p class="text-slate-400 text-xs mt-3 leading-relaxed">Desain skema database, optimasi query, migrasi data, dan manajemen backup.</p>
            <div class="flex gap-2 mt-4">
              <span class="text-xs px-2 py-1 rounded" style="background:rgba(0,229,255,0.06);color:#94a3b8;">SQL</span>
              <span class="text-xs px-2 py-1 rounded" style="background:rgba(0,229,255,0.06);color:#94a3b8;">DBA</span>
            </div>
          </div>
        </div>

        <!-- Member 5 -->
        <div class="member-card">
          <div class="member-avatar-placeholder" style="background: linear-gradient(135deg, #0d1117, #0a0a1a);">
            <div style="position:absolute;inset:0;background:linear-gradient(135deg,rgba(124,58,237,0.1),rgba(139,92,246,0.15));"></div>
            <span style="position:relative;z-index:1;font-size:4.5rem;filter:drop-shadow(0 0 20px rgba(139,92,246,0.5));">👨‍🛡️</span>
          </div>
          <div class="p-5">
            <span class="role-badge" style="background: rgba(139,92,246,0.1); color: #c4b5fd;">Security</span>
            <h3 class="text-white font-semibold mt-3 text-base">Fajar Kurniawan</h3>
            <p class="text-slate-500 text-xs mt-1">NIM: 2024005</p>
            <p class="text-slate-400 text-xs mt-3 leading-relaxed">Keamanan aplikasi, SSL setup, testing penetrasi, dan dokumentasi teknis proyek.</p>
            <div class="flex gap-2 mt-4">
              <span class="text-xs px-2 py-1 rounded" style="background:rgba(0,229,255,0.06);color:#94a3b8;">Security</span>
              <span class="text-xs px-2 py-1 rounded" style="background:rgba(0,229,255,0.06);color:#94a3b8;">SSL</span>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- FOOTER -->
  <footer class="relative z-10 py-12 px-6 mt-8" style="border-top: 1px solid var(--border);">
    <div class="max-w-7xl mx-auto">
      <div class="flex flex-col md:flex-row items-center justify-between gap-6">
        <div class="flex items-center gap-3">
          <div class="w-8 h-8 rounded-lg flex items-center justify-center text-sm font-bold" style="background: var(--accent); color: #050816;">
            PHP
          </div>
          <div>
            <div class="display-font text-white font-bold">WebDeploy</div>
            <div class="text-slate-500 text-xs">Proyek Web Server PHP — Kelompok 1</div>
          </div>
        </div>
        <div class="text-center text-slate-500 text-xs">
          Dibuat dengan ❤️ oleh Tim 5 Orang · Mata Kuliah Pemrograman Web · 2024
        </div>
        <div class="flex items-center gap-2">
          <div class="live-dot"></div>
          <span class="text-xs text-slate-400">Server aktif & running</span>
        </div>
      </div>
    </div>
  </footer>

</body>
</html>
