$("#attach-files").click(function() {
  console.log("test")
  $(".file-box input").click();
});

$(".file-box input").change(function(e) {
  console.log(e, this.files);
});
