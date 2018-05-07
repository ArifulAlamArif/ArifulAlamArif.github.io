var passError = true;var cpassError = true;var errorCurrPass = true;
function vf() {
    if ( passError == true || cpassError == true || errorCurrPass == true )
        {return false;}
    else{return true; }
}
function errors()
{
    if (document.getElementById('pass').style.color == 'red') 
    {
        document.getElementById('errorPass').innerHTML = 'Invalid Password';
        document.getElementById('errorPass').style.color = 'red';
    }
    else if (document.getElementById('cpass').style.color == 'red') 
    {
        document.getElementById('errorCpass').innerHTML = 'Invalid Confirm Password';
        document.getElementById('errorCpass').style.color = 'red';
    }
    else if (document.getElementById('currpass').style.color == 'red') 
    {
        document.getElementById('errorCurrPass').innerHTML = 'Incorrect Password';
        document.getElementById('errorCurrPass').style.color = 'red';
    }
}
function currPassChange()
{
    var currpass = document.getElementById('currpass').value;
    currpass=currpass.trim();
    document.getElementById('currpass').style.color = 'red';
    if(currpass!="")
    {   
        document.getElementById('currpass').style.backgroundColor = '';
        if( currpass.match(/[A-Z]/) && currpass.match(/[a-z]/) && currpass.match(/[0-9]/))
        {   
            //alert(currpass);
            //ajax
            var xhttp = new XMLHttpRequest();//browser built-in object
            xhttp.open("POST", "check_c_change_password.php", true);//where to go and how??
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");// no need for GET
            xhttp.send("do=yes");
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) 
                {   
                    //alert(this.responseText);
                   if (currpass == this.responseText) 
                    {
                        errorCurrPass=false;
                        document.getElementById('currpass').style.color = 'green';
                        document.getElementById('errorCurrPass').innerHTML = 'Valid Password';
                        document.getElementById('errorCurrPass').style.color = 'green';
                    }
                    else
                    {
                        document.getElementById('currpass').style.backgroundColor = '';
                        errorCurrPass=true;
                        document.getElementById('errorCurrPass').innerHTML = 'Incorrect Password';
                        document.getElementById('errorCurrPass').style.color = 'red';
                    } 
                }
            };
            
        }
        else
        {
            document.getElementById('currpass').style.backgroundColor = '';
            errorCurrPass=true;
            document.getElementById('errorCurrPass').innerHTML = 'Incorrect Password';
            document.getElementById('errorCurrPass').style.color = 'red';
        }
    }
    else
    {   
        document.getElementById('currpass').style.backgroundColor = 'red';
        document.getElementById('currpass').style.color = 'black';errorCurrPass=true;
        document.getElementById('errorCurrPass').innerHTML = 'Invalid Password';
        document.getElementById('errorCurrPass').style.color = 'red';
    }
}
function passChange()
{
    var pass = document.getElementById('pass').value;
    pass=pass.trim();
    var currpass = document.getElementById('currpass').value;
    currpass=currpass.trim();
    document.getElementById('pass').style.color = 'red';
    if(pass!="")
    {   
        document.getElementById('pass').style.backgroundColor = '';
        if( pass.match(/[A-Z]/) && pass.match(/[a-z]/) && pass.match(/[0-9]/))
        {   
            if (pass!=currpass) 
            {
                passError=false;
                document.getElementById('pass').style.color = 'green';
                document.getElementById('errorPass').innerHTML = 'Valid Password';
                document.getElementById('errorPass').style.color = 'green';
            }
            else
            {
                document.getElementById('pass').style.backgroundColor = '';
                passError=true;
                document.getElementById('errorPass').innerHTML = "Password can't be matched with Current Password";
                document.getElementById('errorPass').style.color = 'red';
            }   
        }
    }
    else
    {   
        document.getElementById('pass').style.backgroundColor = 'red';
        document.getElementById('pass').style.color = 'black';passError=true;
        document.getElementById('errorPass').innerHTML = 'Invalid Password';
        document.getElementById('errorPass').style.color = 'red';
    }
}
function cpassChange()
{
    var pass = document.getElementById('pass').value;
    var cpass = document.getElementById('cpass').value;
    pass=pass.trim(); cpass=cpass.trim();
    document.getElementById('cpass').style.color = 'red';
    if(cpass!="")
    {   
        document.getElementById('cpass').style.backgroundColor = '';
        if( pass == cpass)
        {   
            cpassError=false;
            document.getElementById('cpass').style.color = 'green';
            document.getElementById('errorCpass').innerHTML = 'Valid Confirm Password';
            document.getElementById('errorCpass').style.color = 'green';
        }
    }
    else
    {   
        document.getElementById('cpass').style.backgroundColor = 'red';
        document.getElementById('cpass').style.color = 'black';cpassError=true;
        document.getElementById('errorCpass').innerHTML = 'Invalid Confirm Password';
        document.getElementById('errorCpass').style.color = 'red';
    }
}