__CreateJSPath = function (js) {
    var scripts = document.getElementsByTagName("script");
    var path = "";
    for (var i = 0, l = scripts.length; i < l; i++) {
        var src = scripts[i].src;
        if (src.indexOf(js) != -1) {
            var ss = src.split(js);
            path = ss[0];
            break;
        }
    }
    var href = location.href;
    href = href.split("#")[0];
    href = href.split("?")[0];
    var ss = href.split("/");
    ss.length = ss.length - 1;
    href = ss.join("/");
    if (path.indexOf("https:") == -1 && path.indexOf("http:") == -1 && path.indexOf("file:") == -1 && path.indexOf("\/") != 0) {
        path = href + "/" + path;
    }
    return path;
}

var bootPATH = __CreateJSPath("005.mcg.root.js");
//var bootPATH = '../';

var js_01 = 'easyui_local.js';
var js_02 = 'easyui_cdn.js';
var js_03 = 'easyui_my_lib_local.js';

document.write('<script src="' + bootPATH + js_02 + '" type="text/javascript"></sc' + 'ript>');
document.write('<script src="' + bootPATH + js_03 + '" type="text/javascript"></sc' + 'ript>');

