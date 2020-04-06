/**
 *
 */

$(function() {
	getResponse()
});

function getResponse(){
    var paths = location.pathname.split("/", 5);
    var thread = document.getElementById("thread");

    $.ajax({
        url: "/thread/getResponse/" + paths[2] + (paths[3] ? "/"+paths[3] : ""),
        dataType: "json"
    })
    .done(function(data, textStatus, jqXHR ){
    	//スレッド内容初期化
    	$("#thread").empty();

		if (data == null) {
			alert("データが存在しません");
		}
		else {
			//スレッド内容更新
			$.each(data["reses"], function(index, res) { 
				$("#thread").append("    <dt><span>" + escapeHtml(res["res_no"]) +  "</span> 名前：<font color=green><b>" + escapeHtml(res["user_name"]) + "</b></font> ：" + escapeHtml(res["createdy"]) +  " ID:" + escapeHtml(res["user_id"]));
				$("#thread").append("    <dd>" + nl2br(escapeHtml(res["res_text"])) +  "<br><br>");
			});

		}

    	//ページングリンク算出
    	var threadUrl = "/thread/" + paths[2];

       	$("#top").attr("href", "/");
       	$("#all").attr("href", threadUrl);

       	//前100
        var n = parseInt($("#thread dt:first span:first").text()) - 1;
        if (!n && $("#thread").children().length > 2) {
        	var m = parseInt($("#thread dt:eq(1) span:first").text());
            if (m > 2){
                n = m - 1;
        	}
        }
        wUrl = n ? threadUrl + "/" + ((n - 99 > 1 ? n - 99 : 1) + "-" + n) : "javascript:void 0;";
       	$("#f100").attr("href", wUrl);

       	//後100
        n = parseInt($("#thread dt:last span:first").text()) + 1;
        wUrl = n <= 1001 ? threadUrl + "/" + (n + "-" + (n + 99)) : "javascript:void 0;";
       	$("#b100").attr("href", wUrl);
		$("#l20").attr("href", threadUrl + "/l20");
		   
		$("#reload").off("click");
       	$("#reload").on("click", function() {
			$("#reload").text('リロード中…');
			getResponse(); 
		});
		$("#reload").text('リロード');

       	$("#postForm").attr("action", "/thread/resWrite");
    })
    .fail(function(jqXHR, textStatus, errorThrown){
    	alert(textStatus + ":" + errorThrown);
    });
}
function escapeHtml(content) {
	  return content
	  				.replace(/&/g, '&amp;')
	  				.replace(/</g, '&lt;')
	  				.replace(/>/g, '&gt;')
	  				.replace(/"/g, '&quot;')
	  				.replace(/'/g, '&#39;');
}
function nl2br(content) {
	return content.replace(/\r?\n/g, '<br />');
}