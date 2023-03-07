/*
 Navicat Premium Data Transfer

 Source Server         : localan
 Source Server Type    : MySQL
 Source Server Version : 80031
 Source Host           : localhost:3307
 Source Schema         : humas_lida

 Target Server Type    : MySQL
 Target Server Version : 80031
 File Encoding         : 65001

 Date: 07/03/2023 15:59:17
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for administrasi
-- ----------------------------
DROP TABLE IF EXISTS `administrasi`;
CREATE TABLE `administrasi`  (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `px_rajal_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pendaftaran` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kasir` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `administrasi_px_rajal_id_index`(`px_rajal_id` ASC) USING BTREE,
  CONSTRAINT `administrasi_px_rajal_id_foreign` FOREIGN KEY (`px_rajal_id`) REFERENCES `px_rajal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of administrasi
-- ----------------------------
INSERT INTO `administrasi` VALUES ('12868d3b-ab72-4a72-b4fb-12520b5024b8', '42ea3859-79b1-4452-9879-3d1b3e682a17', 'Tidak Puas', 'Tidak Puas', '2023-03-03 13:35:17', '2023-03-03 13:35:17');
INSERT INTO `administrasi` VALUES ('2f617e29-55bc-4489-ae8e-4d727891cf12', '21d09537-f40a-41b3-ad85-a9910f325310', 'Tidak Puas', 'Tidak Puas', '2023-03-05 16:33:10', '2023-03-05 16:33:10');
INSERT INTO `administrasi` VALUES ('8f26c3d2-be15-4ce4-8ef6-812f7ee9ddce', '787cf3b4-c6ca-4ad2-9b95-df6b81fccf9e', 'Puas', 'Puas', '2023-03-04 17:36:24', '2023-03-04 17:36:24');
INSERT INTO `administrasi` VALUES ('ce72f1f8-e53b-442d-a64f-7b113936defe', '8ff2c481-9a40-4b41-ab5b-17747365df2c', 'Puas', 'Puas', '2023-03-05 16:29:53', '2023-03-05 16:29:53');

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for farmasi
-- ----------------------------
DROP TABLE IF EXISTS `farmasi`;
CREATE TABLE `farmasi`  (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `px_rajal_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kecepatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sikap_petugas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `penjelasan_obat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pelayanan_farmasi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `farmasi_px_rajal_id_index`(`px_rajal_id` ASC) USING BTREE,
  CONSTRAINT `farmasi_px_rajal_id_foreign` FOREIGN KEY (`px_rajal_id`) REFERENCES `px_rajal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of farmasi
-- ----------------------------
INSERT INTO `farmasi` VALUES ('b49d6710-2919-45aa-84cb-7d924a7b8584', '8ff2c481-9a40-4b41-ab5b-17747365df2c', 'cepat', 'Baik', 'Jelas', 'Puas', '2023-03-05 16:29:53', '2023-03-05 16:29:53');
INSERT INTO `farmasi` VALUES ('be1ffd4f-70a5-4bbc-96a0-35f29a735d63', '42ea3859-79b1-4452-9879-3d1b3e682a17', 'lama', 'Tidak Baik', 'Tidak Jelas', 'Tidak Puas', '2023-03-03 13:35:17', '2023-03-03 13:35:17');
INSERT INTO `farmasi` VALUES ('e1dbd84c-58b7-4408-8fdc-f72d100160c9', '21d09537-f40a-41b3-ad85-a9910f325310', 'lama', 'Tidak Baik', 'Tidak Jelas', 'Puas', '2023-03-05 16:33:10', '2023-03-05 16:33:10');
INSERT INTO `farmasi` VALUES ('e99903fe-d39b-4b57-b0a6-ae85a10004be', '787cf3b4-c6ca-4ad2-9b95-df6b81fccf9e', 'cepat', 'Baik', 'Jelas', 'Tidak Puas', '2023-03-04 17:36:24', '2023-03-04 17:36:24');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 18 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (4, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO `migrations` VALUES (5, '2023_03_02_000001_create_administrasi_table', 1);
INSERT INTO `migrations` VALUES (6, '2023_03_02_000002_create_farmasi_table', 1);
INSERT INTO `migrations` VALUES (7, '2023_03_02_000003_create_pelayanan_table', 1);
INSERT INTO `migrations` VALUES (8, '2023_03_02_000004_create_px_rajal_table', 1);
INSERT INTO `migrations` VALUES (9, '2023_03_02_000005_create_ruang_tunggu_table', 1);
INSERT INTO `migrations` VALUES (10, '2023_03_02_000006_create_sarpras_table', 1);
INSERT INTO `migrations` VALUES (11, '2023_03_02_000007_create_sdm_table', 1);
INSERT INTO `migrations` VALUES (12, '2023_03_02_009001_add_foreigns_to_administrasi_table', 1);
INSERT INTO `migrations` VALUES (13, '2023_03_02_009002_add_foreigns_to_farmasi_table', 1);
INSERT INTO `migrations` VALUES (14, '2023_03_02_009003_add_foreigns_to_pelayanan_table', 1);
INSERT INTO `migrations` VALUES (15, '2023_03_02_009004_add_foreigns_to_ruang_tunggu_table', 1);
INSERT INTO `migrations` VALUES (16, '2023_03_02_009005_add_foreigns_to_sarpras_table', 1);
INSERT INTO `migrations` VALUES (17, '2023_03_02_009006_add_foreigns_to_sdm_table', 1);
INSERT INTO `migrations` VALUES (18, '2023_03_02_053830_create_permission_tables', 1);

-- ----------------------------
-- Table structure for model_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE `model_has_permissions`  (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`, `model_id`, `model_type`) USING BTREE,
  INDEX `model_has_permissions_model_id_model_type_index`(`model_id` ASC, `model_type` ASC) USING BTREE,
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of model_has_permissions
-- ----------------------------

-- ----------------------------
-- Table structure for model_has_roles
-- ----------------------------
DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE `model_has_roles`  (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`role_id`, `model_id`, `model_type`) USING BTREE,
  INDEX `model_has_roles_model_id_model_type_index`(`model_id` ASC, `model_type` ASC) USING BTREE,
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of model_has_roles
-- ----------------------------
INSERT INTO `model_has_roles` VALUES (2, 'App\\Models\\User', 1);
INSERT INTO `model_has_roles` VALUES (1, 'App\\Models\\User', 7);
INSERT INTO `model_has_roles` VALUES (2, 'App\\Models\\User', 7);

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for pelayanan
-- ----------------------------
DROP TABLE IF EXISTS `pelayanan`;
CREATE TABLE `pelayanan`  (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `px_rajal_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kecepatan_pelayanan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kemudahan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pelayanan_yang_perlu_dibenahi` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `pelayanan_px_rajal_id_index`(`px_rajal_id` ASC) USING BTREE,
  CONSTRAINT `pelayanan_px_rajal_id_foreign` FOREIGN KEY (`px_rajal_id`) REFERENCES `px_rajal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pelayanan
-- ----------------------------
INSERT INTO `pelayanan` VALUES ('0da8f2ba-ef63-4455-94ac-589384a26a16', '21d09537-f40a-41b3-ad85-a9910f325310', 'Tidak Puas', 'Tidak Puas', 'kjjhj', '2023-03-05 16:33:10', '2023-03-05 16:33:10');
INSERT INTO `pelayanan` VALUES ('6f65a157-952d-4a1c-86bb-4b38cda72d72', '8ff2c481-9a40-4b41-ab5b-17747365df2c', 'Puas', 'Puas', 'perlu dibenahi', '2023-03-05 16:29:53', '2023-03-05 16:29:53');
INSERT INTO `pelayanan` VALUES ('823c2370-1fc3-4e2e-8ecf-0bbffe23407e', '42ea3859-79b1-4452-9879-3d1b3e682a17', 'Tidak Puas', 'Tidak Puas', 'kkkkkkkkkkkkkkkk', '2023-03-03 13:35:17', '2023-03-03 13:35:17');
INSERT INTO `pelayanan` VALUES ('8b99b123-0bf0-4841-9d79-df9559abb216', '787cf3b4-c6ca-4ad2-9b95-df6b81fccf9e', 'Puas', 'Puas', 'ssssssssssssss', '2023-03-04 17:36:24', '2023-03-04 17:36:24');

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `permissions_name_guard_name_unique`(`name` ASC, `guard_name` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 50 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of permissions
-- ----------------------------
INSERT INTO `permissions` VALUES (1, 'list administrasi', 'web', '2023-03-02 05:40:51', '2023-03-02 05:40:51');
INSERT INTO `permissions` VALUES (2, 'view administrasi', 'web', '2023-03-02 05:40:51', '2023-03-02 05:40:51');
INSERT INTO `permissions` VALUES (3, 'create administrasi', 'web', '2023-03-02 05:40:51', '2023-03-02 05:40:51');
INSERT INTO `permissions` VALUES (4, 'update administrasi', 'web', '2023-03-02 05:40:51', '2023-03-02 05:40:51');
INSERT INTO `permissions` VALUES (5, 'delete administrasi', 'web', '2023-03-02 05:40:51', '2023-03-02 05:40:51');
INSERT INTO `permissions` VALUES (6, 'list farmasi', 'web', '2023-03-02 05:40:51', '2023-03-02 05:40:51');
INSERT INTO `permissions` VALUES (7, 'view farmasi', 'web', '2023-03-02 05:40:51', '2023-03-02 05:40:51');
INSERT INTO `permissions` VALUES (8, 'create farmasi', 'web', '2023-03-02 05:40:51', '2023-03-02 05:40:51');
INSERT INTO `permissions` VALUES (9, 'update farmasi', 'web', '2023-03-02 05:40:51', '2023-03-02 05:40:51');
INSERT INTO `permissions` VALUES (10, 'delete farmasi', 'web', '2023-03-02 05:40:51', '2023-03-02 05:40:51');
INSERT INTO `permissions` VALUES (11, 'list pelayanan', 'web', '2023-03-02 05:40:51', '2023-03-02 05:40:51');
INSERT INTO `permissions` VALUES (12, 'view pelayanan', 'web', '2023-03-02 05:40:51', '2023-03-02 05:40:51');
INSERT INTO `permissions` VALUES (13, 'create pelayanan', 'web', '2023-03-02 05:40:51', '2023-03-02 05:40:51');
INSERT INTO `permissions` VALUES (14, 'update pelayanan', 'web', '2023-03-02 05:40:51', '2023-03-02 05:40:51');
INSERT INTO `permissions` VALUES (15, 'delete pelayanan', 'web', '2023-03-02 05:40:51', '2023-03-02 05:40:51');
INSERT INTO `permissions` VALUES (16, 'list pxrajal', 'web', '2023-03-02 05:40:51', '2023-03-02 05:40:51');
INSERT INTO `permissions` VALUES (17, 'view pxrajal', 'web', '2023-03-02 05:40:51', '2023-03-02 05:40:51');
INSERT INTO `permissions` VALUES (18, 'create pxrajal', 'web', '2023-03-02 05:40:51', '2023-03-02 05:40:51');
INSERT INTO `permissions` VALUES (19, 'update pxrajal', 'web', '2023-03-02 05:40:51', '2023-03-02 05:40:51');
INSERT INTO `permissions` VALUES (20, 'delete pxrajal', 'web', '2023-03-02 05:40:51', '2023-03-02 05:40:51');
INSERT INTO `permissions` VALUES (21, 'list ruangtunggu', 'web', '2023-03-02 05:40:51', '2023-03-02 05:40:51');
INSERT INTO `permissions` VALUES (22, 'view ruangtunggu', 'web', '2023-03-02 05:40:51', '2023-03-02 05:40:51');
INSERT INTO `permissions` VALUES (23, 'create ruangtunggu', 'web', '2023-03-02 05:40:51', '2023-03-02 05:40:51');
INSERT INTO `permissions` VALUES (24, 'update ruangtunggu', 'web', '2023-03-02 05:40:51', '2023-03-02 05:40:51');
INSERT INTO `permissions` VALUES (25, 'delete ruangtunggu', 'web', '2023-03-02 05:40:51', '2023-03-02 05:40:51');
INSERT INTO `permissions` VALUES (26, 'list sarpras', 'web', '2023-03-02 05:40:51', '2023-03-02 05:40:51');
INSERT INTO `permissions` VALUES (27, 'view sarpras', 'web', '2023-03-02 05:40:51', '2023-03-02 05:40:51');
INSERT INTO `permissions` VALUES (28, 'create sarpras', 'web', '2023-03-02 05:40:51', '2023-03-02 05:40:51');
INSERT INTO `permissions` VALUES (29, 'update sarpras', 'web', '2023-03-02 05:40:51', '2023-03-02 05:40:51');
INSERT INTO `permissions` VALUES (30, 'delete sarpras', 'web', '2023-03-02 05:40:51', '2023-03-02 05:40:51');
INSERT INTO `permissions` VALUES (31, 'list sdm', 'web', '2023-03-02 05:40:51', '2023-03-02 05:40:51');
INSERT INTO `permissions` VALUES (32, 'view sdm', 'web', '2023-03-02 05:40:51', '2023-03-02 05:40:51');
INSERT INTO `permissions` VALUES (33, 'create sdm', 'web', '2023-03-02 05:40:51', '2023-03-02 05:40:51');
INSERT INTO `permissions` VALUES (34, 'update sdm', 'web', '2023-03-02 05:40:51', '2023-03-02 05:40:51');
INSERT INTO `permissions` VALUES (35, 'delete sdm', 'web', '2023-03-02 05:40:51', '2023-03-02 05:40:51');
INSERT INTO `permissions` VALUES (36, 'list roles', 'web', '2023-03-02 05:40:51', '2023-03-02 05:40:51');
INSERT INTO `permissions` VALUES (37, 'view roles', 'web', '2023-03-02 05:40:51', '2023-03-02 05:40:51');
INSERT INTO `permissions` VALUES (38, 'create roles', 'web', '2023-03-02 05:40:51', '2023-03-02 05:40:51');
INSERT INTO `permissions` VALUES (39, 'update roles', 'web', '2023-03-02 05:40:51', '2023-03-02 05:40:51');
INSERT INTO `permissions` VALUES (40, 'delete roles', 'web', '2023-03-02 05:40:51', '2023-03-02 05:40:51');
INSERT INTO `permissions` VALUES (41, 'list permissions', 'web', '2023-03-02 05:40:51', '2023-03-02 05:40:51');
INSERT INTO `permissions` VALUES (42, 'view permissions', 'web', '2023-03-02 05:40:52', '2023-03-02 05:40:52');
INSERT INTO `permissions` VALUES (43, 'create permissions', 'web', '2023-03-02 05:40:52', '2023-03-02 05:40:52');
INSERT INTO `permissions` VALUES (44, 'update permissions', 'web', '2023-03-02 05:40:52', '2023-03-02 05:40:52');
INSERT INTO `permissions` VALUES (45, 'delete permissions', 'web', '2023-03-02 05:40:52', '2023-03-02 05:40:52');
INSERT INTO `permissions` VALUES (46, 'list users', 'web', '2023-03-02 05:40:52', '2023-03-02 05:40:52');
INSERT INTO `permissions` VALUES (47, 'view users', 'web', '2023-03-02 05:40:52', '2023-03-02 05:40:52');
INSERT INTO `permissions` VALUES (48, 'create users', 'web', '2023-03-02 05:40:52', '2023-03-02 05:40:52');
INSERT INTO `permissions` VALUES (49, 'update users', 'web', '2023-03-02 05:40:52', '2023-03-02 05:40:52');
INSERT INTO `permissions` VALUES (50, 'delete users', 'web', '2023-03-02 05:40:52', '2023-03-02 05:40:52');

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `personal_access_tokens_token_unique`(`token` ASC) USING BTREE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index`(`tokenable_type` ASC, `tokenable_id` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for px_rajal
-- ----------------------------
DROP TABLE IF EXISTS `px_rajal`;
CREATE TABLE `px_rajal`  (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_upf` int NOT NULL,
  `no_rm` int NOT NULL,
  `nama_pasien` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_card` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `id_number` bigint NULL DEFAULT NULL,
  `klinik` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `penjamin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_penjamin` int NULL DEFAULT NULL,
  `no_hp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_daftar` datetime NOT NULL,
  `kategori_pasien` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of px_rajal
-- ----------------------------
INSERT INTO `px_rajal` VALUES ('21d09537-f40a-41b3-ad85-a9910f325310', 990180692, 100005621, 'VANDHITYA RENANINGTYAS', 'KTP', 3515184107950004, 'UGD/IGD', 'BPJS KESEHATAN', NULL, '081211317271', '2022-12-03 18:24:37', 'Pasien Berulang', '2023-03-05 16:33:10', '2023-03-05 16:33:10');
INSERT INTO `px_rajal` VALUES ('42ea3859-79b1-4452-9879-3d1b3e682a17', 990076145, 100069268, 'NUR ISNAWATI', NULL, NULL, 'POLI BEDAH UMUM', 'BPJS KESEHATAN', 0, '082230813334', '2020-10-22 06:52:53', 'Pasien Berulang', '2023-03-03 13:35:17', '2023-03-03 13:35:17');
INSERT INTO `px_rajal` VALUES ('787cf3b4-c6ca-4ad2-9b95-df6b81fccf9e', 990183267, 100068861, 'ASVIN MARGINDA PARASIAN', NULL, 111111, 'UGD/IGD', 'BPJS KESEHATAN', NULL, '082132913988', '2022-12-17 21:27:05', 'Pasien Berulang', '2023-03-04 17:36:24', '2023-03-04 17:36:24');
INSERT INTO `px_rajal` VALUES ('8ff2c481-9a40-4b41-ab5b-17747365df2c', 990180594, 100063600, 'MUSYAROFAH', 'KTP', 3576015311530001, 'POLI REHABILITASI MEDIS', 'BPJS KESEHATAN', NULL, '085655203132', '2022-12-02 21:22:06', 'Pasien Berulang', '2023-03-05 16:29:53', '2023-03-05 16:29:53');

-- ----------------------------
-- Table structure for role_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE `role_has_permissions`  (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`, `role_id`) USING BTREE,
  INDEX `role_has_permissions_role_id_foreign`(`role_id` ASC) USING BTREE,
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of role_has_permissions
-- ----------------------------
INSERT INTO `role_has_permissions` VALUES (1, 1);
INSERT INTO `role_has_permissions` VALUES (2, 1);
INSERT INTO `role_has_permissions` VALUES (3, 1);
INSERT INTO `role_has_permissions` VALUES (4, 1);
INSERT INTO `role_has_permissions` VALUES (5, 1);
INSERT INTO `role_has_permissions` VALUES (6, 1);
INSERT INTO `role_has_permissions` VALUES (7, 1);
INSERT INTO `role_has_permissions` VALUES (8, 1);
INSERT INTO `role_has_permissions` VALUES (9, 1);
INSERT INTO `role_has_permissions` VALUES (10, 1);
INSERT INTO `role_has_permissions` VALUES (11, 1);
INSERT INTO `role_has_permissions` VALUES (12, 1);
INSERT INTO `role_has_permissions` VALUES (13, 1);
INSERT INTO `role_has_permissions` VALUES (14, 1);
INSERT INTO `role_has_permissions` VALUES (15, 1);
INSERT INTO `role_has_permissions` VALUES (16, 1);
INSERT INTO `role_has_permissions` VALUES (17, 1);
INSERT INTO `role_has_permissions` VALUES (18, 1);
INSERT INTO `role_has_permissions` VALUES (19, 1);
INSERT INTO `role_has_permissions` VALUES (20, 1);
INSERT INTO `role_has_permissions` VALUES (21, 1);
INSERT INTO `role_has_permissions` VALUES (22, 1);
INSERT INTO `role_has_permissions` VALUES (23, 1);
INSERT INTO `role_has_permissions` VALUES (24, 1);
INSERT INTO `role_has_permissions` VALUES (25, 1);
INSERT INTO `role_has_permissions` VALUES (26, 1);
INSERT INTO `role_has_permissions` VALUES (27, 1);
INSERT INTO `role_has_permissions` VALUES (28, 1);
INSERT INTO `role_has_permissions` VALUES (29, 1);
INSERT INTO `role_has_permissions` VALUES (30, 1);
INSERT INTO `role_has_permissions` VALUES (31, 1);
INSERT INTO `role_has_permissions` VALUES (32, 1);
INSERT INTO `role_has_permissions` VALUES (33, 1);
INSERT INTO `role_has_permissions` VALUES (34, 1);
INSERT INTO `role_has_permissions` VALUES (35, 1);
INSERT INTO `role_has_permissions` VALUES (1, 2);
INSERT INTO `role_has_permissions` VALUES (2, 2);
INSERT INTO `role_has_permissions` VALUES (3, 2);
INSERT INTO `role_has_permissions` VALUES (4, 2);
INSERT INTO `role_has_permissions` VALUES (5, 2);
INSERT INTO `role_has_permissions` VALUES (6, 2);
INSERT INTO `role_has_permissions` VALUES (7, 2);
INSERT INTO `role_has_permissions` VALUES (8, 2);
INSERT INTO `role_has_permissions` VALUES (9, 2);
INSERT INTO `role_has_permissions` VALUES (10, 2);
INSERT INTO `role_has_permissions` VALUES (11, 2);
INSERT INTO `role_has_permissions` VALUES (12, 2);
INSERT INTO `role_has_permissions` VALUES (13, 2);
INSERT INTO `role_has_permissions` VALUES (14, 2);
INSERT INTO `role_has_permissions` VALUES (15, 2);
INSERT INTO `role_has_permissions` VALUES (16, 2);
INSERT INTO `role_has_permissions` VALUES (17, 2);
INSERT INTO `role_has_permissions` VALUES (18, 2);
INSERT INTO `role_has_permissions` VALUES (19, 2);
INSERT INTO `role_has_permissions` VALUES (20, 2);
INSERT INTO `role_has_permissions` VALUES (21, 2);
INSERT INTO `role_has_permissions` VALUES (22, 2);
INSERT INTO `role_has_permissions` VALUES (23, 2);
INSERT INTO `role_has_permissions` VALUES (24, 2);
INSERT INTO `role_has_permissions` VALUES (25, 2);
INSERT INTO `role_has_permissions` VALUES (26, 2);
INSERT INTO `role_has_permissions` VALUES (27, 2);
INSERT INTO `role_has_permissions` VALUES (28, 2);
INSERT INTO `role_has_permissions` VALUES (29, 2);
INSERT INTO `role_has_permissions` VALUES (30, 2);
INSERT INTO `role_has_permissions` VALUES (31, 2);
INSERT INTO `role_has_permissions` VALUES (32, 2);
INSERT INTO `role_has_permissions` VALUES (33, 2);
INSERT INTO `role_has_permissions` VALUES (34, 2);
INSERT INTO `role_has_permissions` VALUES (35, 2);
INSERT INTO `role_has_permissions` VALUES (36, 2);
INSERT INTO `role_has_permissions` VALUES (37, 2);
INSERT INTO `role_has_permissions` VALUES (38, 2);
INSERT INTO `role_has_permissions` VALUES (39, 2);
INSERT INTO `role_has_permissions` VALUES (40, 2);
INSERT INTO `role_has_permissions` VALUES (41, 2);
INSERT INTO `role_has_permissions` VALUES (42, 2);
INSERT INTO `role_has_permissions` VALUES (43, 2);
INSERT INTO `role_has_permissions` VALUES (44, 2);
INSERT INTO `role_has_permissions` VALUES (45, 2);
INSERT INTO `role_has_permissions` VALUES (46, 2);
INSERT INTO `role_has_permissions` VALUES (47, 2);
INSERT INTO `role_has_permissions` VALUES (48, 2);
INSERT INTO `role_has_permissions` VALUES (49, 2);
INSERT INTO `role_has_permissions` VALUES (50, 2);

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `roles_name_guard_name_unique`(`name` ASC, `guard_name` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, 'user', 'web', '2023-03-02 05:40:51', '2023-03-02 05:40:51');
INSERT INTO `roles` VALUES (2, 'super-admin', 'web', '2023-03-02 05:40:52', '2023-03-02 05:40:52');

-- ----------------------------
-- Table structure for ruang_tunggu
-- ----------------------------
DROP TABLE IF EXISTS `ruang_tunggu`;
CREATE TABLE `ruang_tunggu`  (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `px_rajal_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kenyamanan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kebersihan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `saran_kritik` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `ruang_tunggu_px_rajal_id_index`(`px_rajal_id` ASC) USING BTREE,
  CONSTRAINT `ruang_tunggu_px_rajal_id_foreign` FOREIGN KEY (`px_rajal_id`) REFERENCES `px_rajal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ruang_tunggu
-- ----------------------------
INSERT INTO `ruang_tunggu` VALUES ('20b7c060-1ecc-458d-8d4f-665daf74c3c1', '8ff2c481-9a40-4b41-ab5b-17747365df2c', 'Puas', 'Puas', 'saran1', '2023-03-05 16:29:53', '2023-03-05 16:29:53');
INSERT INTO `ruang_tunggu` VALUES ('226f593b-7ae4-442c-85c9-a96b3eb5ee80', '787cf3b4-c6ca-4ad2-9b95-df6b81fccf9e', 'Puas', 'Puas', 'ccccccccccccc', '2023-03-04 17:36:24', '2023-03-04 17:36:24');
INSERT INTO `ruang_tunggu` VALUES ('3083ff26-31d9-427c-92d3-251bfb2c2a2d', '42ea3859-79b1-4452-9879-3d1b3e682a17', 'Tidak Puas', 'Tidak Puas', 'khhhhhhhhhhhhhhhhh', '2023-03-03 13:35:17', '2023-03-03 13:35:17');
INSERT INTO `ruang_tunggu` VALUES ('9ddb2231-0b9c-45c9-a443-bf607e570fcb', '21d09537-f40a-41b3-ad85-a9910f325310', 'Tidak Puas', 'Tidak Puas', 'sdqweq', '2023-03-05 16:33:10', '2023-03-05 16:33:10');

-- ----------------------------
-- Table structure for sarpras
-- ----------------------------
DROP TABLE IF EXISTS `sarpras`;
CREATE TABLE `sarpras`  (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `px_rajal_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sarana` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `prasarana` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fasilitas_lain` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `sarpras_px_rajal_id_index`(`px_rajal_id` ASC) USING BTREE,
  CONSTRAINT `sarpras_px_rajal_id_foreign` FOREIGN KEY (`px_rajal_id`) REFERENCES `px_rajal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sarpras
-- ----------------------------
INSERT INTO `sarpras` VALUES ('4bacb7a4-a6d0-485d-9bb8-4547c646fb78', '42ea3859-79b1-4452-9879-3d1b3e682a17', 'tidak puas', 'tidak puas', 'tidak puas', '2023-03-03 13:35:17', '2023-03-03 13:35:17');
INSERT INTO `sarpras` VALUES ('597e5ff7-00d2-47e3-a503-b02149cafeb7', '787cf3b4-c6ca-4ad2-9b95-df6b81fccf9e', 'puas', 'puas', 'puas', '2023-03-04 17:36:24', '2023-03-04 17:36:24');
INSERT INTO `sarpras` VALUES ('aa67e7b0-3c74-4878-a3eb-736013c5a236', '21d09537-f40a-41b3-ad85-a9910f325310', 'tidak puas', 'tidak puas', 'tidak puas', '2023-03-05 16:33:10', '2023-03-05 16:33:10');
INSERT INTO `sarpras` VALUES ('af4c59b9-7a01-42d9-b732-43031a762790', '8ff2c481-9a40-4b41-ab5b-17747365df2c', 'puas', 'puas', 'puas', '2023-03-05 16:29:53', '2023-03-05 16:29:53');

-- ----------------------------
-- Table structure for sdm
-- ----------------------------
DROP TABLE IF EXISTS `sdm`;
CREATE TABLE `sdm`  (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `px_rajal_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `parkir` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `security` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `dokter` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `perawat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `radiologi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `laboratorium` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `sdm_px_rajal_id_index`(`px_rajal_id` ASC) USING BTREE,
  CONSTRAINT `sdm_px_rajal_id_foreign` FOREIGN KEY (`px_rajal_id`) REFERENCES `px_rajal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sdm
-- ----------------------------
INSERT INTO `sdm` VALUES ('2f59d04e-7539-4736-9ff9-c63da9d2439d', '8ff2c481-9a40-4b41-ab5b-17747365df2c', 'Puas', 'Puas', 'Puas', 'Puas', 'Puas', 'Puas', '2023-03-05 16:29:53', '2023-03-05 16:29:53');
INSERT INTO `sdm` VALUES ('842f273d-f63f-42b7-9529-4896de44ecf1', '21d09537-f40a-41b3-ad85-a9910f325310', 'Tidak Puas', 'Tidak Puas', 'Tidak Puas', 'Tidak Puas', 'Tidak Puas', 'Tidak Puas', '2023-03-05 16:33:10', '2023-03-05 16:33:10');
INSERT INTO `sdm` VALUES ('9b4cb47d-b624-468c-8494-4507e46b26e2', '42ea3859-79b1-4452-9879-3d1b3e682a17', 'Tidak Puas', 'Tidak Puas', 'Tidak Puas', 'Tidak Puas', 'Tidak Puas', 'Tidak Puas', '2023-03-03 13:35:17', '2023-03-03 13:35:17');
INSERT INTO `sdm` VALUES ('b4a818a8-9137-4597-8f9d-7344b2aa0f92', '787cf3b4-c6ca-4ad2-9b95-df6b81fccf9e', 'Puas', 'Puas', 'Puas', 'Puas', 'Puas', 'Puas', '2023-03-04 17:36:24', '2023-03-04 17:36:24');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Mr. Archibald Altenwerth', 'admin@admin.com', '2023-03-02 05:40:51', '$2y$10$RK1M6XV2oaq4rVxNFZZL2.yEmC6MhGpdtAPGopbu5ZOKjAghtpRB.', '8oNSS6WPoysnSvchEDMfl16t3kTr9SdnwPSFmzP5PbF5hpytY9m9052VhQpT', '2023-03-02 05:40:51', '2023-03-02 05:40:51');
INSERT INTO `users` VALUES (2, 'Myrtle Beer', 'marjory17@schroeder.biz', '2023-03-02 05:40:52', '$2y$10$57Rc/IAwEy0NDWN/3XKG5OK70uuhKzSb8urMQ2E3Zr3025civwusW', 'q6NfERzWuV', '2023-03-02 05:40:52', '2023-03-02 05:40:52');
INSERT INTO `users` VALUES (3, 'Aniyah Hane', 'koelpin.beatrice@hotmail.com', '2023-03-02 05:40:52', '$2y$10$rAGJwCZttLfmRmvV4E5vI.VcjTpRGJjUE/p6GHrQCp2WB/n2ApvF.', 'i5qcJzfjMk', '2023-03-02 05:40:52', '2023-03-02 05:40:52');
INSERT INTO `users` VALUES (4, 'Brice Doyle', 'qkuhic@yost.com', '2023-03-02 05:40:52', '$2y$10$BSC7MMMRZyAr6BgtydPEPer8UafNwN6Pb.I2IexCMD3Fo2vzW4nnW', 'jIlvL0zWDz', '2023-03-02 05:40:52', '2023-03-02 05:40:52');
INSERT INTO `users` VALUES (5, 'Hunter Rath Sr.', 'christian.rutherford@gutmann.com', '2023-03-02 05:40:52', '$2y$10$hdjeD1uimNwJqIc0lmHWYuS/OJgH8SlSGc8P42dKu/WlR6hUF3LHy', 'p4FVzZpiXz', '2023-03-02 05:40:52', '2023-03-02 05:40:52');
INSERT INTO `users` VALUES (6, 'Carlo Lemke', 'dietrich.stewart@hotmail.com', '2023-03-02 05:40:52', '$2y$10$XJHL1TpwmzChrgSaztJJGOR3FYepcT7TK1ZubElELeRwUHzsHK3g2', 'Be57DwV3An', '2023-03-02 05:40:52', '2023-03-02 05:40:52');
INSERT INTO `users` VALUES (7, 'Arditya Budi Lesmana', 'ardityabl@rsreksawaluya.id', NULL, '$2y$10$27Z/cMaHBCpTztzdyP0IXOCVTywE1GKpQtCc2PmcmtY9ujTbSCpd6', 'MT0U54kR9hO9Do5it03h8o9ea3ecSBBqHL2gDLpJMzVWoKUXnniiS1kAv2nx', '2023-03-05 04:20:24', '2023-03-05 04:20:24');

SET FOREIGN_KEY_CHECKS = 1;
