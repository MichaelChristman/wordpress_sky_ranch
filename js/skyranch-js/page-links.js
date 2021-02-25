/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


//alert('This is page links');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/*
 * Sends the ajax requests for pages and posts from the primary navigation
 */
( function( $ ) {
    
    $( document ).ready(function() {
            /*
             *  Get all the anchor tags in the entry-meta
             */
//              var entryMetaLinks = $('.entry-meta a');

            //toggle the menu on smaller screens
            var masthead       = $( '#masthead' );
            var menuToggle     = masthead.find( '.menu-toggle' );
            var mainNavigation = masthead.find( '.main-navigation' );
            
            
             
             
//             primaryMenuLinks.addClass('ajax-menu-anchor');

            $('#ajax-action-area').on('click','a',function(e){
                 
                 e.preventDefault();
                 
                 
                 
                 //parse the href attribute to determine the target page
                 var targetPage = $(this).attr('href').split("/");
                 
                 //if the page belongs to this website
                 var currentURL = window.location.href;
                 
                 if( currentURL.indexOf(targetPage[2]) !== -1 && targetPage.length > 5 ){
                        
                        var targetPageSlug = '';
                        var categorySlug = '';
                        var tagSlug = '';
                        var pageNumber = '';
                        var pagedNumber = '';
                        
                        var isItAPageSlug = true;
                        
                        //if the previous page link is the target
                        if( $(this).hasClass('prev') && $(this).hasClass('page-numbers') ){
                            
                            //if the page is denoted
                            if( isInteger( targetPage[5] ) ){
                                //set the paged number
                                pagedNumber = targetPage[5];
                            }else if( targetPage[4] == 'blog' && targetPage[5] == 'page'){
                                 pagedNumber = targetPage[6];
                            }else{
                                pagedNumber = 1;
                            }
                                
                            isItAPageSlug = false;    
                        }

                        //determine if the target is an author archive
                        if(targetPage[4] == 'author'){
                            var pageAuthor = targetPage[5];

                            isItAPageSlug = false;
                        }

                        //test if the target is a dated archive
                        if( isInteger(targetPage[4]) ){
                             //for any archive that uses the year as the first portion of the slug
                             var archiveYear = targetPage[4];
                             var archiveMonth = targetPage[5];

                             if( isInteger( targetPage[6] ) ){
                                 //this is likley the day related to the archive
                                 var archiveDay = targetPage[6];
                             }
                             
                             //test if there is a post title
                             if( targetPage[7] ){
                                 var postName = targetPage[7];
//                                 alert(postName);
                             }
                             
                             //check if the page has pagination
                             if( isInteger(targetPage[8]) ){
                                 pageNumber = targetPage[8];
                             }

                             isItAPageSlug = false;
                        }
                        
                        //test if the target has a category
                        if( targetPage[4] == 'category'){
                            
                            categorySlug = targetPage[5];
                            //create a string for the slug that appears after category
//                           for(i = 4; i < targetPage.length-1; i++){
//
//                               if(i == 4 ){
//                                   categorySlug = targetPage[i];
//                               }else{
//                                   categorySlug = categorySlug + "/" + targetPage[i];
//                               }
//
//                           }
//                           alert(categorySlug);
                           
                           isItAPageSlug = false;
                        }
                        
                        //test if the target has a tag
                        if( targetPage[4] == 'tag'){
                            
                            tagSlug = targetPage[5];
                           
                           isItAPageSlug = false;
                        }
                        
                        //Used for pagination links on index and archive pages
                        //When homepage is set to Your Latest Posts
                        if( targetPage[4] == 'page'){
                                                    
                            pagedNumber = targetPage[5];
                                
//                           pageNumber = find_page_number( $(this).clone() );
                            isItAPageSlug = false;
                           
                           
                           
                        }else if(targetPage[5] == 'admin-ajax.php' && targetPage[6] == 'page'){
                            pagedNumber = targetPage[7];
//                           pageNumber = find_page_number( $(this).clone() );
                            isItAPageSlug = false;
                        }
                        
                        //When the frontpage is a static page and the blog index is denoted
                        if( targetPage[4] == 'blog'){
                            
                            if( isInteger(targetPage[5]) ){
                                pagedNumber = targetPage[5];
                                
                            }else {
                                pagedNumber = 1;
                            }
                            isItAPageSlug = false;
                        }
                        
                        //test for page slugs
                        if( isItAPageSlug == true ){
                            //create a string for the slug that appears after site name
                            //will also feed 
                            
                           for(i = 4; i < targetPage.length-1; i++){

                               if(i == 4 ){
                                   targetPageSlug = targetPage[i];
                               }else{
                                   targetPageSlug = targetPageSlug + "/" + targetPage[i];
                               }

                           }
                           
//                           alert(targetPageSlug);
                        }

       //                 alert(targetPage);
       //                 var targetPageSlug = targetPage[targetPage.length - 2];
       //                 alert(targetPageSlug);



                        $.ajax({
                               url: ajaxnavigation.ajaxurl,
                               type: 'POST',
                               data: {
                                       action: 'ajax_navigation',
                                       query_vars: ajaxnavigation.query_vars,
                                       slug: targetPageSlug,
                                       page: pageNumber,
                                       paged: pagedNumber,
                                       post_slug: postName,
                                       author: pageAuthor,
                                       year: archiveYear,
                                       month: archiveMonth,
                                       day: archiveDay,
                                       category: categorySlug,
                                       tag: tagSlug
                               },
                               success: function( html ) {
                                       $('#main').contents().each(function() {
                                           if(this.nodeType === Node.COMMENT_NODE) {
                                               $(this).remove();
                                           }
                                       });
                                       $('#main').find( 'article' ).remove();
                                       $('#main').find( 'section.no-results' ).remove();
                                       $('#main').find( 'nav.post-navigation').remove();
                                       $('#main').find( 'nav.navigation.pagination').remove();
                                       $('#main').find( '#comments').remove();
                                       $('#main').append( html );

                               }
                       });
                       
                       //toggle the menu on smaller screens
                        if ( 'none' !== menuToggle .css( 'display' ) ){
                            mainNavigation.removeClass( 'toggled-on' );
                            menuToggle.attr( 'aria-expanded' , 'false' );
                        }

                        $('html, body').animate({
                            scrollTop: $("#ajax-action-area").offset().top
                        }, 500);
                     
                     
                 }else if( (currentURL.indexOf(targetPage[2]) !== -1 && targetPage.length == 5) || (currentURL.indexOf(targetPage[3]) !== -1 && targetPage.length == 4) ){
                     window.open(window.location.href,"_self");
                 }else{
                     
                     window.open($(this).attr('href'),'_blank');
                 }
//                 alert(window.location.href );
                 
             });
     });
     
    function isInteger(x) {
        return x % 1 === 0;
    }
    
    function find_page_number( element ) {
            element.find('span').remove();
            alert(parseInt( element.html() ));
            return parseInt( element.html() );
    }
 

} )( jQuery );