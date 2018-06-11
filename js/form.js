 //     for candidate & Voter Registration
     
     
     
        function formValid() {
            if(document.regform.name.value == '') {
                    alert("please enter name !!");
                    document.regform.name.focus();
                    return false;
                } 
            if(document.regform.fhname.value=='')
                {
                    alert("please enter Father/Husband Name !!");
                    document.regform.fhname.focus();
                    return false;
                } 
             if(document.regform.mname.value=='')
                {
                    alert("please enter Mother Name !!");
                    document.regform.mname.focus();
                    return false;
                } 
             if(document.regform.dob.value=='')
                {
                    alert("please enter Date of Birth !!");
                    document.regform.dob.focus();
                    return false;
                } 
             if(document.regform.aadhar.value=='')
                {
                    alert("please enter Aadhar Number !!");
                    document.regform.aadhar.focus();
                    return false;
                } 
             if(document.regform.email.value=='')
                {
                    alert("please enter E-mail !!");
                    document.regform.email.focus();
                    return false;
                } 
             if(document.regform.pass.value=='')
                {
                    alert("please enter Password !!");
                    document.regform.pass.focus();
                    return false;
                } 
             if(document.regform.mob.value=='')
                {
                    alert("please enter Mobile Number !!");
                    document.regform.mob.focus();
                    return false;
                } 
             if(document.regform.gender.value=='')
                {
                    alert("please Select Gender !!");
                    document.regform.gender.focus();
                    return false;
                } 
             if(document.regform.elcnm.value=='')
                {
                    alert("please Select Election Name !!");
                    document.regform.elcnm.focus();
                    return false;
                } 
             if(document.regform.imgcandi.value=='')
                {
                    alert("Upload Scanned Candidate Image !!");
                    document.regform.imgcandi.focus();
                    return false;
                } 
             if(document.regform.heimg.value=='')
                {
                    alert("Upload Scanned Heigher Education !!");
                    document.regform.heimg.focus();
                    return false;
                } 
             if(document.regform.policevery.value=='')
                {
                    alert("Upload Scanned Police varification !!");
                    document.regform.policevery.focus();
                    return false;
                } 
            if(document.regform.about.value=='')
                {
                    alert("Fill About You !!");
                    document.regform.about.focus();
                    return false;
                } 
            
            
            
//            for Poll & Survey Submition 
            function poll()
            {
                        
                    if(document.regform.question.value=='')
                        {
                            alert("Fill Question !!");
                            document.regform.question.focus();
                            return false;
                        } 
                     if(document.regform.op1.value=='')
                        {
                            alert("Fill option No.1!!");
                            document.regform.op1.focus();
                            return false;
                        } 
                    if(document.regform.op2.value=='')
                        {
                            alert("Fill option No.2!!");
                            document.regform.op2.focus();
                            return false;
                        } 
                     if(document.regform.op3.value=='')
                        {
                            alert("Fill option No.3!!");
                            document.regform.op3.focus();
                            return false;
                        } 
                     if(document.regform.op4.value=='')
                        {
                            alert("Fill option No.4!!");
                            document.regform.op4.focus();
                            return false;
                        }
            }