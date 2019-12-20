// var form=document.querySelector('#btn');
// var semester=document.querySelector('#semester');
// var tbl=document.querySelector('#tablebody')
// form.addEventListener('click',function(e){
//     e.preventDefault();
//     getStudent(semester.value);
// })
function showSearch(str){
    if(str.length==0){
        return;
    }else{
        var http=new XMLHttpRequest();
        http.onreadystatechange=function(){
            if(this.readyState==4 && this.status==200){
                console.log(this.responseText);
            }
        }
        http.open('GET','../ajaxfunction.php?str='+str,true);
        http.send();
    }
}