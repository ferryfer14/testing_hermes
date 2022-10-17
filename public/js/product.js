$(document).ready(function(){
    $('.checkout').click(function(e){
        e.preventDefault();
        location.href = APP_URL+"/checkout";
    });
});