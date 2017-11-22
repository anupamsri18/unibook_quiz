

//localStorage.clear();
window.onload = function() {

    var exam_time=localStorage.getItem("exam_time");
    alert(exam_time);
        if(typeof localStorage.getItem("min") !== 'undefined' && typeof localStorage.getItem("sec") !== 'undefined' && localStorage.getItem("min")!= null && localStorage.getItem("sec")!= null ){
            var min = localStorage.getItem("min");
            var sec = localStorage.getItem("sec");
        }
        else {
            console.log("c2");
            var min = "0"+exam_time ;
            var sec = "0"+0;
            var finishedtext = "Countdown finished!";
        }
        var time;

        var counter = setInterval(function()
        {

            localStorage.setItem("min", min);
            localStorage.setItem("sec", sec);
            time= min +" : "+ sec;
            document.getElementById("timer").innerHTML = time ;
            if(sec == 00)
            {
                if(min !=0)
                {
                    min--;
                    sec=59;
                    if(min < 10)
                    {
                        min="0"+min;
                    }
                }
            }
            else
            {
                sec--;
                if(sec < 10)
                {

                    sec="0"+sec;

                }
                if (sec == 00 && min == 00) {
                    clearTimeout(counter);
                    localStorage.setItem("min", null);
                    localStorage.setItem("sec", null);
                    localStorage.removeItem("min");
                    localStorage.removeItem("sec");
                    localStorage.clear();
                    document.getElementById('timer').innerHTML = "Countdown finished";
                    if (confirm("TIME UP!"))
                        window.location.href = "../pages/update.php?q=quiz&step=2";
                    else
                        window.location.href = "../pages/update.php?q=quiz&step=2";
                }

            }
        },1000);
    }
