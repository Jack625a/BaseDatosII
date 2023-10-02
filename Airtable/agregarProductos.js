const apiKey2 = '';
const apiUrl2 = '';

//SOLICITUD PARA EL ACCESO A LOS DATOS
const productForm = document.getElementById('formularioProductos');

productForm.addEventListener('submit', function(event) {
    event.preventDefault();

    const nombre = document.getElementById('nombre').value;
    const precio = (document.getElementById('precio').value);
    const descripcion = document.getElementById('descripcion').value;
    const imagen = document.getElementById('imagen').value;

    const data = {
        fields: {
            Nombre: nombre,
            Precio: precio,
            Descripcion: descripcion,
            Imagen:  imagen,
        },
    };

    fetch(apiUrl2, {
        method: 'POST',
        headers: {
            'Authorization': `Bearer ${apiKey2}`,
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(data),
    })
    .then(response => response.json())
    .then(data => {
        // Procesa la respuesta de Airtable (puede incluir el ID del nuevo registro)
        console.log('Producto agregado:', data);
        alert('Producto agregado con éxito');
        //Redireccionar al Inicio
        setTimeout(function(){
            window.location.href='index.html';
        }, 3000);

        // Puedes redirigir a otra página o realizar otra acción después de agregar el producto.
    })
    .catch(error => {
        console.error('Error al agregar producto:', error);
        alert('Ocurrió un error al agregar el producto');
    });
});