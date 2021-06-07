<section class="my-3">
    <div class="container-fluid">
        <form action="" method="post">
            @csrf
            @for($i = 0; $i < count($data["elementos"]); $i++)
                <div class="card mt-4 border-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md">
                                <label>LINK</label>
                                <input oninvalid="this.setCustomValidity('No sea boludo, completa el campo con los valores correctos (a-z0-9_/)')" oninput="setCustomValidity('')" pattern="[a-z0-9_-/]+" required @isset($data['elementos'][$i]['LINK']) value="{{ $data['elementos'][$i]['LINK'] }}" @endisset type="text" name="LINK[{{$i}}]" class="form-control form-control-sm">
                                <small class="form-text text-muted">URL visible</small>
                            </div>
                            <div class="col-12 col-md">
                                <label>NAME</label>
                                <input oninvalid="this.setCustomValidity('No sea boludo, completa el campo con los valores correctos (a-zA-Z0-9)')" oninput="setCustomValidity('')" pattern="[a-zA-Z0-9áéíóú\s]+" required @isset($data['elementos'][$i]['NAME']) value="{{ $data['elementos'][$i]['NAME'] }}" @endisset type="text" name="NAME[{{$i}}]" class="form-control form-control-sm">
                                <small class="form-text text-muted">Nombre visible en el menu</small>
                            </div>
                            <div class="col-12 col-md">
                                <label>SHOW</label>
                                <select name="SHOW[{{$i}}]" class="form-control form-control-sm">
                                    <option @if(!$data['elementos'][$i]['SHOW']) selected @endif value="0">Hidden</option>
                                    <option @if($data['elementos'][$i]['SHOW']) selected @endif value="1">Visible</option>
                                </select>
                            </div>
                            <div class="col-12 col-md function">
                                <label>FUNCTION</label>
                                <input readonly oninvalid="this.setCustomValidity('No sea boludo, completa el campo con los valores correctos (a-z_)')" oninput="setCustomValidity('')" pattern="[a-z_]+" required @isset($data['elementos'][$i]['FUNCTION']) value="{{ $data['elementos'][$i]['FUNCTION'] }}" @endisset type="text" name="FUNCTION[{{$i}}]" class="form-control form-control-sm">
                                <small class="form-text text-muted">Función en el controlador</small>
                                <label><span class="mr-2">Activar campo</span><input onchange="activeInput(this);" type="checkbox" name="" id=""></label>
                            </div>
                        </div>
                        <hr>
                        <div class="row mt-2 request">
                            <div class="col-12 mb-1">
                                <label class="mb-1">REQUEST<button type="button" onclick="addRequest(this);" class="btn btn-primary btn-sm ml-3"><i class="fas fa-plus"></i></button></label>
                                <small class="mb-3 form-text text-muted">Palabras claves para activar el link</small>
                            </div>
                            @for($j = 0; $j < count($data['elementos'][$i]['REQUEST']); $j++)
                            <div class="col-12 col-md d-flex option">
                                <input oninvalid="this.setCustomValidity('No sea boludo, completa el campo con los valores correctos (a-z- _ / *)')" oninput="setCustomValidity('')" pattern="[a-z-_/*]+" required value="{{ $data['elementos'][$i]['REQUEST'][$j] }}" type="text" name="REQUEST[{{$i}}][]" class="form-control form-control-sm">
                                <button type="button" onclick="removeRequest(this);" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                            </div>
                            @endfor
                        </div>
                    </div>
                </div>
            @endfor
            <button class="btn btn-success btn-lg px-4 mt-4 text-uppercase">RUTAS</button>
        </form>
    </div>
</div>
@push("scripts")
<script>
    activeInput = t => {
        let input = t.closest(".function").querySelector("input[type='text']");
        if (t.checked)
            input.removeAttribute("readonly");
        else
            input.setAttribute("readonly", true);
    };
    removeRequest = t => {
        const target = t.closest(".request");
        const elements = target.querySelectorAll(".option");
        const element = t.closest(".option");
        if (elements.length === 1) {
            Toast.fire({
                icon: 'error',
                title: 'No se puede eliminar'
            });
            return null;
        }
        element.remove();
    };
    addRequest = t => {
        const target = t.closest(".request");
        const elements = target.querySelectorAll(".option");
        let element = elements[0].cloneNode(true);
        element.querySelector("input").value = "";
        target.appendChild(element);
    };
</script>
@endpush