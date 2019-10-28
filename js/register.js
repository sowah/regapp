 //Saving Contact Us...
$(document).ready(function () {
    $("#register_btn").click(function (e) {
        var btn = $("#register_btn");
        $(btn).buttonLoader('start');

        e.preventDefault();
        //declare letiables...
        let reg_name = /^([A-Za])/;
        let reg_email = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
        let reg_phone = /^[(]{0,1}[0-9]{3}[)]{0,1}[-\s\.]{0,1}[0-9]{3}[-\s\.]{0,1}[0-9]{4}$/;
        let fullname = $("#fullname").val();
        let institution = $("#institution").val();
        let phone = $("#phone").val();
        let email = $("#email").val();
        


        //check if firstname is not empty...
        if (fullname == "") {

            alert('Please enter full name !');

        }

            //check if it is valid  firstname(A-Z)...
        else if (reg_name.test(fullname) == false) {
            alert('Fullname not valid ! it must start with capital letter and must be only alphabetical characters');

        }

            //check if firstname is not exceed 50 char...
        else if (fullname.length > 50) {
            alert('Fullname must not exceed 50 characters!');
        }

       else if (institution == "") {

            alert('Please enter institution !');

        }

        //check if it is valid  firstname(A-Z)...
        else if (reg_name.test(institution) == false) {
            alert('institution not valid ! it must start with capital letter and must be only alphabetical characters');

        }

        //check if firstname is not exceed 50 char...
        else if (institution.length > 50) {
            alert('Fullname must not exceed 50 characters!');
        }

            // check /if lastname is not empty...
        else if (phone == "") {
            alert('Please enter phone !');
        }

            //check if lastname is not exceed 50 char...

        else if (phone.length > 15) {
            alert('Phone must not exceed 15 numbers!');
        }

            // check if it is valid  lastname(A-Z)...
        else if (reg_phone.test(phone) == false) {
            alert('Phone number not valid!');

        }

            //check if email is not empty
        else if (email == '') {
            alert('Please enter email !');
        }

            //check if it is a valid email
        else if (reg_email.test(email) == false) {
            alert('Email not valid !');

        }

        else{
            let dataString = 'fullname=' + fullname + '&institution=' + institution + '&phone=' + phone +  '&email=' + email + '&option=form-register';

            // console.log(dataString)
            // AJAX Submitting....
            $.ajax({
                type: "POST",
                url: "register.php?option=form-register",
                data: dataString,
                cache: false,
                success: function (result) {
                    //alert(result);

                    $("#result").append(result).fadeOut(10000);
                    $('#fullname, #institution, #phone, #email').val('')
                    $('#register').modal('hide');
                }
            });
            setTimeout(function () {
                $(btn).buttonLoader('stop');
            }, 10000);
        }
        return false;
    }); //end of the  $("#btnsaveinquiry").click(function ()
});
