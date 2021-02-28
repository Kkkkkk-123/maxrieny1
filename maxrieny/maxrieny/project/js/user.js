function user (data){
    
    var res= data.split(';');
    var  arr =[]; 
    res.forEach((item,index)=>{
        
            if(item.indexOf('|')!=-1){
                
            arr.push(item.substr(item.indexOf('|')+1));
        
        }
        
        
    })
    console.log(arr);
    return arr;
    
}