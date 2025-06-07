fetch("https://tuservidor.cleverapps.io/api/productos.php")
  .then(res => res.json())
  .then(data => {
    console.log(data);
    // aquí llenas HTML dinámicamente con los datos recibidos
  })
  .catch(err => console.error("Error:", err));
//ejemplo de cómo llenar un elemento HTML con los datos