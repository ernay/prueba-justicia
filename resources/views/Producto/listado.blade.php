
<div>
    <h1>LISTADO PRODUCTOS</h1>
    <div>
        <a href="producto/crear">Crear</a>
    </div>
    @if(Session::has('notice'))
    <div><strong> {{ Session::get('notice') }} </strong></div>
     @endif
    <div>
        <table border="1">
        <tr>
            <th width=20px>#</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Impuesto</th>
            <th>Acciones</th>
        </tr>
        @php($i=1)
        @foreach($producto as $pro)
        <tr>
            <td><?php echo $i; ?></td>
            <td>{{$pro->nombre}}</td>
            <td>{{$pro->precio}}</td>
            <td>{{$pro->obtenerImpuesto->valor }}</td>
            <td><a href="producto/{{$pro->id}}/modificar">Modificar</a>
                <a href="producto/{{$pro->id}}/eliminar">Eliminar</a></td>
        </tr>
        @php($i++)
        @endforeach
        </table>
    </div>
    <a href="/factura/pendiente">Regresar</a>
</div>

