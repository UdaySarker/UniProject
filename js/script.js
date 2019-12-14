document.querySelector('#deptSelect');
function getDept(){
    var http=new XMLHttpRequest();
    http.onreadystatechange=function(){
    if(this.readyState==4 && this.status==200){
    //     var mydata=JSON.parse(this.response);
    //    // console.log(mydata);
    //     mydata.forEach(function(item){
    //         console.log(item.department);
    //     })
    console.log(this.responseText);
    }
}
http.open("GET","database.php",true);
http.send();
}
