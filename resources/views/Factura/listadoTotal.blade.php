<div>
    <h1>Listado de Facturas</h1>
    <table border="1">
        <tr>
            <td>Numero Factura</td>
            <td>Cliente</td>
            <td>Monto Total</td>
            <td>Impueto Total</td>
        </tr>
        @foreach ($facturas as $fac)
        <tr>
            <td>{{ $fac->numero }}</td>
            <td>{{ $fac->obtenerCliente->name }}</td>
            <td>{{ $fac->monto_t }}</td>
            <td>{{ $fac->impuesto_t }}</td>
        </tr>
        @endforeach

    </table>
</div>

<a href="../factura/pendiente">Regresar</a>
