$(document).ready(function() {
  var taskArray = [];

  $("#submit-task").on("click", function() {
    var taskVal = $("#task-value").val();
    taskArray.push(taskVal);
    console.log(taskArray);
  });

});
