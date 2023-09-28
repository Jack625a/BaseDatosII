//ID base de datos: appehaL1jZdmMxxkX
//API KEY: keyXXq6TrKV9tLMAj
//Conexion con la base de datos

//tipos variables javascript
//let alcance amplio
//var alcance corto
//const constantes


var apikey='keyXXq6TrKV9tLMAj';
var apiUrl='https://api.airtable.com/v0/appehaL1jZdmMxxkX/Productos';

//var apikey='su api key';
//var apiURL='https://api.airtable.com/v0/ID-BASEDEDATOS/TABLA-A-CONSULTAR';
//Conexion y autorizacion
fetch(apiUrl,
    {
    headers:{
        Authorization: Bearer (apikey)
    }
})
.then(response=>response.json())
.then(data=>{
    const productos=data.records;
    const listaProductos=document.querySelector(".lista-productos");

    let productoHTML='';
    productos.foreach(productos,index)=>{
        const titulo=productos.fields.Nombre;
        const precio=productos.fields.Precio;
        const descripcion=productos.fields.Descripcion;
        const imagen=productos.fields.Imagen;
        //organizar por 6 productos por fila
        if(index%6==0){
            if(index!=0){
               //cerrar el contenedor para los 6 primeros productos
               productoHTML+='</div>'; 
            }
            // Abrir el contenedor para las filas 
            productoHTML+='<div class="row">';
        
        //Agregar los productos en CARDVIEWS con html
        productoHTML+=`
        <div class="col-lg-2 mb-4">
        <div class="card">
            <img src="${imagen}" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title"> ${titulo}</h5>
                <p class="card-text">Precio: ${precio} Bs</p>
                <div class="input-group mb-3">
                    <input type="number" name="" id="" class="form-control" aria-label="Cantidad: ">
                </div>
                <button class="btn btn-success">
                        Agregar al Carrito
                </button>
                    </div>
                 </div>
            </div>`;
    }};

    //cierre de los 6 productos para cada fila 
    if(productos.length%6!==0){
        productoHTML+='</div>';
    }
    listaProductos.innerHTML=productoHTML;
})
.catch(error=>console.error(error));




