<h1>COMPRAS</h1>
<br>
<div>
    <form action="/compra/guardar" method="POST" >
        @csrf
        <table border="1">
            <tr>
                <td>Producto</td>
                <td><select name="producto">
                    <option value="">SELECCIONE</option>
                    @foreach ($producto as $pro)
                        <option value="{{ $pro->id }}">{{ $pro->nombre.' / '.$pro->precio.' / '.$pro->obtenerImpuesto->valor.'%' }}</option>
                    @endforeach
                    </select>
                </td>
                <td>
                    <button type="submit">Comprar</button>
                </td>
            </tr>
        </table>
    </form>
    @if($admin == 1)
    <a href="/factura/pendiente">Regresar</a>
    @endif
</div>

