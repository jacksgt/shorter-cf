// shorter.cf

// recent short-urls
window.onload = function() { 
    // check for recent urls
    if(localStorage.getItem("recent") == "true") {
	document.getElementById("recent-urls-wrapper").style.display = "block";
	loadRecentURLs();
    }

    // check if a new url needs to be added
    if(document.getElementById("addurl") != null) {
	var buffer = document.getElementById("addurl").innerHTML.split(";");
	addRecentURL(buffer[0], buffer[1]);
    }
}

function addRecentURL(longurl, shorturl) {
    for(var i=1; i<=100; i++) {
	if(localStorage.getItem("url" + i) == null) {
	    var name = "url" + i;
	    var content = longurl + ";" + shorturl;
	    localStorage.setItem(name, content);
	    break;
	}
    }
    localStorage.setItem("recent", "true");

    loadRecentURLs();
}

function loadRecentURLs() {
var buffer;
    for(var i=1; i<=100; i++) {
	if(localStorage.getItem("url" + i) != null) {
	    buffer = localStorage.getItem("url" + i).split(";");
	    var longurl = buffer[0];
	    var shorturl = buffer[1];
	    
	    createURLBox(buffer[0], buffer[1]);
	}
    }
}

function createURLBox(longurl, shorturl) {
    var newURLBox = document.createElement("div");
    newURLBox.setAttribute("class", "url-box");

    // create Element for the LongURLBox and set CSS-class
    var long = document.createElement("div");
    long.setAttribute("class", "longURLBox");
    // create <a>-Element for the LongURL, set HREF and insert URL
    var hreflong = document.createElement("a");
    hreflong.setAttribute("href", longurl);
    hreflong.innerHTML = longurl;
    // append <a>-Element to LongURLBox
    long.appendChild(hreflong);
    // append LongURLBox to URLBox
    newURLBox.appendChild(long);

    // create Element for the ShortURLBox and set CSS-class
    var short = document.createElement("div");
    short.setAttribute("class", "shortURLBox");
    // create <a>-Element for the ShortURL, set HREF and insert URL
    var hrefshort = document.createElement("a");
    hrefshort.setAttribute("href", shorturl);
    hrefshort.innerHTML = shorturl;
    // append <a>-Element to ShortURLBox
    short.appendChild(hrefshort);
    // append LongURLBox to URLBox
    newURLBox.appendChild(short);

    // finally append the newly created tree to the URL-wrapper
    document.getElementById("recent-urls-wrapper").appendChild(newURLBox);

}

// for debugging only
//window.onload = function() { createURLBox("http://thisissupposedtobearidiculouslylongurlwhichdoesnotreallymakese.com", "http://shorter.cf/ixque") };
