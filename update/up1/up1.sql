
ALTER TABLE `referrals` ADD `plan_id` int(11) NOT NULL AFTER `id`;

UPDATE `general_settings` SET `current_version` = '7.6' WHERE `general_settings`.`id` = 1;

