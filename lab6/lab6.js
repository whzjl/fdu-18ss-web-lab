var battle = document.getElementById("battle");
var luneburg = document.getElementById("luneburg");
var bermuda = document.getElementById("bermuda");
var athens = document.getElementById("athens");
var florence = document.getElementById("florence");

var featured = document.getElementById("featured");
var featured_img = document.getElementById("featured_img");
var featured_fig = document.getElementById("featured_fig");

var battle_src = "images/medium/5855774224.jpg";
var luneburg_src = "images/medium/5856697109.jpg";
var bermuda_src = "images/medium/6119130918.jpg";
var athens_src = "images/medium/8711645510.jpg";
var florence_src = "images/medium/9504449928.jpg";

window.onload = function(){
    battle.onclick = function () {
        featured_img.src = battle_src;
        featured_img.title = this.title;
        featured_fig.innerText = this.title;
    };
    luneburg.onclick = function () {
        featured_img.src = luneburg_src;
        featured_img.title = this.title;
        featured_fig.innerText = this.title;
    };
    bermuda.onclick = function () {
        featured_img.src = bermuda_src;
        featured_img.title = this.title;
        featured_fig.innerText = this.title;
    };
    athens.onclick = function () {
        featured_img.src = athens_src;
        featured_img.title = this.title;
        featured_fig.innerText = this.title;
    };
    florence.onclick = function () {
        featured_img.src = florence_src;
        featured_img.title = this.title;
        featured_fig.innerText = this.title;
    };

    featured.onmouseover = function(){
        startMove(80);
    };
    featured.onmouseout = function(){
        startMove(0);
    };

    var alpha = 0;
    var timer = null;
    function startMove(it) {
        clearInterval(timer);
        timer = setInterval(function() {
            var speed = 0;    //定义运动的速度
            if (alpha < it) {
                speed = 5;
            }
            else {
                speed = -5;
            }
            if (alpha === it) { //若传入的的透明度等于本来的透明度就清除定时器
                clearInterval(timer);
            }
            else {
                alpha = alpha+speed;
                featured.style.opacity = alpha/100;
            }
        },50)
    }
};