function vali(){
    var error = 0, error1 = 0, error2 = 0, error3 = 0, error4 = 0, error5 = 0, error6 = 0, error7 = 0, error8 = 0, error9 = 0, error10 =0, error11 =1, error12 =1, error13 =1;
    var errhofamily = document.getElementsByName('hofamily');
    var selhofamily = document.getElementById('erhoname');
    if(frm.hofamily.value === "")
    {

        errhofamily[0].setAttribute("style","color:#f8001d");
        selhofamily.innerHTML = "Head Of Family(Please Enter a Name)";
        selhofamily.setAttribute("style","color:#ff7f50");
        error = 0;
    }
    else if(!(isNaN(frm.hofamily.value)))
    {
        selhofamily.innerHTML = "Head Of Family(Please Enter a Valid Name)";
        errhofamily[0].setAttribute("style","color:#f8001d");
        selhofamily.setAttribute("style","color:#ff7f50");
        error = 0;
    }
    else
    {
        selhofamily.innerHTML = "Head Of Family";
        errhofamily[0].setAttribute("style","color:#ffffff");
        selhofamily.setAttribute("style","color:#f5edea");
        error = 1;
    }

    var errAadhar_no = document.getElementsByName('Aadhar_no');
    var selAadhar_no = document.getElementById('errAadhar');
    if(frm.Aadhar_no.value== "")
    {
        errAadhar_no[0].setAttribute("style","color:#f8001d");
        selAadhar_no.innerHTML = "Aadhar Number (Please Enter Aadhar No.)";
        selAadhar_no.setAttribute("style","color:#ff7f50");
        error1 = 0;
    }
    else if((frm.Aadhar_no.value.length != 12) || (isNaN(frm.Aadhar_no.value)))
    {
        selAadhar_no.innerHTML = "Aadhar Number (Please Enter a Valid Aadhar No.)";
        errAadhar_no[0].setAttribute("style","color:#f8001d");
        selAadhar_no.setAttribute("style","color:#ff7f50");
        error1 = 0;
    }
    else
    {
        selAadhar_no.innerHTML = "Aadhar Number";
        errhofamily[0].setAttribute("style","color:#ffffff");
        selAadhar_no.setAttribute("style","color:#f5edea");
        error1 = 1;
    }

    var erradd = document.getElementsByName('add1');
    var seladd1 = document.getElementById('erradd');
    if(frm.add1.value==="")
    {
        erradd[0].setAttribute("style","color:#f8001d");
        seladd1.innerHTML = "Address1 (Enter Address1)";
        seladd1.setAttribute("style","color:#ff7f50");
        error2 = 0;
    }
    else
    {
        seladd1.innerHTML = "Address1";
        errhofamily[0].setAttribute("style","color:#ffffff");
        seladd1.setAttribute("style","color:#f5edea");
        error2 = 1;
    }

    var errpan = document.getElementsByName('pan_mun_cor');
    var selpan = document.getElementById('errpan');
    if(frm.pan_mun_cor.value==="")
    {
        errpan[0].setAttribute("style","color:#f8001d");
        selpan.innerHTML = "Panchayath/Muncipality/Corporation (Enter a Data)";
        selpan.setAttribute("style","color:#ff7f50");
        error3 = 0;
    }
    else
    {
        selpan.innerHTML = "Panchayath/Muncipality/Corporation";
        errhofamily[0].setAttribute("style","color:#ffffff");
        selpan.setAttribute("style","color:#f5edea");
        error3 = 1;
    }

    var errpin = document.getElementsByName('pincode');
    var selpin = document.getElementById('errpin');
    if(frm.pincode.value == "")
    {
        errpin[0].setAttribute("style","color:#f8001d");
        selpin.innerHTML ="Pincode (Enter a Pincode)";
        selpin.setAttribute("style","color:#ff7f50");
        error4 = 0;
    }
    else if((isNaN(frm.pincode.value)))
    {
        selpin.innerHTML ="Pincode (Enter a Valid Pincode)";
        errpin[0].setAttribute("style","color:#f8001d");
        selpin.setAttribute("style","color:#ff7f50");
        error4 = 0;
    }
    else
    {
        selpin.innerHTML ="Pincode";
        errhofamily[0].setAttribute("style","color:#ffffff");
        selpin.setAttribute("style","color:#f5edea");
        error4 = 1;
    }

    var errward = document.getElementsByName('wardno');
    var selward = document.getElementById('errward');
    if(frm.wardno.value == "")
    {
        errward[0].setAttribute("style","color:#f8001d");
        selward.innerHTML = "Ward Number (Enter Ward No.)";
        selward.setAttribute("style","color:#ff7f50");
        error5 = 0;
    }
    else if((isNaN(frm.wardno.value)))
    {
        selward.innerHTML = "Ward Number (Enter a Valid Ward No.)";
        errward[0].setAttribute("style","color:#f8001d");
        selward.setAttribute("style","color:#ff7f50");
        error5 = 0;
    }
    else
    {
        selward.innerHTML = "Ward Number";
        errhofamily[0].setAttribute("style","color:#ffffff");
        selward.setAttribute("style","color:#f5edea");
        error5 = 1;
    }

    var errhouse = document.getElementsByName('house_no');
    var selhouse = document.getElementById('errhouse');
    if(frm.house_no.value == "")
    {
        errhouse[0].setAttribute("style","color:#f8001d");
        selhouse.innerHTML = "House Number (Enter House No.)";
        selhouse.setAttribute("style","color:#ff7f50");
        error6 = 0;
    }
    else
    {
        selhouse.innerHTML = "House Number";
        errhofamily[0].setAttribute("style","color:#ffffff");
        selhouse.setAttribute("style","color:#f5edea");
        error6 = 1;
    }

    var errmon = document.getElementsByName('monthly_in');
    var selmon = document.getElementById('errmon');
    if(frm.monthly_in.value == "")
    {
        errmon[0].setAttribute("style","color:#f8001d");
        selmon.innerHTML = "Monthly Income (Enter Monthly Income)";
        selmon.setAttribute("style","color:#ff7f50");
        error7 = 0;
    }
    else if((isNaN(frm.monthly_in.value)))
    {
        selmon.innerHTML = "Monthly Income (Enter a Valid Monthly Income)";
        errmon[0].setAttribute("style","color:#f8001d");
        selmon.setAttribute("style","color:#ff7f50");
        error7 = 0;
    }
    else
    {
        selmon.innerHTML = "Monthly Income";
        errhofamily[0].setAttribute("style","color:#ffffff");
        selmon.setAttribute("style","color:#f5edea");
        error7 = 1;
    }

    var errmob = document.getElementsByName('mob_no');
    var selmob = document.getElementById('errmob');
    if(frm.mob_no.value == "")
    {
        errmob[0].setAttribute("style","color:#f8001d");
        selmob.setAttribute("style","color:#ff7f50");
        error8 = 0;
    }
    else if((isNaN(frm.mob_no.value)))
    {
        errmob[0].setAttribute("style","color:#f8001d");
        selmob.setAttribute("style","color:#ff7f50");
        error8 = 0;
    }
    else
    {
        errhofamily[0].setAttribute("style","color:#ffffff");
        selmob.setAttribute("style","color:#f5edea");
        error8 = 1;
    }

    var errcat = document.getElementsByName('cat');
    var selcat = document.getElementById('errcat');
    if(frm.cat.value == "")
    {
        errcat[0].setAttribute("style","color:#f8001d");
        selcat.innerHTML = "Category (Enter a Category)";
        selcat.setAttribute("style","color:#ff7f50");
        error9 = 0;
    }
    else if((isNaN(frm.cat.value)) || frm.cat.value > 5 || frm.cat.value < 1)
    {
        errcat[0].setAttribute("style","color:#f8001d");
        selcat.innerHTML = "Category (Enter a Valid Category btw 1-5 )";
        selcat.setAttribute("style","color:#ff7f50");
        error9 = 0;
    }
    else
    {
        selcat.innerHTML = "Category";
        errhofamily[0].setAttribute("style","color:#ffffff");
        selcat.setAttribute("style","color:#f5edea");
        error9 = 1;
    }

    var errno = document.getElementsByName('no_of_mem');
    var selno = document.getElementById('errno');

    if(frm.no_of_mem.value == "")
    {
        errno[0].setAttribute("style","color:#f8001d");
        selno.innerHTML = "Number Of Members Family(Enter a Data)";
        selno.setAttribute("style","color:#ff7f50");
        error10 = 0;
    }
    else if((isNaN(frm.no_of_mem.value)))
    {
        selno.innerHTML = "Number Of Members Family(Enter a Valid Data)";
        errno[0].setAttribute("style","color:#f8001d");
        selno.setAttribute("style","color:#ff7f50");
        error10 = 0;
    }
    else
    {
        selno.innerHTML = "Number Of Members Family";
        errhofamily[0].setAttribute("style","color:#ffffff");
        selno.setAttribute("style","color:#f5edea");
        error10 = 1;
    }


    var x = document.getElementById("employee_table").rows.length;
    if(frm.no_of_mem.value == "")
    {
        selno.innerHTML = "Enter Number of Members in Family";
        errno[0].setAttribute("style","color:#f8001d");
        selno.setAttribute("style","color:#ff7f50");
        error10 = 0;
    }
    else if(frm.no_of_mem.value != x)
    {
        errno[0].setAttribute("style","color:#f8001d");
        selno.innerHTML = "Number of Family Members:Please Enter Correct Data ";
        selno.setAttribute("style","color:#ff7f50");
        error10 = 0;
    }
    else
    {
        selno.innerHTML = "Number of Family Members";
        errhofamily[0].setAttribute("style","color:#ffffff");
        selno.setAttribute("style","color:#f5edea");
        error10 = 1;
    }
    var i;
    var a=1,b=1,c=1;
    var erro11 = 0,erro12 = 0,erro13 = 0;
    if(x>0)
        for(i=1;i<=x;i++){
            var y= document.getElementById("name"+i);

            if(y.value=="")
            {
                y.style.border = "2px solid red";
                errrowname.style.visibility = "visible";
                erro11 = 0;
            }
            else if((!(isNaN(y.value))))
            {
                y.style.border = "2px solid red";
                errrowname.innerHTML = "Please Enter A Valid Name";
                errrowname.style.visibility = "visible";
                erro11 = 0;
            }
            else
            {
                y.style.border = "1px solid #ccc";
                erro11 = 1;
            }

            var y1= document.getElementById("age"+i);

            if(y1.value =="")
            {
                y1.style.border = "2px solid red";
                errrowage.style.visibility = "visible";
                erro12 = 0;
            }
            else if(isNaN(y1.value))
            {
                y1.style.border = "2px solid red";
                errrowage.innerHTML = "Please Enter A valid Age";
                errrowage.style.visibility = "visible";
                erro12 = 0;
            }
            else
            {
                y1.style.border = "1px solid #ccc";
                erro12 = 1;
            }

            var y2= document.getElementById("Aadhar"+i);

            if(y2.value =="")
            {
                y2.style.border = "2px solid red";
                errrowAadhar.style.visibility = "visible";
                erro13 = 0;
            }
            else if((y2.value.length != 12) || (isNaN(y2.value)))
            {
                y2.style.border = "2px solid red";
                errrowAadhar.innerHTML = "Enter A Valid Aadhar No.";
                errrowAadhar.style.visibility = "visible";
                erro13 = 0;
            }
            else
            {
                y2.style.border = "1px solid #ccc";
                erro13 = 1;
            }

            a = a && erro11;
            b = b && erro12;
            c = c && erro13;
            if(a==1)
            {
                errrowname.style.visibility = "hidden";
                error11 = 1;
            }
            if(b==1)
            {
                errrowage.style.visibility = "hidden";
                error12 = 1;
            }
            if(c==1)
            {
                errrowAadhar.style.visibility = "hidden";
                error13 = 1;
            }
        }

    if(((error && error1) && (error2 && error3) && (error4 && error5) && (error6 && error7) && (error8 && error9) && (error10 && error11) && (error12 && error13)) ==0)
    {
        return false;
    }
    else
    {
        return true;
    }
}
