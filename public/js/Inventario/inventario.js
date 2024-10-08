// SELECCIÓN DE PRODUCTOS QUE CORRESPONDEN A LA CATEGORÍA
document.getElementById('category-select').addEventListener('change', function() {
    var categoryId = this.value;
    
    // Limpiar el select de productos
    var productSelect = document.getElementById('product-select');
    productSelect.innerHTML = '<option value="">Seleccione un producto</option>';
    
    if (categoryId) {
        // Hacer la solicitud AJAX para obtener los productos
        fetch(`/get-products-by-category-inv/${categoryId}`)
            .then(response => response.json())
            .then(data => {
                data.forEach(function(product) {
                    var option = document.createElement('option');
                    option.value = product.id;
                    option.text = product.nombre_producto;
                    productSelect.appendChild(option);
                });
            })
            .catch(error => console.error('Error:', error));
    }
});

// BUSQUEDA DE PRODUCTO EN INVENTARIO
$('#tb-articulo').DataTable({
    "responsive": true,
    "columnDefs": [
      // { targets: [1,2,3], render: $.fn.dataTable.render.number( ',', '.', 2, '$ ' ) },
      {
        responsivePriority: 1,
        targets: 0
      }
    ],
    "order": [
      [0, "asc"]
    ],
    "pageLength": 15,
    "lengthChange": false,
    // "paging":   false,
    // "ordering": false,
    // "info":     false
    "language": {
      "decimal": ".",
      "thousands": ",",
      search: "Buscar Producto:",
      lengthMenu: "Mostrar _MENU_ registros por página",
      zeroRecords: "No hay registros para mostrar",
      info: "Mostrando página _PAGE_ de _PAGES_",
      infoEmpty: "No hay registros disponibles",
      infoFiltered: "(filtrado de _MAX_ de registros)",
      paginate: {
        first: "Primera",
        previous: "Anterior",
        next: "Siguiente",
        last: "Última"
      }
    },
    // Habilitar búsqueda insensible a acentos con el plugin accent-neutralise
    "search": {
      "caseInsensitive": true, // Habilita la búsqueda insensible a mayúsculas y minúsculas
      "accentNeutralise": true // Habilita la búsqueda insensible a acentos
    }
});