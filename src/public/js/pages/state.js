// Configuración de estados
const config = {
    "create": {"url": "?c=State&a=create", "method": "POST"},
    "update": {"url": "?c=State&a=update", "method": "POST"},
    "delete": {"url": "?c=State&a=delete", "method": "POST"},
}

/**
 * Base del formulario para actualzar estados
 * @param {*} data 
 * @returns 
 */
const baseFormUpdate = (data) => {
    return (`
        <h1 class="title is-5">Actualizar estados</h1>
        <form onSubmit="previousValidationUpdateForm(event, this)">
            <input type="hidden" name="row_number" value="${data.row_number}">
            <input type="hidden" name="id" value="${data.id}">
            <div class="field">
                <label class="label">Estado</label>
                <div class="control">
                    <input class="input" name="name" type="text" placeholder="Ingrese el estado" value="${data.name}">
                </div>
            </div>
            <div class="field">
                <label class="label">Proceso de uso</label>
                <div class="control">
                    <input class="input" name="process" type="text" placeholder="Ingrese el proceso del estado" value="${data.process}">
                </div>
            </div>
            <div class="control">
                <button class="button is-danger">Actualizar</button>
            </div>
        </form>
    `)
}

/**
 * Base para mostrar información de un estado
 * @param {*} data 
 * @returns 
 */
const baseInfo = (data) => {
    return (`
        <h1 class="title is-5">Información de estados</h1>
        <hr>
        <p><strong>Estado:</strong>&nbsp;${data.name}</p>
        <p><strong>Proceso:</strong>&nbsp;${data.process}</p>
    `)
}


/**
 * Método de validación previa para actualizar estados
 * @param {*} e 
 * @param {*} form 
 */
async function previousValidationUpdateForm(e, form){
    e.preventDefault()
    // Proceso de validación del formulario
    const data = {
        "id": form.id.value,
        "name": form.name.value,
        "process": form.process.value
    }
    updateForm(data, form);
}


/**
 * Método para actualizar una fila de la tabla estado
 * @param {*} data 
 * @param {*} row_number 
 */
function updateRow(data, row_number){
    const tr = document.getElementById(`tr_${row_number}`)
    tr.children[1].innerText = data.name
    tr.children[2].innerText = data.process
    // Actualizar TR
    const div = document.createElement("div")
    div.innerHTML = baseRowOfActions(data, row_number)
    tr.children[3].innerHTML = ""
    tr.children[3].appendChild(div)
}

/**
 * Método que carga las validaciones de la tabla estado automáticamente
 */
(async function loadScript(){
    // VALIDACION DEL METODO CREAR
    const $btnCreate = document.getElementById("btnCreate") || null
    if($btnCreate){
        $btnCreate.addEventListener("click", async ()=>{
            const $form = document.getElementById("frmCreate")
            const data = {
                "name": $form.name.value,
                "process": $form.process.value
            }

            createItem(data, $form);
        })
    }
})();