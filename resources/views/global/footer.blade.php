    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
    <script type="text/javascript">
    	function editTask(){
    		$("#edit-me").attr("contenteditable","true").addClass("editable-content");
            $(".edit-task").attr("disabled","disabled");
    	}
function update_task(id){
  if(event.keyCode == 13){
    $("#edit-me").attr("contenteditable","false").removeClass("editable-content");
    $(".edit-task").removeAttr("disabled");
    var task_name = $("#edit-me").html();
    //var token = '{{ csrf_token() }}';
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url:'{{ URL::to("tasks") }}/'+id,
      type:'put',
      data:{ 'task_name': task_name },
      success:function(response){
        $(".messages").html("Task Updated Successfully");
      }
    });
  }
}

    </script>
</body>
</html>
