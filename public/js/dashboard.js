$('.deletebtn').click(function(e){
  if (confirm("OK to delete?")) {
    e.preventDefault();
    let id = $(this).attr('itemid');
    let link = $(this).attr('link');
    let baseUrl = $(this).attr('href');
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
    $.ajax({
		url: baseUrl,
		method: 'DELETE',
		data: {id:id},
		dataType: 'text',
		success:function(data){
            $("#notify-tag").fadeIn();
            $("#notify-tag span").html(data);
           setTimeout(function(){
            window.location.href = link;
           }, 2000);
           console.log(data);
		},
        error:function(data){
            $("#notify-tag span").html('Error happened!');
            console.log(data);
        }

	});
}else{
    e.preventDefault()
}
});
$('.confirm').click(function(){
  return confirm("Did you ship this order? An email confirmation will be sent to customer.");
})