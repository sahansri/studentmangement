<?php
    session_start();
        if(!isset($_SESSION['username'])){
             header("location:../login.php");
        }
        elseif($_SESSION['usertype']=='student'){
            header("location:../login.php");
        }
        elseif($_SESSION['usertype']=='admin'){
            header("location:../login.php");
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Change Password</title>
    <link rel="stylesheet" href="../../css/admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/f10e1dd3e9.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
    .bd{
        display:flex;
        width:100%;
        justify-content:center;
        align-items:center;
        min-height:10vh;
        flex-direction:row;
        gap:40px;
    }
    .inputBox{
        margin: 20px;
        padding:0;
        box-sizing: border-box;
        position:relative;
        width:250px;
    }
    .inputBox select {
        width:100px;
        padding:10px;
        border:1px solid rgba(255,255,255,0,25);
        border-radius:5px;
        outline:none;
        color:#F0A500;
        font-size:1em;
    }
    .inputBox input {
        width:150px;
        padding:10px;
        border:1px solid rgba(255,255,255,0,25);
        border-radius:10px;
        outline:none;
        color: #F0A500;
        font-size: 1em;
        transition:0.5s;
    }
    .inputBox span{
        position:absolute;
        left:0;
        padding:10px;
        pointer-events:none;
        font-size:1em;
        color: rgba(255,255,255,0,25);
        text-transform:uppercase;
    }
    .inputBox input:valid ~ span,
    .inputBox input:focus ~ span
        {
            color:#F0A500;
            transform: translateX(10px) translateY(-15px);
            font-size: 0.65em;
            padding: 0 10px;
            border-left:1px solid #F0A500;
            border-right:1px solid #F0A500;
            letter-spacing:0.2em;
        }
    .inputBox:nth-child(2) input:valid ~ span,
    .inputBox:nth-child(2) input:focus ~ span
    {
        background: #F0A500
        border-radius: 2px;
    }
    .inputBox input:valid ,
    .inputBox input:focus
    {
        border: 1px solid  #F0A500;

    }
    #validator-output {
            .valid {
                color: green;
            }
            .invalid {
                color: red;
            }
        }
</style>
</head>
<body>
    <header class="header">
    <label class="logo"><img src="../../img/home/logo.png" alt=""></label>
        <div class="logout">
            <a href="../login.php" class="btn btn-outline-danger">Logout</a>
        </div>
    </header>

    <aside class="sinav">
        <ul>
            <li>
                <a  href="teacherhome.php" >Dashboard</a>
            </li>
            <li>
                <a href="markattendance.php">Mark <br>Attendance</a>
            </li>
            <li>
                <a  href="t_studentdetails.php">Student Details</a>
            </li>
            <li>
                <a href="marks.php">Add/Remove <br>Marks</a>
            </li>
            <li>
                <a  href="viewattend.php">View <br>Attenedence</a>
            </li>
            <li>
                <a class="active" href="tchangePassword.php">Change my <br>Password</a>
            </li>
        </ul>
    </aside>
    
    <div class="cont">
    <h1>Change My Password</h1><br>
        <form action="../../script/tchangepw.php" method="POST">
        <table>
            <tr>
                <td><label for="currentpw">Current Password:</label></td>
                <td><input type="password" id="currentpw" name="currentpw" required><br></td>
            </tr>
            <tr>
                <td><label for="newpw">New Password:</label></td>
                <td><input type="password" id="newpw" name="newpw"  required><br></td>
            </tr>
            <tr>
                <td><label for="confirmpw">Confirm Password:</label></td>
                <td><input type="password" id="confirmpw" name="confirmpw"  required><br></td>
            </tr>
            <input type="hidden" name="user" value="<?php echo $_SESSION['username']; ?>" >
        </table>
        <div id="validator-output"></div>
        <br>
            <input type="submit" name="change" value="Change the password">
        </form>
        
            
    </div>
    <footer>
    
        <h6>Follow us on </h6>
        <ul>
          <li><a href="https://www.facebook.com"><img src="../../img/home/icons8-facebook-48.png" alt=""></a></li>
          <li><a href="https://www.youtube.com"><img src="../../img/home/icons8-youtube-logo-48.png" alt=""></a></li>
        </ul>
        
        <h6>©All Rights Reserved.</h6>
    </footer>

    <script>
        $(function () {
  $("#validator-output").realtimePasswordValidator({
    debug: true,
    input1: $("#newpw"),
    input2: $("#confirmpw"),
    validators: [
      {
        regexp: ".{8,}",
        message: "Minimum 8 chars"
      },
      {
        regexp: "[a-z]",
        message: "1 lowercase"
      },
      {
        regexp: "[A-Z]",
        message: "1 uppercase"
      },
      {
        regexp: "[0-9]",
        message: "1 number"
      },
      {
        regexp: ".*[!@#$%?=*&]",
        message: "1 special char !@#$%?=*&"
      },
      {
        compare: true,
        message: "Password confirmation must be the same"
      }
    ],
    ok: function (instance) {
      console.log("ok");

      $("#submit").removeAttr("disabled");
    },
    ko: function (instance) {
      console.log("ko");
      $("#submit").attr("disabled", "");
    }
  });
});

// plugin definition
(function ($, window, document, undefined) {
  "use strict";
  var pluginName = "realtimePasswordValidator",
    defaults = {
      debug: false
    };
  function Plugin(element, options) {
    this.element = element;
    this.settings = $.extend({}, defaults, options);
    this._defaults = defaults;
    this._name = pluginName;
    this.init();
  }

  $.extend(Plugin.prototype, {
    init: function () {
      this.settings.input1.on("input", { self: this }, this.validateEvent);
      this.settings.input2.on("input", { self: this }, this.validateEvent);
    },

    validateEvent: function (event) {
      const self = event.data.self;
      const messages = [];
      let valid_count = 0;
      $(self.element).empty();
      $(self.settings.validators).each(function (index, validator) {
        let valid = false;
        if (validator.regexp)
          valid = new RegExp(validator.regexp).test(self.settings.input1.val());
        if (validator.compare)
          valid = self.settings.input1.val() == $(self.settings.input2).val();
        const message = $("<div>" + validator.message + "</div>");
        message.addClass(valid ? "valid" : "invalid");
        if (self.settings.input1.val().length > 0)
          $(self.element).append(message);
        if (valid) valid_count++;
        if (this.debug)
          console.log(
            index,
            self.settings.input1.val(),
            validator.message,
            valid
          );
      });
      if (valid_count == self.settings.validators.length) {
        if (self.settings.ok) self.settings.ok(self);
      } else {
        if (self.settings.ko) self.settings.ko(self);
      }
      if (this.debug)
        console.log(
          "valid",
          valid_count,
          "of",
          self.settings.validators.length
        );
    }
  });

  $.fn[pluginName] = function (options) {
    return this.each(function () {
      if (!$.data(this, "plugin_" + pluginName)) {
        $.data(this, "plugin_" + pluginName, new Plugin(this, options));
      }
    });
  };
})(jQuery, window, document);

    </script>
</body>
</html>