$( function() { 
    $("#formulario").submit(function(e) {

        e.preventDefault(); 
    
        const nombres = $("#nombres").val();
        const apellidos = $("#apellidos").val();
        const perfil = $("#perfil").val();
        const email = $("#email").val();
        const password = $("#password").val();
        
        formd = new FormData();
        formd.append('nombres', nombres);
        formd.append('apellidos', apellidos);
        formd.append('perfil', perfil);
        formd.append('email', email);
        formd.append('password', password);
        
        $.ajax({
            processData: false,
            contentType: false,
            method:'POST',
            url: "user/save",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: formd
          }).done(function(res) {
            if(res.estado){
                $("#nombres").val('');
                $("#apellidos").val('');
                $("#perfil").val('');
                $("#email").val('');
                $("#password").val('');
                alert(res.mensaje);
            }
        });
    
        
    });
});


