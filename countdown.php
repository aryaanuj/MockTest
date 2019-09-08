<!DOCTYPE html>
<html>

<head>

</head>
<body>
   

    <script type="text/javascript">
        function m(secs)
        {
    if(localStorage.getItem("counter")){
      if(localStorage.getItem("counter") >= secs){
        var value = 0;
      }else{
        var value = localStorage.getItem("counter");
      }
    }else{
      var value = 0;
    }
    document.getElementById('countdown').innerHTML = value;

    var counter = function{
                var ele = document.getElementById("countdown");
                       
                var mins_rem = parseInt(secs/60);
                var secs_rem = secs%60;
                
                if(mins_rem<10 && secs_rem>=10)
                    ele.innerHTML = "Time Remaining: "+"0"+mins_rem+":"+secs_rem;
                else if(secs_rem<10 && mins_rem>=10)
                    ele.innerHTML = "Time Remaining: "+mins_rem+":0"+secs_rem;
                else if(secs_rem<10 && mins_rem<10)
                    ele.innerHTML = "Time Remaining: "+"0"+mins_rem+":0"+secs_rem;
                else
                    ele.innerHTML = "Time Remaining: "+mins_rem+":"+secs_rem;
                if(mins_rem=="00" && secs_rem < 1){
                     ele.innerHTML="<h4>Timeout!!</h4>";
                     ele.innerHTML+=window.open('finalsubmit.php','_self'); 
                }
                secs--;
                  var interval = setInterval(function (){counter();}, 1000);
                
             
      if(value >= secs){
        localStorage.setItem("counter", 0);
        value = 0;
      }else{
        value = parseInt(value)+1;
        localStorage.setItem("counter", value);
      }
      document.getElementById('countdown').innerHTML = value;
    };
    var time_again = setTimeout('m('+secs+')',1000);
};

}

   
  </script>
   <div id="countdown" style="color:red;"><script>m(1000);</script></div>
</body>
</html>