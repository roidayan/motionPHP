Creating mysql database:

	mysql -h localhost -p -u root

	CREATE USER 'newmotionuser'@'localhost' IDENTIFIED BY 'somepassword';

	CREATE DATABASE motiondb;

	grant all on motiondb.* to 'motionuser1'@'localhost' identified by 'somepassword';

	USE motiondb;

	CREATE TABLE `security` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
	    `camera` int(11) default NULL,
            `event_id` bigint(20) NOT NULL,
	    `filename` varchar(80) NOT NULL default '',
	    `frame` int(11) default NULL,
	    `file_type` int(11) default NULL,
	    `time_stamp` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	    `text_event` varchar(40) NOT NULL default '0000-00-00 00:00:00',
	    `event_time_stamp` timestamp NOT NULL default '0000-00-00 00:00:00',
	    `file_size` varchar(36) NOT NULL default '0',
            PRIMARY KEY (`id`),
	    KEY `time_stamp` (`time_stamp`),
	    KEY `event_time_stamp` (`event_time_stamp`)
	) ENGINE=MyISAM DEFAULT CHARSET=latin1;
