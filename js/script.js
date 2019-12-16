// var form=document.querySelector('#btn');
// var semester=document.querySelector('#semester');
// var tbl=document.querySelector('#tablebody')
// form.addEventListener('click',function(e){
//     e.preventDefault();
//     getStudent(semester.value);
// })
// function getStudent(semester){
//     var http=new XMLHttpRequest();
//     http.onreadystatechange=function(){
//     if(this.readyState==4 && this.status==200){
//         var mydata=JSON.parse(this.response);
//         var html=``;
//         mydata.forEach(function(item){
//             html+=`<tr>
//                         <input type="hidden" value="${item.student_id}" name="student_id">
//                         <td>${item.student_id}</td>
//                         <td>${item.name}</td>
//                         <td><input type="radio" name="${item.student_id}"></td>
//                     </tr>
//             `
//         });
//         tbl.insertAdjacentHTML('afterend',html);
//     }
// }
// http.open("GET","../ajaxfunction.php?semester="+semester,true);
// http.send();
// }
