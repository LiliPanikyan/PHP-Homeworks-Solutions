<!DOCTYPE html>
<html>
<head>
    <title> SideBar builder</title>
    <style>
        body{
            font-family: Tahoma;
            width:70%;
            height: 700px;
            position: relative;
            left:15%;
        }
        header{
            width: 100%;
            padding: 10px;
            text-align: center;
        }
        section{
            border:2px solid #234465;
            border-radius: 4px;
            width: 270px;
            height: 200px;
            padding: 5px 5px 5px 20px;
            margin-top:15px;
            margin-left: 20px;
        }
        body section, body .sideBarsSection{
            display: inline-block;
        }
        body .sideBarsSection{
            float: right;
            margin-right: 20px;
            border: none;
        }
        p, input{
            display: inline-block;
        }
        p{
            width: 90px;

        }
        input:hover{
            border: 2px solid orange;
        }
        #button{
            width: 160px;
            height: 25px;
            border-radius: 4px;
            background: #234465;
            color: white;
        }
        #button:hover{
            border: 2px solid orange;
        }

        aside{
            width:120px;
            border:1px solid grey;
            border-radius: 6px;
            margin-top: 15px;
        }
        aside h4{
            margin-left: 5px;
            margin-bottom: -5px;
            border-bottom: 1px solid grey;
        }
        aside ul li{
            list-style-type: circle;
            margin-left:-10px;
        }
        aside ul li a{
            color: black;
        }
        a:hover{
            color: orange;
        }
    </style>
</head>
<body>
<header>
    <h4>Create your own HTML Sidebars</h4>
</header>
    <section>
        <form method="post">
            <p>Categories:</p><input type="text" name="categories" id="categories"><br>
            <p>Tags:</p><input type="text" name="tags" id="tags"><br>
            <p>Months:</p><input type="text" name="months" id="months"><br>
            <input type="submit" id="button" value="Generate">
        </form>
    </section>
<aside class="sideBarsSection">
    <?php
    if(isset($_POST['categories']) || isset($_POST['tags']) || isset($_POST['months'])){
        $category = explode(', ', $_POST['categories']);
        $tags = explode(', ', $_POST['tags']);
        $months = explode(', ', $_POST['months']);

        echo(printSideBar("Categories", $category));
        echo(printSideBar("Tags", $tags));
        echo(printSideBar("Months", $months));
    }
    function printSideBar($header,$list){
        $html = "<aside><h4>$header</h4><ul>";
        foreach ($list as $item)
        {
            $html .="<li><a href='#'>$item</a></li>";
        }
        $html .="</ul></aside>";

        return $html;
    }
    ?>
</aside>
</body>
</html>