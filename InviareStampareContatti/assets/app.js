/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';

// start the Stimulus application
import './bootstrap';
var $ = require('jquery'); 




    
      

       //json

      
       $("#updateJson").click(function(){

        $.get('/api/utenti', function( utenti ){
          console.log(utenti);
          var out = '';
  
          $.each(utenti, function(key, val) {
              
              out += '<li>'+ val.id +": "+ val.titolo + ' - '+ val.testo +' '+ val.email +' '+'"></li>';  
          });
      
           $(".listaAggiornata").append( out );
      
         });
  

      });
   
   