# LaravelProject
Task Assign by CrownStack


## Database name : laravel ##

##### Query for Discount table ######

CREATE TABLE `discount` (
  `id` int(11) NOT NULL,
  `discount_value` int(11) NOT NULL,
  `times_of_given` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `discount` (`id`, `discount_value`, `times_of_given`, `updated_at`, `created_at`) VALUES
(1, 50, 15, NULL, NULL),
(2, 100, 11, NULL, NULL),
(3, 200, 10, NULL, NULL),
(4, 500, 8, NULL, NULL),
(5, 1000, 5, NULL, NULL),
(6, 2000, 4, NULL, NULL),
(7, 5000, 2, NULL, NULL),
(8, 10000, 1, NULL, NULL);

ALTER TABLE `discount`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `discount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
  
##########################################################################################################
## Query for customer table ##

CREATE TABLE `customer` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `discount_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customer_email_unique` (`email`);

ALTER TABLE `customer`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;







