
document.getElementById("bagua-table").onclick  =   function(event){  
    var tag =   event.target.tagName;
    var parent    =   event.target;
   
    if(tag!=="TD")
    {
            while("TD"!== parent.tagName)
            {      
                    parent  =   parent.parentNode;
            }
    }
   else
   {
        parent    =   event.target;
   };
    parent.style.backgroundColor = "red";
};

