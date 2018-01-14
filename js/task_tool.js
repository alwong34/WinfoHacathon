$(document).ready(function() {
  var taskArray = [];

  $("#submit-task").on("click", function() {
    var taskVal = $("#task-value").val();
    var dateVal = $("#date-value").val();
    var dropVal = $("#priority-value").val();

    var taskObj = {
      task: taskVal,
      date: dateVal,
      priority: dropVal
    };

    taskArray.push(taskObj);
    console.log(taskArray);
    updateTasks(taskObj);
  });

  function updateTasks(object) {
    var html = "<div class='task'><p class='task-name'>" + object.task + "</p> <p class='due-date'>" + object.date + "</p><button class='cancel-btn'>X</button></div>";
    $("#task-container").append(html);
  }

});
