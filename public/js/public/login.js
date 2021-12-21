$( function() { 
    $("#formulario").submit(function(e) {

        e.preventDefault(); 
    
        const email = $("#email").val();
        const password = $("#password").val();
        
        formd = new FormData();
        formd.append('email', email);
        formd.append('password', password);
       
        $.ajax({
            processData: false,
            contentType: false,
            method:'POST',
            url: "auth",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: formd
          }).done(function(response) {
           console.log(response)
           if(response.auth){
               alert("logeado")
               window.location.href = "private_home";
           }
        });
    
        
    });
});


