import time
import threading
import tkinter as tk
from tkinter import messagebox
import requests
import pygetwindow as gw
from pynput import mouse, keyboard

BLOCKED_KEYWORDS = ["youtube", "instagram", "facebook", "netflix", "steam", "valorant", "poki"]
last_input_time = time.time()
monitoring_active = False

def on_user_input(*args):
    global last_input_time
    last_input_time = time.time()

# Listen to Mouse & Keyboard activity in background
mouse.Listener(on_move=on_user_input, on_click=on_user_input).start()
keyboard.Listener(on_press=on_user_input).start()

def monitor_loop(api_url, roll_no, zprn, name, pc_no, status_label):
    global monitoring_active
    last_alert = "None"

    while monitoring_active:
        # 1. Check Idle Time (Marks Inactive if no input for 20 seconds)
        idle_seconds = time.time() - last_input_time
        status = "Inactive" if idle_seconds > 20 else "Active"

        # 2. Check Currently Active Window
        active_win = gw.getActiveWindow()
        win_title = active_win.title if (active_win and active_win.title) else "Windows Desktop"

        # 3. Auto-Block Unauthorized Websites/Apps
        for word in BLOCKED_KEYWORDS:
            if word in win_title.lower():
                last_alert = f"Blocked unauthorized tab: {word.upper()}"
                try:
                    active_win.close()
                except Exception:
                    pass

        # 4. Send Live Status to XAMPP PHP/MySQL Server
        payload = {
            "roll_no": roll_no,
            "zprn": zprn,
            "name": name,
            "pc_no": pc_no,
            "status": status,
            "active_window": win_title[:65],
            "alert_msg": last_alert
        }

        try:
            requests.post(api_url, json=payload, timeout=3)
            status_label.config(
                text=f"Connected | Status: {status}",
                fg="#34d399" if status == "Active" else "#fb7185"
            )
        except Exception:
            status_label.config(text="Server Unreachable (Check XAMPP)", fg="#fbbf24")

        time.sleep(4)

def start_session():
    global monitoring_active
    api_url = entry_server.get().strip()
    roll    = entry_roll.get().strip()
    zprn    = entry_zprn.get().strip()
    name    = entry_name.get().strip()
    pc      = entry_pc.get().strip()

    if not (api_url and roll and name and pc):
        messagebox.showwarning("Missing Info", "Please fill in all fields.")
        return

    monitoring_active = True
    btn_start.config(state="disabled", text="Monitoring Active in Background...")
    threading.Thread(
        target=monitor_loop,
        args=(api_url, roll, zprn, name, pc, lbl_status),
        daemon=True
    ).start()

# Tkinter Student Login Window
root = tk.Tk()
root.title("ZCOER Smart Lab - Student Agent")
root.geometry("400x390")
root.configure(bg="#0f172a")

tk.Label(root, text="ZCOER SMART LAB AGENT", font=("Arial", 13, "bold"), bg="#0f172a", fg="#38bdf8").pack(pady=10)

tk.Label(root, text="Server API URL:", bg="#0f172a", fg="#94a3b8").pack()
entry_server = tk.Entry(root, width=42)
entry_server.insert(0, "http://localhost/smart_lab/api_update.php")
entry_server.pack(pady=3)

tk.Label(root, text="Student Full Name:", bg="#0f172a", fg="white").pack()
entry_name = tk.Entry(root, width=32)
entry_name.insert(0, "Rutuja Kadam")
entry_name.pack(pady=3)

tk.Label(root, text="Roll Number:", bg="#0f172a", fg="white").pack()
entry_roll = tk.Entry(root, width=32)
entry_roll.insert(0, "EC2203")
entry_roll.pack(pady=3)

tk.Label(root, text="ZPRN Number:", bg="#0f172a", fg="white").pack()
entry_zprn = tk.Entry(root, width=32)
entry_zprn.insert(0, "125UEC1152")
entry_zprn.pack(pady=3)

tk.Label(root, text="Lab PC Number:", bg="#0f172a", fg="white").pack()
entry_pc = tk.Entry(root, width=32)
entry_pc.insert(0, "PC-03")
entry_pc.pack(pady=3)

btn_start = tk.Button(
    root,
    text="Start Monitored Lab Session",
    bg="#10b981",
    fg="white",
    font=("Arial", 10, "bold"),
    command=start_session
)
btn_start.pack(pady=14)

lbl_status = tk.Label(root, text="Status: Waiting to Login", bg="#0f172a", fg="#94a3b8")
lbl_status.pack()

root.mainloop()