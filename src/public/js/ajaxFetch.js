/**
 * Método para enviar peticiones FETCH 
 * @param {*} url 
 * @param {*} method 
 * @param {*} data 
 * @param {*} auth 
 * @returns 
 */
const fetchData = async (url, method, payload, auth=null) => {
    const data = new FormData();
    data.append("json", JSON.stringify( payload ) );

    let headers = {}

    let jsonFetch = {
        method: method,
        cache: 'no-cache',
    }

    if(auth)
        headers = {...headers, Authorization: auth}
    jsonFetch = {...jsonFetch, headers}

    if (data) 
        jsonFetch = {...jsonFetch, body: data}

    // console.log(jsonFetch);

    const response = await fetch(url, jsonFetch)
    if(!response.ok){
        throw new Error("Error " + url)
    }
    return await response.json()
}

