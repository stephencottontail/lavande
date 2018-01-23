/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
jQuery( document ).ready( function( $ ) {
	var body = $( 'body' );
	var menuContainer = $( '.site-navigation' );
	var menu = menuContainer.find( 'ul' );
	var button = menuContainer.find( 'button' );
	
	if ( ! menu ) {
		return;
	}
	
	menu.attr( 'aria-expanded', 'false' );
	button.on( 'click', function( e ) {
		e.preventDefault();
		
		body.toggleClass( 'menu-active' );
		if ( false == menu.attr( 'aria-expanded' ) ) {
			menu.attr( 'aria-expanded', 'true' );
			button.attr( 'aria-expanded', 'true' );
		} else {
			menu.attr( 'aria-expanded', 'false' );
			button.attr( 'aria-expanded', 'false' );
		}
	} );
} );
