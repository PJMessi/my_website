// function incrAllFontSize(){
//   $("*").each(function(index, elem){
//     var $this = $(this);//caching for perf. opt.

//     var curr = $this.css("fontSize");//get the fontSize string
//     if(curr != "" && curr != undefined){//check if it exist
//       curr = curr.replace(/px$/, "");//get rid of "px" in the string

//       var float_curr = parseFloat(curr);//convert string to float
//       float_curr += 1;//actual incr

//       var new_val = "" + float_curr + "px";//back to string
//       $this.css("fontSize", new_val);//set the fontSize string
//     }
//   });
// }
// incrAllFontSize();

$("#subscribe_form").on('submit', function(e){
    let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    e.preventDefault();
    $("#sub_message").text("Submitting...");
    $.ajax({
        url: '/subscribe',
        type: 'POST',
        data: {
            _token: CSRF_TOKEN,
            email: $("#email_sub").val(),                
        },
        dataType: 'JSON',
        success: function (data) {   
            $("#sub_message").text(data.message);
            $("#email_sub").val("");
        }
    });    
});

