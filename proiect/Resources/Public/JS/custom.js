//carousel
 $(document).ready(function() {
          var carousel = $("#carousel").featureCarousel({
            // include options like this:
            // (use quotes only for string values, and no trailing comma after last option)
            // option: value,
            // option: value
          });

          $("#but_prev").click(function () {
            carousel.prev();
          });
          $("#but_pause").click(function () {
            carousel.pause();
          });
          $("#but_start").click(function () {
            carousel.start();
          });
          $("#but_next").click(function () {
            carousel.next();
          });
        });

//Pagination Products
$(document).ready(function(){
	$("#showmore").click(function(){
		$("#pagination").hide();
		$.ajax({
  			type: "GET",
  			url: "no-template.php",
  			data: {
  				"C" : "Products",
  				"A" : "list",
  				"P" : $("#page").val()
  			},
		    cache: false,
            success: function(data){    
     			$(".productslist").append(data);
     			$("#page").val(parseInt($("#page").val())+1);
     			if($("#page").val()==$("#numberOfPages").val()){
     				$("#showmore").hide();
     			}
  			}
		});
	});
});


//button up 
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("myBtn").style.display = "block";
    } else {
        document.getElementById("myBtn").style.display = "none";
    }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0; // For Chrome, Safari and Opera 
    document.documentElement.scrollTop = 0; // For IE and Firefox
}
