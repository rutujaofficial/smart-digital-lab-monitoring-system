CREATE DATABASE IF NOT EXISTS zcoer_lab_db;
USE zcoer_lab_db;

CREATE TABLE IF NOT EXISTS students (
    roll_no VARCHAR(20) PRIMARY KEY,
    zprn VARCHAR(30) NOT NULL,
    name VARCHAR(100) NOT NULL,
    pc_no VARCHAR(20) NOT NULL,
    status VARCHAR(20) DEFAULT 'Inactive',
    active_window VARCHAR(255) DEFAULT 'Not Connected',
    alert_msg VARCHAR(255) DEFAULT 'None',
    last_seen TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO students (roll_no, zprn, name, pc_no, status, active_window, alert_msg) VALUES
('EC2204', '125UEC1125', 'Aryan Thombre', 'PC-01', 'Active', 'VS Code - app.py', 'None'),
('EC2205', '125UEC1110', 'Gayatri Adgaonkar', 'PC-02', 'Inactive', 'Windows Desktop (Idle)', 'Idle > 60 secs'),
('EC2203', '125UEC1152', 'Rutuja Kadam', 'PC-03', 'Active', 'Chrome - docs.python.org', 'None'),
('EC2223', '125UEC1001', 'Yash Kotkar', 'PC-04', 'Active', 'phpMyAdmin - MySQL', 'Blocked YouTube.com!')
ON DUPLICATE KEY UPDATE name=VALUES(name);