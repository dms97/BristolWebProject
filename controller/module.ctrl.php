<?php

<<<<<<< HEAD
	class module.ctrl {
		
		protected static $object = 'module';
		
		public static function readAll() {
			$controller='module';
			$view='send';
			require File::build_path(array('view','view.php'));
		}
		
		
		// Shows all modules with individual marks
		public static function readStudent() {
			// only available for students
		}
		
		// Shows all modules with mean of class
		public static function readTeacher() {
			// only available for students
		}
		
		// Input data for a new module
		public static function create() {
			// only available for admins
		}
		
		// Add a new module
		public static function created() {
			// only available for admins
		}
		
		// Input new data for module
		public static function update() {
			// only available for admins
		}
		
		// Add new data for module
		public static function updated() {
			// only available for admins
		}
		
		// Wants to delete a module
		public static function delete() {
			// only available for admins
		}
		
		// Delete a module
		public static function deleted() {
			// only available for admins
		}
		
		
	}
	
=======
	include_once('../view/module.view.php');

>>>>>>> 7b1afef995155898a903ab78f2fe2ae6203d703b
?>
	
	