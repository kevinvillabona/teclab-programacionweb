$(document).ready(function(){

    //Validaciones para abm de categorias
    $("#form_categoria").on("submit", function(e){
        e.preventDefault();

        const categoria_name = $.trim($("#categoria_name").val());
        
        let error = [];
        if(categoria_name ==""){
            error.push("Por favor, ingrese un nombre.")
        }
        //Si hay algun error, se imprime el alerta con la concatenación de los mismos y se retorna false
        if(error.length > 0){
            alert(error.join("\n"))
            return false;
        }
        return true;
    })


    //Validaciones para abm de productos
    //Primero compruebo que las extensiones de las imagenes sean correctas. Por el momento aceptaré solo jpg/jpeg
    $("#producto_img").change(function(e) {
        const img = e.target.files[0];
        const extension = img.name.split(".").pop().toLowerCase();
      
        if (extension !== "jpeg" && extension !== "jpeg") {
            alert('Por favor, selecciona solo archivos de imagen en formato JPG o JPEG.');
            $('#producto_img').val(''); //Se limpia el input
            return;
        }
      });

    $("#form_producto").on("submit", function(e){
        e.preventDefault();
        
        const producto_name = $.trim(("#producto_name").val());
        const producto_categ = $("#producto_categ").val();
        const producto_price = $.trim($("#producto_price").val());
        const producto_desc = $.trim($("#producto_desc").val());
        const producto_img = $("#producto_img").val();

        let error = [];
        if(producto_name ==""){
            error.push("Por favor, ingrese un nombre.")
        }
        if(producto_categ =="" || producto_categ == null){
            error.push("Por favor, seleccione una categoría.")
        }
        if(producto_price ==""){
            error.push("Por favor, ingrese un precio.")
        }
        if(producto_desc ==""){
            error.push("Por favor, ingrese una descripción.")
        }
        if(producto_img == ""){
            error.push("Por favor, ingrese una imagen.")
        }
        //Si hay algun error, se imprime el alerta con la concatenación de los mismos y se retorna false
        if(error.length > 0){
            alert(error.join("\n"))
            return false;
        }
        return true;
    })

})

