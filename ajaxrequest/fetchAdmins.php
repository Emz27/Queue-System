<?php


/*
 * Example PHP implementation used for the index.html example
 */

// DataTables PHP library
include( "../datatable/DataTables.php" );

// Alias Editor classes so they are easy to use
use
	DataTables\Editor,
	DataTables\Editor\Field,
	DataTables\Editor\Format,
	DataTables\Editor\Mjoin,
	DataTables\Editor\Options,
	DataTables\Editor\Upload,
	DataTables\Editor\Validate;

// Build our Editor instance and process the data coming from _POST
Editor::inst( $db, 'user' )
	->fields(
		Field::inst( 'user.firstname' )->validator( 'Validate::notEmpty' ),
		Field::inst( 'user.lastname' )->validator( 'Validate::notEmpty' ),
		Field::inst( 'user.gender' ),
		Field::inst( 'user.birth_date' )
			->validator( 'Validate::dateFormat', array(
				"format"  => Format::DATE_ISO_8601,
				"message" => "Please enter a date in the format yyyy-mm-dd"
			) )
			->getFormatter( 'Format::date_sql_to_format', Format::DATE_ISO_8601 )
			->setFormatter( 'Format::date_format_to_sql', Format::DATE_ISO_8601 ),
		Field::inst( 'user.town' )
			->options( Options::inst()
                ->table( 'town' )
                ->value( 'id' )
                ->label( 'description' )
            ),
		Field::inst( 'town.description' ),
		Field::inst( 'town.city' )
			->options( Options::inst()
                ->table( 'city' )
                ->value( 'id' )
                ->label( 'description' )
        ),
		Field::inst( 'city.description' ),
		Field::inst( 'city.region' )
			->options( Options::inst()
                ->table( 'region' )
                ->value( 'id' )
                ->label( 'description' )
        ),
		Field::inst( 'region.description' ),
		Field::inst( 'user.cellphone_number' ),
		Field::inst( 'user.telephone_number' ),
		Field::inst( 'user.email' ),
		Field::inst( 'user.username' ),
		Field::inst( 'user.password' )
			->validator( 'Validate::notEmpty' )
			->setFormatter( function ( $val ) {
				if($_POST['action'] == "create"){
					return password_hash($val, PASSWORD_DEFAULT);
				}
				else return $val;
				
			} ),
			
		Field::inst( 'user.user_type' )
			->setFormatter( function ( $val ) {
				return 1;
			} )
			
			/*
			->validator(function($val, $data, $opts){
				
				if($val != $data.confirm_password){
					return "Password does not match";
				}
				return true;
				
			})/*
		Field::inst( 'confirm_password' )
			->validator(function($val, $data, $opts){
				
				if($val != $data.user.password){
					return "Password does not match";
				}
				return true;
				
			})
			->validator( 'Validate::notEmpty' )
		
		
		*/
		
		
		/*
		->setFormatter( function ( $val ) {
 
			return password_hash($val], PASSWORD_DEFAULT);
			}
		)*/
	)
	->leftJoin( 'town',     'user.town', '=', 'town.id' )
	->leftJoin( 'city',     'city.id', '=', 'town.city' )
	->leftJoin( 'region',     'region.id', '=', 'city.region' )
	->process( $_POST )
	->json();
?>