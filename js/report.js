 //Saving Contact Us...
$(document).ready(function () {

    // CONTACT US JS
    $("#btnsavecyber").click(function (e) {

        e.preventDefault();
        //declare letiables...
        let reg_name = /^([A-Za])/;
        let reg_email = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
        let reg_phone = /^[(]{0,1}[0-9]{3}[)]{0,1}[-\s\.]{0,1}[0-9]{3}[-\s\.]{0,1}[0-9]{4}$/;
        let fullname = $("#name").val();
        let organisation = $("#organisation").val();
        let phone = $("#phone").val();
        let email = $("#email").val();
        let message = $("#message").val();
        let category = $("#category").val();
        


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

       else if (organisation == "") {

            alert('Please enter organisation !');

        }

        //check if it is valid  firstname(A-Z)...
        else if (reg_name.test(organisation) == false) {
            alert('Organisation not valid ! it must start with capital letter and must be only alphabetical characters');

        }

        //check if firstname is not exceed 50 char...
        else if (organisation.length > 50) {
            alert('Fullname must not exceed 50 characters!');
        }

            //check if lastname is not empty...
        else if (phone == "") {
            alert('Please enter phone !');
        }

            //check if lastname is not exceed 50 char...

        else if (phone.length > 15) {
            alert('Phone must not exceed 15 numbers!');
        }

            //check if it is valid  lastname(A-Z)...
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

        else if (category == ''){
            alert('Please select category!')
        }
        else{
            let dataString = 'fullname=' + fullname + '&organisation=' + organisation + '&phone=' + phone +  '&email=' + email + '&category=' + category + '&message=' + message + '&option=form-cyber';

            // console.log(dataString)
            // AJAX Submitting....
            $.ajax({
                type: "POST",
                url: "process.php?option=form-cyber",
                data: dataString,
                cache: false,
                success: function (result) {
                    //alert(result);

                    $("#result").append(result).fadeOut(10000);
                    $('#name, #organisation, #phone, #email, #category, #message').val('')
                    $('#cyber_form').modal('hide');
                }
            });
        }
        return false;
    }); //end of the  $("#btnsaveinquiry").click(function ()


    $("#btnsavedata").click(function (e) {

        e.preventDefault();
        //declare letiables...
        let reg_name = /^([A-Za])/;
        let reg_email = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
        let reg_phone = /^[(]{0,1}[0-9]{3}[)]{0,1}[-\s\.]{0,1}[0-9]{3}[-\s\.]{0,1}[0-9]{4}$/;
        let fname = $("#fname").val();
        let lname = $("#lname").val();
        let email = $("#data_email").val();
        let message = $("#data_message").val();



        //check if firstname is not empty...
        if (fname == "") {

            alert('Please enter first name !');

        }

        //check if it is valid  firstname(A-Z)...
        else if (reg_name.test(fname) == false) {
            alert('First name not valid ! it must start with capital letter and must be only alphabetical characters');

        }

        //check if firstname is not exceed 50 char...
        else if (fname.length > 50) {
            alert('First name must not exceed 50 characters!');
        }

        else if (lname == "") {

            alert('Please enter last name !');

        }

        //check if it is valid  firstname(A-Z)...
        else if (reg_name.test(lname) == false) {
            alert('Last name not valid ! it must start with capital letter and must be only alphabetical characters');

        }

        //check if firstname is not exceed 50 char...
        else if (lname.length > 50) {
            alert('Last name must not exceed 50 characters!');
        }

        //check if email is not empty
        else if (email == '') {
            alert('Please enter email !');
        }

        //check if it is a valid email
        else if (reg_email.test(email) == false) {
            alert('Email not valid !');

        }

        else if (category == ''){
            alert('Please select category!')
        }
        else{
            let dataString = 'fname=' + fname + '&lname=' + lname + '&email=' + email + '&message=' + message + '&option=form-data';

            // console.log(dataString)
            // AJAX Submitting....
            $.ajax({
                type: "POST",
                url: "process.php?option=form-data",
                data: dataString,
                cache: false,
                success: function (result) {
                    //alert(result);

                    $("#result").append(result).fadeOut(10000);
                    $('#fname, #lname, #data_email, #data_message').val('')
                    $('#data_form').modal('hide');
                }
            });
        }
        return false;
    }); //end of the  $("#btnsaveinquiry").click(function ()

    $("#btnsavecrime").click(function (e) {

        e.preventDefault();
        //declare letiables...
        let reg_name = /^([A-Za])/;
        let reg_email = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
        let reg_phone = /^[(]{0,1}[0-9]{3}[)]{0,1}[-\s\.]{0,1}[0-9]{3}[-\s\.]{0,1}[0-9]{4}$/;
        let fullname = $("#fullname").val();
        let sex = $("#sex").val();
        let age = $("#age").val();
        let email = $("#crime_email").val();
        let phone = $("#crime_phone").val();
        let message = $("#crime_message").val();



        //check if firstname is not empty...
        if (fullname == "") {

            alert('Please enter full name !');

        }

        //check if it is valid  firstname(A-Z)...
        else if (reg_name.test(fullname) == false) {
            alert('Full name not valid ! it must start with capital letter and must be only alphabetical characters');

        }

        //check if firstname is not exceed 50 char...
        else if (fullname.length > 50) {
            alert('First name must not exceed 50 characters!');
        }

        else if (sex == "") {

            alert('Please enter Gender !');

        }

        else if (age == "") {
            alert('Please enter age !');
        }


        //check if it is valid  lastname(A-Z)...
        else if (reg_phone.test(age) == false) {
            alert('Age not valid!');

        }

        //check if email is not empty
        else if (email == '') {
            alert('Please enter email !');
        }

        //check if it is a valid email
        else if (reg_email.test(email) == false) {
            alert('Email not valid !');

        }

        else if (phone == "") {
            alert('Please enter phone !');
        }

        //check if lastname is not exceed 50 char...

        else if (phone.length > 15) {
            alert('Phone must not exceed 15 numbers!');
        }

        //check if it is valid  lastname(A-Z)...
        else if (reg_phone.test(phone) == false) {
            alert('Phone number not valid!');

        }
        else{
            let dataString = 'fullname=' + fullname + '&sex=' + sex + '&age=' + age + '&email=' + email + '&phone=' + phone + '&message=' + message + '&option=form-crime';

             console.log(dataString)
            // AJAX Submitting....
            $.ajax({
                type: "POST",
                url: "process.php?option=form-crime",
                data: dataString,
                cache: false,
                success: function (result) {
                    //alert(result);

                    $("#result").append(result).fadeOut(10000);
                    $('#fullname, #sex, #age, #crime_email, #crime_phone, #crime_message').val('')
                    $('#crime_form').modal('hide');
                }
            });
        }
        return false;
    }); //end of the  $("#btnsaveinquiry").click(function ()
});
