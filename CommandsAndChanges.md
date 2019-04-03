# 2 April 2019
	* Fixed hopefully last issues with eloquent tables.
		* Many to Many already working, with sample so as to properly create more.
			* One to Many
			* One to One
		* Routes already for the provided scenarios.
	* Also finished with the modification to the table name of the pivot table of "areas_proyectos".
		* It had the wrong name before, messing up the relations.
		* This table will be used for the HasManyThrough

# 1 April 2019 
	* Fixed issue with tables.
		* They had wrong columns for some attributes I didn't notice before.
		* Also fixed fillable values in models, so that they work correctly.
		* Modified the web.php in route so that it's usable again.
	* Continued with web routes and controllers.
		* Added routes with eloquent for the following:

# 27 March 2019 7:33pm
	* Added to the migrations the foreign keys needed.
		1.  Used 
				* '''terminal
					php artisan make:migration add_id_de_area_y_de_proyecto_to_backlogs_table --table="backlogs"
				'''
				* To add the extra columnns for the keys to the tables, with the appropiate name and table name.
		2. Also used
			* '''terminal
				php artisan make:model Proyecto -m
			'''
			* To create the Model and migration for the required tables.