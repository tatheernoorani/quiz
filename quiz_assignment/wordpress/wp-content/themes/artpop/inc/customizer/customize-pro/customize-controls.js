( function( api ) {

	// Extends our custom "artpop-pro" section.
	api.sectionConstructor['artpop'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );
