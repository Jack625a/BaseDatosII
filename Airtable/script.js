//conexion con la API
const apiKey = '';
const apiUrl = '';

//SOLICITUD PARA EL ACCESO A LOS DATOS
fetch(apiUrl, {
    headers: {
        Authorization: `Bearer ${apiKey}`
    }
})

//OBTNECION DE LOS DATOS
.then(response => response.json())
.then(data => {
    const products = data.records;
    const productLista = document.querySelector('.lista-productos');

    let productHTML = ''; // Inicializa una cadena para acumular los productos
//Iniciamos el recorrido a los datos obtenidos de Airtable
    products.forEach((product, index) => {
        const nombre = product.fields.Nombre;
        
        const precio = product.fields.Precio;
        const descripcion = product.fields.Descripcion;
        const imagen = product.fields.Imagen;

        if (index % 6 === 0) {
            if (index !== 0) {
                // Cierra la fila anterior
                productHTML += '</div>';
            }
            // Abre una nueva fila
            productHTML += '<div class="row">';
        }

        // Agrega el producto como una columna
        productHTML += `
            <div class="col-lg-2 mb-4">
                <div class="card">
                    <img src="${imagen}" class="card-img-top" alt="${nombre}">
                    <div class="card-body">
                        <h5 class="card-title">${nombre}</h5>
                        
                        <p class="card-text">Precio: ${precio}</p>
                        <!-- Input para cantidad del producto -->
                        <div class="input-group mb-3">
                            <input type="number" class="form-control" placeholder="Cantidad" aria-label="Cantidad" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <!-- Botón dinámico para agregar al carrito -->
                                <button class="btn btn-success addToCart">Agregar al Carrito</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `;
    });

    // Cierra la última fila si no es múltiplo de seis
    if (products.length % 6 !== 0) {
        productHTML += '</div>';
    }

    productLista.innerHTML = productHTML;
})
.catch(error => console.error(error));
