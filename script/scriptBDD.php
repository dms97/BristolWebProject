<?php

require_once "../lib/File.php";
require_once "../lib/Security.php";
require_once "../model/Model.php";
require_once "../model/ModelUser.php";
require_once "../model/ModelModule.php";
require_once "../model/ModelExam.php";

// adding users
ModelUser::addUserBDD(100, Security::chiffrer("infres"), "Alan", "BOMBSKY", "alan.bombsky@yomail.com", 3, "0606060606", "somewhere");
ModelUser::addUserBDD(200, Security::chiffrer("infres"), "Thierry", "HUCHE", "thierry.huche@yomail.com", 3, "0606060606", "somewhere");
ModelUser::addUserBDD(300, Security::chiffrer("infres"), "Diego", "VEGA", "diego.vega@yomail.com", 3, "0606060606", "somewhere");
ModelUser::addUserBDD(400, Security::chiffrer("infres"), "Bob", "MCLANE", "bob.mclane@yomail.com", 3, "0606060606", "somewhere");
ModelUser::addUserBDD(500, Security::chiffrer("infres"), "Odile", "CROC", "odile.croc@yomail.com", 2, "0606060606", "somewhere"); // teacher
ModelUser::addUserBDD(600, Security::chiffrer("infres"), "admin", "ADMIN", "admin.admin@yomail.com", 1, "0606060606", "somewhere"); // administrator

// adding modules
ModelModule::addModuleBDD(1, 'WP');
ModelModule::addModuleBDD(2, 'WD');
ModelModule::addModuleBDD(3, 'CMS');
ModelModule::addModuleBDD(4, 'LESPI');
ModelModule::addModuleBDD(5, 'WDF');
ModelModule::addModuleBDD(6, 'WT');

// adding examcomponents
ModelExam::addExamBDD(1, 1, '2018-08-01', "Assignment", 30);
ModelExam::addExamBDD(2, 1, '2018-08-01', "Lab Test", 20);
ModelExam::addExamBDD(3, 1, '2018-08-01', "Written Exam", 50);
ModelExam::addExamBDD(4, 2, '2018-08-01', "Assignment", 50);
ModelExam::addExamBDD(5, 2, '2018-08-01', "Lab Test", 50);
ModelExam::addExamBDD(6, 4, '2018-08-01', "Assignment", 50);
ModelExam::addExamBDD(7, 4, '2018-08-01', "Assignment", 50);
ModelExam::addExamBDD(8, 5, '2018-08-01', "Assignment", 20);
ModelExam::addExamBDD(9, 5, '2018-08-01', "Lab Test", 30);
ModelExam::addExamBDD(10, 5, '2018-08-01', "Written Exam", 50);

// adding enrollments
ModelModule::addEnrolledBDD(1, 100);
ModelModule::addEnrolledBDD(2, 100);
ModelModule::addEnrolledBDD(4, 100);
ModelModule::addEnrolledBDD(5, 100);
ModelModule::addEnrolledBDD(1, 200);
ModelModule::addEnrolledBDD(4, 200);
ModelModule::addEnrolledBDD(5, 200);

// adding marks
ModelExam::addMarkBDD(1, 100, 60, 1, 0);
ModelExam::addMarkBDD(1, 100, 50, 2, 0);
ModelExam::addMarkBDD(1, 100, 85, 3, 0);
ModelExam::addMarkBDD(2, 100, 60, 4, 0);
ModelExam::addMarkBDD(2, 100, 30, 5, 1);
ModelExam::addMarkBDD(4, 100, 70, 6, 0);
ModelExam::addMarkBDD(4, 100, 70, 7, 0);
ModelExam::addMarkBDD(5, 100, 50, 8, 0);
ModelExam::addMarkBDD(5, 100, 10, 9, 1);
ModelExam::addMarkBDD(5, 100, 30, 10, 0);
ModelExam::addMarkBDD(1, 200, 80, 1, 0);
ModelExam::addMarkBDD(1, 200, 85, 2, 0);
ModelExam::addMarkBDD(1, 200, 60, 3, 0);
ModelExam::addMarkBDD(4, 200, 50, 4, 0);
ModelExam::addMarkBDD(4, 200, 50, 5, 1);
ModelExam::addMarkBDD(5, 200, 70, 6, 0);
ModelExam::addMarkBDD(5, 200, 60, 7, 0);

?>