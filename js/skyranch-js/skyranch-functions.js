//Create Expanding category and tag buttons

(function( $ ) {
    
    var addCategoryButtons = function(container){
//        var entryHeader, categoryLinks;
   


        // Add category toggle that displays category list.
        var categoryToggle = $( '<button />', { 'class': 'category-toggle', 'aria-expanded': false , text:" "+skyranchScreenReaderText.categories})
                .prepend( $( '<i />', { 'class': 'category-symbol fa fa-list-ul', text: " "}) )
                .append( $( '<span />', { 'class': 'screen-reader-text', text: skyranchScreenReaderText.expandCategories }) );

        container.find('.cat-links').prepend( categoryToggle );
        
        container.find( '.category-toggle' ).click( function( e ) {
			var _this = $( this ),
				screenReaderSpan = _this.find( '.screen-reader-text' );
                              
			e.preventDefault();
			_this.toggleClass( 'toggled-on' );
                        _this.parent().toggleClass('toggled-on');
			

			_this.attr( 'aria-expanded', _this.attr( 'aria-expanded' ) === 'false' ? 'true' : 'false' );

			screenReaderSpan.text( screenReaderSpan.text() === skyranchScreenReaderText.expandCategories ? skyranchScreenReaderText.collapseCategories : skyranchScreenReaderText.expandCategories ); 
		});
        
    }
    
    var addTagButtons = function(container){
//        var entryHeader, tagLinks;
//    
//        entryHeader = $('header.entry-header');
//        tagLinks = entryHeader.find('.tags-links');


        // Add category toggle that displays category list.
        var tagToggle = $( '<button />', { 'class': 'tag-toggle', 'aria-expanded': false , text:" "+skyranchScreenReaderText.tags})
                .prepend( $( '<i />', { 'class': 'tag-symbol fa fa-tags', text: ""}) )
                .append( $( '<span />', { 'class': 'screen-reader-text', text: skyranchScreenReaderText.expandTags }) );

//        tagLinks.prepend( tagToggle );
        
        container.find('.tags-links').prepend( tagToggle );
        
        container.find( '.tag-toggle' ).click( function( e ) {
			var _this = $( this ),
				screenReaderSpan = _this.find( '.screen-reader-text' );
                              
			e.preventDefault();
			_this.toggleClass( 'toggled-on' );
                        _this.parent().toggleClass('toggled-on');
			

			_this.attr( 'aria-expanded', _this.attr( 'aria-expanded' ) === 'false' ? 'true' : 'false' );

			screenReaderSpan.text( screenReaderSpan.text() === skyranchScreenReaderText.expandTags ? skyranchScreenReaderText.collapseTags : skyranchScreenReaderText.expandTags ); 
		});
    }
   
   addCategoryButtons($('.entry-categories'));
   addTagButtons($('.entry-tags'));
   
//    $( document ).ready(function() {
//            addCategoryButtons();
//            addTagButtons();
//            
//    });
    
    
    
//    $( document ).ajaxComplete(function() {
//            addCategoryButtons();
//            addTagButtons();
//    });
    
})( jQuery );

/*
 * Add full figure wrap to create full bleed images on smaller screens
 */
(function( $ ) {
    
    $('figure.wp-caption.aligncenter').removeAttr('style');
    $('img.aligncenter').wrap('<figure class="centered-image" />');
    
})( jQuery );

/*
 * Add class to comment author v-card if gravatar is shown.
 */
(function( $ ) {
    
    var commentAuthor = $('.comment-author');
    
    if (commentAuthor.find('img.avatar').length) {
        commentAuthor.addClass('has-gravitar');
        commentAuthor.closest('.comment-meta').find('.comment-metadata').addClass('has-gravitar');
    }
    
//    $().closest('div.comment-author').addClass('has-gravitar');
    
})( jQuery );

(function( $ ) {
    
//    $('.home .site-content').prepend('<span class="body-gradient""></span>');
    
    
})( jQuery );

/*
 * Prepend font awesome arrow to the model pullout
 */
(function( $ ) {
    
    $('.home .type-model .entry-title a')
            .prepend( $( '<i />', { 'class': 'fas fa-arrow-left', text: ""}) );
   
})( jQuery );