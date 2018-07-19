<?php

require_once "../lib/File.php";
require_once "../lib/Security.php";
require_once "../model/Model.php";
require_once "../model/ModelUser.php";
require_once "../model/ModelModule.php";
require_once "../model/ModelExam.php";

// adding users
ModelUser::addUser(100, Security::chiffrer("infres"), "Alan", "BOMBSKY", "alan.bombsky@yomail.com", 3, "0606060606", "somewhere");
ModelUser::addUser(200, Security::chiffrer("infres"), "Thierry", "HUCHE", "thierry.huche@yomail.com", 3, "0606060606", "somewhere");
ModelUser::addUser(300, Security::chiffrer("infres"), "Diego", "VEGA", "diego.vega@yomail.com", 3, "0606060606", "somewhere");
ModelUser::addUser(400, Security::chiffrer("infres"), "Bob", "MCLANE", "bob.mclane@yomail.com", 3, "0606060606", "somewhere");
ModelUser::addUser(500, Security::chiffrer("infres"), "Odile", "CROC", "odile.croc@yomail.com", 2, "0606060606", "somewhere"); // teacher
ModelUser::addUser(600, Security::chiffrer("infres"), "admin", "ADMIN", "admin.admin@yomail.com", 1, "0606060606", "somewhere"); // administrator

// adding modules
ModelModule::addModule(1, 'WP');
ModelModule::addModule(2, 'WD');
ModelModule::addModule(3, 'CMS');
ModelModule::addModule(4, 'LESPI');
ModelModule::addModule(5, 'WDF');
ModelModule::addModule(6, 'WT');

// adding examcomponents
ModelExam::addExam(1, 1, '2018-08-01', "Assignment", 30);
ModelExam::addExam(2, 1, '2018-08-01', "Lab Test", 20);
ModelExam::addExam(3, 1, '2018-08-01', "Written Exam", 50);
ModelExam::addExam(4, 2, '2018-08-01', "Assignment", 50);
ModelExam::addExam(5, 2, '2018-08-01', "Lab Test", 50);
ModelExam::addExam(6, 4, '2018-08-01', "Assignment", 50);
ModelExam::addExam(7, 4, '2018-08-01', "Assignment", 50);
ModelExam::addExam(8, 5, '2018-08-01', "Assignment", 20);
ModelExam::addExam(9, 5, '2018-08-01', "Lab Test", 30);
ModelExam::addExam(10, 5, '2018-08-01', "Written Exam", 50);

// adding enrollments
ModelModule::addEnrolled(1, 100);
ModelModule::addEnrolled(2, 100);
ModelModule::addEnrolled(4, 100);
ModelModule::addEnrolled(5, 100);
ModelModule::addEnrolled(1, 200);
ModelModule::addEnrolled(4, 200);
ModelModule::addEnrolled(5, 200);

// adding marks
ModelExam::addMark(1, 100, 60, 1, 0);
ModelExam::addMark(1, 100, 50, 2, 0);
ModelExam::addMark(1, 100, 85, 3, 0);
ModelExam::addMark(2, 100, 60, 4, 0);
ModelExam::addMark(2, 100, 30, 5, 1);
ModelExam::addMark(4, 100, 70, 6, 0);
ModelExam::addMark(4, 100, 70, 7, 0);
ModelExam::addMark(5, 100, 50, 8, 0);
ModelExam::addMark(5, 100, 10, 9, 1);
ModelExam::addMark(5, 100, 30, 10, 0);
ModelExam::addMark(1, 200, 80, 1, 0);
ModelExam::addMark(1, 200, 85, 2, 0);
ModelExam::addMark(1, 200, 60, 3, 0);
ModelExam::addMark(4, 200, 50, 4, 0);
ModelExam::addMark(4, 200, 50, 5, 1);
ModelExam::addMark(5, 200, 70, 6, 0);
ModelExam::addMark(5, 200, 60, 7, 0);

?>