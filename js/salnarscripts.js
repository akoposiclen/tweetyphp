/**
 * Created by clen on 2/3/14.
 */

$(function() {
    init();
});

function init(){
    try{
        functions();
    }catch(err){
        setTimeout(init, 200);
    }
}

function functions(){

    $(function() {


        $(document).ready(function() {
            $('.new').click(function(){
                //alert("/ar?nID=1&sType=" );

                var sType =  this.getAttribute('id');
                var nCovered = this.getAttribute('value');

                window.location = "/arSelectAdd?nCovered=" + nCovered + "&sType=" + sType;

            });

            $('.newSALN').click(function(){
                //alert("/ar?nID=1&sType=" );

                var sType =  this.getAttribute('id');
                var nCovered = this.getAttribute('value');

                window.location = "/salnSelectAdd?nCovered=" + nCovered + "&sType=" + sType;

            });

            $('.linkToAdd').click(function () {
                var sType =  this.getAttribute('id');
                var param = urlParams["nCovered"];
                window.location = "/arSelectAdd?nCovered=" + param + "&sType=" + sType;
            });


            $('.linkToAddsaln').click(function () {
                var sType =  this.getAttribute('id');
                var param = urlParams["nCovered"];
                window.location = "/salnSelectAdd?nCovered=" + param + "&sType=" + sType;
            });

            $('.edit').click(function() {
                var sType =  this.getAttribute('id');
                var nID = this.getAttribute('value');
                var param = urlParams["nCovered"];
                window.location = "/arSelectEdit?nCovered=" + param + "&sType=" + sType + "&nID=" + nID;
            });

            $('.editSALN').click(function() {
                var sType =  this.getAttribute('id');
                var nID = this.getAttribute('value');
                var param = urlParams["nCovered"];
                window.location = "/salnSelectEdit?nCovered=" + param + "&sType=" + sType + "&nID=" + nID;
            });


            $('.delete').click(function(e){
                e.preventDefault();
                var commentContainer = $(this).parents('tr:first');
                var id = $(this).attr("id");
                var string = 'id='+ id ;



                $.ajax({

                    type: "POST",
                    url: "/arSelect/delete",
                    data: "nID=" + this.getAttribute('value') + "&sType=" + document.getElementById('sType').value,
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


            $('.deleteSALN').click(function(e){
                e.preventDefault();
                var commentContainer = $(this).parents('tr:first');
                var id = $(this).attr("id");
                var string = 'id='+ id ;



                $.ajax({

                    type: "POST",
                    url: "/salnSelect/delete",
                    data: "nID=" + this.getAttribute('value') + "&sType=" + document.getElementById('sType').value,
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



            $('.view').click(function(){

                var nCovered = this.getAttribute('id');
                var nID = this.getAttribute('value');
                var sType = "teachingLoad";
                var sDesc = document.getElementById(nCovered).innerHTML;

                window.location = "/arTeachingLoad?nCovered=" + nCovered + "&nID=" + nID + "&sType=" + sType + "&sDesc=" + sDesc;

            });


            $('.viewCD').click(function(){

                var nCovered = this.getAttribute('id');
                var nID = this.getAttribute('value');
                var sType = "cd";
                var sDesc = document.getElementById(nCovered).innerHTML;

                window.location = "/arCDPGD?nCovered=" + nCovered + "&nID=" + nID + "&sType=" + sType + "&sDesc=" + sDesc;

            });



            $('.viewPGD').click(function(){

                var nCovered = this.getAttribute('id');
                var nID = this.getAttribute('value');
                var sType = "pgd";
                var sDesc = document.getElementById(nCovered).innerHTML;

                window.location = "/arCDPGD?nCovered=" + nCovered + "&nID=" + nID + "&sType=" + sType + "&sDesc=" + sDesc;

            });

        });

    });

}




