$(function () {

    $('#register').click(function(){
        //trigger modal
        $('#myModal').modal();
    });

 //Validation des données du formulaire
        
        //$('#register').validate();
        // Scrollspy fluide sur le header
        $('header a').on('click', function(e) {
          e.preventDefault();
          var hash = this.hash;
          $('html, body').animate({
            scrollTop: $(this.hash).offset().top
          }, 1000, function(){
            window.location.hash = hash;
          });
        });

        // Scrollspy fluide sur le header
        $('footer a').on('click', function(e) {
          e.preventDefault();
          var hash = this.hash;
          $('html, body').animate({
            scrollTop: $(this.hash).offset().top
          }, 1000, function(){
            window.location.hash = hash;
          });
        });



 /*    
var options = {
  valueNames: [ 'name']
};

var userList = new List('users', options);

var monkeyList = new List('test-list', { 
  valueNames: ['name'], 
  plugins: [ ListFuzzySearch() ] 
});

$(".name").click(function(){
  
  var tag =  this.getElementsByTagName('a');
  var titre = tag.innerHTML();
  alert(titre);

});*/

//NO CODE SHOULD GO UNDER
});