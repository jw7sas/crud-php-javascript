// /**
//  * Método para convertir un formData en un JSON
//  * @param {*} formData 
//  * @returns 
//  */
//  const getJsonFromFormData = (formData) => {
//      // https://stackoverflow.com/questions/41431322/how-to-convert-formdata-html5-object-to-json
//     let json = {};
//     try{
//         let object = {};
//         formData.forEach((value, key) => {
//             // Reflect.has in favor of: object.hasOwnProperty(key)
//             if(!Reflect.has(object, key)){
//                 object[key] = value;
//                 return;
//             }
//             if(!Array.isArray(object[key])){
//                 object[key] = [object[key]];    
//             }
//             object[key].push(value);
//         });
//         json = JSON.stringify(object);
        
//     }catch(error){
//         console.error("Error al convertir formulario en JSON: FUNC(getJsonFromFormData)")
//         console.error(error);
//     }finally{
//         return json;
//     }
// }

/**
 * Método para llamar un función y enviar data
 * @param {*} callback 
 * @param {*} data 
 */
const doAction = (callback, data=null) => {
    if(callback && data)
        callback(data)
}

/**
 * Método para agregar contenido a una modal y abrirla
 * @param {*} content 
 * @returns 
 */
function showModal(content){
    const $modal = document.getElementById("baseModal") || null
    if(!$modal)
        return

    if(!$modal.classList.contains("is-active")){
        const divContent = document.getElementById("baseModalContent")
        divContent.innerHTML = ""
        divContent.appendChild(content)
        $modal.classList.add("is-active")
    }
}

/**
 * Método para cerrar una modal
 * @returns 
 */
function hideModal(){
    const $modal = document.getElementById("baseModal") || null
    if(!$modal)
        return

    if($modal.classList.contains("is-active")){
        $modal.classList.remove("is-active")
    }
}