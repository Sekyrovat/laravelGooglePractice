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