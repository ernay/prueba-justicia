<div>
    <table border="1">
        <tr>
            <td>DATOS DE COMPRA</td>
        </tr>

            @foreach ($datosCompra as $comp)
            <tr>
                <td>Cliente</td>
                <td>{{ $comp->obtenerCliente->name }}</td>
            </tr>
            <tr>
                <td>Producto</td>
                <td>{{ $comp->obtenerProducto->nombre }}</td>
            </tr>
            <tr>
                <td>Precio</td>
                <td>{{ $comp->obtenerProducto->precio }}</td>
            </tr>
            <tr>
                <td>Impuesto</td>
                <td>{{ $comp->obtenerProducto->obtenerImpuesto->valor.'%' }}</td>
            </tr>
            @endforeach

    </table>

    <h2>GRACIAS POR SU COMPRA</h2>
    <a href="/compra">Regresar</a>
</div>

