var index=0
var arr=[]
var flag=null

function loadAnh(){
    for(var i=1;i<6;i++){
        arr[i]=new Image()
        arr[i].src="../images/anh"+i+".jpg"
    }
}
function slideShow(){
    index++
    if(index>5){
        index=1
    }
    document.getElementById("slide").src=arr[index].src
    flag=setTimeout(slideShow,1500)
}