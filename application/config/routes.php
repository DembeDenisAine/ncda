<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'dashboard/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


//DISTRICTS
	$route['district-list'] = 'districts/index';
	$route['save-district'] = 'districts/store';
	$route['edit-district/(:num)'] = 'districts/singleDistrict/$1';
	$route['update-district/(:num)'] = 'districts/update/$1';
	$route['delete-district/(:num)'] = 'districts/delete/$1';
	$route['teams-district/(:num)'] = 'districts/teams/$1';
	$route['create-branch-team/(:num)'] = 'districts/create_team/$1';
	$route['save-branch-team'] = 'districts/save_branch_team';



//PROJECTS
	$route['project-list'] = 'projects/index';
	$route['create-project'] = 'projects/create';
	$route['save-project'] = 'projects/create';
	$route['edit-project/(:num)'] = 'projects/singleProject/$1';
	$route['update-project/(:num)'] = 'projects/update/$1';
	$route['delete-project/(:num)'] = 'projects/delete/$1';


//OBJECTIVES
	$route['objective-list'] = 'objectives/index';
	$route['objective-list/(:num)'] = 'objectives/index/$1';
	$route['create-objective/(:num)'] = 'objectives/create/$1';
	$route['save-objective'] = 'objectives/create';
	$route['edit-objective/(:num)'] = 'objectives/singleObjective/$1';
	$route['update-objective/(:num)'] = 'objectives/update/$1';
	$route['delete-objective/(:num)'] = 'objectives/delete/$1';


//ACTIVITIES
	$route['activity-list'] = 'activities/index';
	$route['activity-list/(:num)'] = 'activities/index/$1';
	$route['create-activity/(:num)'] = 'activities/create/$1';
	$route['save-activity'] = 'activities/create';
	$route['edit-activity/(:num)'] = 'activities/singleActivity/$1';
	$route['update-activity/(:num)'] = 'activities/update/$1';
	$route['delete-activity/(:num)'] = 'activities/delete/$1';


//PARAMETERS
	$route['parameter-list'] = 'parameters/index';
	$route['parameter-list/(:num)'] = 'parameters/index/$1';
	$route['create-parameter/(:num)'] = 'parameters/create/$1';
	$route['save-parameter'] = 'parameters/create';
	$route['edit-parameter/(:num)'] = 'parameters/singleParameter/$1';
	$route['update-parameter/(:num)'] = 'parameters/update/$1';
	$route['delete-parameter/(:num)'] = 'parameters/delete/$1';

//FACILITIES
	$route['facility-list'] = 'facilities/index';
	$route['facility-list/(:num)'] = 'facilities/index/$1';
	$route['create-facility/(:num)'] = 'facilities/create/$1';
	$route['save-facility'] = 'facilities/create';
	$route['edit-facility/(:num)'] = 'facilities/singleParameter/$1';
	$route['update-facility/(:num)'] = 'facilities/update/$1';
	$route['delete-facility/(:num)'] = 'facilities/delete/$1';
	$route['facility-teams/(:num)'] = 'facilities/facility_teams/$1';
	$route['create-facility-member/(:num)'] = 'facilities/create_team/$1';

//Meetings
	$route['meetings']       = 'meetings/index';
	$route['meeting/(:num)'] = 'meetings/meetingDetail/$1';
	$route['create-meeting'] = 'meetings/create';
	$route['save-meeting']   = 'meetings/store';
	$route['contacts']       = 'meetings/contacts';
	$route['save-contact']   = 'meetings/saveContact';
