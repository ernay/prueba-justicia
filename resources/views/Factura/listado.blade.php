
<br>
<a type="button" href="/factura/pendiente"><button type="button">Generar facturas</button></a>
<a type="button" href="/factura/listado"><button type="button">Listado de facturas</button></a>
<a type="button" href="/compra"><button type="button">Comprar</button></a>
<a type="button" href="/producto"><button type="button">Productos</button></a>
<div>
    <br>
    <table border="1">
        <tr>
            <th>Cliente</th>
            <th>Monto</th>
            <th>Impuesto</th>

        </tr>
        @if($compra !== '')
            @foreach ($compra as $comp)
                <tr>
                    <td>{{ $comp->name }}</td>
                    <td>{{ $comp->scompra }}</td>
                    <td>{{ $comp->simpuesto }}</td>
                    <td><a href="../compra/{{$comp->cliente_id}}/detalle">Detalle</a></td>
                    <td><a href="{{$comp->cliente_id}}/generar">Generar</a></td>
                </tr>
            @endforeach
        @endif
    </table>
</div>
