// Variables
const process = {
    type: "custom", message: null, error: null, status: true
}

/**
 * Base para la fila de acciones de una tabla (Mostrar, Actualizar y Eliminar)
 * @param {*} data 
 * @param {*} row_number 
 * @returns 
 */
const baseRowOfActions = (data, row_number) => {
    return (`
        <a class="button is-info" href='javascript:doAction(showItem, ${JSON.stringify(data)});'>
            <span class="icon is-small"><i class="fas fa-info-circle"></i></span>
        </a>
        <a class="button is-warning" href='javascript:doAction(viewUpdate, {"data": ${JSON.stringify(data)}, "row_number": ${row_number}});'>
            <span class="icon is-small"><i class="fas fa-edit"></i></span>
        </a>
        <a class="button is-danger" href='javascript:doAction(dropItem, {"id": ${data.id}, "row_number": ${row_number}});'>
            <span class="icon is-small"><i class="fas fa-times-circle"></i></span>
        </a>
    `)
}

/**
 * Método de verificación de respuesta de una petición FETCH
 * @param {*} response 
 * @param {*} typeProcess 
 * @returns 
 */
function verify_crud_response(response, typeProcess){
    if(!response)
        return showAlert({...process, error: "Error al realizar la petición", status: false})
    
    if(response.error)
        return showAlert({...process, error: response.error, status: false})

    if(response.response)
        return showAlert({...process, type: typeProcess})
    else
        return showAlert({...process, type: typeProcess, status: false})
}

/**
 * Método para crear un elemento de una tabla
 * @param {*} data 
 * @param {*} form 
 */
async function createItem(data, form){
    const response = await fetchData(url=config.create.url, method=config.create.method, payload=data)

    verify_crud_response(response, "create")

    if(response && response.response)
        form.reset()
}

/**
 * Método para eliminar un elemento de una tabla
 * @param {*} data 
 */
async function dropItem(data){
    const response = await fetchData(url=config.delete.url, method=config.delete.method, payload=data)

    verify_crud_response(response, "drop")

    if(response && response.response){
        const tr = document.getElementById(`tr_${data.row_number}`)
        tr.remove()
    }
}


/**
 * Método de actualización de un formulario
 * @param {*} data 
 * @param {*} form 
 */
async function updateForm(data, form){
    const response = await fetchData(url=config.update.url, method=config.update.method, payload=data)

    verify_crud_response(response, "update")

    if(response && response.response){
        form.reset()
        hideModal()
        updateRow(data, form.row_number.value)
    }
}

/**
 * Método que genera la vista de actualización de un formulario
 * @param {*} param0 
 */
 function viewUpdate({data, row_number}){
    data = {...data, row_number}
    const div = document.createElement("div")
    div.classList.add("content")
    const form = baseFormUpdate(data)
    div.innerHTML = form
    showModal(div)
}


/**
 * Método para mostrar información de una tabla
 * @param {*} data 
 */
function showItem(data){
    const div = document.createElement("div")
    div.classList.add("content")
    const info = baseInfo(data)
    div.innerHTML = info
    showModal(div)
}

/**
 * Método para mostrar alertas
 * @param {*} process 
 * @returns 
 */
function showAlert(process){
    // Process: type | message | error | status(true=successful || false=error)
    const messages = {
        "create": {"successful": "Registro Creado Correctamente!", "error": "El registro NO se pudo Crear!", "status": process.status},
        "update": {"successful": "Registro Actualizado Correctamente!", "error": "El registro NO se pudo Actualizar!", "status": process.status},
        "drop": {"successful": "Registro Eliminado Correctamente!", "error": "El registro NO se pudo Eliminar!", "status": process.status},
        "custom": {"successful": process.message, "error": process.error, "status": process.status},
    }

    const message = messages[process.type]
    if(message.status){
        alert(message.successful)
    }else{
        alert(message.error)
    }

    return
}