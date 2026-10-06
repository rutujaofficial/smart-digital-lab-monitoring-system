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
    <title>ZCOER | Smart Digital Lab Monitoring System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-slate-900 text-slate-100 min-h-screen flex flex-col justify-between font-sans">

    <header class="bg-slate-800/90 border-b border-slate-700 px-6 py-4">
        <div class="max-w-7xl mx-auto flex flex-wrap justify-between items-center gap-4">
            <div class="flex items-center space-x-3">
                <div class="bg-blue-600 text-white font-extrabold rounded-lg h-11 w-11 flex items-center justify-center text-lg shadow">ZES</div>
                <div>
                    <h1 class="text-base sm:text-lg font-bold text-white">ZEAL COLLEGE OF ENGINEERING & RESEARCH, PUNE-41</h1>
                    <p class="text-xs text-blue-400">Department of Electronics & Computer Engineering | NAAC A+ Accredited</p>
                </div>
            </div>
            <div class="flex items-center space-x-2 bg-slate-900 px-3.5 py-1.5 rounded-full border border-slate-700 text-xs text-emerald-400 font-semibold">
                <span class="h-2.5 w-2.5 rounded-full bg-emerald-400 animate-pulse"></span>
                <span>XAMPP Apache & MySQL: Online</span>
            </div>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-6 py-10 grid grid-cols-1 lg:grid-cols-12 gap-10 items-center flex-grow">
        <div class="lg:col-span-7 space-y-5">
            <span class="inline-flex items-center gap-2 bg-blue-500/10 border border-blue-500/30 text-blue-400 px-3 py-1 rounded-full text-xs font-semibold">
                <i class="fa-solid fa-shield-halved"></i> Automated Lab Supervision System
            </span>
            <h2 class="text-4xl sm:text-5xl font-extrabold text-white leading-tight">
                Smart Digital Lab <br><span class="text-blue-400">Monitoring System</span>
            </h2>
            <p class="text-slate-300 text-sm sm:text-base leading-relaxed">
                Real-time computer laboratory supervision system designed to track student active/inactive status, enforce academic website whitelisting, and block unauthorized activities automatically.
            </p>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 pt-2">
                <div class="bg-slate-800/70 border border-slate-700 p-4 rounded-xl">
                    <div class="text-emerald-400 text-xs font-bold uppercase">Activity Tracking</div>
                    <p class="text-xl font-bold text-white mt-1">Real-Time</p>
                    <p class="text-xs text-slate-400">Mouse & Keyboard Hook</p>
                </div>
                <div class="bg-slate-800/70 border border-slate-700 p-4 rounded-xl">
                    <div class="text-blue-400 text-xs font-bold uppercase">Web Policy</div>
                    <p class="text-xl font-bold text-white mt-1">Whitelisted</p>
                    <p class="text-xs text-slate-400">Academic Domains Only</p>
                </div>
                <div class="bg-slate-800/70 border border-slate-700 p-4 rounded-xl">
                    <div class="text-rose-400 text-xs font-bold uppercase">Auto-Blocker</div>
                    <p class="text-xl font-bold text-white mt-1">Active</p>
                    <p class="text-xs text-slate-400">Closes Games & Socials</p>
                </div>
            </div>
        </div>

        <div class="lg:col-span-5 bg-slate-800 border border-slate-700 rounded-2xl p-7 shadow-2xl">
            <h3 class="text-xl font-bold text-white mb-1">Faculty Portal Login</h3>
            <p class="text-xs text-slate-400 mb-5">Select your lab session details to launch the live dashboard</p>

            <?php if ($error): ?>
                <div class="bg-rose-500/20 border border-rose-500/40 text-rose-300 text-xs p-3 rounded-lg mb-4">
                    <?= htmlspecialchars($error) ?>
                </div>
            <?php endif; ?>

            <form method="POST" class="space-y-4">
                <div>
                    <label class="block text-xs font-semibold uppercase text-slate-400 mb-1">Select Faculty Name</label>
                    <select name="faculty" class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3.5 py-2.5 text-sm text-white">
                        <option value="Prof. Sana A. Metkari">Prof. Sana A. Metkari (Project Guide)</option>
                        <option value="Dr. Mahesh S. Navale">Dr. Mahesh S. Navale (HOD - E&CE)</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-semibold uppercase text-slate-400 mb-1">Select Subject</label>
                    <select name="subject" class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3.5 py-2.5 text-sm text-white">
                        <option value="Python Programming & PBL Lab">Python Programming & PBL Lab</option>
                        <option value="Database Management Systems Lab">Database Management Systems Lab</option>
                        <option value="Data Structures & Algorithms Lab">Data Structures & Algorithms Lab</option>
                        <option value="Computer Networks Lab">Computer Networks Lab</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-semibold uppercase text-slate-400 mb-1">Select Lab Room</label>
                    <select name="lab" class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3.5 py-2.5 text-sm text-white">
                        <option value="EC-Lab-01 (Main Server)">EC-Lab-01 (Main Server)</option>
                        <option value="EC-Lab-02 (Systems Lab)">EC-Lab-02 (Systems Lab)</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-semibold uppercase text-slate-400 mb-1">Portal Password</label>
                    <input type="password" name="password" value="zcoer123" required
                        class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3.5 py-2.5 text-sm text-white">
                </div>
                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-500 text-white font-bold py-3 rounded-lg shadow-lg transition">
                    Launch Faculty Dashboard <i class="fa-solid fa-arrow-right ml-1"></i>
                </button>
            </form>
        </div>
    </main>

    <footer class="bg-slate-950 border-t border-slate-800 px-6 py-4 text-xs text-slate-400">
        <div class="max-w-7xl mx-auto flex flex-col sm:flex-row justify-between items-center gap-2">
            <span><strong>PBL Team:</strong> Aryan Thombre (EC2204) • Gayatri Adgaonkar (EC2205) • Rutuja Kadam (EC2203) • Yash Kotkar (EC2223)</span>
            <span><strong>Guide:</strong> Prof. Sana A. Metkari | <strong>HOD:</strong> Dr. Mahesh S. Navale</span>
        </div>
    </footer>
</body>
</html>