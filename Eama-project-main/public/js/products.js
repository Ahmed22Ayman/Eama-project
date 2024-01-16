
function turnObjToArray(obj){
    return [].map.call(obj, function(element) {
        return element;
    })
}






      function favorites(target){

        const x=document.querySelector("#menubody");
            
        if (target.className == "favs") {
            let indexs = document.getElementsByClassName('favs');
            let arr = turnObjToArray(indexs);
            let curr = arr.indexOf(target);
           
            document.getElementsByClassName('favrs')[curr].style = "display:block";
            document.getElementsByClassName('favs')[curr].style = "display:none";
        } else if (target.className == "favrs") {
            let indexs = document.getElementsByClassName('favrs');
            let arr = turnObjToArray(indexs);
            let curr = arr.indexOf(target);
            document.getElementsByClassName('favs')[curr].style = "display:block";
            document.getElementsByClassName('favrs')[curr].style = "display:none";
        } else if(target.className=="icons"){
            let indexs = document.getElementsByClassName('icons');
            let arr = turnObjToArray(indexs);
            let curr = arr.indexOf(target);
            console.log(curr);
        
          add_to_cart(curr);
        

        }

        }

      
