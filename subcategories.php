<!DOCTYPE html>
<html lang="en">
<script src="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"></script>
<style>
    .subcat{
        position:fixed; bottom:20px; left:50px;
        transform: translateX(-50%);
        background: linear-gradient(to top, #232697, #0582AD );
        width: 50px;
        height: 50px;
        line-height: 55px;
        font-size: 22px;
        text-align: center;
        color: #fff;
        border-radius: 50%;
        cursor: pointer;
    }

    .wrapper .icons{
        display: none;
        position:absolute; bottom:20px; left:85px;
        width: 245px;
        height: 50px;
        background: linear-gradient(to top, #232697, #0582AD );
        border-radius: 5px;
        padding: 10px;
    }

    .wrapper .icons.active{
        display:block;
    }

    .wrapper .icons ul{
        display: flex;
        width: 100%;
        height: 100%;
        align-items: center;
        justify-content: space-between;
    }

    .wrapper .icons ul li{
        width: 30px;
        height: 30px;
        background: #FFF;
        line-height: 35px;
        font-size: 14px;
        text-align:center;
        border-radius:50%;
        margin: 0 5px;
        list-style-type: none;
    }

    .wrapper .icons ul li:hover{
        background:#CBCBCB;
    }

    .wrapper .icons ul li a{
        color: #000000;
    }

    .wrapper .icons ul li a:hover{
        color: white;
    }

</style>
<body>
<div class="wrapper">
    <div class="subcat" onClick="toggle()">
        <i class="fas fa-archive"></i>
        <div class="icons">
        <ul>
            <li>
                <a href=""><i class="far fa-file"></i></a>
            </li>
            <li>
                <a href=""><i class="far fa-file"></i></a>
            </li>
            <li>
                <a href=""><i class="far fa-file"></i></a>
            </li>
            <li>
                <a href=""><i class="far fa-file"></i></a>
            </li>
        </ul>
        </div>
    </div>
</div>
    <script>
            button = document.querySelector('.subcat');
            button.addEventListener("click", function(){
                document.querySelector('.icons').classList.toggle('active');
            });
    </script>
</body>
</html>