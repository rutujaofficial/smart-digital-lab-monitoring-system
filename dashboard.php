<?php
session_start();
if (!isset($_SESSION['logged_in'])) {
    header("Location: faculty_login.php");
    exit;
}
$faculty =$_SESSION['faculty'] ?? 'Prof. Sana A. Metkari';
$subject =$_SESSION['subject'] ?? 'Python Programming & PBL Lab';
$lab     =$_SESSION['lab'] ?? 'EC-Lab-01 (Main Server)';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZCOER | Live Faculty Monitoring Console</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        .bouncy-card {
            transition: all 0.35s cubic-bezier(0.34, 1.56, 0.64, 1);
        }
        .bouncy-card:hover {
            transform: translateY(-6px) scale(1.02);
        }
        .card-active {
            box-shadow: 0 0 25px rgba(16, 185, 129, 0.25);
        }
        .card-active:hover {
            box-shadow: 0 0 40px rgba(16, 185, 129, 0.55);
        }
        .card-inactive {
            box-shadow: 0 0 25px rgba(244, 63, 94, 0.3);
        }
        .card-inactive:hover {
            box-shadow: 0 0 40px rgba(244, 63, 94, 0.6);
        }
    </style>
</head>
<body class="bg-slate-950 text-slate-100 min-h-screen font-sans flex flex-col justify-between relative overflow-x-hidden">

    <div class="fixed top-[-120px] left-[-120px] w-96 h-96 bg-blue-600/20 rounded-full blur-[130px] pointer-events-none"></div>
    <div class="fixed bottom-[-120px] right-[-120px] w-96 h-96 bg-emerald-600/20 rounded-full blur-[130px] pointer-events-none"></div>

    <header class="bg-slate-900/80 border-b border-blue-500/30 px-6 py-3.5 backdrop-blur-xl sticky top-0 z-50 shadow-[0_4px_25px_rgba(59,130,246,0.15)]">
        <div class="max-w-7xl mx-auto flex flex-wrap justify-between items-center gap-4">
            <div class="flex items-center space-x-3">
                <div class="h-11 w-11 rounded-xl bg-gradient-to-br from-amber-400 via-blue-600 to-slate-900 p-0.5 shadow-[0_0_20px_rgba(59,130,246,0.6)] flex items-center justify-center">
                    <div class="h-full w-full bg-slate-950 rounded-xl flex flex-col items-center justify-center">
                        <span class="text-[10px] font-black text-amber-400">ZEAL</span>
                        <span class="text-[7px] font-bold text-cyan-400">ZCOER</span>
                    </div>
                </div>
                <div>
                    <h1 class="text-base font-extrabold text-white">ZEAL COLLEGE OF ENGINEERING & RESEARCH, PUNE-41</h1>
                    <p class="text-xs text-cyan-400">Smart Digital Lab Monitoring System • Live Faculty Console</p>
                </div>
            </div>
            <div class="flex items-center space-x-3">
                <a href="index.php" class="text-xs bg-slate-800 hover:bg-slate-700 border border-slate-600 text-slate-200 px-3.5 py-1.5 rounded-xl font-bold transition hover:scale-105">
                    <i class="fa-solid fa-house mr-1"></i> Home
                </a>
                <span class="text-xs bg-emerald-950/80 border border-emerald-400/50 text-emerald-300 px-3.5 py-1.5 rounded-full font-bold shadow-[0_0_15px_rgba(16,185,129,0.4)]">
                    <span class="inline-block h-2 w-2 rounded-full bg-emerald-400 animate-ping mr-1"></span> Auto-Syncing 3s
                </span>
                <a href="logout.php" class="bg-rose-600/20 hover:bg-rose-600/40 border border-rose-500/50 text-rose-300 text-xs font-bold px-3.5 py-1.5 rounded-xl shadow-[0_0_15px_rgba(244,63,94,0.3)] transition hover:scale-105">
                    <i class="fa-solid fa-power-off mr-1"></i> End Session
                </a>
            </div>
        </div>
    </header>

    <main class="max-w-7xl mx-auto w-full px-6 py-6 space-y-6 flex-grow relative z-10">
        <!-- Faculty Session Header Bar -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-4 bg-slate-900/85 backdrop-blur-xl border border-blue-500/40 p-5 rounded-3xl shadow-[0_0_30px_rgba(59,130,246,0.2)]">
            <div class="lg:col-span-4 flex items-center space-x-3">
                <div class="h-12 w-12 rounded-2xl bg-blue-500/20 border border-blue-400/50 flex items-center justify-center text-blue-400 text-lg shadow-[0_0_15px_rgba(59,130,246,0.4)]">
                    <i class="fa-solid fa-chalkboard-user"></i>
                </div>
                <div>
                    <span class="text-[11px] uppercase text-cyan-400 font-bold block">Logged-In Faculty</span>
                    <h2 class="text-base font-extrabold text-white"><?= htmlspecialchars($faculty) ?></h2>
                </div>
            </div>

            <div class="lg:col-span-4 flex items-center space-x-3">
                <div class="h-12 w-12 rounded-2xl bg-purple-500/20 border border-purple-400/50 flex items-center justify-center text-purple-400 text-lg shadow-[0_0_15px_rgba(168,85,247,0.4)]">
                    <i class="fa-solid fa-book-open-reader"></i>
                </div>
                <div>
                    <span class="text-[11px] uppercase text-purple-400 font-bold block">Subject & Lab</span>
                    <h2 class="text-base font-extrabold text-white"><?= htmlspecialchars($subject) ?></h2>
                    <span class="text-xs text-cyan-400"><?= htmlspecialchars($lab) ?></span>
                </div>
            </div>

            <div class="lg:col-span-4 grid grid-cols-3 gap-3">
                <div class="bouncy-card bg-slate-950 border border-blue-500/40 p-2.5 rounded-2xl text-center shadow-[0_0_15px_rgba(59,130,246,0.25)]">
                    <span class="text-xs text-blue-300 font-bold block">Total PCs</span>
                    <span id="totalCount" class="text-2xl font-black text-white">0</span>
                </div>
                <div class="bouncy-card bg-emerald-950/50 border border-emerald-400/50 p-2.5 rounded-2xl text-center shadow-[0_0_20px_rgba(16,185,129,0.3)]">
                    <span class="text-xs text-emerald-300 font-bold block">Active</span>
                    <span id="activeCount" class="text-2xl font-black text-emerald-400">0</span>
                </div>
                <div class="bouncy-card bg-rose-950/50 border border-rose-400/50 p-2.5 rounded-2xl text-center shadow-[0_0_20px_rgba(244,63,94,0.3)]">
                    <span class="text-xs text-rose-300 font-bold block">Inactive</span>
                    <span id="inactiveCount" class="text-2xl font-black text-rose-400">0</span>
                </div>
            </div>
        </div>

        <div class="bg-slate-900/75 border border-cyan-500/30 px-5 py-3 rounded-2xl flex flex-wrap justify-between items-center gap-2 text-xs shadow-[0_0_20px_rgba(6,182,212,0.15)]">
            <div>
                <strong class="text-emerald-400"><i class="fa-solid fa-check-circle mr-1"></i>Whitelisted Academic Sites:</strong>
                <span class="text-slate-200 ml-1">docs.python.org • sqlite.org • developer.mozilla.org • localhost</span>
            </div>
            <div>
                <strong class="text-rose-400"><i class="fa-solid fa-ban mr-1"></i>Auto-Blocker Active:</strong>
                <span class="text-slate-200 ml-1">YouTube • Instagram • Facebook • Netflix • Steam</span>
            </div>
        </div>

        <!-- Dynamic Glowing Student Grid -->
        <div id="studentGrid" class="grid grid-cols-1 md:grid-cols-2 gap-6"></div>
    </main>

    <footer class="bg-slate-900/90 border-t border-blue-500/20 px-6 py-3 text-xs text-slate-400 flex justify-between relative z-10">
        <span>ZCOER PBL Project: Smart Digital Lab Monitoring System</span>
        <span>Guide: Prof. Sana A. Metkari | HOD: Dr. Mahesh S. Navale</span>
    </footer>

    <script>
        async function loadStudents() {
            try {
                const response = await fetch('api_update.php');
                const students = await response.json();

                let active = 0, inactive = 0;
                const grid = document.getElementById('studentGrid');
                grid.innerHTML = '';

                students.forEach(s => {
                    const isActive = s.status === 'Active';
                    if (isActive) active++; else inactive++;

                    const border   = isActive ? 'border-emerald-400/60 card-active' : 'border-rose-500/70 card-inactive';
                    const badge    = isActive
                        ? 'bg-emerald-500/20 text-emerald-300 border-emerald-400/60 shadow-[0_0_15px_rgba(16,185,129,0.5)]'
                        : 'bg-rose-500/20 text-rose-300 border-rose-400/60 shadow-[0_0_15px_rgba(244,63,94,0.5)]';
                    const dot      = isActive ? 'bg-emerald-400 animate-pulse' : 'bg-rose-500 animate-ping';

                    grid.innerHTML += `
                        <div class="bouncy-card bg-slate-900/85 backdrop-blur-xl border-2 ${border} rounded-3xl p-6">
                            <div class="flex justify-between items-start">
                                <div class="flex items-center space-x-3.5">
                                    <div class="bg-gradient-to-br from-blue-600 to-cyan-500 text-white font-black px-3.5 py-2.5 rounded-2xl shadow-[0_0_15px_rgba(59,130,246,0.5)] text-sm">
                                        ${s.pc_no}
                                    </div>
                                    <div>
                                        <h3 class="text-lg font-extrabold text-white">${s.name}</h3>
                                        <p class="text-xs text-slate-300">Roll No: <strong class="text-cyan-300">${s.roll_no}</strong> • ZPRN: ${s.zprn}</p>
                                    </div>
                                </div>
                                <span class="inline-flex items-center gap-2 border ${badge} text-xs font-extrabold px-3.5 py-1.5 rounded-full">
                                    <span class="h-2.5 w-2.5 rounded-full ${dot}"></span> ${s.status.toUpperCase()}
                                </span>
                            </div>

                            <div class="mt-5 bg-slate-950/90 border border-slate-800 rounded-2xl p-4 space-y-2.5 text-xs">
                                <div class="flex justify-between">
                                    <span class="text-slate-400 font-semibold">Active Window:</span>
                                    <span class="text-cyan-400 font-bold">${s.active_window}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-slate-400 font-semibold">Auto-Blocker / Alert:</span>
                                    <span class="${s.alert_msg !== 'None' ? 'text-amber-400 font-extrabold animate-pulse' : 'text-emerald-400 font-bold'}">${s.alert_msg}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-slate-400 font-semibold">Last Heartbeat:</span>
                                    <span class="text-slate-300">${s.last_seen}</span>
                                </div>
                            </div>
                        </div>
                    `;
                });

                document.getElementById('totalCount').innerText    = students.length;
                document.getElementById('activeCount').innerText   = active;
                document.getElementById('inactiveCount').innerText = inactive;
            } catch (err) {
                console.error("Failed to fetch student data:", err);
            }
        }

        loadStudents();
        setInterval(loadStudents, 3000);
    </script>
</body>
</html>