<div>
    <h1>Detalle</h1>
    <table border="1">
        <tr>
            <td>Numero</td>
            <td>Fecha</td>
            <td>Producto</td>
            <td>Monto</td>
            <td>Impuesto</td>
        </tr>
        @foreach ($compra as $comp)
            <tr>
                <td>{{ $comp->id }}</td>
                <td>{{ $comp->fecha }}</td>
                <td>{{ $comp->obtenerProducto->nombre }}</td>
                <td>{{ $comp->monto_co }}</td>
                <td>{{ $comp->impuesto_co }}</td>
            </tr>
        @endforeach
    </table>
    <a href="/factura/pendiente">Regresar</a>
</div>
