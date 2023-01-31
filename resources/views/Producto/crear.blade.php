<h1>CREAR PRODUCTO</h1>
<div>
<form action="/producto/guardar" method="POST" >
    @csrf
    <table border="1">
        <tr>
            <td>Nombre</td>
            <td><input type="text" name="nombre"></td>
        </tr>
        <tr>
            <td>Precio</td>
            <td><input type="text" name="precio"></td>
        </tr>
        <tr>
            <td>Impuesto</td>
            <td><select name="impuesto">
                    <option value="">SELECCIONE</option>
                    @foreach ($impuesto as $imp)
                        <option value="{{ $imp->id }}">{{ $imp->valor }}</option>
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
