$( function() { 
    $("#formulario").submit(function(e) {

        e.preventDefault(); 
    
        const codigo = $("#codigo").val();
        const nombre = $("#nombre").val();
        const desc = $("#desc").val();
        const categoria = $("#categoria").val();
        const medida = $("#medida").val();
        
        formd = new FormData();
        formd.append('codigo', codigo);
        formd.append('nombre', nombre);
        formd.append('desc', desc);
        formd.append('categoria', categoria);
        formd.append('medida', medida);
        
        $.ajax({
            processData: false,
            contentType: false,
            method:'POST',
            url: "productos/save",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: formd
          }).done(function(res) {
            if(res.estado){
                $("#codigo").val('');
                $("#nombre").val('');
                $("#desc").val('');
                $("#categoria").val('');
                $("#medida").val('');
                alert(res.mensaje);
            }
        });
    
        
    });

    $("#formulario-update").submit(function(e) {

        e.preventDefault(); 
        const id = $("#id").val();
        const codigo = $("#codigo").val();
        const nombre = $("#nombre").val();
        const desc = $("#desc").val();
        const categoria = $("#categoria").val();
        const medida = $("#medida").val();
        console.log(nombre)
        
        
        
        $.ajax({
            processData: false,
            contentType: false,
            handleAs : "json",
            method:'PUT',
            url: "productos/update",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                "Content-Type": "application/json"
            },
            data: JSON.stringify({
                "id":id,
                "codigo":codigo,
                "nombre":nombre,
                "desc":desc,
                "categoria":categoria,
                "medida":medida
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

function llenar(id,codigo,nombre,desc,categoria,medida){
    $("#id").val(id);
    $("#codigo").val(''+codigo+'');
    $("#nombre").val(''+nombre+'');
    $("#desc").val(''+desc+'');
    $("#categoria").val(''+categoria+'');
    $("#medida").val(''+medida+'');
    console.log(id, codigo,nombre,desc,categoria,medida);
}

function eliminar(id){
       
    let con = confirm("Eliminar el registro?");
    if(con){
        $.ajax({
            processData: false,
            contentType: false,
            handleAs : "json",
            method:'delete',
            url: "productos/delete/"+id,
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
