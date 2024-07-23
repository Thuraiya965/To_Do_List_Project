<x-app-layout>
<head>
<!--  meta tags and stylesheets -->
<link rel="stylesheet" type="text/css" href="styles.css">
<link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&amp;display=swap">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.standalone.min.css">




<div class="container m-5 p-2 rounded mx-auto bg-light shadow">
    <!-- displays a welcome back message with the user name -->
    <h2>Welcome back, {{ $name }}!<img src="{{ asset('assets/moon.png') }}" id="icon"> </h2>

            
<div class="row m-1 p-4">
<div class="col">
<div class="p-1 h1 text-primary text-center mx-auto display-inline-block">
    <!-- displaying my to dos with an icon -->
<i class="fa fa-check bg-primary text-white rounded p-2"></i>
<u>My Todo-s</u>
</div>
</div>
</div>
{{-- display success message --}}
    @if (Session::has('success'))
      <div class="alert alert-success">
        <strong>Success:</strong> {{ Session::get('success') }}
      </div>
    @endif

    {{-- display error message --}}
    @if (count($errors) > 0)
      <div class="alert alert-danger">
        <strong>Error:</strong>
        <ul>
          @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif



                                <!-- Create todo section -->

<!--Route: tasks.store refers to the route for storing a new task . This route 
is defined in your web.php file and points to the store method in the TaskController.-->

<form action="{{ route('tasks.store') }}" method="post">

 <!-- It ensures that every POST, PUT, PATCH, and DELETE request coming from your application is verified for CSRF protection. -->
   
@csrf
<div class="row m-1 p-3">
<div class="col col-11 mx-auto">
<div
class="row bg-white rounded shadow-sm p-2 add-todo-wrapper align-items-center justify-content-center">
<div class="col">
    <!-- aInputs: Two input fields for the task title and due date, and a submit button. -->
<input class="form-control form-control-lg border-0 add-todo-input bg-transparent rounded"
type="text" placeholder="Add new .." name="title">
</div>
<div class="col-auto m-0 px-2 d-flex align-items-center">
<label class="text-secondary my-2 p-0 px-1 view-opt-label due-date-label d-none">Due date
not set</label>
<i class="fa fa-calendar my-2 px-1 text-primary btn due-date-button" data-toggle="tooltip"
data-placement="bottom" title="Set a Due date"></i>
<i class="fa fa-calendar-times-o my-2 px-1 text-danger btn clear-due-date-button d-none"
data-toggle="tooltip" data-placement="bottom" title="Clear Due date"></i>
<input type="date" name="due_date" class="form-control">
</div>

<div class="col-auto px-0 mx-0 mr-2">
<button type="submit" class="btn btn-primary">Add</button>
</div>
</div>
</div>
</div>
<!-- end of add form where when the user clicks add it will store the task -->

</form>


                            <!-- Todo list section -->


<!-- filtering subSection -->

<div class="col-auto px-0 mx-0 mr-2">
<select id="task-filter" name="status" class="custom-select custom-select-sm btn my-2">
<option value="all">All</option>
<option value="active">Active</option>
<option value="completed">Completed</option>
</select>
</div>


<!-- Todo list section -->

<div class="row mx-1 px-5 pb-3 w-80">

<div class="col mx-auto">
<!-- Loops through each task passed from the controller ($tasks variable).-->
 <!-- $tasks: Represents the collection of tasks retrieved from the database.
$task: Represents each individual task object within the loop iteration.-->
@foreach ($tasks as $task)
<div class="row px-3 align-items-center todo-item rounded">

<div class="col-auto m-1 p-0 d-flex align-items-center">
<!-- Form for updating the task status. Each form is uniquely identified using the task's ID ($task->id).-->
<form id="updateForm-{{ $task->id }}" method="POST">
@csrf
<!--  override the POST method and use PUT for updating the task status.-->
@method('PUT')

<button type="submit" class="btn p-0 m-0">

<input type="checkbox" id="task-{{ $task->id }}"
data-task-id="{{ $task->id }}" {{ $task->status == 0 ? 'checked' : '' }}>

<label for="task-{{ $task->id }}">Task {{ $task->name }}</label>
</button>

</form>

</div>
<div class="col px-1 m-1 d-flex align-items-center">
<input type="text"
class="form-control form-control-lg border-0 edit-todo-input bg-transparent rounded px-3"
readonly value="{{ $task->title }}" title="{{ $task->title }}" />
<input type="text"
class="form-control form-control-lg border-0 edit-todo-input rounded px-3 d-none"
value="{{ $task->title }}" />
</div>
<div class="col-auto m-1 p-0 px-3">
@if ($task->due_date)
<div class="row">
<div
class="col-auto d-flex align-items-center rounded bg-white border border-warning">
<i class="fa fa-hourglass-2 my-2 px-2 text-warning btn" data-toggle="tooltip"
data-placement="bottom" title=""
data-original-title="Due on date"></i>
<h6 class="text my-2 pr-2">{{ $task->due_date }}</h6>
</div>
</div>
@endif
</div>

<div class="col-auto m-1 p-0 todo-actions">
    <div class="row d-flex align-items-center justify-content-end">
        <h5 class="m-0 p-0 px-2">
            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-link text-info">
                <i class="fa fa-pencil text-info btn m-0 p-0" data-toggle="tooltip" data-placement="bottom" title="Edit todo"></i>
            </a>
        </h5>

        

<h5 class="m-0 p-0 px-2">
<form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
@csrf
@method('DELETE')
<button type="submit" class="btn btn-link text-danger"
onclick="return confirm('Are you sure you want to delete this task?')">
<i class="fa fa-trash-o" data-toggle="tooltip" data-placement="bottom"
title="Delete todo"></i>
</button>
</form>
</h5>
</div>

<div class="row todo-created-info">
<div class="col-auto d-flex align-items-center pr-2">
<i class="fa fa-info-circle my-2 px-2 text-black-50 btn" data-toggle="tooltip"
data-placement="bottom" title="" data-original-title="Created date"></i>
<label class="date-label my-2 text-black-50">{{ $task->created_at }}</label>
</div>
</div>
</div>
</div>
@endforeach
</div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
   
$(document).ready(function() {
    
$('input[type="checkbox"]').on('change', function() {
var taskId = $(this).data('task-id');
var isChecked = $(this).prop('checked') ? 0 : 1; // 0 if checked, 1 if not
// Construct the ID of the form
var formId = 'updateForm-' + taskId;
// Find the form element by ID
var form = $('#' + formId);

$.ajax({
type: 'POST',
url: '/tasks/' + taskId + '/update-status',
data: form.serialize(),
success: function(response) {
console.log(response.message);
alert('success');
},
error: function(xhr) {
console.log(xhr.responseText);
alert("Error updating task status");
}
});
});
});

$(document).ready(function() {
        $('#task-filter').change(function() {
            var filter = $(this).val(); // Get the selected filter value

            $('.todo-item').each(function() {
                var taskStatus = $(this).find('input[type="checkbox"]').prop('checked') ? 'completed' : 'active';

                if (filter === 'all' || filter === taskStatus) {
                    $(this).show(); // Show the task item
                } else {
                    $(this).hide(); // Hide the task item
                }
            });
        });
    });

    function myFunction() {
   var element = document.body;
   element.classList.toggle("dark-mode");
}
    

    
</script>




</div>
@push('scripts')
<script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/scripts.js') }}"></script>
@endpush
</head>
</body>
</x-app-layout>