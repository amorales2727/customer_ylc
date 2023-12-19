function createElement(param = {}){
    let element = document.createElement(param.tag);
    if(Boolean(param.class)){
        if(param.class.length > 0 ){
            param.class.forEach(className => {
                element.classList.add(className);
            });
        }
    }
    if(Boolean(param.text)){
        element.innerText = param.text;
    }
    if(Boolean(param.function)){
        if(typeof param.function === 'function'){
            param.function(element)
        }
    }
    if(Boolean(param.value)){
        element.value = param.value
    }
    if(Boolean(param.id)){
        element.id = param.id
    }
    if(Boolean(param.name)){
        element.name = param.name
    }
    if(Boolean(param.src)){
        element.src = param.src
    }
    if(Boolean(param.attributes)){
        Object.keys(param.attributes).forEach(key =>{
           element.setAttribute(key, param.attributes[key]);
        });
    }
    if(Boolean(param.style)){
        Object.keys(param.style).forEach(key =>{
           element.style[key] = param.style[key];
        });
    }
    if(Boolean(param.child)){
        if(param.child.length > 0 ){
            param.child.forEach(el =>{
                let child = createElement(el);
                element.appendChild(child);
            });
        }
    }
    
    
    return element;
}
export class CreateElement{
    static add(element, param = {}){
        if(!element == ''){
            element.appendChild(createElement(param));
        }else{
            return createElement(param)
        }
        
    }
    
}