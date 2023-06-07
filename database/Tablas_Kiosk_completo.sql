-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema db_kiosk
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema db_kiosk
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `db_kiosk` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci ;
USE `db_kiosk` ;

-- -----------------------------------------------------
-- Table `db_kiosk`.`alumnos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_kiosk`.`alumnos` ;

CREATE TABLE IF NOT EXISTS `db_kiosk`.`alumnos` (
  `curp` VARCHAR(18) NOT NULL,
  `nombre` VARCHAR(50) NOT NULL,
  `apellido_paterno` VARCHAR(50) NULL DEFAULT NULL,
  `apellido_materno` VARCHAR(50) NULL DEFAULT NULL,
  `fecha_nacimiento` DATE NOT NULL,
  `direccion` VARCHAR(200) NOT NULL,
  `correo` VARCHAR(60) NULL DEFAULT NULL,
  `telefono` VARCHAR(15) NULL DEFAULT NULL,
  `tutor` VARCHAR(150) NULL DEFAULT NULL,
  `telefono_emergencia` VARCHAR(15) NULL DEFAULT NULL,
  `modificado_por` VARCHAR(30) NULL DEFAULT NULL,
  `updated_at` DATE NULL DEFAULT NULL,
  `created_at` DATE NULL DEFAULT NULL,
  PRIMARY KEY (`curp`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `db_kiosk`.`categorias`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_kiosk`.`categorias` ;

CREATE TABLE IF NOT EXISTS `db_kiosk`.`categorias` (
  `id_categoria` INT NOT NULL AUTO_INCREMENT,
  `categoria` VARCHAR(30) NOT NULL,
  `edad_inicial` INT NOT NULL,
  `edad_final` INT NOT NULL,
  `modificado_por` VARCHAR(30) NULL DEFAULT NULL,
  `updated_at` DATE NULL DEFAULT NULL,
  `created_at` DATE NULL DEFAULT NULL,
  PRIMARY KEY (`id_categoria`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `db_kiosk`.`empleados`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_kiosk`.`empleados` ;

CREATE TABLE IF NOT EXISTS `db_kiosk`.`empleados` (
  `id_empleado` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(50) NOT NULL,
  `apellido_paterno` VARCHAR(50) NULL DEFAULT NULL,
  `apellido_materno` VARCHAR(50) NULL DEFAULT NULL,
  `correo` VARCHAR(255) NOT NULL,
  `telefono` VARCHAR(15) NULL DEFAULT NULL,
  `antiguedad` INT NULL DEFAULT NULL,
  `activo` TINYINT(1) NULL DEFAULT NULL,
  `modificado_por` VARCHAR(30) NULL DEFAULT NULL,
  `updated_at` DATE NULL DEFAULT NULL,
  `created_at` DATE NULL DEFAULT NULL,
  PRIMARY KEY (`id_empleado`),
  UNIQUE INDEX `correo` (`correo` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `db_kiosk`.`idiomas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_kiosk`.`idiomas` ;

CREATE TABLE IF NOT EXISTS `db_kiosk`.`idiomas` (
  `id_idioma` INT NOT NULL AUTO_INCREMENT,
  `idioma` VARCHAR(30) NOT NULL,
  `modificado_por` VARCHAR(30) NULL DEFAULT NULL,
  `updated_at` DATE NULL DEFAULT NULL,
  `created_at` DATE NULL DEFAULT NULL,
  PRIMARY KEY (`id_idioma`))
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `db_kiosk`.`docentes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_kiosk`.`docentes` ;

CREATE TABLE IF NOT EXISTS `db_kiosk`.`docentes` (
  `id_empleado` INT NOT NULL,
  `id_idioma1` INT NOT NULL,
  `id_idioma2` INT NULL DEFAULT NULL,
  `id_idioma3` INT NULL DEFAULT NULL,
  `id_idioma4` INT NULL DEFAULT NULL,
  `modificado_por` VARCHAR(30) NULL DEFAULT NULL,
  `updated_at` DATE NULL DEFAULT NULL,
  `created_at` DATE NULL DEFAULT NULL,
  PRIMARY KEY (`id_empleado`),
  INDEX `id_idioma1` (`id_idioma1` ASC),
  INDEX `id_idioma2` (`id_idioma2` ASC),
  INDEX `id_idioma3` (`id_idioma3` ASC),
  INDEX `id_idioma4` (`id_idioma4` ASC),
  CONSTRAINT `docentes_ibfk_1`
    FOREIGN KEY (`id_empleado`)
    REFERENCES `db_kiosk`.`empleados` (`id_empleado`),
  CONSTRAINT `docentes_ibfk_2`
    FOREIGN KEY (`id_idioma1`)
    REFERENCES `db_kiosk`.`idiomas` (`id_idioma`),
  CONSTRAINT `docentes_ibfk_3`
    FOREIGN KEY (`id_idioma2`)
    REFERENCES `db_kiosk`.`idiomas` (`id_idioma`),
  CONSTRAINT `docentes_ibfk_4`
    FOREIGN KEY (`id_idioma3`)
    REFERENCES `db_kiosk`.`idiomas` (`id_idioma`),
  CONSTRAINT `docentes_ibfk_5`
    FOREIGN KEY (`id_idioma4`)
    REFERENCES `db_kiosk`.`idiomas` (`id_idioma`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `db_kiosk`.`failed_jobs`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_kiosk`.`failed_jobs` ;

CREATE TABLE IF NOT EXISTS `db_kiosk`.`failed_jobs` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` VARCHAR(255) NOT NULL,
  `connection` TEXT NOT NULL,
  `queue` TEXT NOT NULL,
  `payload` LONGTEXT NOT NULL,
  `exception` LONGTEXT NOT NULL,
  `failed_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `failed_jobs_uuid_unique` (`uuid` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `db_kiosk`.`sistemas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_kiosk`.`sistemas` ;

CREATE TABLE IF NOT EXISTS `db_kiosk`.`sistemas` (
  `id_sistema` INT NOT NULL AUTO_INCREMENT,
  `sistema` VARCHAR(30) NOT NULL,
  `modificado_por` VARCHAR(30) NULL DEFAULT NULL,
  `updated_at` DATE NULL DEFAULT NULL,
  `created_at` DATE NULL DEFAULT NULL,
  PRIMARY KEY (`id_sistema`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `db_kiosk`.`planteles`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_kiosk`.`planteles` ;

CREATE TABLE IF NOT EXISTS `db_kiosk`.`planteles` (
  `id_plantel` INT NOT NULL AUTO_INCREMENT,
  `plantel` VARCHAR(30) NOT NULL,
  `modificado_por` VARCHAR(30) NULL DEFAULT NULL,
  `updated_at` DATE NULL DEFAULT NULL,
  `created_at` DATE NULL DEFAULT NULL,
  PRIMARY KEY (`id_plantel`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `db_kiosk`.`grupos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_kiosk`.`grupos` ;

CREATE TABLE IF NOT EXISTS `db_kiosk`.`grupos` (
  `id_grupo` INT NOT NULL AUTO_INCREMENT,
  `id_idioma` INT NOT NULL,
  `id_sistema` INT NOT NULL,
  `id_categoria` INT NOT NULL,
  `id_plantel` INT NOT NULL,
  `nivel` INT NOT NULL,
  `fecha_inicio` DATE NOT NULL,
  `hora_entrada` TIME NOT NULL,
  `lunes` TINYINT(1) NULL DEFAULT NULL,
  `martes` TINYINT(1) NULL DEFAULT NULL,
  `miercoles` TINYINT(1) NULL DEFAULT NULL,
  `jueves` TINYINT(1) NULL DEFAULT NULL,
  `viernes` TINYINT(1) NULL DEFAULT NULL,
  `sabado` TINYINT(1) NULL DEFAULT NULL,
  `id_empleado` INT NULL DEFAULT NULL,
  `modificado_por` VARCHAR(30) NULL DEFAULT NULL,
  `updated_at` DATE NULL DEFAULT NULL,
  `created_at` DATE NULL DEFAULT NULL,
  PRIMARY KEY (`id_grupo`),
  INDEX `id_idioma` (`id_idioma` ASC),
  INDEX `id_sistema` (`id_sistema` ASC),
  INDEX `id_categoria` (`id_categoria` ASC),
  INDEX `id_plantel` (`id_plantel` ASC),
  INDEX `id_empleado` (`id_empleado` ASC),
  CONSTRAINT `grupos_ibfk_1`
    FOREIGN KEY (`id_idioma`)
    REFERENCES `db_kiosk`.`idiomas` (`id_idioma`),
  CONSTRAINT `grupos_ibfk_2`
    FOREIGN KEY (`id_sistema`)
    REFERENCES `db_kiosk`.`sistemas` (`id_sistema`),
  CONSTRAINT `grupos_ibfk_3`
    FOREIGN KEY (`id_categoria`)
    REFERENCES `db_kiosk`.`categorias` (`id_categoria`),
  CONSTRAINT `grupos_ibfk_4`
    FOREIGN KEY (`id_plantel`)
    REFERENCES `db_kiosk`.`planteles` (`id_plantel`),
  CONSTRAINT `grupos_ibfk_5`
    FOREIGN KEY (`id_empleado`)
    REFERENCES `db_kiosk`.`docentes` (`id_empleado`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `db_kiosk`.`listas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_kiosk`.`listas` ;

CREATE TABLE IF NOT EXISTS `db_kiosk`.`listas` (
  `id_grupo` INT NOT NULL,
  `curp` VARCHAR(18) NOT NULL,
  `modificado_por` VARCHAR(30) NULL DEFAULT NULL,
  `updated_at` DATE NULL DEFAULT NULL,
  `created_at` DATE NULL DEFAULT NULL,
  PRIMARY KEY (`id_grupo`, `curp`),
  INDEX `curp` (`curp` ASC),
  CONSTRAINT `listas_ibfk_1`
    FOREIGN KEY (`id_grupo`)
    REFERENCES `db_kiosk`.`grupos` (`id_grupo`),
  CONSTRAINT `listas_ibfk_2`
    FOREIGN KEY (`curp`)
    REFERENCES `db_kiosk`.`alumnos` (`curp`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `db_kiosk`.`migrations`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_kiosk`.`migrations` ;

CREATE TABLE IF NOT EXISTS `db_kiosk`.`migrations` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` VARCHAR(255) NOT NULL,
  `batch` INT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 30
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `db_kiosk`.`permissions`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_kiosk`.`permissions` ;

CREATE TABLE IF NOT EXISTS `db_kiosk`.`permissions` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `guard_name` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `permissions_name_guard_name_unique` (`name` ASC, `guard_name` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `db_kiosk`.`model_has_permissions`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_kiosk`.`model_has_permissions` ;

CREATE TABLE IF NOT EXISTS `db_kiosk`.`model_has_permissions` (
  `permission_id` BIGINT UNSIGNED NOT NULL,
  `model_type` VARCHAR(255) NOT NULL,
  `model_id` BIGINT UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`, `model_id`, `model_type`),
  INDEX `model_has_permissions_model_id_model_type_index` (`model_id` ASC, `model_type` ASC),
  CONSTRAINT `model_has_permissions_permission_id_foreign`
    FOREIGN KEY (`permission_id`)
    REFERENCES `db_kiosk`.`permissions` (`id`)
    ON DELETE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `db_kiosk`.`roles`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_kiosk`.`roles` ;

CREATE TABLE IF NOT EXISTS `db_kiosk`.`roles` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `guard_name` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `roles_name_guard_name_unique` (`name` ASC, `guard_name` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `db_kiosk`.`model_has_roles`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_kiosk`.`model_has_roles` ;

CREATE TABLE IF NOT EXISTS `db_kiosk`.`model_has_roles` (
  `role_id` BIGINT UNSIGNED NOT NULL,
  `model_type` VARCHAR(255) NOT NULL,
  `model_id` BIGINT UNSIGNED NOT NULL,
  PRIMARY KEY (`role_id`, `model_id`, `model_type`),
  INDEX `model_has_roles_model_id_model_type_index` (`model_id` ASC, `model_type` ASC),
  CONSTRAINT `model_has_roles_role_id_foreign`
    FOREIGN KEY (`role_id`)
    REFERENCES `db_kiosk`.`roles` (`id`)
    ON DELETE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `db_kiosk`.`password_reset_tokens`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_kiosk`.`password_reset_tokens` ;

CREATE TABLE IF NOT EXISTS `db_kiosk`.`password_reset_tokens` (
  `email` VARCHAR(255) NOT NULL,
  `token` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`email`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `db_kiosk`.`password_resets`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_kiosk`.`password_resets` ;

CREATE TABLE IF NOT EXISTS `db_kiosk`.`password_resets` (
  `email` VARCHAR(255) NOT NULL,
  `token` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  INDEX `password_resets_email_index` (`email` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `db_kiosk`.`personal_access_tokens`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_kiosk`.`personal_access_tokens` ;

CREATE TABLE IF NOT EXISTS `db_kiosk`.`personal_access_tokens` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` VARCHAR(255) NOT NULL,
  `tokenable_id` BIGINT UNSIGNED NOT NULL,
  `name` VARCHAR(255) NOT NULL,
  `token` VARCHAR(64) NOT NULL,
  `abilities` TEXT NULL DEFAULT NULL,
  `last_used_at` TIMESTAMP NULL DEFAULT NULL,
  `expires_at` TIMESTAMP NULL DEFAULT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `personal_access_tokens_token_unique` (`token` ASC),
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type` ASC, `tokenable_id` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `db_kiosk`.`role_has_permissions`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_kiosk`.`role_has_permissions` ;

CREATE TABLE IF NOT EXISTS `db_kiosk`.`role_has_permissions` (
  `permission_id` BIGINT UNSIGNED NOT NULL,
  `role_id` BIGINT UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`, `role_id`),
  INDEX `role_has_permissions_role_id_foreign` (`role_id` ASC),
  CONSTRAINT `role_has_permissions_permission_id_foreign`
    FOREIGN KEY (`permission_id`)
    REFERENCES `db_kiosk`.`permissions` (`id`)
    ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign`
    FOREIGN KEY (`role_id`)
    REFERENCES `db_kiosk`.`roles` (`id`)
    ON DELETE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `db_kiosk`.`users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_kiosk`.`users` ;

CREATE TABLE IF NOT EXISTS `db_kiosk`.`users` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `email_verified_at` TIMESTAMP NULL DEFAULT NULL,
  `password` VARCHAR(255) NOT NULL,
  `role` VARCHAR(255) NOT NULL,
  `active` TINYINT(1) NOT NULL,
  `remember_token` VARCHAR(100) NULL DEFAULT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `users_email_unique` (`email` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 15
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
