<!DOCTYPE html>
<html>
    <head>
        <title>Warning | Limeberry Framework</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style type="text/css">
            body{
                margin:0px;
                padding: 0px;
                background-color:#F8F8FF;
                font-family: "Verdana", Times, serif;;
            }a{text-decoration: none;}a:hover{color: #C62828;}
            .header{
                width: 100%;
                background-color: #313140;
                position:fixed;
                padding: 15px;
            }
            .header span{
                color:#fff;
                font-size: 18px;
            }
            .header span .pfr{
                float:right;
                margin-right: 40px;
                color:#546E7A;
            }
            
            .content{width: 100%; }
            .box{
                margin: 0 auto;
                border: 2px solid #78909C;
                width:95%;
                border-radius: 5px;
                padding: 10px;
                
            }
            .box .errorHeader{
                font-size: 18px;
                color:#C62828;
                font-weight: bold;
            }
        </style>
            
    </head>
    <body>
        <div class="header">
            <span>Warning <span class="pfr">Limeberry Framework</span></span>
        </div>
        <br><br><br><br><br><br>
        <div class="content">
            <div class="box">
                <span class="errorHeader">Not Allowed</span>
                <p>
                    <?php echo $this->lblMsg; ?>
                </p>
            </div>
        </div>
    </body>
</html>
