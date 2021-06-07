<div class="home--form py-5">
    <div class="container">
        <div class="wrapper-contacto">
            <fieldset class="border-top">
                <legend class="border-0 bg-transparent mx-auto">Consulte</legend>
            </fieldset>
            <form action="{{ URL::to('contacto') }}" id="formContacto" onsubmit="event.preventDefault(); enviar( this )" method="post">
                <input type="hidden" name="elementos[nombre]" value="Nombre y Apellido / Empresa">
                <input type="hidden" name="elementos[email]" value="Email">
                <input type="hidden" name="elementos[telefono]" value="Teléfono">
                <input type="hidden" name="elementos[marca]" value="Marca">
                <input type="hidden" name="elementos[modelo]" value="Modelo">
                <input type="hidden" name="elementos[ano]" value="Año">
                <input type="hidden" name="elementos[mensaje]" value="Mensaje">
                @csrf
                <div class="row">
                    <div class="col-12 col-md">
                        <input placeholder="Ingrese Nombre y Apellido / Empresa (*)" required type="text" id="nombre" name="nombre" class="form-control" value="{{ old('nombre') }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md">
                        <input placeholder="Ingrese Correo electrónico (*)" required type="email" id="email" name="email" class="form-control" value="{{ old('nombre') }}">
                    </div>
                    <div class="col-12 col-md">
                        <input placeholder="Ingrese Teléfono" type="phone" id="telefono" name="telefono" class="form-control" value="{{ old('telefono') }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md">
                        <select required id="marca" name="marca" class="form-control">
                            <option value="" hidden selected>Ingrese Marca</option>
                            @foreach($data["slug"] AS $k => $v)
                            <option>{{ $v }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 col-md">
                        <input placeholder="Ingrese Modelo" type="text" id="modelo" name="modelo" class="form-control" value="{{ old('modelo') }}">
                    </div>
                    <div class="col-12 col-md">
                        <input placeholder="Ingrese Año" type="text" id="ano" name="ano" class="form-control" value="{{ old('ano') }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <textarea rows="10" placeholder="Escriba su consulta (*)" required id="mensaje" name="mensaje" class="form-control"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 d-flex justify-content-start">
                        <button class="btn btn-warning px-5 rounded-pill">Enviar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>