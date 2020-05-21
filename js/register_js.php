<script>
 function checkName()
    {
        var name = document.getElementById("txtName").value;    
         if(name.length>99)
         {
            document.getElementById("nameWarning").innerHTML = 'Tên lớn hơn 100 ký tự';  
         }
         else {document.getElementById("nameWarning").innerHTML = ""; return true}
    }
    function checkEmail()
    {
       var email = document.getElementById("txtEmail").value;    
            if(email.includes("@")==true && email[0] !='@')
            {            
                    document.getElementById("emailWarning").innerHTML = '';  
                    return true;           
            }
            else{
                    document.getElementById("emailWarning").innerHTML = 'Có vẻ thứ bạn nhập không giống một email';  
                    return false;
            }         
    }
    function PasswordCheck()
    {
        var firstPass = document.getElementById("pass").value;    
        var  confirm = document.getElementById("confirm").value;    
        if(confirm === firstPass)
        {
            document.getElementById("passWarning").innerHTML = "";
            return true;
        }
        else{
                document.getElementById("passWarning").innerHTML = "Xác Thực Mật Khẩu Không Đúng";
        }
    }
    function Check()
    {
        if(checkName()==true && checkEmail() == true && PasswordCheck() == true)
        {
                return true;
        }
    }
    </script>