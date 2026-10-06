<?php
session_start();
if (!isset($_SESSION['logged_in'])) {
    header("Location: index.php");
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
    <title>ZCOER | Faculty Monitoring Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-slate-950 text-slate-100 min-h-screen font-sans flex flex-col justify-between">

    <header class="bg-slate-900 border-b border-slate-800 px-6 py-3.5">
        <div class="max-w-7xl mx-auto flex flex-wrap justify-between items-center gap-4">
            <div class="flex items-center space-x-3">
                <div class="bg-blue-600 text-white font-extrabold rounded-lg h-10 w-10 flex items-center justify-center">ZES</div>
                <div>
                    <h1 class="text-base font-bold text-white">ZEAL COLLEGE OF ENGINEERING & RESEARCH, PUNE-41</h1>
                    <p class="text-xs text-blue-400">Smart Digital Lab Monitoring System • Live Faculty Console</p>
                </div>
            </div>
            <div class="flex items-center space-x-3">
                <span class="text-xs bg-slate-800 border border-slate-700 text-emerald-400 px-3 py-1.5 rounded-full font-semibold">
                    ● Auto-Syncing Every 3s
                </span>
                <a href="logout.php" class="bg-rose-600/20 hover:bg-rose-600/30 border border-rose-500/40 text-rose-300 text-xs font-semibold px-3.5 py-1.5 rounded-lg">
                    <i class="fa-solid fa-power-off mr-1"></i> End Session
                </a>
            </div>
        </div>
    </header>

    <main class="max-w-7xl mx-auto w-full px-6 py-6 space-y-6 flex-grow">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-4 bg-slate-900 border border-slate-800 p-5 rounded-2xl">
            <div class="lg:col-span-4 flex items-center space-x-3">
                <div class="h-11 w-11 rounded-full bg-blue-500/20 border border-blue-500/40 flex items-center justify-center text-blue-400">
                    <i class="fa-solid fa-chalkboard-user"></i>
                </div>
                <div>
                    <span class="text-[11px] uppercase text-slate-400 font-semibold block">Logged-In Faculty</span>
                    <h2 class="text-base font-bold text-white"><?= htmlspecialchars($faculty) ?></h2>
                </div>
            </div>

            <div class="lg:col-span-4 flex items-center space-x-3">
                <div class="h-11 w-11 rounded-full bg-purple-500/20 border border-purple-500/40 flex items-center justify-center text-purple-400">
                    <i class="fa-solid fa-book-open-reader"></i>
                </div>
                <div>
                    <span class="text-[11px] uppercase text-slate-400 font-semibold block">Subject & Lab</span>
                    <h2 class="text-base font-bold text-white"><?= htmlspecialchars($subject) ?></h2>
                    <span class="text-xs text-blue-400"><?= htmlspecialchars($lab) ?></span>
                </div>
            </div>

            <div class="lg:col-span-4 grid grid-cols-3 gap-3">
                <div class="bg-slate-950 border border-slate-800 p-2.5 rounded-xl text-center">
                    <span class="text-xs text-slate-400 block">Total PCs</span>
                    <span id="totalCount" class="text-xl font-extrabold text-white">0</span>
                </div>
                <div class="bg-emerald-950/40 border border-emerald-500/30 p-2.5 rounded-xl text-center">
                    <span class="text-xs text-emerald-300 block">Active</span>
                    <span id="activeCount" class="text-xl font-extrabold text-emerald-400">0</span>
                </div>
                <div class="bg-rose-950/40 border border-rose-500/30 p-2.5 rounded-xl text-center">
                    <span class="text-xs text-rose-300 block">Inactive</span>
                    <span id="inactiveCount" class="text-xl font-extrabold text-rose-400">0</span>
                </div>
            </div>
        </div>

        <div class="bg-slate-900/70 border border-slate-800 px-5 py-3 rounded-xl flex flex-wrap justify-between items-center gap-2 text-xs">
            <div>
                <strong class="text-emerald-400"><i class="fa-solid fa-check-circle mr-1"></i>Whitelisted Academic Sites:</strong>
                <span class="text-slate-300 ml-1">docs.python.org • sqlite.org • developer.mozilla.org • localhost</span>
            </div>
            <div>
                <strong class="text-rose-400"><i class="fa-solid fa-ban mr-1"></i>Auto-Blocker Active:</strong>
                <span class="text-slate-300 ml-1">YouTube • Instagram • Facebook • Netflix • Steam</span>
            </div>
        </div>

        <div id="studentGrid" class="grid grid-cols-1 md:grid-cols-2 gap-6"></div>
    </main>

    <footer class="bg-slate-900 border-t border-slate-800 px-6 py-3 text-xs text-slate-400 flex justify-between">
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

                    const border = isActive ? 'border-emerald-500/40' : 'border-rose-500/60';
                    const badge  = isActive
                        ? 'bg-emerald-500/20 text-emerald-300 border-emerald-500/40'
                        : 'bg-rose-500/20 text-rose-300 border-rose-500/40';
                    const dot    = isActive ? 'bg-emerald-400' : 'bg-rose-500 animate-ping';

                    grid.innerHTML += `
                        <div class="bg-slate-900 border-2 ${border} rounded-2xl p-5 shadow-lg">
                            <div class="flex justify-between items-start">
                                <div class="flex items-center space-x-3">
                                    <div class="bg-slate-800 text-blue-400 font-bold px-3 py-2 rounded-xl border border-slate-700 text-sm">
                                        ${s.pc_no}
                                    </div>
                                    <div>
                                        <h3 class="text-base font-bold text-white">${s.name}</h3>
                                        <p class="text-xs text-slate-400">Roll No: <strong class="text-slate-200">${s.roll_no}</strong> • ZPRN: ${s.zprn}</p>
                                    </div>
                                </div>
                                <span class="inline-flex items-center gap-1.5 border ${badge} text-xs font-bold px-3 py-1 rounded-full">
                                    <span class="h-2 w-2 rounded-full ${dot}"></span> ${s.status.toUpperCase()}
                                </span>
                            </div>

                            <div class="mt-4 bg-slate-950 border border-slate-800 rounded-xl p-3.5 space-y-2 text-xs">
                                <div class="flex justify-between">
                                    <span class="text-slate-400">Active Window:</span>
                                    <span class="text-blue-400 font-semibold">${s.active_window}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-slate-400">Auto-Blocker / Alert:</span>
                                    <span class="${s.alert_msg !== 'None' ? 'text-amber-400 font-bold' : 'text-emerald-400'}">${s.alert_msg}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-slate-400">Last Heartbeat:</span>
                                    <span class="text-slate-400">${s.last_seen}</span>
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