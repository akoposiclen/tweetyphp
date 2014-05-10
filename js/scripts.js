/**
 * Created by asus on 1/19/14.
 */

       $(function() {
            init();
        });

function functions(func, urls, id){

    $(function() {


        $(document).ready(function(){

            if(func == "signup")
            {

                $("#sign-up").click(function(){
                    //alert(this.getAttribute('id'));

                    var data = $("#formPost").serialize();

                    $.ajax({
                        type: "POST",
                        url: "/signup",
                        data: data,
                        success: function(results){
                            $('#messages').html(results.msg);

                            if(results.stats == 1)
                                clearMe();

                        }
                    });
                });

            } else if(func == "login"){

                $("#login").click(function(){

                    var data = $("#formPost").serialize();

                    $.ajax({
                        type: "POST",
                        url: "/",
                        data: data,
                        success: function(results){
                            $('#messages').html(results);

                            if(results.retStatus === 'Success') {

                                if (results.redirectTo && results.msg == 'go') {
                                    window.location = results.redirectTo;
                                }
                            }

                        }
                    });
                });

            } else if(func == "validate") {

                $("input").blur(function(){

                    var data = $("#formPost").serialize();

                    $.ajax({
                        type: "POST",
                        url: "/validate",
                        data: data + '&thisID=' + this.getAttribute('id'),
                        success: function(results){
                            //$('#messages').html(results);

                            //if(results.errorID == this.getAttribute('id')) {

                            $(results.retID).html(results.msg);

                            //}

                        }
                    });
                });


            } else if(func == "update"){
                $(id).click(function(){

                    var data = $("#formPost").serialize();

                    $.ajax({
                        type: "POST",
                        url: urls,
                        data: data,
                        success: function(results){
                            //$('#messages').html(results);


                            $('#messages').show();
                            $('#messages').html(results.msg);
                            $('#messages').fadeOut(3500);

                            if(results.retStatus === 'Success') {


                                if (results.retRedirectTo && results.msg == 'go') {
                                    window.location = results.retRedirectTo;
                                }
                            } else if(results.retStatus === "Failed") {
                                alert(results.msg);
                            }

                        }
                    });
                });
            } else if (func == "delete"){

                $('.delete').click(function(e){
                    e.preventDefault();
                    var commentContainer = $(this).parents('tr:first');
                    var id = $(this).attr("id");
                    var string = 'id='+ id ;
                    //alert(this.getAttribute('value'));



                    $.ajax({

                        type: "POST",
                        url: urls,
                        data: "nID=" + this.getAttribute('value'),
                        success: function(results){

                            if(results.stat === 1){
                                commentContainer.slideUp('fast', function() {$(this).remove();});
                                return false;
                            } else {
                                alert('Error');
                            }


                        }
                    });

                });
            }
        });

    });

    $(window).load(function() {

    });

}
