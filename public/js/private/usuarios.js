$( function() { 
    
    $("#formulario-update").submit(function(e) {

        e.preventDefault(); 
        const id = $("#id").val();
        const nombre = $("#nombre").val();
        const apellido = $("#apellido").val();
        const email = $("#email").val();
        const perfil = $("#perfil").val();
    
        
        $.ajax({
            processData: false,
            contentType: false,
            handleAs : "json",
            method:'PUT',
            url: "usuarios/update",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                "Content-Type": "application/json"
            },
            data: JSON.stringify({
                "id":id,
                "nombre":nombre,
                "apellido":apellido,
                "email":email,
                "perfil":perfil
            })
          }).done(function(res) {
            if(res.estado){
            
                alert(res.mensaje);
                
                $("#btn_close").click();
                location.reload()
            }
        });
    
    });

    
});

function llenar(id,nombre,apellido,email, perfil){
    $("#id").val(id);
    $("#nombre").val(''+nombre+'');
    $("#apellido").val(''+apellido+'');
    $("#email").val(''+email+'');
    $("#perfil").val(''+perfil+'');
    console.log(id,nombre,apellido,email, perfil)
}

function eliminar(id){
       
    let con = confirm("Eliminar el registro?");
    if(con){
        $.ajax({
            processData: false,
            contentType: false,
            handleAs : "json",
            method:'delete',
            url: "usuario/delete/"+id,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                "Content-Type": "application/json"
            },
            
          }).done(function(res) {
            if(res.estado){
            
                alert(res.mensaje);
                $("#btn_close").click();
                location.reload()
            }
        });
    }
}