@if (session('status'))
  <script type="text/javascript">
    $.toast({
        text : '{{session('status')}}',
        showHideTransition : 'slide',
        icon: 'success',
        bgColor : 'dark-red',
        textColor : '#eee',
        allowToastClose : false,
        hideAfter : 5000,
        stack : 10,
        textAlign : 'CENTER',
        position : 'bottom-right'
      });
  </script>
@endif
