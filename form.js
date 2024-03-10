function check(){
    var pass3=document.getElementById('pass').value;
    var pass4=document.getElementById('pass2').value;
    let btn1=document.getElementById('btn');
    
    if (pass3.length < 8) {
        alert("Your password is too short");
        return false;
    }
    
    if(pass3!=pass4){
        alert("You should confirm your password correctly");
        return false;
    }
    
    if(!btn1.checked){
        alert("You should accept our terms");
        return false;
    }
    
    return true;
}