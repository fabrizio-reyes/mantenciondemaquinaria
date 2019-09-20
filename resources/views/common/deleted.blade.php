@if (session('statusDeleted'))
  <script type="text/javascript">
    $.toast({
        text : '{{session('statusDeleted')}}',
        showHideTransition : 'slide',
        icon: 'warning',
        bgColor : '#c13d3d',
        textColor : '#eee',
        allowToastClose : false,
        hideAfter : 5000,
        stack : 10,
        textAlign : 'CENTER',
        position : 'bottom-right'
      });
  </script>
@endif
