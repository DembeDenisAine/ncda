
    function showLoader(){

        $.blockUI({ css: { 
              border: 'none', 
              padding: '6px', 
              backgroundColor: 'none', 
              '-webkit-border-radius': '10px', 
              '-moz-border-radius': '10px', 
              opacity: .5, 
              color: '#fff' 
          } });
  
      }
  
      function hideLoader(){
        $.unblockUI();
      }