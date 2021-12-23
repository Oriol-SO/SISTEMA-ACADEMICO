$(document).ready(function() {

    $('.edit-user-alu').click(function(e){
      e.preventDefault();
      var user = $(this).attr('product1');
      var alu= $(this).attr('product2');
      var action='infouser';
      $.ajax({ 
          url:'php/update_alumno.php',
          type: 'POST',
          async:true,
          data:{action:action,user:user,alu:alu},
          success: function(response){
             // console.log(response);                
              if(response != 'error'){                            
                  var info = JSON.parse(response);
                  //console.log(info);                     
                  $('.nombreA').val(info.NOMBRE);
                  $('.apellidoA').val(info.APELLIDO);
                  $('.dniA').val(info.DNI);
                  $('.passA').val(info.PASSWORD);
                  $('.gradoA').val(info.GRADO);
                  $('.secA').val(info.SECCION);
                  $('.userA').val(info.ID_USER);
                  $('.aluA').val(info.ID_ALUMNO );              
            }
          },error:function(error){
            console.log(error);}       
      });    

      $('#verticalycentered').modal('show');
    });
    $("#cancelarupdatealu").click(function(e){
      var rellenecampostabs=document.getElementById('rellenacampostabs');
      rellenecampostabs.style.display='none';
    });



    $('.edit-user-prof').click(function(e){
      e.preventDefault();
      var user = $(this).attr('product1');
      var pro= $(this).attr('product2');
      var action='infouser';
      //console.log(user);
      $.ajax({ 
          url:'php/update_profesor.php',
          type: 'POST',
          async:true,
          data:{action:action,user:user,pro:pro},
          success: function(response){
             // console.log(response);                
              if(response != 'error'){                            
                  var info = JSON.parse(response);
                  //console.log(info);                     
                  $('.nombreP').val(info.NOMBRE);
                  $('.apellidoP').val(info.APELLIDO);
                  $('.dniP').val(info.DNI);
                  $('.passP').val(info.PASSWORD);
                  $('.userP').val(info.ID_USER);
                  $('.prof').val(info.ID_PROFE);              
            }
          },error:function(error){
            console.log(error);}       
      });    

      $('#verticalycentered').modal('show');
    });
    $("#cancelarupdatepro").click(function(e){
      var rellenecampostabs=document.getElementById('rellenacampostabs');
      rellenecampostabs.style.display='none';
    });
    

  });

 // let  myTable= document.querySelector("#tableAlumnosGrado"); 

 //let dataTable = new simpleDatatables.DataTable("#tableAlumnosGrado");

 function closemodal(archivo){
  $('#verticalycentered').modal('hide');
  window.location.href=archivo; 
}


  function sendDataAlu(){
    $.ajax({
          url:'php/update_alumno.php',
          type: 'POST',
          async:true,
          data:$('#Form-edit-alu').serialize(), 

        success: function(response){
            //console.log(response);
            if(response=='update'){           
              window.setTimeout(closemodal('tables.php'),0);  
            }
            if(response=='blank'){
              var rellenecampostabs=document.getElementById('rellenacampostabs');
              rellenecampostabs.style.display='flex';
            }                                       
        },
        error:function(error){
            console.log(error);}        
    
    });
   }
   function sendDataProf(){
    $.ajax({
          url:'php/update_profesor.php',
          type: 'POST',
          async:true,
          data:$('#Form-edit-prof').serialize(), 

        success: function(response){
            //console.log(response);
            if(response=='update'){            
              window.setTimeout(closemodal('tablesprof.php'),0);  
            }
            if(response=='blank'){
              var rellenecampostabs=document.getElementById('rellenacampostabs');
              rellenecampostabs.style.display='flex';
            }                                       
        },
        error:function(error){
            console.log(error);}        
    
    });
   }