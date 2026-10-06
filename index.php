<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZCOER | Smart Digital Lab Monitoring System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        @keyframes floatSlow {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        @keyframes pulseGlow {
            0%, 100% { box-shadow: 0 0 25px rgba(59, 130, 246, 0.55), 0 0 50px rgba(16, 185, 129, 0.25); }
            50% { box-shadow: 0 0 45px rgba(59, 130, 246, 0.9), 0 0 80px rgba(16, 185, 129, 0.5); }
        }
        .animate-float { animation: floatSlow 4s ease-in-out infinite; }
        .glow-logo { animation: pulseGlow 3s infinite; }
        .bouncy-card {
            transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
        }
        .bouncy-card:hover {
            transform: translateY(-10px) scale(1.03);
        }
        .glow-blue:hover {
            box-shadow: 0 0 35px rgba(59, 130, 246, 0.6);
            border-color: rgba(96, 165, 250, 0.95);
        }
        .glow-emerald:hover {
            box-shadow: 0 0 35px rgba(16, 185, 129, 0.6);
            border-color: rgba(52, 211, 153, 0.95);
        }
        .glow-rose:hover {
            box-shadow: 0 0 35px rgba(244, 63, 94, 0.6);
            border-color: rgba(251, 113, 133, 0.95);
        }
        .btn-glow-blue {
            box-shadow: 0 0 20px rgba(37, 99, 235, 0.65);
            transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
        }
        .btn-glow-blue:hover {
            transform: scale(1.05);
            box-shadow: 0 0 35px rgba(59, 130, 246, 1);
        }
        .btn-glow-emerald {
            box-shadow: 0 0 20px rgba(5, 150, 105, 0.65);
            transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
        }
        .btn-glow-emerald:hover {
            transform: scale(1.05);
            box-shadow: 0 0 35px rgba(16, 185, 129, 1);
        }
    </style>
</head>
<body class="bg-slate-950 text-slate-100 min-h-screen font-sans flex flex-col justify-between relative overflow-x-hidden">

    <!-- Neon Ambient Glowing Orbs -->
    <div class="fixed top-[-120px] left-[-120px] w-96 h-96 bg-blue-600/25 rounded-full blur-[130px] pointer-events-none"></div>
    <div class="fixed bottom-[-120px] right-[-120px] w-96 h-96 bg-emerald-500/25 rounded-full blur-[130px] pointer-events-none"></div>
    <div class="fixed top-[35%] left-[42%] w-80 h-80 bg-purple-600/15 rounded-full blur-[140px] pointer-events-none"></div>

    <!-- Top Navigation Bar with Official Zeal Logo Next to College Name -->
    <nav class="bg-slate-900/80 border-b border-blue-500/30 px-6 py-3.5 sticky top-0 z-50 backdrop-blur-xl shadow-[0_4px_30px_rgba(59,130,246,0.2)]">
        <div class="max-w-7xl mx-auto flex flex-wrap justify-between items-center gap-4">
            <div class="flex items-center space-x-4">
                <!-- Official Zeal Logo Image (zeal.jfif) + Exact Circular Seal Fallback -->
                <div class="h-14 w-14 rounded-full bg-white p-1 glow-logo flex items-center justify-center shrink-0 overflow-hidden border-2 border-blue-400">
                    <img src="zeal.jfif" alt="ZCOER Official Logo" class="h-full w-full object-contain rounded-full"
                         onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                    <div style="display:none;" class="h-full w-full rounded-full border-2 border-blue-900 bg-white flex-col items-center justify-center text-center leading-none p-0.5">
                        <span class="text-[6px] font-extrabold text-blue-900 tracking-tighter">ZEAL PUNE</span>
                        <span class="text-xs font-black text-blue-900 tracking-tighter">ZES</span>
                        <span class="text-[6px] font-extrabold bg-blue-900 text-white px-1 rounded mt-0.5">ZCOER</span>
                    </div>
                </div>
                <div>
                    <div class="flex items-center gap-2">
                        <span class="text-[10px] font-extrabold uppercase tracking-widest px-2 py-0.5 rounded bg-amber-500/20 text-amber-300 border border-amber-400/40">ESTD - 1996 • NAAC A+</span>
                        <span class="text-[10px] font-bold uppercase tracking-widest px-2 py-0.5 rounded bg-blue-500/20 text-blue-300 border border-blue-400/40">Zeal Education Society</span>
                    </div>
                    <h1 class="text-sm sm:text-lg font-extrabold text-white tracking-wide drop-shadow-[0_0_12px_rgba(59,130,246,0.6)] mt-0.5">
                        ZEAL COLLEGE OF ENGINEERING & RESEARCH, PUNE-41
                    </h1>
                    <p class="text-xs text-cyan-400 font-medium">Department of Electronics & Computer Engineering • PBL Portal</p>
                </div>
            </div>

            <div class="flex items-center space-x-3 text-xs font-bold">
                <a href="student_dashboard.php" class="btn-glow-emerald bg-gradient-to-r from-emerald-600 to-teal-500 text-white px-4 py-2.5 rounded-xl flex items-center gap-1.5">
                    <i class="fa-solid fa-user-graduate"></i> Student Portal
                </a>
                <a href="faculty_login.php" class="btn-glow-blue bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-4 py-2.5 rounded-xl flex items-center gap-1.5">
                    <i class="fa-solid fa-chalkboard-user"></i> Faculty Portal
                </a>
            </div>
        </div>
    </nav>

    <!-- Hero Section with Large Floating Official Zeal Logo Showcase -->
    <section class="max-w-7xl mx-auto px-6 py-10 text-center space-y-6 relative z-10">
        <div class="inline-flex flex-col items-center animate-float">
            <!-- Large Official Zeal Crest Badge -->
            <div class="w-28 h-28 rounded-full bg-white p-1.5 glow-logo mb-4 border-4 border-blue-400 flex items-center justify-center overflow-hidden shadow-2xl">
                <img src="zeal.jfif" alt="Zeal Education Society Official Logo" class="w-full h-full object-contain rounded-full"
                     onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                <div style="display:none;" class="w-full h-full rounded-full border-4 border-double border-blue-900 bg-white flex-col items-center justify-center text-center p-1">
                    <span class="text-[7px] font-extrabold text-blue-900 uppercase">Zeal Education Society</span>
                    <span class="text-2xl font-black text-blue-900 leading-none my-0.5">ZES</span>
                    <span class="text-[7px] font-bold bg-blue-900 text-white px-1.5 py-0.5 rounded-full">ESTD-1996</span>
                    <span class="text-[9px] font-black text-blue-950 mt-0.5">ZCOER PUNE</span>
                </div>
            </div>

            <span class="inline-flex items-center gap-2 bg-blue-500/15 border border-blue-400/50 text-cyan-300 px-4 py-1.5 rounded-full text-xs font-bold shadow-[0_0_20px_rgba(59,130,246,0.35)]">
                <span class="h-2 w-2 rounded-full bg-emerald-400 animate-ping"></span>
                ZEAL COLLEGE OF ENGINEERING & RESEARCH, PUNE • SMART LAB SYSTEM
            </span>
        </div>

        <h2 class="text-4xl sm:text-6xl font-black text-white tracking-tight leading-tight drop-shadow-[0_0_25px_rgba(59,130,246,0.45)]">
            Smart Digital Lab <br>
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 via-blue-400 to-emerald-400">
                Monitoring System
            </span>
        </h2>

        <p class="max-w-2xl mx-auto text-slate-300 text-sm sm:text-base leading-relaxed">
            Next-generation real-time computer laboratory supervision platform for <strong class="text-white">ZCOER, Pune</strong>. Automatically detects student mouse/keyboard activity, enforces academic whitelisting, and blocks unauthorized websites in real time.
        </p>

        <!-- Bouncy Glowing Portal Selection Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl mx-auto pt-4 text-left">
            <!-- Faculty Card -->
            <div class="bouncy-card glow-blue bg-slate-900/80 backdrop-blur-xl border-2 border-blue-500/40 rounded-3xl p-7 shadow-[0_0_30px_rgba(37,99,235,0.2)] flex flex-col justify-between relative overflow-hidden">
                <div class="absolute -right-10 -top-10 w-36 h-36 bg-blue-500/20 rounded-full blur-2xl pointer-events-none"></div>
                <div>
                    <div class="h-14 w-14 rounded-2xl bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center text-white text-2xl mb-5 shadow-[0_0_25px_rgba(59,130,246,0.7)]">
                        <i class="fa-solid fa-chalkboard-user"></i>
                    </div>
                    <span class="text-[11px] font-extrabold uppercase tracking-wider text-blue-400 bg-blue-500/10 px-3 py-1 rounded-full border border-blue-400/30">Teacher & Admin Console</span>
                    <h3 class="text-2xl font-extrabold text-white mt-3">Faculty Monitoring Portal</h3>
                    <p class="text-xs text-slate-300 mt-2 leading-relaxed">
                        Exclusively for Lab Instructors & HOD. Select your subject & lab room, monitor live Green/Red student PC cards, and track instant policy violation alerts.
                    </p>
                </div>
                <a href="faculty_login.php" class="btn-glow-blue mt-7 inline-flex items-center justify-center w-full bg-gradient-to-r from-blue-600 via-indigo-600 to-blue-500 text-white font-extrabold py-3.5 rounded-2xl text-sm">
                    Launch Faculty Login <i class="fa-solid fa-bolt ml-2 animate-bounce"></i>
                </a>
            </div>

            <!-- Student Card -->
            <div class="bouncy-card glow-emerald bg-slate-900/80 backdrop-blur-xl border-2 border-emerald-500/40 rounded-3xl p-7 shadow-[0_0_30px_rgba(16,185,129,0.2)] flex flex-col justify-between relative overflow-hidden">
                <div class="absolute -right-10 -top-10 w-36 h-36 bg-emerald-500/20 rounded-full blur-2xl pointer-events-none"></div>
                <div>
                    <div class="h-14 w-14 rounded-2xl bg-gradient-to-br from-emerald-500 to-teal-600 flex items-center justify-center text-white text-2xl mb-5 shadow-[0_0_25px_rgba(16,185,129,0.7)]">
                        <i class="fa-solid fa-desktop"></i>
                    </div>
                    <span class="text-[11px] font-extrabold uppercase tracking-wider text-emerald-400 bg-emerald-500/10 px-3 py-1 rounded-full border border-emerald-400/30">Student Lab Workstation</span>
                    <h3 class="text-2xl font-extrabold text-white mt-3">Student Workstation Portal</h3>
                    <p class="text-xs text-slate-300 mt-2 leading-relaxed">
                        Check in with your Roll No, ZPRN & PC Number. Access whitelisted coding documentation and test real-time active/inactive & auto-blocker syncing.
                    </p>
                </div>
                <a href="student_dashboard.php" class="btn-glow-emerald mt-7 inline-flex items-center justify-center w-full bg-gradient-to-r from-emerald-600 via-teal-500 to-emerald-500 text-white font-extrabold py-3.5 rounded-2xl text-sm">
                    Launch Student Dashboard <i class="fa-solid fa-rocket ml-2 animate-bounce"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Core Glowing Features Section -->
    <section class="max-w-7xl mx-auto px-6 py-10 relative z-10">
        <h3 class="text-center text-2xl font-extrabold text-white mb-8 drop-shadow-[0_0_15px_rgba(59,130,246,0.5)]">
            <i class="fa-solid fa-wand-magic-sparkles text-cyan-400 mr-2"></i>High-Tech System Capabilities
        </h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bouncy-card glow-emerald bg-slate-900/75 backdrop-blur-md border border-emerald-500/40 p-6 rounded-2xl shadow-[0_0_20px_rgba(16,185,129,0.15)]">
                <div class="h-12 w-12 rounded-xl bg-emerald-500/20 border border-emerald-400/40 flex items-center justify-center text-emerald-400 text-xl mb-4 shadow-[0_0_15px_rgba(16,185,129,0.4)]">
                    <i class="fa-solid fa-wave-square"></i>
                </div>
                <h4 class="text-base font-extrabold text-white">Live Active / Idle Sensing</h4>
                <p class="text-xs text-slate-300 mt-2 leading-relaxed">
                    Captures hardware mouse and keyboard activity in real time, flipping student status badges between <span class="text-emerald-400 font-bold">ACTIVE</span> and <span class="text-rose-400 font-bold">INACTIVE</span> automatically.
                </p>
            </div>
            <div class="bouncy-card glow-rose bg-slate-900/75 backdrop-blur-md border border-rose-500/40 p-6 rounded-2xl shadow-[0_0_20px_rgba(244,63,94,0.15)]">
                <div class="h-12 w-12 rounded-xl bg-rose-500/20 border border-rose-400/40 flex items-center justify-center text-rose-400 text-xl mb-4 shadow-[0_0_15px_rgba(244,63,94,0.4)]">
                    <i class="fa-solid fa-shield-virus"></i>
                </div>
                <h4 class="text-base font-extrabold text-white">Instant Auto-Blocker</h4>
                <p class="text-xs text-slate-300 mt-2 leading-relaxed">
                    Detects non-academic websites (YouTube, Instagram, Netflix, Games), terminates unauthorized tabs immediately, and dispatches live alerts to the faculty console.
                </p>
            </div>
            <div class="bouncy-card glow-blue bg-slate-900/75 backdrop-blur-md border border-blue-500/40 p-6 rounded-2xl shadow-[0_0_20px_rgba(59,130,246,0.15)]">
                <div class="h-12 w-12 rounded-xl bg-blue-500/20 border border-blue-400/40 flex items-center justify-center text-blue-400 text-xl mb-4 shadow-[0_0_15px_rgba(59,130,246,0.4)]">
                    <i class="fa-solid fa-server"></i>
                </div>
                <h4 class="text-base font-extrabold text-white">3-Second MySQL Heartbeat</h4>
                <p class="text-xs text-slate-300 mt-2 leading-relaxed">
                    Powered by XAMPP Apache & MySQL (<code class="text-cyan-400">zcoer_lab_db</code>) with zero-reload Fetch API synchronization across all connected lab computers.
                </p>
            </div>
        </div>
    </section>

    <!-- Glowing Team Section -->
    <section class="max-w-7xl mx-auto px-6 py-10 w-full relative z-10">
        <div class="bg-slate-900/80 backdrop-blur-xl border border-blue-500/30 rounded-3xl p-8 shadow-[0_0_40px_rgba(59,130,246,0.15)]">
            <h3 class="text-center text-xl font-extrabold text-white mb-1">PBL Project Developers & Mentors</h3>
            <p class="text-center text-xs text-slate-300 mb-7">
                Project Guide: <strong class="text-cyan-400">Prof. Sana A. Metkari</strong> &nbsp;|&nbsp; Head of Department: <strong class="text-amber-400">Dr. Mahesh S. Navale</strong>
            </p>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
                <div class="bouncy-card glow-blue bg-slate-950/90 border border-blue-500/40 p-5 rounded-2xl text-center">
                    <div class="w-10 h-10 mx-auto mb-2 rounded-full bg-blue-500/20 border border-blue-400/50 flex items-center justify-center text-blue-400 font-bold text-sm">AT</div>
                    <div class="text-sm font-extrabold text-white">Aryan Thombre</div>
                    <div class="text-xs text-cyan-400 font-semibold mt-0.5">Roll No: EC2204</div>
                    <div class="text-[11px] text-slate-400">ZPRN: 125UEC1125</div>
                </div>
                <div class="bouncy-card glow-emerald bg-slate-950/90 border border-emerald-500/40 p-5 rounded-2xl text-center">
                    <div class="w-10 h-10 mx-auto mb-2 rounded-full bg-emerald-500/20 border border-emerald-400/50 flex items-center justify-center text-emerald-400 font-bold text-sm">GA</div>
                    <div class="text-sm font-extrabold text-white">Gayatri Adgaonkar</div>
                    <div class="text-xs text-emerald-400 font-semibold mt-0.5">Roll No: EC2205</div>
                    <div class="text-[11px] text-slate-400">ZPRN: 125UEC1110</div>
                </div>
                <div class="bouncy-card glow-blue bg-slate-950/90 border border-cyan-500/40 p-5 rounded-2xl text-center">
                    <div class="w-10 h-10 mx-auto mb-2 rounded-full bg-cyan-500/20 border border-cyan-400/50 flex items-center justify-center text-cyan-400 font-bold text-sm">RK</div>
                    <div class="text-sm font-extrabold text-white">Rutuja Kadam</div>
                    <div class="text-xs text-cyan-400 font-semibold mt-0.5">Roll No: EC2203</div>
                    <div class="text-[11px] text-slate-400">ZPRN: 125UEC1152</div>
                </div>
                <div class="bouncy-card glow-emerald bg-slate-950/90 border border-teal-500/40 p-5 rounded-2xl text-center">
                    <div class="w-10 h-10 mx-auto mb-2 rounded-full bg-teal-500/20 border border-teal-400/50 flex items-center justify-center text-teal-400 font-bold text-sm">YK</div>
                    <div class="text-sm font-extrabold text-white">Yash Kotkar</div>
                    <div class="text-xs text-teal-400 font-semibold mt-0.5">Roll No: EC2223</div>
                    <div class="text-[11px] text-slate-400">ZPRN: 125UEC1001</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer with Official Zeal Logo Next to College Name -->
    <footer class="bg-slate-900/90 border-t border-blue-500/20 px-6 py-4 text-xs text-slate-300 relative z-10">
        <div class="max-w-7xl mx-auto flex flex-wrap justify-center items-center gap-3">
            <img src="zeal.jfif" alt="ZCOER" class="h-7 w-7 rounded-full bg-white p-0.5 object-contain border border-blue-400" onerror="this.style.display='none'">
            <span>© 2026 <strong>Zeal Education Society's Zeal College of Engineering & Research (ZCOER), Pune-41</strong> • Smart Digital Lab Monitoring System</span>
        </div>
    </footer>

</body>
</html>