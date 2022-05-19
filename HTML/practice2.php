<?php
    require_once('../PHP/component.php');
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
      <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
      <style>
          @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
        .alert{
        background: #d5eae4;
        padding: 20px 40px;
        min-width: 420px;
        position: absolute;
        right: 0;
        top: 10px;
        border-radius: 4px;
        border-left: 8px solid #077B8A;
        overflow: hidden;
        opacity: 0;
        pointer-events: none;
        }
        .alert.showAlert{
        opacity: 1;
        pointer-events: auto;
        }
        .alert.show{
        animation: show_slide 1s ease forwards;
        }
        @keyframes show_slide {
        0%{
            transform: translateX(100%);
        }
        40%{
            transform: translateX(-10%);
        }
        80%{
            transform: translateX(0%);
        }
        100%{
            transform: translateX(-10px);
        }
        }
        .alert.hide{
        animation: hide_slide 1s ease forwards;
        }
        @keyframes hide_slide {
        0%{
            transform: translateX(-10px);
        }
        40%{
            transform: translateX(0%);
        }
        80%{
            transform: translateX(-10%);
        }
        100%{
            transform: translateX(100%);
        }
        }
        .alert .fa-exclamation-circle{
        position: absolute;
        left: 20px;
        top: 50%;
        transform: translateY(-50%);
        color: #077B8A;
        font-size: 30px;
        }
        .alert .msg{
        font-family: 'poppins';
        font-style: normal;
        font-weight: 600;
        font-size: 18px;
        color: #077B8A;
        }
        .alert .close-btn{
        position: absolute;
        right: 0px;
        top: 50%;
        transform: translateY(-50%);
        background: #d5eae4;
        padding: 20px 18px;
        cursor: pointer;
        }
        .alert .close-btn:hover{
        background: #d5eae4;
        }
        .alert .close-btn .fas{
        color: #077B8A;
        font-size: 22px;
        line-height: 40px;
        }
      </style>
   </head>
   <body>
     <button>Hello</button>
      <?php
        $msg = "Hello";
        notificationcomponent($msg);
        ?>
      <script>
        $('button').click(function(){
           $('.alert').addClass("show");
           $('.alert').removeClass("hide");
           $('.alert').addClass("showAlert");
           setTimeout(function(){
             $('.alert').removeClass("show");
             $('.alert').addClass("hide");
           },3000);
         });
         $('.close-btn').click(function(){
           $('.alert').removeClass("show");
           $('.alert').addClass("hide");
         });
      </script>

?>
                <script>
                    swal({
                            title: '<?php echo $_SESSION['msg'];?>',
                            icon: 'success',
                        });
                    </script>

                unset($_SESSION['msg']);
   </body>
</html>