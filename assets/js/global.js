/** Declare all global variable here */
const global = {}
const FORM_ENCODED = 'application/x-www-form-urlencoded'
let url = ''
let socket = ''
const WS_URL = 'ws://localhost:8888'

/**
 * 
 * Set global value and store it into memory
 * @param ObjectKeyValuePair: Object
 */
function setGlobal(ObjectKeyValuePair){
    global[Object.keys(ObjectKeyValuePair)[0]] = ObjectKeyValuePair[Object.keys(ObjectKeyValuePair)[0]]
}

/**
 * 
 * get value and remove it from global
 * @param key: string 
 */
function getValue(key){
    let result =  global[key]
    if(result){
        global[key] = null;
        return result 
    } else {
        return null
    };
}