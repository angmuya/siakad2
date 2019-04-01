
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Jquery Autocomplete dengan Boostrap 3</title>
 
        <link href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.2/css/bootstrap.css" rel="stylesheet"/>
        
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.2/js/bootstrap.js"></script>

<script>
            $(function () {
                $("#provinsi").autocomplete({
                    source: "",
                    minLength: 2
                });
            });
        </script>
        <style>                                                                         
            .box{
                width: 500px;
                margin: auto;
                margin-top: 50px;
            }
            .ui-autocomplete {
                position: absolute;
                z-index: 1000;
                cursor: default;
                padding: 0;
                margin-top: 2px;
                list-style: none;
                background-color: #ffffff;
                border: 1px solid #ccc;
                -webkit-border-radius: 5px;
                -moz-border-radius: 5px;
                border-radius: 5px;
                -webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
                -moz-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
                box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
            }
            .ui-autocomplete > li {
                padding: 3px 10px;
            }
            .ui-autocomplete > li.ui-state-focus {
                background-color: #3399FF;
                color:#ffffff;
            }
            .ui-helper-hidden-accessible {
                display: none;
            }
        </style>
    </head>
    <body>
        <div class="box">
            <h3>Jquery Autocomplete Bootstrap 3</h3>
            <div class="form-group">
                <label for="provinsi">Provinsi : </label>
                <input class="form-control" id="provinsi">
                <p>ketikkan 2 huruf misalnya 'ja'</p>
            </div>
            <div class="form-group">
                <input type="submit" value="Fake Button" class="btn btn-primary">
            </div>
            <div>
                <small>&COPY; harviacode.com</small>
            </div>
        </div>
    </body>