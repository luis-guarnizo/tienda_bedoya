$("#formulariologin").on('submit', function (e) {

    e.preventDefault();
 
 
     usuario = $("#usuario").val();
     password = $("#password").val();
 
     
 
     $.post("../controllers/usuarios.php?op=verificar",
         {"usuario":usuario,"password":password},
         function(data)
         {
 
             data = JSON.parse(data);
             
             console.log(data)
 
           
             
             
         if (data!=null)
         {
 
             
           $(location).attr("href","productos_infantil.php");            
         }
         else
         {
           alert("Usuario y/o Password incorrectos");
         
            
         }
     });$
 })