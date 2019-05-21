var myCanvas = document.getElementById("myCanvas");
myCanvas.width = 32;
myCanvas.height = 32;

document.body.appendChild(myCanvas);

var img = new Image();
img.width = '11';
img.height = '16';

img.onload = function(){
    ctx.drawImage(img,11,8);
}
img.src = 'fire.svg';

var ctx = myCanvas.getContext("2d");
//drawLine(ctx,100,100,200,200);
//drawArc(ctx, 150,150,150, 0, Math.PI/3);
drawPieSlice(ctx, 16, 16, 16, 0, 2 * Math.PI, '#E5E5E5');
drawPieSlice(ctx, 16,16,16, 3*Math.PI/2, 0, '#ff0000');
drawPieSlice(ctx, 16, 16, 13, 0, 2 * Math.PI, '#ffffff');
ctx.drawImage(img,16,16);

function drawLine(ctx, startX, startY, endX, endY){
    ctx.beginPath();
    ctx.moveTo(startX,startY);
    ctx.lineTo(endX,endY);
    ctx.stroke();
}

function drawArc(ctx, centerX, centerY, radius, startAngle, endAngle){
    ctx.beginPath();
    ctx.arc(centerX, centerY, radius, startAngle, endAngle);
    ctx.stroke();
}

function drawPieSlice(ctx,centerX, centerY, radius, startAngle, endAngle, color ){
    ctx.fillStyle = color;
    ctx.beginPath();
    ctx.moveTo(centerX,centerY);
    ctx.arc(centerX, centerY, radius, startAngle, endAngle);
    ctx.closePath();
    ctx.fill();
}

function drawPieSlice(ctx,centerX, centerY, radius, startAngle, endAngle, color ){
    ctx.fillStyle = color;
    ctx.beginPath();
    ctx.moveTo(centerX,centerY);
    ctx.arc(centerX, centerY, radius, startAngle, endAngle);
    ctx.closePath();
    ctx.fill();
}