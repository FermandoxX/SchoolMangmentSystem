// $(".fa-close").click(function(){
//     $(".CreateDiv").animate({right: '-450px'});
// });

$(document).ready(function() {
    $('.fa-close').click(function() {
      $('.CreateDiv').animate({
        right: '-=450px' // Slide 450 pixels to the left (negative value)
      }, 1000); // You can adjust the duration as per your preference
    });
  });


  $(document).ready(function() {
    $('.CreateAdminButton').click(function() {
      $('.CreateDiv').animate({
        right: '+=450px' // Slide 450 pixels to the left (negative value)
      }, 1000); // You can adjust the duration as per your preference
    });
  });

