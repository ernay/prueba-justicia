<h1>MODIFICAR PRODUCTO</h1>
<div>
<form action="/producto/{{$producto->id}}/actualizar" method="POST" >
    @csrf
    @method('put')
    <table border="1">
        <tr>
            <td>Nombre</td>
            <td><input type="text" name="nombre" value="{{ $producto->nombre }}"></td>
        </tr>
        <tr>
            <td>Precio</td>
            <td><input type="text" name="precio" value="{{ $producto->precio }}"></td>
        </tr>
        <tr>
            <td>Impuesto</td>
            <td><select name="impuesto">
                    <option value="">SELECCIONE</option>
                    @foreach($impuesto as $imp)
                        @if($imp->id == $producto->impuesto_id )
                            <option value="{{ $imp->id }}" selected>{{ $imp->valor }}</option>
                        @else
                            <option value="{{ $imp->id }}">{{ $imp->valor }}</option>
                        @endif
                    @endforeach
                </select>
            </td>
        </tr>

    </table>
    <div>
        <button type="submit">Guardar</button>
        <a href="/producto">Regresar</a>
        </form>
    </div>
</form>
</div>
