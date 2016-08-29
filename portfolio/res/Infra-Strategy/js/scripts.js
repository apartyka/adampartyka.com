/* IMAGE PRELOADER */
function preloader() 

{
     // counter
     var i = 0;

     // create object
     imageObj = new Image();

     // set image list
     images = new Array();
     images[0]="bg.jpg"
     images[1]="header.jpg"
	 images[2]="content-short-wrap.jpg"
     images[3]="content-short-bg.jpg"
	 images[4]="content-long-wrap.jpg"
	 images[5]="content-long-bg.jpg"
	 images[6]="who.jpg"
	 images[7]="who-over.jpg"
	 images[8]="what.jpg"
	 images[9]="what-over.jpg"
	 images[10]="where.jpg"
	 images[11]="where-over.jpg"
	 images[12]="join.jpg"
	 images[13]="join-over.jpg"
     images[14]="pod-bg.jpg"
	 images[15]="pod-bg2.png"
	 images[16]="footer-bg.jpg"
	 images[17]="footer-bg2.png"
	 images[18]="ed.gif"
	 images[19]="kevin.gif"

     // start preloading
     for(i=0; i<=19; i++) 
     {
          imageObj.src=images[i];
     }
} 


function RunFlash(width, height, src, align) {

  document.write('<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="//download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="' +width+ '" height="' +height+ '" align="' +align+ '">\n');
  document.write('<param name="movie" value="' +src+ '" />\n');
  document.write('<param name="wmode" value="transparent" />\n');
  document.write('<param name="quality" value="high" />\n');
  document.write('<embed src="' +src+ '" quality="high" wmode="transparent" align="' +align+ '" pluginspage="//www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="' +width+ '" height="' +height+ '">\n');
  document.write('</embed>\n');
  document.write('</object>\n');

}

var win = null;
function NewWindow(mypage, myname, w, h, scroll, pos) {
    if (pos == "random") { LeftPosition = (screen.width) ? Math.floor(Math.random() * (screen.width - w)) : 100; TopPosition = (screen.height) ? Math.floor(Math.random() * ((screen.height - h) - 75)) : 100; }
    if (pos == "center") { LeftPosition = (screen.width) ? (screen.width - w) / 2 : 100; TopPosition = (screen.height) ? (screen.height - h) / 2 : 100; }
    else if ((pos != "center" && pos != "random") || pos == null) { LeftPosition = 0; TopPosition = 20 }
    settings = 'width=' + w + ',height=' + h + ',top=' + TopPosition + ',left=' + LeftPosition + ',scrollbars=' + scroll + ',location=no,directories=no,status=no,menubar=no,toolbar=no,resizable=no';
    win = window.open(mypage, myname, settings);
}