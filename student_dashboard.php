<?php
session_start();

if (isset($_GET['end_session'])) {
    unset($_SESSION['student_logged_in']);
    header("Location: student_dashboard.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['start_student_session'])) {
    $_SESSION['student_logged_in'] = true;
    $_SESSION['s_name'] = $_POST['s_name'];
    $_SESSION['s_roll'] = $_POST['s_roll'];
    $_SESSION['s_zprn'] = $_POST['s_zprn'];
    $_SESSION['s_pc']   = $_POST['s_pc'];
    header("Location: student_dashboard.php");
    exit;
}

$logged_in = $_SESSION['student_logged_in'] ?? false;
$s_name    = $_SESSION['s_name'] ?? 'Rutuja Kadam';
$s_roll    = $_SESSION['s_roll'] ?? 'EC2203';
$s_zprn    = $_SESSION['s_zprn'] ?? '125UEC1152';
$s_pc      = $_SESSION['s_pc']   ?? 'PC-03';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZCOER | Student Lab Workstation Portal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        .bouncy-btn {
            transition: all 0.35s cubic-bezier(0.34, 1.56, 0.64, 1);
        }
        .bouncy-btn:hover {
            transform: translateY(-6px) scale(1.03);
        }
        .glow-allowed:hover {
            box-shadow: 0 0 25px rgba(16, 185, 129, 0.5);
            border-color: rgba(52, 211, 153, 0.9);
        }
        .glow-blocked:hover {
            box-shadow: 0 0 25px rgba(244, 63, 94, 0.55);
            border-color: rgba(251, 113, 133, 0.9);
        }
    </style>
</head>
<body class="bg-slate-950 text-slate-100 min-h-screen font-sans flex flex-col justify-between relative overflow-x-hidden">

    <div class="fixed top-[-120px] left-[-120px] w-96 h-96 bg-emerald-600/20 rounded-full blur-[130px] pointer-events-none"></div>
    <div class="fixed bottom-[-120px] right-[-120px] w-96 h-96 bg-blue-600/20 rounded-full blur-[130px] pointer-events-none"></div>

    <header class="bg-slate-900/80 border-b border-emerald-500/30 px-6 py-3.5 backdrop-blur-xl sticky top-0 z-50 shadow-[0_4px_25px_rgba(16,185,129,0.15)]">
        <div class="max-w-7xl mx-auto flex flex-wrap justify-between items-center gap-4">
            <div class="flex items-center space-x-3">
                <div class="h-11 w-11 rounded-xl bg-gradient-to-br from-amber-400 via-emerald-600 to-slate-900 p-0.5 shadow-[0_0_20px_rgba(16,185,129,0.6)] flex items-center justify-center">
                    <div class="h-full w-full bg-slate-950 rounded-xl flex flex-col items-center justify-center">
                        <span class="text-[10px] font-black text-amber-400">ZEAL</span>
                        <span class="text-[7px] font-bold text-emerald-400">ZCOER</span>
                    </div>
                </div>
                <div>
                    <h1 class="text-base font-extrabold text-white">ZEAL COLLEGE OF ENGINEERING & RESEARCH, PUNE-41</h1>
                    <p class="text-xs text-emerald-400">Smart Digital Lab • Student Workstation Dashboard</p>
                </div>
            </div>
            <div class="flex items-center space-x-3">
                <a href="index.php" class="text-xs bg-slate-800 hover:bg-slate-700 border border-emerald-500/40 text-emerald-300 px-3.5 py-1.5 rounded-xl font-bold transition hover:scale-105">
                    <i class="fa-solid fa-house mr-1"></i> Home
                </a>
                <?php if ($logged_in): ?>
                    <a href="student_dashboard.php?end_session=1" class="bg-rose-600/20 hover:bg-rose-600/40 border border-rose-500/50 text-rose-300 text-xs font-bold px-3.5 py-1.5 rounded-xl shadow-[0_0_15px_rgba(244,63,94,0.3)] transition hover:scale-105">
                        <i class="fa-solid fa-power-off mr-1"></i> Leave Lab PC
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </header>

    <?php if (!$logged_in): ?>
    <main class="max-w-md w-full mx-auto px-6 py-10 flex-grow flex items-center relative z-10">
        <div class="w-full bg-slate-900/85 backdrop-blur-xl border-2 border-emerald-500/50 rounded-3xl p-8 shadow-[0_0_50px_rgba(16,185,129,0.3)]">
            <div class="flex items-center space-x-3 mb-5">
                <div class="h-12 w-12 rounded-2xl bg-gradient-to-br from-emerald-500 to-teal-600 flex items-center justify-center text-white text-xl shadow-[0_0_20px_rgba(16,185,129,0.8)]">
                    <i class="fa-solid fa-user-graduate"></i>
                </div>
                <div>
                    <h2 class="text-2xl font-extrabold text-white">Student Lab Check-In</h2>
                    <p class="text-xs text-emerald-400">Register your PC for live lab supervision</p>
                </div>
            </div>

            <form method="POST" class="space-y-4">
                <input type="hidden" name="start_student_session" value="1">
                <div>
                    <label class="block text-xs font-bold uppercase text-emerald-300 mb-1">Quick Select Team Member</label>
                    <select onchange="fillStudent(this.value)" class="w-full bg-slate-950 border border-emerald-500/40 rounded-xl px-3 py-2.5 text-xs text-emerald-300 font-semibold">
                        <option value="Rutuja Kadam|EC2203|125UEC1152|PC-03">Rutuja Kadam (EC2203 - PC-03)</option>
                        <option value="Aryan Thombre|EC2204|125UEC1125|PC-01">Aryan Thombre (EC2204 - PC-01)</option>
                        <option value="Gayatri Adgaonkar|EC2205|125UEC1110|PC-02">Gayatri Adgaonkar (EC2205 - PC-02)</option>
                        <option value="Yash Kotkar|EC2223|125UEC1001|PC-04">Yash Kotkar (EC2223 - PC-04)</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase text-slate-300 mb-1">Student Full Name</label>
                    <input type="text" id="s_name" name="s_name" value="Rutuja Kadam" required class="w-full bg-slate-950 border border-emerald-500/40 rounded-xl px-3.5 py-2 text-sm text-white">
                </div>
                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block text-xs font-bold uppercase text-slate-300 mb-1">Roll Number</label>
                        <input type="text" id="s_roll" name="s_roll" value="EC2203" required class="w-full bg-slate-950 border border-emerald-500/40 rounded-xl px-3.5 py-2 text-sm text-white">
                    </div>
                    <div>
                        <label class="block text-xs font-bold uppercase text-slate-300 mb-1">PC Number</label>
                        <input type="text" id="s_pc" name="s_pc" value="PC-03" required class="w-full bg-slate-950 border border-emerald-500/40 rounded-xl px-3.5 py-2 text-sm text-white">
                    </div>
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase text-slate-300 mb-1">ZPRN Number</label>
                    <input type="text" id="s_zprn" name="s_zprn" value="125UEC1152" required class="w-full bg-slate-950 border border-emerald-500/40 rounded-xl px-3.5 py-2 text-sm text-white">
                </div>
                <button type="submit" class="bouncy-btn w-full bg-gradient-to-r from-emerald-600 via-teal-500 to-emerald-500 text-white font-extrabold py-3.5 rounded-2xl shadow-[0_0_25px_rgba(16,185,129,0.6)]">
                    Start Monitored Lab Session <i class="fa-solid fa-play ml-1"></i>
                </button>
            </form>
        </div>
    </main>
    <script>
        function fillStudent(val) {
            const [name, roll, zprn, pc] = val.split('|');
            document.getElementById('s_name').value = name;
            document.getElementById('s_roll').value = roll;
            document.getElementById('s_zprn').value = zprn;
            document.getElementById('s_pc').value   = pc;
        }
    </script>

    <?php else: ?>
    <main class="max-w-7xl mx-auto w-full px-6 py-6 space-y-6 flex-grow relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-4 bg-slate-900/85 backdrop-blur-xl border border-emerald-500/40 p-5 rounded-3xl items-center shadow-[0_0_30px_rgba(16,185,129,0.2)]">
            <div class="lg:col-span-5 flex items-center space-x-4">
                <div class="bg-gradient-to-br from-emerald-500 to-teal-600 text-white font-black px-4 py-3 rounded-2xl text-base shadow-[0_0_20px_rgba(16,185,129,0.6)]">
                    <?= htmlspecialchars($s_pc) ?>
                </div>
                <div>
                    <h2 class="text-lg font-extrabold text-white"><?= htmlspecialchars($s_name) ?></h2>
                    <p class="text-xs text-slate-300">Roll No: <strong class="text-emerald-300"><?= htmlspecialchars($s_roll) ?></strong> • ZPRN: <?= htmlspecialchars($s_zprn) ?></p>
                </div>
            </div>

            <div class="lg:col-span-4 bg-slate-950/90 border border-slate-800 p-3.5 rounded-2xl text-xs space-y-1">
                <div class="flex justify-between">
                    <span class="text-slate-400">Current Activity:</span>
                    <span id="currentWin" class="text-cyan-400 font-bold">Student Lab Portal</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-slate-400">Policy Alert:</span>
                    <span id="currentAlert" class="text-emerald-400 font-bold">None</span>
                </div>
            </div>

            <div class="lg:col-span-3 flex justify-end">
                <div id="statusBadge" class="inline-flex items-center gap-2 bg-emerald-500/20 border border-emerald-400/60 text-emerald-300 px-4 py-2.5 rounded-2xl font-extrabold text-sm shadow-[0_0_20px_rgba(16,185,129,0.4)]">
                    <span id="statusDot" class="h-2.5 w-2.5 rounded-full bg-emerald-400 animate-ping"></span>
                    <span id="statusText">ACTIVE (Working)</span>
                </div>
            </div>
        </div>

        <div id="violationBanner" class="hidden bg-rose-950/90 border-2 border-rose-500 text-rose-200 p-5 rounded-3xl flex items-center justify-between shadow-[0_0_40px_rgba(244,63,94,0.6)] animate-bounce">
            <div class="flex items-center space-x-3">
                <i class="fa-solid fa-triangle-exclamation text-rose-400 text-3xl"></i>
                <div>
                    <h4 class="font-extrabold text-base text-white">SECURITY POLICY VIOLATION BLOCKED!</h4>
                    <p id="violationText" class="text-xs text-rose-200">Unauthorized website access attempt has been blocked and reported to the Faculty Dashboard.</p>
                </div>
            </div>
            <button onclick="clearAlert()" class="bg-slate-900 hover:bg-slate-800 text-xs font-bold px-4 py-2 rounded-xl border border-rose-400 text-white">
                Return to Academic Work
            </button>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <div class="bg-slate-900/80 backdrop-blur-xl border border-emerald-500/40 rounded-3xl p-6 space-y-4 shadow-[0_0_25px_rgba(16,185,129,0.15)]">
                <div class="flex items-center justify-between">
                    <h3 class="text-base font-extrabold text-white"><i class="fa-solid fa-circle-check text-emerald-400 mr-2"></i>Whitelisted Academic Portals</h3>
                    <span class="text-[11px] bg-emerald-500/20 border border-emerald-400/40 text-emerald-300 px-3 py-1 rounded-full font-bold">Allowed</span>
                </div>
                <p class="text-xs text-slate-300">Click any academic resource below to update your live active window on the Faculty Dashboard:</p>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3.5">
                    <button onclick="setWorkspace('Chrome - docs.python.org')" class="bouncy-btn glow-allowed bg-slate-950 border border-emerald-500/30 p-4 rounded-2xl text-left">
                        <div class="text-sm font-extrabold text-emerald-400"><i class="fa-brands fa-python mr-1.5"></i>Python 3 Docs</div>
                        <div class="text-[11px] text-slate-400 mt-0.5">docs.python.org</div>
                    </button>
                    <button onclick="setWorkspace('VS Code - student_project.py')" class="bouncy-btn glow-allowed bg-slate-950 border border-blue-500/30 p-4 rounded-2xl text-left">
                        <div class="text-sm font-extrabold text-cyan-400"><i class="fa-solid fa-code mr-1.5"></i>VS Code IDE</div>
                        <div class="text-[11px] text-slate-400 mt-0.5">Coding Environment</div>
                    </button>
                    <button onclick="setWorkspace('Chrome - developer.mozilla.org')" class="bouncy-btn glow-allowed bg-slate-950 border border-purple-500/30 p-4 rounded-2xl text-left">
                        <div class="text-sm font-extrabold text-purple-400"><i class="fa-solid fa-globe mr-1.5"></i>MDN Web Docs</div>
                        <div class="text-[11px] text-slate-400 mt-0.5">HTML / CSS / JS Docs</div>
                    </button>
                    <button onclick="setWorkspace('phpMyAdmin - zcoer_lab_db')" class="bouncy-btn glow-allowed bg-slate-950 border border-amber-500/30 p-4 rounded-2xl text-left">
                        <div class="text-sm font-extrabold text-amber-400"><i class="fa-solid fa-database mr-1.5"></i>MySQL Workbench</div>
                        <div class="text-[11px] text-slate-400 mt-0.5">localhost/phpmyadmin</div>
                    </button>
                </div>
            </div>

            <div class="bg-slate-900/80 backdrop-blur-xl border border-rose-500/40 rounded-3xl p-6 space-y-4 shadow-[0_0_25px_rgba(244,63,94,0.15)]">
                <div class="flex items-center justify-between">
                    <h3 class="text-base font-extrabold text-white"><i class="fa-solid fa-ban text-rose-400 mr-2"></i>Restricted Sites (Test Auto-Blocker)</h3>
                    <span class="text-[11px] bg-rose-500/20 border border-rose-400/40 text-rose-300 px-3 py-1 rounded-full font-bold">Auto-Blocked</span>
                </div>
                <p class="text-xs text-slate-300">Click any restricted site below to trigger instant auto-blocking and live Faculty Dashboard alerts:</p>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3.5">
                    <button onclick="triggerBlock('YOUTUBE')" class="bouncy-btn glow-blocked bg-slate-950 border border-rose-500/30 p-4 rounded-2xl text-left">
                        <div class="text-sm font-extrabold text-rose-400"><i class="fa-brands fa-youtube mr-1.5"></i>Open YouTube</div>
                        <div class="text-[11px] text-slate-400 mt-0.5">Video Streaming (Blocked)</div>
                    </button>
                    <button onclick="triggerBlock('INSTAGRAM')" class="bouncy-btn glow-blocked bg-slate-950 border border-pink-500/30 p-4 rounded-2xl text-left">
                        <div class="text-sm font-extrabold text-pink-400"><i class="fa-brands fa-instagram mr-1.5"></i>Open Instagram</div>
                        <div class="text-[11px] text-slate-400 mt-0.5">Social Media (Blocked)</div>
                    </button>
                    <button onclick="triggerBlock('NETFLIX')" class="bouncy-btn glow-blocked bg-slate-950 border border-red-500/30 p-4 rounded-2xl text-left">
                        <div class="text-sm font-extrabold text-red-400"><i class="fa-solid fa-film mr-1.5"></i>Open Netflix</div>
                        <div class="text-[11px] text-slate-400 mt-0.5">Entertainment (Blocked)</div>
                    </button>
                    <button onclick="triggerBlock('STEAM GAMES')" class="bouncy-btn glow-blocked bg-slate-950 border border-amber-500/30 p-4 rounded-2xl text-left">
                        <div class="text-sm font-extrabold text-amber-400"><i class="fa-solid fa-gamepad mr-1.5"></i>Open Steam / Games</div>
                        <div class="text-[11px] text-slate-400 mt-0.5">Gaming Portal (Blocked)</div>
                    </button>
                </div>
            </div>
        </div>
    </main>

    <script>
        let lastInput = Date.now();
        let activeWindow = "Chrome - Student Lab Portal";
        let alertMsg = "None";

        function recordActivity() { lastInput = Date.now(); }
        window.addEventListener('mousemove', recordActivity);
        window.addEventListener('keydown', recordActivity);
        window.addEventListener('click', recordActivity);

        function setWorkspace(title) {
            recordActivity();
            activeWindow = title;
            document.getElementById('currentWin').innerText = title;
            sendHeartbeat();
        }

        function triggerBlock(site) {
            recordActivity();
            activeWindow = "Blocked Attempt: " + site;
            alertMsg = "Blocked unauthorized tab: " + site;
            document.getElementById('currentWin').innerText = activeWindow;
            document.getElementById('currentAlert').innerText = alertMsg;
            document.getElementById('currentAlert').className = "text-amber-400 font-extrabold";
            document.getElementById('violationBanner').classList.remove('hidden');
            document.getElementById('violationText').innerText = site + " was automatically closed and reported to Prof. Sana A. Metkari's Faculty Dashboard!";
            sendHeartbeat();
        }

        function clearAlert() {
            alertMsg = "None";
            activeWindow = "Chrome - docs.python.org";
            document.getElementById('currentWin').innerText = activeWindow;
            document.getElementById('currentAlert').innerText = "None";
            document.getElementById('currentAlert').className = "text-emerald-400 font-bold";
            document.getElementById('violationBanner').classList.add('hidden');
            sendHeartbeat();
        }

        async function sendHeartbeat() {
            const idleSeconds = (Date.now() - lastInput) / 1000;
            const status = idleSeconds > 15 ? "Inactive" : "Active";

            const badge = document.getElementById('statusBadge');
            const dot   = document.getElementById('statusDot');
            const text  = document.getElementById('statusText');

            if (status === "Active") {
                badge.className = "inline-flex items-center gap-2 bg-emerald-500/20 border border-emerald-400/60 text-emerald-300 px-4 py-2.5 rounded-2xl font-extrabold text-sm shadow-[0_0_20px_rgba(16,185,129,0.4)]";
                dot.className   = "h-2.5 w-2.5 rounded-full bg-emerald-400 animate-ping";
                text.innerText  = "ACTIVE (Working)";
            } else {
                badge.className = "inline-flex items-center gap-2 bg-rose-500/20 border border-rose-400/60 text-rose-300 px-4 py-2.5 rounded-2xl font-extrabold text-sm shadow-[0_0_20px_rgba(244,63,94,0.5)]";
                dot.className   = "h-2.5 w-2.5 rounded-full bg-rose-500 animate-ping";
                text.innerText  = "INACTIVE (Idle > 15s)";
            }

            try {
                await fetch('api_update.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({
                        roll_no: "<?= addslashes($s_roll) ?>",
                        zprn: "<?= addslashes($s_zprn) ?>",
                        name: "<?= addslashes($s_name) ?>",
                        pc_no: "<?= addslashes($s_pc) ?>",
                        status: status,
                        active_window: activeWindow,
                        alert_msg: alertMsg
                    })
                });
            } catch (e) {
                console.error("Sync error:", e);
            }
        }

        sendHeartbeat();
        setInterval(sendHeartbeat, 3000);
    </script>
    <?php endif; ?>

    <footer class="bg-slate-900/90 border-t border-emerald-500/20 px-6 py-3 text-xs text-slate-400 text-center relative z-10">
        ZCOER Smart Digital Lab Monitoring System • Student Workstation Client
    </footer>
</body>
</html>