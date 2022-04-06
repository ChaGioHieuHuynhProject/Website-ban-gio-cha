<link rel="stylesheet" href="HomeStyle.css">
<div class="t2-container">
    <div class="t2-slides">
        <div class="t2-sliders">
            <input class="form-control" type="radio" name="radio-slider" id="t2-radio1">
            <input class="form-control" type="radio" name="radio-slider" id="t2-radio2">
            <input class="form-control" type="radio" name="radio-slider" id="t2-radio3">
            <div class="t2-slide first">
                <img src="img/IMG_20220404_204550-removebg.png" alt="">
            </div>
            <div class="t2-slide">
                <img src="img/IMG_20220404_204550-removebg.png" alt="">
            </div>
            <div class="t2-slide">
                <img src="img/IMG_20220404_204550-removebg.png" alt="">
            </div>
            <div class="t2-navigatiomauto">
                <div class="t2-autono1"></div>
                <div class="t2-autono2"></div>
                <div class="t2-autono3"></div>
            </div>
        </div>
        <div class="t2-navigation-manual">
            <label for="t2-radio1" id="t2-autono1" class="t2-manualno"></label>
            <label for="t2-radio2" id="t2-autono2" class="t2-manualno"></label>
            <label for="t2-radio3" id="t2-autono3" class="t2-manualno"></label>
        </div>
        <script type="text/javascript">
        var counter = 1;
        setInterval(function() {
            document.getElementById('t2-radio' + counter).checked = true;
            counter++;
            if (counter > 3) {
                counter = 1;
            }
        }, 5000)
        </script>
    </div>
    <div class="t2-textbox">
        <div class="t2-title">
            <h3>GIÒ CHẢ NHÀ HIẾU HUYNH</h3>
            <h1><b>GIA TRUYỀN HƠN 30 NĂM</b></h1>
        </div>
    </div>
</div>