jQuery.sharedCount = function(url, fn) {
    url = encodeURIComponent(url || location.href);
    var domain = "//free.sharedcount.com"; /* SET DOMAIN */
    var apikey = "348c19bdd6432ff65fd9f156916e743fe43bc558" /*API KEY HERE*/
    var arg = { 
            data: {
                url: url,
                apikey: apikey
            },
            url: domain + "/url",
            cache: true,
            dataType: "json"
        };
    if ('withCredentials' in new XMLHttpRequest) {
        arg.success = fn;
    } else {
        var cb = "sc_" + url.replace(/\W/g, '');
        window[cb] = fn;
        arg.jsonpCallback = cb;
        arg.dataType += "p";
    }
    return jQuery.ajax(arg);
};

// $.sharedCount(location.href, function(data) {
//      console.log(data.Twitter); 
//        console.log(data.Facebook.like_count);
// });

$(document).ready(function() {
    $("#btnCheck").click(function() {
        var url = $("#url_check").val();
        // alert(url);
        // return;
        $.sharedCount(url, function(data) {
            console.log(data.Twitter); 
            console.log(data.Facebook.share_count);
        });
    });
});
