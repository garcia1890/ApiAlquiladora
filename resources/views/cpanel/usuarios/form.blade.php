<form action="{{ route('usuarios.store') }}" method="POST" id="usuario-form">
    @csrf

    <div class="container">
        <div class="row g-4">

            {{-- DATOS PERSONALES --}}
            <div class="col-md-4">
                <h4 class="mb-3">Datos Personales</h4>

                <div class="mb-3">
                    <label>Nombre(s) *</label>
                    <input type="text" class="form-control rounded-pill p-3" 
                           name="Nombre" value="{{ old('Nombre') }}" required>
                </div>

                <div class="mb-3">
                    <label>Apellido Paterno *</label>
                    <input type="text" class="form-control rounded-pill p-3" 
                           name="Ape_pat" value="{{ old('Ape_pat') }}" required>
                </div>

                <div class="mb-3">
                    <label>Apellido Materno *</label>
                    <input type="text" class="form-control rounded-pill p-3" 
                           name="Ape_mat" value="{{ old('Ape_mat') }}" required>
                </div>

                <div class="mb-3">
                    <label>Fecha de Registro *</label>
                    <input type="date" class="form-control rounded-pill p-3" 
                           name="Fecha_registro"
                           value="{{ old('Fecha_registro', date('Y-m-d')) }}" required>
                </div>

                <div class="mb-3">
                    <label class="fw-semibold">Cliente Frecuente *</label>
                    <select name="Frecuente" 
                            class="form-control rounded-pill p-3" required>
                        <option value="Si">Sí</option>
                        <option value="No" selected>No</option>
                    </select>
                </div>
            </div>

            {{-- ACCESO Y CONTACTO --}}
            <div class="col-md-4">
                <h4 class="mb-3">Acceso y Contacto</h4>

                <div class="mb-3">
                    <label>Nombre de Usuario *</label>
                    <input type="text" class="form-control rounded-pill p-3"
                           name="Nom_usuario" value="{{ old('Nom_usuario') }}" required>
                </div>

                <div class="mb-3">
                    <label>Email *</label>
                    <input type="email" class="form-control rounded-pill p-3"
                           name="Email" value="{{ old('Email') }}" required>
                </div>

                <div class="mb-3">
                    <label>Teléfono *</label>
                    <input type="text" class="form-control rounded-pill p-3"
                           name="Telefono" value="{{ old('Telefono') }}" required>
                </div>

                <div class="mb-3">
                    <label>Contraseña *</label>
                    <input type="password" class="form-control rounded-pill p-3"
                           name="Contrasena" required>
                    <small class="text-muted fst-italic">Mínimo 8 caracteres.</small>
                </div>
            </div>

            {{-- DIRECCIÓN --}}
            <div class="col-md-4">
                <h4 class="mb-3">Dirección</h4>

                <div class="mb-3">
                    <label>Calle *</label>
                    <input type="text" class="form-control rounded-pill p-3"
                           name="Calle" value="{{ old('Calle') }}" required>
                </div>

                <div class="mb-3">
                    <label>Número Exterior/Interior *</label>
                    <input type="text" class="form-control rounded-pill p-3"
                           name="Numero" value="{{ old('Numero') }}" required>
                </div>

                <div class="mb-3">
                    <label>Código Postal *</label>
                    <input type="text" class="form-control rounded-pill p-3"
                           id="CP" name="CP" value="{{ old('CP') }}" maxlength="5" required>
                </div>

                <div class="mb-3">
                    <label>Municipio *</label>
                    <input type="text" class="form-control rounded-pill p-3"
                           id="Municipio" name="Municipio" value="{{ old('Municipio') }}" required readonly>
                </div>

                <div class="mb-3">
                    <label>Estado *</label>
                    <input type="text" class="form-control rounded-pill p-3"
                           id="Estado" name="Estado" value="{{ old('Estado') }}" required readonly>
                </div>
            </div>

        </div>
    </div>

    <div class="text-center mt-4">
        <button type="submit" class="btn btn-primary px-5 py-2 rounded-pill">
            Guardar Usuario
        </button>
        <a href="{{ route('usuarios.index') }}" class="btn btn-secondary px-4 py-2 rounded-pill">
            Cancelar
        </a>
    </div>
</form>

<script>
document.getElementById("CP").addEventListener("change", function () {
    let cp = this.value.trim();

    if (cp.length !== 5) return;

    fetch("https://api-sepomex.hckdrk.mx/query/info_cp/" + cp)
        .then(res => res.json())
        .then(data => {
            if (!data.response) {
                alert("Código postal no encontrado");
                document.getElementById("Municipio").value = "";
                document.getElementById("Estado").value = "";
                return;
            }
            document.getElementById("Municipio").value = data.response.municipio || "";
            document.getElementById("Estado").value = data.response.estado || "";
        })
        .catch(err => console.error("Error consultando CP:", err));
});
</script>
