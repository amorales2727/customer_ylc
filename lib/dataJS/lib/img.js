
export class ImgFunction{
    static inputFile(file, handler){
        let reader = new FileReader();
        reader.onload = function(event) {
            if( typeof handler === 'function'){
                handler(event)
            } 
        };
        reader.readAsDataURL(file);
        
    }
    
}