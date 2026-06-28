-- Tambahkan kolom judul_banner ke tabel tbl_banner
ALTER TABLE `tbl_banner`
ADD COLUMN `judul_banner` VARCHAR(255) NOT NULL DEFAULT '' AFTER `id`;
