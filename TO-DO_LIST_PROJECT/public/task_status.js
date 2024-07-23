$(document).ready(function() {
    var url = '{{ route('tasks.update.status') }}';
    var csrfToken = '{{ csrf_token() }}';

    $('input[type="checkbox"]').on('change', function() {
        var taskId = $(this).data('taskId');
        var status = $(this).prop('checked')? 0 : 1;

        $.ajax({
            type: 'POST',
            url: url,
            data: {
                '_token': csrfToken,
                'task_id': taskId,
                'tatus': status
            },
            success: function(data) {
                location.reload(); // reload the page
            }
        });
    });
});