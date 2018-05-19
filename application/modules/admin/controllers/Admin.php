<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends MY_Controller {
		
		function __construct()
		{
			parent::__construct();
		}

		function roomtypes()
		{
			echo Modules::run('Roomtype/roomtypes');
		}

		function floormaster()
		{
			echo Modules::run('Floors/floors');
		}

		function roommaster()
		{
			echo Modules::run('Rooms/rooms');
		}

		function departments()
		{
			echo Modules::run('Department/departments');
		}

		
}
