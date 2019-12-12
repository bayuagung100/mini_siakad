-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Des 2019 pada 16.23
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mini_siakad`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `attendance`
--

CREATE TABLE `attendance` (
  `attendance_id` int(11) NOT NULL,
  `attendance_user_id` int(11) NOT NULL,
  `attendance_schedule_id` int(11) NOT NULL,
  `attendance_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `attendance_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `courses`
--

CREATE TABLE `courses` (
  `course_id` int(11) NOT NULL,
  `course_code` varchar(15) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `course_dosen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `courses`
--

INSERT INTO `courses` (`course_id`, `course_code`, `course_name`, `course_dosen`) VALUES
(1, 'A301', 'Validasi', '001'),
(4, 'A302', 'Validasi Lanjut', '001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`) VALUES
(1, 'admin'),
(2, 'dosen'),
(3, 'mahasiswa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `schedule`
--

CREATE TABLE `schedule` (
  `schedule_id` int(11) NOT NULL,
  `schedule_course_id` int(11) NOT NULL,
  `schedule_user_id` varchar(100) NOT NULL,
  `schedule_start_at` varchar(20) NOT NULL,
  `schedule_end_at` varchar(20) NOT NULL,
  `schedule_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `schedule`
--

INSERT INTO `schedule` (`schedule_id`, `schedule_course_id`, `schedule_user_id`, `schedule_start_at`, `schedule_end_at`, `schedule_date`) VALUES
(3, 1, '10,14', '10:15 PM', '11:15 PM', '2019-12-12'),
(4, 4, '10', '10:15 PM', '11:15 PM', '2019-12-12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_code` varchar(15) NOT NULL COMMENT 'NIM/Kode Dosen',
  `user_name` varchar(64) NOT NULL,
  `user_dob` date NOT NULL,
  `user_address` text NOT NULL,
  `user_email` varchar(64) NOT NULL,
  `user_phone_number` varchar(20) NOT NULL,
  `user_gender` enum('L','P') NOT NULL,
  `user_image` varchar(64) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_role_id` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`user_id`, `user_code`, `user_name`, `user_dob`, `user_address`, `user_email`, `user_phone_number`, `user_gender`, `user_image`, `user_password`, `user_role_id`) VALUES
(2, 'admin', 'Administrator', '1998-09-14', 'Kampus', 'admin@gmail.com', '089634372389', 'L', '', '$2y$10$f9RvyP8c9MRIB3wufdH8vu0JZbOGgbvahCTczpGANTJVnKi/tzDje', 1),
(8, '001', 'Imam Sutanto', '2019-12-12', 'Citra Raya', 'imam@gmail.com', '089634372389', 'L', 'avatar.png', '$2y$10$RvlabKnzVjUXnY87ky3SIuR5s.ILbVGJ8R.AWR9GQaW36LTwtPQ1i', 2),
(10, '20160801257', 'Bayu Agung Gumelar', '1998-09-14', 'Kemuning Permai', 'bayuagung100@gmail.com', '089634372389', 'L', 'cv.jpg', '$2y$10$VTN4spRJWDWoR6ohHflYsO7CKfY93BNNqda2ak/1RIO0PBVXUq96a', 3),
(14, '20160801172', 'Resi Dwi Thawasa', '1998-02-27', 'Citra Raya', 'resi@gmail.com', '089634372389', 'L', 'avatar.png', '$2y$10$z7g5YNna/13dKsSIX/./6u9MkdvL8Ho3Nfri8e09hi1Hhg3iwglbm', 3);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`attendance_id`),
  ADD KEY `schedule_id` (`attendance_schedule_id`),
  ADD KEY `user_id` (`attendance_user_id`);

--
-- Indeks untuk tabel `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indeks untuk tabel `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`schedule_id`),
  ADD KEY `course_id` (`schedule_course_id`),
  ADD KEY `user_id` (`schedule_user_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_id` (`user_code`),
  ADD KEY `role_id` (`user_role_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `attendance`
--
ALTER TABLE `attendance`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `schedule`
--
ALTER TABLE `schedule`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`attendance_schedule_id`) REFERENCES `schedule` (`schedule_id`),
  ADD CONSTRAINT `attendance_ibfk_2` FOREIGN KEY (`attendance_user_id`) REFERENCES `users` (`user_id`);

--
-- Ketidakleluasaan untuk tabel `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`schedule_course_id`) REFERENCES `courses` (`course_id`);

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`user_role_id`) REFERENCES `roles` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
