var id;
var pass;

id = prompt("아이디입력");

// if(id == ""){
//     alert("아이디를 입력하세요");
//     id = prompt("아이디입력");
// }

if(id == "admin"){
    pass = prompt("비밀번호를 입력하세요");
    if(pass == "1234"){
       location.href = "login01.html" 
    }else{
        location.href = "error.html"
    }
}else{
    location.href="error.html"
}


document.getElementById("name").innerHTML = id;



