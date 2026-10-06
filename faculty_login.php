<?php
session_start();
$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password = $_POST['password'] ?? '';
    if ($password === 'zcoer123') {
        $_SESSION['logged_in'] = true;
        $_SESSION['faculty']   = $_POST['faculty'];
        $_SESSION['subject']   = $_POST['subject'];
        $_SESSION['lab']       = $_POST['lab'];
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Invalid Faculty Password! Use default: zcoer123";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZCOER | Faculty Login Portal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        @keyframes floatCard {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-8px); }
        }
        .float-card { animation: floatCard 4s ease-in-out infinite; }
        .btn-glow {
            box-shadow: 0 0 25px rgba(59, 130, 246, 0.7);
            transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
        }
        .btn-glow:hover {
            transform: scale(1.04);
            box-shadow: 0 0 40px rgba(96, 165, 250, 1);
        }
    </style>
</head>
<body class="bg-slate-950 text-slate-100 min-h-screen flex flex-col justify-between font-sans relative overflow-x-hidden">

    <div class="fixed top-[-100px] left-[-100px] w-96 h-96 bg-blue-600/25 rounded-full blur-[130px] pointer-events-none"></div>
    <div class="fixed bottom-[-100px] right-[-100px] w-96 h-96 bg-indigo-600/25 rounded-full blur-[130px] pointer-events-none"></div>

    <header class="bg-slate-900/80 border-b border-blue-500/30 px-6 py-4 backdrop-blur-xl relative z-10 shadow-[0_4px_30px_rgba(59,130,246,0.15)]">
        <div class="max-w-7xl mx-auto flex flex-wrap justify-between items-center gap-4">
            <div class="flex items-center space-x-3">
                <div class="h-12 w-12 rounded-xl bg-gradient-to-br from-amber-400 via-blue-600 to-slate-900 p-0.5 shadow-[0_0_20px_rgba(59,130,246,0.6)] flex items-center justify-center">
                    <div class="h-full w-full bg-slate-950 rounded-xl flex flex-col items-center justify-center">
                        <span class="text-[10px] font-black text-amber-400">ZEAL</span>
                        <span class="text-[7px] font-bold text-cyan-400">ZCOER</span>
                    </div>
                </div>
                <div>
                    <h1 class="text-base sm:text-lg font-extrabold text-white">ZEAL COLLEGE OF ENGINEERING & RESEARCH, PUNE-41</h1>
                    <p class="text-xs text-cyan-400">Department of Electronics & Computer Engineering | Faculty Authentication</p>
                </div>
            </div>
            <a href="index.php" class="text-xs bg-slate-900 hover:bg-slate-800 px-4 py-2 rounded-xl border border-blue-500/40 text-cyan-300 font-bold shadow-[0_0_15px_rgba(59,130,246,0.25)] transition hover:scale-105">
                <i class="fa-solid fa-house mr-1"></i> Back to Home
            </a>
        </div>
    </header>

    <main class="max-w-md w-full mx-auto px-6 py-10 flex-grow flex items-center relative z-10">
        <div class="w-full bg-slate-900/85 backdrop-blur-xl border-2 border-blue-500/50 rounded-3xl p-8 shadow-[0_0_50px_rgba(37,99,235,0.35)] float-card">
            <div class="flex items-center space-x-3 mb-5">
                <div class="h-12 w-12 rounded-2xl bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center text-white text-xl shadow-[0_0_20px_rgba(59,130,246,0.8)]">
                    <i class="fa-solid fa-user-shield"></i>
                </div>
                <div>
                    <h3 class="text-2xl font-extrabold text-white">Faculty Portal Login</h3>
                    <p class="text-xs text-cyan-400">Launch real-time lab supervision console</p>
                </div>
            </div>

            <?php if ($error): ?>
                <div class="bg-rose-500/20 border border-rose-500 text-rose-300 text-xs p-3 rounded-xl mb-4 shadow-[0_0_15px_rgba(244,63,94,0.4)]">
                    <i class="fa-solid fa-circle-exclamation mr-1"></i> <?= htmlspecialchars($error) ?>
                </div>
            <?php endif; ?>

            <form method="POST" class="space-y-4">
                <div>
                    <label class="block text-xs font-bold uppercase text-cyan-300 mb-1">Select Faculty Name</label>
                    <select name="faculty" class="w-full bg-slate-950 border border-blue-500/40 focus:border-cyan-400 rounded-xl px-3.5 py-2.5 text-sm text-white outline-none">
                        <option value="Prof. Sana A. Metkari">Prof. Sana A. Metkari (Project Guide)</option>
                        <option value="Dr. Mahesh S. Navale">Dr. Mahesh S. Navale (HOD - E&CE)</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase text-cyan-300 mb-1">Select Subject</label>
                    <select name="subject" class="w-full bg-slate-950 border border-blue-500/40 focus:border-cyan-400 rounded-xl px-3.5 py-2.5 text-sm text-white outline-none">
                        <option value="Python Programming & PBL Lab">Python Programming & PBL Lab</option>
                        <option value="Database Management Systems Lab">Database Management Systems Lab</option>
                        <option value="Data Structures & Algorithms Lab">Data Structures & Algorithms Lab</option>
                        <option value="Computer Networks Lab">Computer Networks Lab</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase text-cyan-300 mb-1">Select Lab Room</label>
                    <select name="lab" class="w-full bg-slate-950 border border-blue-500/40 focus:border-cyan-400 rounded-xl px-3.5 py-2.5 text-sm text-white outline-none">
                        <option value="EC-Lab-01 (Main Server)">EC-Lab-01 (Main Server)</option>
                        <option value="EC-Lab-02 (Systems Lab)">EC-Lab-02 (Systems Lab)</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase text-cyan-300 mb-1">Portal Password</label>
                    <input type="password" name="password" value="zcoer123" required
                        class="w-full bg-slate-950 border border-blue-500/40 focus:border-cyan-400 rounded-xl px-3.5 py-2.5 text-sm text-white outline-none">
                </div>
                <button type="submit" class="btn-glow w-full bg-gradient-to-r from-blue-600 via-indigo-600 to-cyan-500 text-white font-extrabold py-3.5 rounded-2xl mt-2">
                    Launch Live Faculty Dashboard <i class="fa-solid fa-arrow-right ml-1"></i>
                </button>
            </form>
        </div>
    </main>

    <footer class="bg-slate-900/90 border-t border-blue-500/20 px-6 py-4 text-xs text-slate-400 text-center relative z-10">
        <strong>PBL Team:</strong> Aryan Thombre (EC2204) • Gayatri Adgaonkar (EC2205) • Rutuja Kadam (EC2203) • Yash Kotkar (EC2223)
    </footer>
</body>
</html>